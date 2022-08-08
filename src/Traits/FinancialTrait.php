<?php

namespace ConfrariaWeb\Financial\Traits;

use ConfrariaWeb\Financial\Models\Financial;

trait FinancialTrait
{
    public function financials()
    {
        return $this->morphMany(Financial::class, 'financialable');
    }
}
