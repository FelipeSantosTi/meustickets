<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
}
