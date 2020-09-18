<?php

namespace ConfrariaWeb\Financial\Services;

use Carbon\Carbon;
use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Payment;
use ConfrariaWeb\Financial\Contracts\InvoiceContract;
use ConfrariaWeb\Vendor\Traits\ServiceTrait;
use Illuminate\Support\Str;

class InvoiceService
{
    use ServiceTrait;

    public function __construct(InvoiceContract $invoice)
    {
        $this->obj = $invoice;
    }

    public function charge()
    {
        $invoices = $this->where(['pay_day' => NULL])->get();
        foreach ($invoices as $invoice) {
            $cardToken = $invoice->user->paymentMethodUsers()->where('status', 1)->first()->options['cardToken'];
            $r = $this->saleTokenCreditCard($cardToken, $invoice);
            if(isset($r['payment']['paymentId'])){
                $invoice->pay_day = Carbon::now();
                $invoice->save();
            }
        }

    }

    private function saleTokenCreditCard($cardToken, $invoice){
        $p = resolve('CieloService')
            ->setOrderId($invoice->code)
            ->setUser($invoice->user)
            ->setPayment(str_replace('.', '', $invoice->price))
            ->setPaymentType('CreditCard')
            ->setSecurityCode(123)
            ->setCreditCard('Visa')
            ->setCardToken($cardToken)
            ->createSale();
        return collect(json_decode(json_encode($p), true));
    }

}
