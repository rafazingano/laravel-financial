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
        Schema::create('financial_payment_methods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('financial_payment_method_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('status')->default(1);
            $table->json('options')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('payment_method_id')
                ->references('id')
                ->on('financial_payment_methods')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('financial_invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('code');
            $table->decimal('price', 8, 2);
            $table->json('options')->nullable();
            $table->timestamp('due_date', 0);
            $table->timestamp('pay_day', 0)->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('financial_billing_returns', function (Blueprint $table) {
            $table->unsignedBigInteger('invoice_id');
            $table->json('options');

            $table->foreign('invoice_id')
                ->references('id')
                ->on('financial_invoices')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
    }
}
