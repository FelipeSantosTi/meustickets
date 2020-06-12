<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    protected $fillable = [
        'name',
        'description',
        'url'
    ];

    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function profilesAvailable()
    {
        $profiles = Profile::whereNotIn('profiles.id', function ($query) {
            $query->select('access_profile.profile_id');
            $query->from('access_profile');
            $query->whereRaw("access_profile.access_id={$this->id}");
        })
            ->paginate();

        return $profiles;
    }
}
