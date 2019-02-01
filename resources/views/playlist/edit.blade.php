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
                </div>
            </div>
        </div>
    </div>
@endsection
