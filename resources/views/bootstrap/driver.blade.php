@extends('layouts.app')
@section('title', 'Водитель - ' . $driverId)
@section('titleFull', 'Информация о водители: ' . $driverId)
@section('content')
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">Позиция</th>
            <th scope="col">Имя Фамилия</th>
            <th scope="col">Автомобиль</th>
            <th scope="col">Время заезда</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">{{$driver->getPosition()}}</th>
            <td>{{$driver->getName()}}</td>
            <td>{{$driver->getAuto()}}</td>
            <td>{{$driver->getTime()}}</td>
        </tr>
        </tbody>
    </table>
@endsection
