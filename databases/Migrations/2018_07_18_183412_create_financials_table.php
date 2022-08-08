<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('financials', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->morphs('financialable');
            $table->string('period');
            $table->timestamp('initial_date');
            $table->decimal('amount', 8, 2);
            $table->integer('quotas')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('financial_payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('financial_payment_method_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('payment_method_id')->constrained('financial_payment_methods')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->morphs('financialable', 'financial_payment_method_user_financialable_type_id_index');
            $table->boolean('status')->default(1);
            $table->json('options')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('financial_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            //$table->foreignId('financial_id')->constrained('financials')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->morphs('invoiceable');
            $table->string('code');
            $table->decimal('amount', 8, 2);
            $table->json('options')->nullable();
            $table->timestamp('due_date', 0);
            $table->timestamp('pay_day', 0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('financial_billing_returns', function (Blueprint $table) {
            $table->foreignId('invoice_id')->constrained('financial_invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->json('options');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('financial_billing_returns');
        Schema::dropIfExists('financial_invoices');
        Schema::dropIfExists('financial_payment_method_user');
        Schema::dropIfExists('financial_payment_methods');
        Schema::dropIfExists('financials');
    }
}
