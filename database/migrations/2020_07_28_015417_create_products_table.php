<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->unsignedBigInteger('type_product_id');
            $table->string('category');// thể loại
            $table->foreign('type_product_id')->references('id')->on('type_products');
            $table->string('description');
            $table->decimal('price',15);// giá
            $table->integer('discount');// lưu chiết khấu, giảm giá
            $table->integer('quantity'); // số lượng
            $table->string('img_link');// linh ảnh
            $table->integer('views'); // lượt xem sản phẩm
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
