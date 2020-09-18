<?php

namespace ConfrariaWeb\Financial\Traits;

trait FinancialUserTrait
{
    public function paymentMethodUsers()
    {
        return $this->hasMany('ConfrariaWeb\Financial\Models\PaymentMethodUser');
    }
}
