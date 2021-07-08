<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaggingTag extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'suggest',
        'count',
        'tag_group_id',
        'description',
    
    ];
    
    
    protected $dates = [
    
    ];
    public $timestamps = false;
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/tagging-tags/'.$this->getKey());
    }
}
