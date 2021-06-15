<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseordersdetails extends Model
{
	   use HasFactory;
    protected $table='purchase_order_details';
    public $timestamps=False;
}
