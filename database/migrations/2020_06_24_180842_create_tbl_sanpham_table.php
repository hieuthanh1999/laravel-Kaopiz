<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sanpham', function (Blueprint $table) {
            $table->increments('id_sp');
            $table->integer('id_dm');
            $table->integer('id_th');
            $table->string('ten_sp');
            $table->text('mota_sp');
            $table->text('noidung_sp');
            $table->string('gia_sp');
            $table->string('hinhanh_sp');
            $table->integer('trangthai_sp');
            $table->timestamps();
            //$table->foreign('id_dm')->references('id_dm')->on('tbl_danhmucsp');
            //$table->foreign('id_th')->references('id_th')->on('tbl_thuonghieusp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_sanpham');
    }
}
