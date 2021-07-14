<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SiteImage extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    
    protected $fillable = [
        'name',
        'slug',
        'width',
        'height',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url', 'image_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/site-images/'.$this->getKey());
    }

    public function registerMediaCollections(): void {
        $this->addMediaCollection('site-Image');
    }

    public static function findImage($slug)
    {
        $defaultUrl = asset('image/home-2/l2-feature-shape.png');
        $model = self::where('slug', $slug)->first();
        return isset($model) && $model->media->isNotEmpty() ? $model->image_url : $defaultUrl;
    }

    public function getImageUrlAttribute()
    {
        $media = $this->getMedia('site-Image');
        return $media->isNotEmpty() ? $media[0]->getUrl() : '#';
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // For preview on admin end
        $this->autoRegisterThumb200();
      
        // Image on the blog single page
        $this->addMediaConversion('site-Image-Default')
            ->width($media->model->width)
            ->height($media->model->height)
            ->performOnCollections('site-Image');
    }
}
