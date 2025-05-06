<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table= "categories";
    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class)->where('status','1');
    }
    public function brands()
    {
        return $this->hasMany(Brand::class)->where('status','1');
    }
    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
