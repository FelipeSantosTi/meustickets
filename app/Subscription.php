<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [
        'title',
        'resume',
        'document',
        'evaluator',
        'status',
        'n1',
        'n2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
