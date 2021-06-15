<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseorders extends Model
{
    use HasFactory;
    protected $table='purchase_orders';
    public $timestamps=False;
}
