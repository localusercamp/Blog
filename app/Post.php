<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Каскадно удалить коментарии и лайки
     */
    public static function boot() {
        parent::boot();

        static::deleting(function($post) {
            $post->commentaries()->delete();
            $post->users()->detach();
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function users() // много ко многим с таблицей пользователей (лайки)
    {
        return $this->belongsToMany('App\User', 'post_users', 'post_id', 'user_id');
    }

    public function commentaries()
    {
        return $this->hasMany('App\Commentary');
    }


    public function setLikedAttribute($value) // добавление атрибута (для фронта)
    {
        $this->attributes['liked'] = $value;
    }
}