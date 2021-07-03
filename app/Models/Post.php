<?php

namespace App\Models;

use App\Models\PostCategory;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;

class Post extends Model implements HasMedia
{

    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;

    public function registerMediaCollections(): void {
        $this->addMediaCollection('image');
    }


    protected $fillable = [
        'title',
        'slug',
        'perex',
        'image',
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
    
    protected $appends = ['resource_url', 'image_url', 'post_url', 'next_post_url', 'prev_post_url'];

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
        return is_array($media) ? $media[0]->getUrl() : '#';
    }

    public function isPublished()
    {
        return !is_null($this->published_at) && $this->enabled == true;
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')->where('enabled', true);
    }


    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }


    public function getNexPostUrlAttribute()
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

        if (!$siblingPost->isPublished()) {
            return $pos == 'next' ? $this->siblingPost($siblingPost->id + 1, $pos) : $this->siblingPost($siblingPost->id - 1, $pos);
        }

        return $siblingPost->post_url;
    }
}
