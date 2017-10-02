<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $fillable =[
        'feed_id',
        'path'
    ];

    public function feeds() {
        $this->belongsTo('App/Feeds');
    }

}
