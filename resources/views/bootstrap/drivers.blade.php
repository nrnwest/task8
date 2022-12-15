@extends('layouts.app')
@section('title', 'Водители')
@section('titleFull', 'Список водителей')
@section('content')
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col"><a href="?order={{$order}}&sort_field=position">Позиция</a></th>
            <th scope="col"><a href="?order={{$order}}&sort_field=name">Имя Фамилия</a></th>
            <th scope="col"><a href="?order={{$order}}&sort_field=driverId">Код</a></th>
        </tr>
        </thead>
        <tbody>
        @foreach($report as $driver)
            <tr>
                <th scope="row">{{$driver->getPosition()}}</th>
                <td>{{$driver->getName()}}</td>
                <td><a href="/report/driver/{{$driver->getDriverId()}}">{{$driver->getDriverId()}}</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $report->withQueryString()->links() }}
@endsection
