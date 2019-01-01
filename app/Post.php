<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public $timestamps = true;

    protected $dates = ['published_at'];

    public function writer() {
        return $this->belongsTo('App\User','author_id');
    }

    public function scopeLatestFirst($query){
        return $query->orderBy('created_at', 'desc');

    }

    public function scopePublished($query){
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function getDateAttribute($value){
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }
}
