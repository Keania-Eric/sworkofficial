<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'content',
        'name',
        'slug',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/pages/'.$this->getKey());
    }

    public static function findItem($slug)
    {
        $defaultModel = new \stdClass();
        $defaultModel->content = 'No Content';
        $model = self::where('slug', $slug)->first();
        return isset($model)  ? $model : $defaultModel;
    }
}
