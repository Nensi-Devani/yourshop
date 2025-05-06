<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $fillable = [
        'user_id',
        'product_id',
        'size_id',
        'quantity'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }
}
