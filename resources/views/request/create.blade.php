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
                    <div class="card-header">Добавить контент</div>

                    <div class="card-body">

                        <h2>Вы можете добавить дополнительный контент на платформу Персик:</h2>

                        <form action="{{ route('request.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <h3>1. Выберите тип контента</h3>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Видео
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    ТВ-канал
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    ИНтерактивный канал (плейлист)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                    Другое
                                </label>
                            </div>

                            <h3>2. Краткое описание контента</h3>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="description">2. Краткое описание контента</label>
                                    <textarea class="form-control" name="description" id="description" placeholder="Кратко опишите загружаемый контент">{{old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="name">3. Контактный телефон</label>
                                <input type="text" class="form-control" name="phone" id="name" placeholder="+375 29 *** ** **" value="{{old('phone')}}">
                            </div>

                            <div class="form-group">
                                <label for="name">4. Удобное время для связи</label>
                                <input type="text" class="form-control" name="time" id="name" placeholder="10:00-18:00" value="{{old('time')}}">
                            </div>


                            <button type="submit" class="btn btn-primary">Добавить</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
