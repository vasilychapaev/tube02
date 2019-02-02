<?php

namespace App\Http\Controllers;

use App\Helpers\Text;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Auth::user()->videos;

        return view('video.index', compact(['videos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoRequest $request)
    {
        $data = $request->only(['name', 'description']);
        $data['user_id'] = Auth::user()->id;
        $data['file_path'] = $request->file('usermovie')->storeAs(
            'videos/'.Auth::user()->id,
            Text::safeFilename( $request->file('usermovie')->getClientOriginalName() )
        );

        $video = new Video($data);
        $video->save();

        return redirect()->route('video.index')->with('status', 'Видео успешно добавлено');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
//        dd(asset('storage/'.$video->file_path));

        return view('video.show', compact(['video']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        debug($video->file_path);
        return view('video.edit', compact(['video']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(VideoRequest $request, Video $video)
    {
        $video->name = $request->name;
        $video->description = $request->description;
        $video->save();

        return redirect()->route('video.index')->with('status', 'Видео обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        if ($video) {
            $video->delete();
        }
        return redirect()->route('video.index')->with('status', 'Видео удалено успешно');
    }
}
