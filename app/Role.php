<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function actions()
    {
        return $this->belongsToMany(Action::class)->withPivot('is_allowed')->withTimestamps();
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public static function getDefault()
    {
        return Role::where('name', 'User')->first();
    }
}
