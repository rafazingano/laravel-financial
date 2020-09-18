<?php

namespace ConfrariaWeb\Financial\Services;

use ConfrariaWeb\Financial\Contracts\FinancialContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;

class FinancialService
{
    use ServiceTrait;

    public function __construct(FinancialContract $financial)
    {
        $this->obj = $financial;
    }


}
