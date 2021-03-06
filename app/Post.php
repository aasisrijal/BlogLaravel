<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public $timestamps = true;

    //protected $fillable = ['view_count'];

    protected $dates = ['published_at'];

    public function writer() {
        return $this->belongsTo('App\User','author_id');
    }

    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }

    public function scopeLatestFirst($query){
        return $query->orderBy('created_at', 'desc');

    }

    public function scopePublished($query){
        return $query->where('published_at', '<=', Carbon::now());
    }

    public function scopePopular($query){
        return $query->orderBy('view_count', 'desc');
    }

    public function getDateAttribute($value){
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }


    //accessor for image_url if we put images on some server
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $imagePath = public_path() . "/img/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("img/" . $this->image);
        }

        return $imageUrl;
    }

    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";

        if ( ! is_null($this->image))
        {
            $ext = substr(strrchr($this->image,"."), 1);
            $thumbnail =  str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/img/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("img/" . $thumbnail);
        }

        return $imageUrl;
    }
}
