@extends('layouts.app')
@section('title', 'Рапорт')
@section('titleFull', 'Общий отчет')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('titleFull')</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Позиция</th>
                                <th>Имя Фамилия</th>
                                <th>Автомобиль</th>
                                <th>Время заезда</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($report as $driver)
                                <tr>
                                    <td>{{$driver->getPosition()}}</td>
                                    <td>{{$driver->getName()}}</td>
                                    <td>{{$driver->getAuto()}}</td>
                                    <td>{{$driver->getTime()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Позиция</th>
                                <th>Имя Фамилия</th>
                                <th>Автомобиль</th>
                                <th>Время заезда</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
