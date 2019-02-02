@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Изменить плейлист</div>

                    <div class="card-body">

                        <form action="{{route('playlist.update', $playlist->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Введите название плейлиста" value="{{ old('name', $playlist->name) }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание видео</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Ролики по обучению игры на гитаре">{{old('description', $playlist->description)}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Отправить</button>

                        </form>

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
                            @foreach($playlist->videos as $video)
                                <tr>
                                    <td>{{ $video->id }}</td>
                                    <td>{{ $video->name }} <small>{{ $video->description }}</small></td>
                                    <td>00:00</td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#videoModal" data-video="{{ asset('storage/'.$video->file_path) }}"
                                                class="btn btn-primary btnModalOpen" title="{{ __('Preview') }}">
                                            <i class="fas fa-external-link-alt"></i>
                                        </button>

                                        <a href="{{-- route('playlist.addvideo', $playlist->id, $video->id) --}}" class="btn btn-primary" title="Добавить"><i class="fas fa-plus-circle"></i></a>
                                        <a href="{{-- route('playlist.deletevideo', $playlist->id, $video->id) --}}" class="btn btn-primary" title="Удалить"><i class="fas fa-minus-circle"></i></a>


{{--                                        <a href="{{ route('video.show', $video->id) }}" class="btn btn-primary" title="Посмотреть"><i class="far fa-eye"></i></a>--}}

{{--                                        <a href="{{ route('video.edit', $video->id) }}" class="btn btn-primary" title="Редактировать"><i class="far fa-edit"></i></a>--}}

                                        {{--<form action="{{ route('video.destroy', $video->id) }}" method="post" class="d-inline">--}}
                                            {{--@csrf--}}
                                            {{--@method('DELETE')--}}
                                            {{--<button type="submit" class="btn btn-primary" title="Удалить"><i class="far fa-trash-alt"></i></button>--}}
                                        {{--</form>--}}

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
            </div>
        </div>
    </div>
@endsection
