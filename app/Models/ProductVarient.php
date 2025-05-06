<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVarient extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = [
        'product_id',
        'color_id',
        'size_id',
        'quantity',
        'original_price',
        'selling_price',
        'delivery_charges',
        'status'
    ];
}
