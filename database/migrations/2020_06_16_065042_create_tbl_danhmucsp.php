<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDanhmucsp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_danhmucsp', function (Blueprint $table) {
            $table->increments('id_dm');
            $table->string('ten_dm');
            $table->text('mota_dm');
            $table->integer('trangthai_dm');
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
        Schema::dropIfExists('tbl_danhmucsp');
    }
}
