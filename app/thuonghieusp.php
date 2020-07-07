<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thuonghieusp extends Model
{
    protected $table='tbl_thuonghieusp';
    public $timestamps=false;
    protected $primaryKey='id_th';
    public  function sanpham()
    {
        return $this->hasMany('App\sanpham','id_th', 'id_th');
    }

}
