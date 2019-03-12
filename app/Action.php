<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'name'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
