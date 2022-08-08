<?php

namespace ConfrariaWeb\Financial\Providers;

use ConfrariaWeb\Vendor\Traits\ProviderTrait;
use Illuminate\Support\ServiceProvider;

class FinancialServiceProvider extends ServiceProvider
{
    use ProviderTrait;

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->publishes([__DIR__ . '/../../config/cw_financial.php' => config_path('cw_financial.php')], 'config');
        //$this->registerSeedsFrom(__DIR__ . '/../../databases/Seeds');

        /*if ($this->app->runningInConsole()) {
            $this->commands([
                ChargeInvoices::class
            ]);
        }*/
    }

    public function register()
    {

    }

}
