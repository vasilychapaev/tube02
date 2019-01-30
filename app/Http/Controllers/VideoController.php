<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\User;
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
        //
        $directory = 'videos/'.Auth::user()->id;
        $files = Storage::allFiles($directory);

        return view('video.index', compact(['files']));
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1',
            'usermovie' => 'required',
            'description' => 'required',
        ]);

        $userId = Auth::user()->id;
        $file_path = $request->file('usermovie')->storeAs(
            'videos/'.$userId,
            \Slug::make(pathinfo($request->file('usermovie')->getClientOriginalName(), PATHINFO_FILENAME)).
            '.'.$request->file('usermovie')->extension()
        );

        $video = new Video();
        $video->fill($request->only(['name', 'description']));
        $video->user_id = $userId;
        $video->file_path = $file_path;
        if (!$video->description)
            $video->description = '';
        $video->save();

        redirect()->route('video.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
        return view('video.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
        return view('video.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
