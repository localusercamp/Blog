<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() // связь с таблицей post_user
    {
        return $this->belongsToMany('App\Post', 'post_users', 'user_id', 'post_id'); 
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function commentaries()
    {
        return $this->hasManyThrough('App\Commentary', 'App\Post');
    }

    public function setSelfAttribute($value)
    {
        $this->attributes['self'] = $value;
    }

    public function setUsersCountAttribute($value)
    {
        $this->attributes['users_count'] = $value;
    }
}
