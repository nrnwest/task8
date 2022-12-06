@extends('layouts.app')
@section('title', 'Водитель - ' . $driverId)
@section('titleFull', 'Информация о водители: ' . $driverId)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="card-title">@yield('titleFull')</h1>
                </div>
                <!-- ./card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Позиция</th>
                            <th scope="col">Имя Фамилия</th>
                            <th scope="col">Автомобиль</th>
                            <th scope="col">Время заезда</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>{{$driver->getPosition()}}</td>
                            <td>{{$driver->getName()}}</td>
                            <td>{{$driver->getAuto()}}</td>
                            <td>{{$driver->getTime()}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
