<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavItem extends Model
{
    protected $fillable = [
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
        return url('/admin/nav-items/'.$this->getKey());
    }

    public static function findItem($slug)
    {
        $defaultModel = new \stdClass();
        $defaultModel->name = 'No Name';
        $model = self::where('slug', $slug)->first();
        return isset($model)  ? $model : $defaultModel;
    }


}
