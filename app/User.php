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
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this->hasOne('\App\Post');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function roles()
    {
        //* to customize tables name and column follow the format below
        //return $this->belongsToMany('App\Role', 'user_roles', 'user_id', 'role_id');
        //but we can like this below, because we following the convection of laravel 
        return $this->belongsToMany('App\Role')->withPivot('created_at');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
