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
                    <div class="card-header">Добавить видео</div>

                    <div class="card-body">

                        <form action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Введите название видео" value="{{old('name')}}">
                                    @if ($errors->has('name'))
                                        <small id="name" class="form-text text-muted">Поле должно быть заполнено</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="usermovie">Файл</label>
                                    <input type="file" class="form-control-file" name="usermovie" id="usermovie" placeholder="Выберите файл" value="{{old('usermovie')}}">
                                    <small id="name" class="form-text text-muted">Поддерживаемые типы: mp4, avi, mov</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание видео</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Как я провел лето">{{old('description')}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
