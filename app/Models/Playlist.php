<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $fillable = ['name', 'description', 'user_id'];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Videos() {
        return $this->hasMany(Video::class);
    }
}
