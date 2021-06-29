<?php
namespace App\Models\Wordpress;

use Corcel\Models\Post;

class BlogPost extends Post
{
        
    /**
     * Sets the items to items on the blog category
     *
     * @var string
     */
    protected $postType = 'blog';
}