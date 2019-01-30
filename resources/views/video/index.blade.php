@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Мои видео
                        <a href="{{route('video.create')}}" class="btn btn-primary float-right">Добавить видео</a>
                    </div>

                    <div class="card-body">

                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                <th scope="col">Длина</th>
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($files as $video)
                            <tr>
                                <th scope="row">1</th>
                                <td></td>
                                <td>{{$video}}</td>
                                <td>…</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
