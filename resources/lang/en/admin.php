<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'first_name' => 'First name',
            'last_name' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
            'activated' => 'Activated',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'perex' => 'Post Content',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
            'will_be_published' => 'Post will be published at',
        ],

        'columns' => [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'perex' => 'Perex',
            'image' => 'Image',
            'featured' => 'Featured',
            'post_category_id' => 'Category',
            'author' => 'Author',
            'intro_text' => 'Intro text',
            'published_at' => 'Published at',
            'enabled' => 'Enabled',
            'tags'=> 'Post Tag'
            
        ],
    ],

    'post-category' => [
        'title' => 'Post Categories',

        'actions' => [
            'index' => 'Post Categories',
            'create' => 'New Post Category',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            
        ],
    ],

    'tagging-tag' => [
        'title' => 'Tagging Tags',

        'actions' => [
            'index' => 'Tagging Tags',
            'create' => 'New Tagging Tag',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'suggest' => 'Suggest',
            'count' => 'Count',
            'tag_group_id' => 'Tag group',
            'description' => 'Description',
            
        ],
    ],

    'site-image' => [
        'title' => 'Site Images',

        'actions' => [
            'index' => 'Site Images',
            'create' => 'New Site Image',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'width' => 'Width',
            'height' => 'Height',
            
        ],
    ],

    'site-content' => [
        'title' => 'Site Contents',

        'actions' => [
            'index' => 'Site Contents',
            'create' => 'New Site Content',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'content' => 'Content',
            'slug' => 'Slug',
            'title' => 'Title',
            
        ],
    ],

    'nav-item' => [
        'title' => 'Nav Items',

        'actions' => [
            'index' => 'Nav Items',
            'create' => 'New Nav Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'name' => 'Name',
            'slug' => 'Slug',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];