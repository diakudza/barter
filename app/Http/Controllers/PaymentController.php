<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use PayPal\Exception\PayPalConnectionException;

class PaymentController extends Controller
{
    private ApiContext $_api_context;

    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function payWithpaypal(Request $request): \Illuminate\Http\RedirectResponse
    {
        $amountToBePaid = $request->input('amountToBePaid');
        $paymentDescription = $request->input('paymentDescription');
        $currency = $request->input('currency') ?? 'text';
        $quantity = $request->input('quantity') ?? '1';


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName($paymentDescription) /** название элемента **/
            ->setCurrency('RUB')
            ->setQuantity($quantity)
            ->setPrice($amountToBePaid); /** цена **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($amountToBePaid);

        $redirect_urls = new RedirectUrls();
        /** Укажите обратный URL **/
        $redirect_urls->setReturnUrl(URL::route('status'))
            ->setCancelUrl(URL::route('status'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($paymentDescription);

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try {
            $payment->create($this->_api_context);
        } catch (PayPalConnectionException $ex) {
            if (Config::get('app.debug')) {
                Session::put('error', 'Таймаут соединения');
                return Redirect::route('home');
            } else {
                Session::put('error', 'Возникла ошибка, извините за неудобство');
                return Redirect::route('home');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        /** добавляем ID платежа в сессию **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            /** редиректим в paypal **/
            return Redirect::away($redirect_url);
        }

        Session::put('error', 'Произошла неизвестная ошибка');
        return Redirect::route('home');
    }

    public function getPaymentStatus(Request $request)
    {
        /** Получаем ID платежа до очистки сессии **/
        $payment_id = Session::get('paypal_payment_id');
        /** Очищаем ID платежа **/
        Session::forget('paypal_payment_id');

        if (empty($request->PayerID) || empty($request->token)) {
            session()->flash('error', 'Payment failed');
            return Redirect::route('home');
        }

        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->PayerID);

        /** Выполняем платёж **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {
            session()->flash('success', 'Платеж прошел успешно');
            return Redirect::route('home');
        }

        session()->flash('error', 'Платеж не прошел');
        return Redirect::route('home');
    }
}
