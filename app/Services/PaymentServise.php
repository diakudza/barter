<?php

namespace App\Services;

use YooKassa\Client;
use YooKassa\Common\Exceptions\ApiException;
use YooKassa\Common\Exceptions\BadApiRequestException;
use YooKassa\Common\Exceptions\ExtensionNotFoundException;
use YooKassa\Common\Exceptions\ForbiddenException;
use YooKassa\Common\Exceptions\InternalServerError;
use YooKassa\Common\Exceptions\NotFoundException;
use YooKassa\Common\Exceptions\ResponseProcessingException;
use YooKassa\Common\Exceptions\TooManyRequestsException;
use YooKassa\Common\Exceptions\UnauthorizedException;

class PaymentServise
{
    public function getClient(): Client
    {
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'), config('services.yookassa.secretKey'));
        return $client;
    }

    public function createPayment(float $amount, string $description, array $option = [])
    {
        $client = $this->getClient();
        $idempotenceKey = uniqid('', true);

        $payment = $client->createPayment([
            'amount' => [
                'value' => $amount,
                'currency' => 'RUB',
            ],
            'confirmation' => [
                'type' => 'redirect',
                'locale' => 'ru_RU',
                'return_url' => route('user.profile'),
            ],
            'payment_method_data' => [
                'type' => 'bank_card',
            ],
            'capture' => false,
            'description' => $description,
            'metadata' => [
                'transaction_id' => $option['transaction_id'],
                'user_id' => $option['user_id'],
            ]
        ],
            $idempotenceKey
        );

        return $payment;
    }
}
