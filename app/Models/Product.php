<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\Concerns\InteractsWithTime;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table='products';

    protected $fillable = [
        'category_id',
        'sub_category_id',
        'name',
        'slug',
        'brand_id',
        'material_id',
        'color_id',
        'small_description',
        'description',

        'original_price',
        'selling_price',
        'quantity',
        'delivery_charge',
        'trending',
        'featured',
        'status',
        'available',

        'parent_id',

        'meta_title',
        'meta_keyword',
        'meta_description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function productSizes()
    {
        return $this->hasMany(ProductSize::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function material()
    {
        return $this->belongsTo(Material::class);
    }
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function children()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }
}
