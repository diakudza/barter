<?php

namespace App\Http\Controllers;

use App\Enums\TransactionStatus;
use App\Models\Transaction;
use App\Models\User;
use App\Services\PaymentServise;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class PaymentYookassaController extends Controller
{
    public function index(Request $request)
    {
        return view('payment.paymentYookassa');
    }

    public function create(PaymentServise $servise, Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required',
        ]);

        $amount = (float)$request->input('amount');
        $description = $request->input('description');

        $transaction = Transaction::create([
            'amount' => $amount,
            'description' => $description,
            'user_id' => Auth::user()->id
        ]);

        if ($transaction) {
            $link = $servise->createPayment($amount, $description, [
                'transaction_id' => $transaction->id,
                'user_id' => Auth::user()->id,
            ]);

            $transaction->payment_id = $link->_id;
            $transaction->save();
            return redirect()->away($link->getConfirmation()->getConfirmationUrl());
        }
    }

    /**
     * @throws NotFoundException
     * @throws ResponseProcessingException
     * @throws ApiException
     * @throws ExtensionNotFoundException
     * @throws BadApiRequestException
     * @throws InternalServerError
     * @throws ForbiddenException
     * @throws TooManyRequestsException
     * @throws UnauthorizedException
     */
    public function callback(Request $request, PaymentServise $servise)
    {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);

        $notification = (isset($requestBody['event']) && $requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody);

        $payment = $notification->getObject();

        if (isset($payment->status) && $payment->status === 'waiting_for_capture') {
            $servise->getClient()->capturePayment([
                'amount' => $payment->amount,
            ], $payment->id, uniqid('', true));
        }

        if (isset($payment->status) && $payment->status === 'succeeded') {
            if ((bool)$payment->paid === true) {
                $metadata = (object)$payment->metadata;
                if (isset($metadata->transaction_id)) {
//                    Log::debug((json_encode($metadata)));
                    $transactionId = (int)$metadata->transaction_id;
                    $transaction = Transaction::query()->findOrFail($transactionId);
                    $transaction->status = TransactionStatus::CONFIRMED;
                    $transaction->save();
                    $userId = (int)$metadata->user_id;
                    $user = User::findOrFail($userId);
                    $amount = (int)$payment->amount->value;

                    $user->setBalance($amount);
                }
            }
        }
    }
}
