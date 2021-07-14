<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteMeta extends Model
{
    protected $fillable = [
        'name',
        'value',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/site-metas/'.$this->getKey());
    }

    public static function findItem($slug)
    {
        $defaultModel = new \stdClass();
        $defaultModel->name = 'No Name';
        $defaultModel->value = 'No Value';
        $model = self::where('slug', $slug)->first();
        return isset($model)  ? $model : $defaultModel;
    }
}
