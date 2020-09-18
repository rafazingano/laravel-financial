<?php

namespace ConfrariaWeb\Financial\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $table = 'financial_payment_methods';

    protected $fillable = ['name', 'status'];
}
