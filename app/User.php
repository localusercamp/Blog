<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() // много ко многим с таблицей постов
    {
        return $this->belongsToMany('App\Post', 'post_users', 'user_id', 'post_id'); 
    }

    public function ownedPosts() // все посты пользователя
    {
        return $this->hasMany('App\Post'); 
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function commentaries()
    {
        return $this->hasManyThrough('App\Commentary', 'App\Post');
    }

    public function setSelfAttribute($value) // атрибут для фронта
    {
        $this->attributes['self'] = $value;
    }

    public function setUsersCountAttribute($value) // атрибут для фронта
    {
        $this->attributes['users_count'] = $value;
    }
}
