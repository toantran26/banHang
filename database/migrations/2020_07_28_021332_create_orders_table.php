<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->unique();
            $table->foreign('product_id')->references('id')->on('products');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->tinyInteger('stastus')->default(0);
            $table->string('customer_fullname');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('address');// địa chỉ
            $table->integer('count')->default(0);// số lượng
            $table->decimal('amount',15);//tổng tiền thanh toán
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }// đặt hàng

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
