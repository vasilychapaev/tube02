@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('status')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif

                <div class="card">

                    <div class="card-header">
                        Мои видео
                        <a href="{{route('video.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Добавить видео</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Длина</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td>{{ $video->name }} <small>{{ $video->description }}</small></td>
                                <td>00:00</td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#videoModal" data-video="{{ asset('storage/'.$video->file_path) }}"
                                            class="btn btn-primary btnModalOpen" title="{{ __('Preview') }}">
                                        <i class="fas fa-external-link-alt"></i>
                                    </button>

                                    <a href="{{ route('video.show', $video->id) }}" class="btn btn-primary" title="Посмотреть"><i class="far fa-eye"></i></a>

                                    <a href="{{ route('video.edit', $video->id) }}" class="btn btn-primary" title="Редактировать"><i class="far fa-edit"></i></a>

                                    <form action="{{ route('video.destroy', $video->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary" title="Удалить"><i class="far fa-trash-alt"></i></button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Предпросмотр</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video class="responsive-video" controls id="video_player">
                        <source src="#" type="video/mp4" id="video_source">
                    </video>
                </div>
            </div>
        </div>
    </div>

@endsection
