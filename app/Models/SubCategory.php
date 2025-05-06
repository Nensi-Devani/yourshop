<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'status'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
