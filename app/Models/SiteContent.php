<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteContent extends Model
{
    protected $fillable = [
        'content',
        'slug',
        'title',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/site-contents/'.$this->getKey());
    }

    public static function findItem($slug)
    {
        $defaultModel = new \stdClass();
        $defaultModel->title = 'No title';
        $defaultModel->content = 'No content';
        $model = self::where('slug', $slug)->first();
        return isset($model)  ? $model : $defaultModel;
    }
}
