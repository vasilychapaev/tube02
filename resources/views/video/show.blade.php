@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $video->name }}</div>

                    <div class="card-body">

                        <div>
                            {{ $video->description }}
                        </div>

                        <video class="responsive-video" id="video_player" controls autoplay="autoplay">
                            <source src="{{ asset('storage/'.$video->file_path) }}" type="video/mp4" id="video_source">
                        </video>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
