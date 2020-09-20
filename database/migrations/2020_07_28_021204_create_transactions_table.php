<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('stastus')->default(0);
            $table->integer('customer_id')->default(0);
            $table->string('customer_fullname');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->decimal('amount');//tổng tiền thanh toán
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }
    // bảng giao dịch

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
