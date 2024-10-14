<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;



class Blog extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    const CATEGORY_MASTERS_CLUB = 1;
    const CATEGORY_CAMPAIGNS = 2;
    const CATEGORY_MEETS_AND_SEMINARS = 3;
    const TYPE_NEWS = 1;
    const TYPE_BLOG = 2;
    const STATUS_ACTIVE = 1;

    protected $guarded = [];
    protected $table = 'blog';

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'images' => 'array'
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main')->singleFile();
        $this->addMediaCollection('images');
    }
}
