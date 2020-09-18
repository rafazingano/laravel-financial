<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])
    ->namespace('ConfrariaWeb\Financial\Controllers')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::prefix('invoices')
            ->name('invoices.')
            ->group(function () {
                Route::get('datatable', 'InvoiceController@datatables')->name('datatables');
            });
        Route::resource('invoices', 'InvoiceController');

        Route::prefix('payment-methods')
            ->name('payment-methods.')
            ->group(function () {
                Route::get('datatable', 'PaymentMethodController@datatables')->name('datatables');
            });
        Route::resource('payment-methods', 'PaymentMethodController');

        Route::prefix('payment-method-users')
            ->name('payment-method-users.')
            ->group(function () {
                Route::get('datatable', 'PaymentMethodUserController@datatables')->name('datatables');
            });
        Route::resource('payment-method-users', 'PaymentMethodUserController');

    });