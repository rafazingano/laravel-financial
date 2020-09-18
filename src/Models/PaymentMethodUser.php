<?php

namespace ConfrariaWeb\Financial\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodUser extends Model
{
    protected $table = 'financial_payment_method_user';

    protected $fillable = ['payment_method_id', 'user_id', 'status', 'options'];

    protected $casts = [
        'options' => 'collection'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo('ConfrariaWeb\Financial\Models\PaymentMethod');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
