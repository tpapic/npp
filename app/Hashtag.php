<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = ['name'];

    protected $appends = [
        'hashtag_format'
    ];

    public function pictures()
    {
        return $this->belongsToMany(Picture::class);
    }

    public function getHashtagFormatAttribute()
    {
        return '#' . $this->name;
    }
}
