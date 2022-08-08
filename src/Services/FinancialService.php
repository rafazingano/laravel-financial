<?php

namespace ConfrariaWeb\Financial\Services;

use Carbon\Carbon;
use ConfrariaWeb\Financial\Models\Financial;

class FinancialService
{

    protected $financial;

    public function __construct(Financial $financial)
    {
        $this->financial = $financial;
    }

    public function all()
    {
        return $this->financial->all();
    }

    public function create($data)
    {
        $dt = Carbon::now();
        $d = $dt->carbonize('2019-03-21');
        $data['initial_date'] = empty($data['initial_date'])? $dt->toDateTimeString() : $data['initial_date'];
        return $this->financial->create($data);
    }
}
