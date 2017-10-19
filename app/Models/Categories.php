<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Categories extends Model
{
    protected $fillable = [
        'feed_id',
        'name'
    ];

    public function feeds(){
        return $this->hasMany('App\Models\Feeds');
    }

    public function getLatestNewsAttribute(){
        $locale = LaravelLocalization::getCurrentLocaleName();

        return Feeds::where('locale', $locale)->where('category_id', $this->attributes['id'])->latest()->first();
    }

    public function getNewsAttribute(){
        $locale = LaravelLocalization::getCurrentLocaleName();

        return Feeds::where('locale', $locale)->where('category_id', $this->attributes['id'])->latest()->take(4)->get();
    }

}
