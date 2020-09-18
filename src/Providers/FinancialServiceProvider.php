<?php

namespace ConfrariaWeb\Financial\Providers;

use ConfrariaWeb\Financial\Commands\ChargeInvoices;
use ConfrariaWeb\Financial\Contracts\FinancialContract;
use ConfrariaWeb\Financial\Contracts\InvoiceContract;
use ConfrariaWeb\Financial\Contracts\PaymentMethodContract;
use ConfrariaWeb\Financial\Contracts\PaymentMethodUserContract;
use ConfrariaWeb\Financial\Repositories\FinancialRepository;
use ConfrariaWeb\Financial\Repositories\InvoiceRepository;
use ConfrariaWeb\Financial\Repositories\PaymentMethodRepository;
use ConfrariaWeb\Financial\Repositories\PaymentMethodUserRepository;
use ConfrariaWeb\Financial\Services\FinancialService;
use ConfrariaWeb\Financial\Services\InvoiceService;
use ConfrariaWeb\Financial\Services\PaymentMethodService;
use ConfrariaWeb\Financial\Services\PaymentMethodUserService;
use ConfrariaWeb\Vendor\Traits\ProviderTrait;
use Illuminate\Support\ServiceProvider;

class FinancialServiceProvider extends ServiceProvider
{
    use ProviderTrait;

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/api.php');
        $this->loadViewsFrom(__DIR__ . '/../Views', 'financial');
        $this->loadMigrationsFrom(__DIR__ . '/../../databases/Migrations');
        $this->publishes([__DIR__ . '/../../config/cw_financial.php' => config_path('cw_financial.php')], 'config');
        $this->registerSeedsFrom(__DIR__ . '/../../databases/Seeds');

        if ($this->app->runningInConsole()) {
            $this->commands([
                ChargeInvoices::class
            ]);
        }
    }

    public function register()
    {
        $this->app->bind(FinancialContract::class, FinancialRepository::class);
        $this->app->bind('FinancialService', function ($app) {
            return new FinancialService($app->make(FinancialContract::class));
        });

        $this->app->bind(InvoiceContract::class, InvoiceRepository::class);
        $this->app->bind('InvoiceService', function ($app) {
            return new InvoiceService($app->make(InvoiceContract::class));
        });

        $this->app->bind(PaymentMethodContract::class, PaymentMethodRepository::class);
        $this->app->bind('PaymentMethodService', function ($app) {
            return new PaymentMethodService($app->make(PaymentMethodContract::class));
        });

        $this->app->bind(PaymentMethodUserContract::class, PaymentMethodUserRepository::class);
        $this->app->bind('PaymentMethodUserService', function ($app) {
            return new PaymentMethodUserService($app->make(PaymentMethodUserContract::class));
        });
    }

}
