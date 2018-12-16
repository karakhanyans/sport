<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'first_name', 'last_name'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
