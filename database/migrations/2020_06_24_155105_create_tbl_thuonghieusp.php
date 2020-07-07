<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblThuonghieusp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_thuonghieusp', function (Blueprint $table) {
            $table->increments('id_th');
            $table->string('ten_th');
            $table->text('mota_th');
            $table->integer('trangthai_th');
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
        Schema::dropIfExists('tbl_thuonghieusp');
    }
}
