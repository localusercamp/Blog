<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentary extends Model
{
    protected $table = 'blog_commentary';

    public function post()
    {
        return $this->belongsTo('App\Post');
    } 
}
