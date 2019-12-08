<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'path'
    ];
    public $directory = "/images/";
    use SoftDeletes;
    protected $dates = ['delete_at']; //properties that we made to delete

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }

    public function getPathAttribute($value)
    {
        return $this->directory . $value;
    }
    public static function scopeLatest($query)
    {
        return $query->orderBy('id', 'asc')->get();
    }
}
