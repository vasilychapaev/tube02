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
                    <div class="card-header">Добавить плейлист</div>

                    <div class="card-body">

                        <form action="{{route('playlist.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Название</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Введите название плейлиста" value="{{old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Описание</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Ролики по обучению игры на гитаре">{{old('description')}}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Добавить</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
