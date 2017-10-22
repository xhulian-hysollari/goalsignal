<?php

namespace App\Models;

use App\Images;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Feeds extends Model
{
    protected $fillable = [
        'title',
        'body',
    ];

    public function getUserAttribute()
    {
        return User::where('id', $this->attributes['user_id'])->first();
    }

    public function images() {
        return $this->hasMany('App\Images');
    }

    public function getImagesAttribute(){
        return Images::where('feed_id', $this->attributes['id'])->get();
    }

    public function getCategoriesAttribute() {
        $locale = LaravelLocalization::getCurrentLocaleName();

        return Categories::where('locale', $locale)->where('id', $this->attributes['category_id'])->first();
    }

    public function category() {
        return $this->belongsTo('App\Models\Categories');
    }

    public function user() {
        return $this->belongsTo('App\Models\User');
    }



}
