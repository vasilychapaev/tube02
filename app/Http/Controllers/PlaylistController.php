<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaylistRequest;
use App\Models\Playlist;
use App\Models\PlaylistsVideos;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Auth::user()->playlists;

        return view('playlist.index', compact(['playlists']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request)
    {
//        dd($request);
        $data = $request->only(['name', 'description']);
        $data['user_id'] = Auth::user()->id;
        $pl = new Playlist($data);
        $pl->save();

        return redirect()->route('playlist.index')->with('status', 'Плейлист создан успешно');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {


        $playlist->with('videos')->get();
        return view('playlist.edit', compact(['playlist']));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Playlist $playlist)
    {
        $playlist->name = $request->name;
        $playlist->description = $request->description;
        $playlist->save();

        return redirect()->route('playlist.index')->with('status', 'Плейлист изменен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Playlist  $playlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        if ($playlist) {
            $name = $playlist->name;
            $playlist->delete();
        }
        return redirect()->route('playlist.index')->with('status', "Плейлист {$name} удален");
    }

    public function test() {
        $user_id = Auth::user()->id;
        dump($user_id);
        dump(Auth::user()->videos);
//        dump(Auth::user()->videos()->where('video_id', '>', 5)->get());

        exit;
        dump(Auth::user()->playlists);

        dump(Auth::user()->playlists()->where('playlist_id', 1)->get());

//        $plv = new PlaylistsVideos(['user_id'=>1, 'playlist_id'=>2, 'movie_id'=>16]);
//        $res = $plv->save();
//        dump($res);


        dd('test');
    }


    public function videoAdd(Request $request) {

    }
}
