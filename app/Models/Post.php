<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'author', 'post_content', 'slug', 'img_url'];

    public function category()
    {
        return $this-belongsTo('App\Models\Category');
    }
}
