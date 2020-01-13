<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users() // связь с таблицей post_user
    {
        return $this->belongsToMany('App\User', 'post_users', 'post_id', 'user_id');
    }
}
