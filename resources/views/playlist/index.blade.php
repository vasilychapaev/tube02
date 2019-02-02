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
                        Мои плейлисты
                        <a href="{{route('playlist.create')}}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Добавить плейлист</a>
                    </div>

                    <div class="card-body">

                        <h2>Видео </h2>

                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Название</th>
                                {{--<th scope="col">Кол-во видео</th>--}}
                                <th scope="col">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($playlists as $playlist)
                                <tr>
                                    <td>{{$playlist->id}}</td>
                                    <td>
                                        {{$playlist->name}}
                                        <small>{{$playlist->description}}</small>
                                    </td>
                                    {{--<td><span class="badge badge-dark">--}}{{-- count($playlist->videos) --}}{{--</span></td>--}}
                                    <td>
                                        <a href="{{route('playlist.edit', $playlist->id)}}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                        <form action="{{route('playlist.destroy', $playlist->id)}}" method="post" class="d-inline">
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
