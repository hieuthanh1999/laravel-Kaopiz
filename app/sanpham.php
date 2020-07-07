<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $table='tbl_sanpham';
    public $timestamps=false;
    protected $primaryKey='id_sp';
    public  function danhmucsp()
    {
        return $this->belongsTo('App\danhmucsp','id_dm', 'id_sp');
    }
    public  function thuonghieusp()
    {
        return $this->belongsTo('App\thuonghieusp','id_th', 'id_sp');
    }
}
