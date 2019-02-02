<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $guarded = []; // не заносить в БД автоматом эти (ничего), а остальные заносить
//    protected $fillable = [''];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Playlist() {
        return $this->belongsToMany(Playlist::class, 'playlists_videos', 'playlist_id', 'movie_id' );
    }

}
