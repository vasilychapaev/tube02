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
                    <div class="card-header">Изменить видео</div>

                    <div class="card-body">

                        <form action="{{ route('video.update', $video->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Введите название видео" value="{{old('name', $video->name)}}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="usermovie">Файл</label>
                                    <div class="form-control">
                                        {{$video->file_path}}
                                        <input type="hidden" name="usermovie" value="dummy">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание видео</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Как я провел лето">{{old('description', $video->description)}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Отправить</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
