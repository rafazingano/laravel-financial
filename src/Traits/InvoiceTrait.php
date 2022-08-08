<?php

namespace ConfrariaWeb\Financial\Traits;

use ConfrariaWeb\Financial\Models\Invoice;

trait InvoiceTrait
{
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
}
