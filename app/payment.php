<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
	protected $table="tbl_payment";
	public $timestamps=false;
	protected $primaryKey='payment_id';
}
