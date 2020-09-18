<?php

namespace ConfrariaWeb\Financial\Databases\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            ['status' => 0, 'name' => 'Boleto'],
            ['status' => 0, 'name' => 'Débito'],
            ['status' => 0, 'name' => 'Crédito à vista'],
            ['status' => 0, 'name' => 'Crédito parcelado'],
            ['status' => 1, 'name' => 'Pagaemnto Recorrente'],
        ];
        foreach ($methods as $method) {
            if (DB::table('financial_payment_methods')->where('name', $method['name'])->doesntExist()) {
                resolve('PaymentMethodService')->create($method);
            }
        }
    }

}
