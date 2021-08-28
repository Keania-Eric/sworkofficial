<?php
namespace App\Traits;

use App\Models\PostComment;

trait Commentable
{

    public function comments()
    {
        return $this->hasMany(PostComment::class, 'commentable')->whereNull('parent_id');
    }
}