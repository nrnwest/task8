@extends('layouts.app')
@section('title', 'Рапорт')
@section('titleFull', 'Общий отчет')
@section('content')
    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col"><a href="?order={{$order}}&sort_field=position">Позиция</a></th>
            <th scope="col"><a href="?order={{$order}}&sort_field=name">Имя Фамилия</a></th>
            <th scope="col"><a href="?order={{$order}}&sort_field=auto">Автомобиль</a></th>
            <th scope="col"><a href="?order={{$order}}&sort_field=time">Время заезда</a></th>
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
    {{ $report->withQueryString()->links() }}
    @captcha
    <input type="text" id="captcha" name="captcha" autocomplete="off">
@endsection
