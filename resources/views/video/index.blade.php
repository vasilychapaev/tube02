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
                                <td>{{$video->id}}</td>
                                <td>
                                    {{$video->name}}
                                    <a href="#">preview popup</a> <br>
                                    <small>{{$video->description}}</small>
                                </td>
                                <td>00:00</td>
                                <td>
                                    <a href="{{route('video.edit', $video->id)}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    <form action="{{route('video.destroy', $video->id)}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-primary"><i class="far fa-trash-alt"></i></button>
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
@endsection
