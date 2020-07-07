<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblKhachhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_khachhang', function (Blueprint $table) {
            $table->increments('custo_id');
            $table->string('custo_name');
            $table->string('custo_email');
            $table->string('custo_phone');
            $table->string('custo_password');          
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
        Schema::dropIfExists('tbl_khachhang');
    }
}
