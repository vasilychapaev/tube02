<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaylistsVideos extends Model
{
    protected $fillable = ['user_id', 'playlist_id', 'movie_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function movies() {
        return $this->hasMany(Video::class);
    }

}
