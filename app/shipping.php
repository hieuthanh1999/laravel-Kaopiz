<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $table="tbl_shipping";
   public $timestamps=false;
   protected $primaryKey='ship_id';
}
