@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Video Create</div>

                    <div class="card-body">

                        <form action="{{route('video.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Введите название видео">
                                    @if ($errors->has('name'))
                                        <small id="name" class="form-text text-muted">Поле должно быть заполнено</small>
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="usermovie">Файл</label>
                                    <input type="file" class="form-control-file" name="usermovie" id="usermovie" placeholder="Выберите файл">
                                    <small id="name" class="form-text text-muted">Поддерживаемые типы: mp4, avi, mov</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Описание видео</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Как я провел лето"></textarea>
                            </div>

                            @if ($errors)
                                <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
