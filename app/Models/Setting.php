<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Setting extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'description',
        'address',
        'pincode',
        'email',
        'phone_no1',
        'phone_no2',
        'copyright_text',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'youtube_link'
    ];
}
