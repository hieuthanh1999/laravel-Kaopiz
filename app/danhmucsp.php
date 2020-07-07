<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmucsp extends Model
{
   protected $table="tbl_danhmucsp";
   public $timestamps=false;
   protected $primaryKey='id_dm';

   public  function sanpham()
   {
       return $this->hasMany('App\sanpham', 'id_dm', 'id_dm');
   }

}
