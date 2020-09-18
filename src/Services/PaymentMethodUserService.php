<?php

namespace ConfrariaWeb\Financial\Services;

use ConfrariaWeb\Financial\Contracts\PaymentMethodUserContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PaymentMethodUserService
{
    use ServiceTrait;

    public function __construct(PaymentMethodUserContract $paymentMethodUser)
    {
        $this->obj = $paymentMethodUser;
    }

    public function prepareData(array $data)
    {
        $cardToken = resolve('CieloService')
            ->setUser(Auth::user())
            ->setCardNumber($data['card-number']) //'4024007197692931'
            ->setHolder($data['holder'])
            ->setExpirationDate($data['expiration-date'])
            ->setBrand('Visa')
            ->tokenizeCard();

        if (is_string($cardToken) && Str::length($cardToken) === 36) {
            $data['cardToken'] = $cardToken;
            $data['card-number'] = '****-****-****-' . Str::substr($data['card-number'], -4);
        }

        $data['payment_method_id'] = resolve('PaymentMethodService')->where(['name' => 'Crédito à vista'])->first()->id;
        $data['user_id'] = Auth::id();
        $data['options'] = $data;

        return $data;
    }

}
