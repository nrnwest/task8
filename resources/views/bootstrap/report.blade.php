@extends('layouts.app')
@section('title', 'Рапорт')
@section('titleFull', 'Общий отчет')
@section('content')
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col"><a href="?order={{$order}}">Позиция</a></th>
            <th scope="col">Имя Фамилия</th>
            <th scope="col">Автомобиль</th>
            <th scope="col">Время заезда</th>
        </tr>
        </thead>
        <tbody>
        @foreach($report as $driver)
            <tr>
                <th scope="row">{{$driver->getPosition()}}</th>
                <td>{{$driver->getName()}}</td>
                <td>{{$driver->getAuto()}}</td>
                <td>{{$driver->getTime()}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection