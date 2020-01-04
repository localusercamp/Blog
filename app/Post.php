<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'blog_post';

    public function user()
    {
        return $this->belongsTo('App\User');
    } 
}
