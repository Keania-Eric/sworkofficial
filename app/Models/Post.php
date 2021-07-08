<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\PostCategory;
use Conner\Tagging\Taggable;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    use Taggable;


    public function registerMediaCollections(): void {
        $this->addMediaCollection('image');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        // For preview on admin end
        $this->autoRegisterThumb200();

        // Image on the blog single page
        $this->addMediaConversion('default')
            ->width(746)
            ->height(446)
            ->performOnCollections('image');

        /// Image on the blog listing page
        $this->addMediaConversion('thumbnail')
            ->width(415)
            ->height(464)
            ->performOnCollections('image');
    }


    protected $fillable = [
        'title',
        'slug',
        'perex',
        'featured',
        'post_category_id',
        'author',
        'intro_text',
        'published_at',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = [
        'resource_url', 
        'post_url', 
        'thumbnail_url', 
        'default_image_url', 
        'next_post_url', 
        'prev_post_url',
        'tags'
    ];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/posts/'.$this->getKey());
    }

    public function getPostUrlAttribute()
    {
        return route('blog.single', ['slug'=> $this->slug]);
    }

    public function getImageUrlAttribute()
    {
        $media = $this->getMedia('image');
        return $media->isNotEmpty() ? $media[0]->getUrl() : '#';
    }

    public function getThumbnailUrlAttribute()
    {
        $thumbnail = $this->getMedia('image');
        return $thumbnail->isNotEmpty() ? $thumbnail[0]->getUrl('thumbnail') : asset('images/blog-post-3.png');
    }

    public function getDefaultImageUrlAttribute()
    {
        $media = $this->getMedia('image');
        return $media->isNotEmpty() ? $media[0]->getUrl() : asset('images/blog-details-img-1.png');
    }

    public function isPublished()
    {
        $today = Carbon::today();
        return ($this->published_at < $today) && $this->enabled == true;
    }

    public function scopePublished($query)
    {
        $today = Carbon::today();
        return $query->where('published_at', '<', $today)->where('enabled', true);
    }


    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }


    public function getNextPostUrlAttribute()
    {
        return $this->siblingPost($this->id + 1, 'next');
    }

    public function getPrevPostUrlAttribute()
    {
        return $this->siblingPost($this->id - 1, 'prev');
    }

    protected function siblingPost($id, $pos='next')
    {
        $siblingPost = Post::find($id);

        // If there is no sibling post
        if (! $siblingPost) {
            return '#';
        }

        // If the next post id not pubished or is same as the current
        if (!$siblingPost->isPublished()) {
            return $pos == 'next' ? $this->siblingPost($id + 1, $pos) : $this->siblingPost($id - 1, $pos);
        }

        return $siblingPost->post_url;
    }
}
