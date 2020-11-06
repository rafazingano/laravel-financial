<?php

namespace ConfrariaWeb\Financial\Commands;

use Illuminate\Console\Command;

class ChargeInvoices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'financial:charge-invoices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Charge invoices';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        resolve('InvoiceService')->charge();
    }
}
