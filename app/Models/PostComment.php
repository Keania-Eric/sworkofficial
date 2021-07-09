<?php

namespace App\Models;

use App\Models\PostComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostComment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function replies()
    {
        return $this->hasMany(PostComment::class, 'parent_id');
    }

    public function commentable()
    {
        return $this->morphTo();
    }
}
