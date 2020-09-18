<?php

namespace ConfrariaWeb\Financial\Models;

use ConfrariaWeb\Financial\Scopes\AccountInvoiceScope;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'financial_invoices';

    protected $fillable = ['account_id', 'user_id', 'code', 'price', 'due_date', 'pay_day'];

    protected $dates = ['due_date', 'pay_day'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new AccountInvoiceScope());
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
