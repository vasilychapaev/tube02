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
                        Статистика
                        {{--<a href="--}}{{-- route('statistic.show', date1, date2) --}}{{--" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Добавить видео</a>--}}
                    </div>

                    <div class="card-body">

                        <h5>
                            График “Часы просмотра в разрезе каналов”
                        </h5>
                        <canvas id="myChart2" class="chartCanvas"></canvas>
                        <script>
                            var myChart2Dataset = [{
                                label: "Россия 1 (ссылка из Интернет)",
                                borderColor: "#80b6f4",
                                pointRadius: 0,
                                fill: true,
                                backgroundColor: "rgba(184, 182, 244, 0.6)",
                                borderWidth: 1,
                                data: [1071.17,768.08,811.25,842.67]
                            },{
                                label: "РЕН ТВ (ссылка из Интернет)",
                                borderColor: "#80b6f4",
                                pointRadius: 0,
                                fill: true,
                                backgroundColor: "rgba(164, 182, 244, 0.6)",
                                borderWidth: 1,
                                data: [971.58,661.83,712.58,728.5]
                            },{
                                label: "ТНТ (ссылка из сети Интернет)",
                                borderColor: "#80b6f4",
                                pointRadius: 0,
                                fill: true,
                                backgroundColor: "rgba(144, 182, 244, 0.6)",
                                borderWidth: 1,
                                data: [1858.17,1424.08,1694.75,1828.58]
                            },{
                                label: "Культура",
                                borderColor: "#80b6f4",
                                pointRadius: 0,
                                fill: true,
                                backgroundColor: "rgba(124, 182, 244, 0.6)",
                                borderWidth: 1,
                                data: [38.75,38,41.67,23.42]
                            },{
                                label: "СТС (ссылка из Интернет)",
                                borderColor: "#80b6f4",
                                pointRadius: 0,
                                fill: true,
                                backgroundColor: "rgba(104, 182, 244, 0.6)",
                                borderWidth: 1,
                                data: [452.42,271.83,318.83,291.75]
                            },{
                                label: "ТНТ4 (ссылка из Интернет)",
                                borderColor: "#80b6f4",
                                pointRadius: 0,
                                fill: true,
                                backgroundColor: "rgba(84, 182, 244, 0.6)",
                                borderWidth: 1,
                                data: [104.25,87.92,86.5,102.58]
                            },{
                                label: "РТР-Планета (из сети Интернет)",
                                borderColor: "#80b6f4",
                                pointRadius: 0,
                                fill: true,
                                backgroundColor: "rgba(64, 182, 244, 0.6)",
                                borderWidth: 1,
                                data: [431,289.42,323.17,346.83]
                            }];


                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
