<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return Feeds::where('category_id', $this->attributes['id'])->latest()->first();
    }

    public function getNewsAttribute(){
        return Feeds::where('category_id', $this->attributes['id'])->latest()->take(4)->get();
    }

}
