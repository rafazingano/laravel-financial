<?php

namespace ConfrariaWeb\Financial\Models;

use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{

    protected $table = 'financials';
    protected $fillable = [
        'financialable_type',
        'financialable_id',
        'period',
        'initial_date',
        'amount',
        'quotas',
        'status',
    ];

    public function financialable()
    {
        return $this->morphTo();
    }

}
