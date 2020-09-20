<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',250);
            $table->string('sex');
            $table->date('birth');
            $table->string('phone')->unique();
            $table->string('identity_card')->unique();// chứng minh nhân dân
            $table->string('address');// địa chỉ
            $table->string('username');
            $table->unique('username');
            $table->string('access');//quyền truy cập
            $table->string('password');
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
        Schema::dropIfExists('admins');
    }
}
