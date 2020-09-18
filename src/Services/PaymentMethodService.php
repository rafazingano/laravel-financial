<?php

namespace ConfrariaWeb\Financial\Services;

use ConfrariaWeb\Financial\Contracts\PaymentMethodContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class PaymentMethodService
{
    use ServiceTrait;

    public function __construct(PaymentMethodContract $paymentMethod)
    {
        $this->obj = $paymentMethod;
    }


}
