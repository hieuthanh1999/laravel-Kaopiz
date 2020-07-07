<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
     protected $table="tbl_order_detail";
   public $timestamps=false;
   protected $primaryKey='order_details_id';
}
