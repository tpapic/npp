<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name', 'max_daily_upload_limit', 'curent_daily_upload_limit', 'max_upload_size'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
