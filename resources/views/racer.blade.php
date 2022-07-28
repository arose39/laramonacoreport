@extends('layouts/layout')
@section('title') Информация о гонщике @endsection
@section('main_content')
    <h1>Информация о гонщике</h1>
    <div class="container">
        <h2>Имя - {{$racerInfo['name']}}</h2>
        <h2>Идентификатор - {{$racerInfo['abbreviation']}}</h2>
        <h2>Команда - {{$racerInfo['team']}}</h2>
        <h2>Время старта - {{$racerInfo['start_date_time']}}</h2>
        <h2>Время финиша - {{$racerInfo['end_date_time']}}</h2>
        <h2>Время круга - {{$racerInfo['lap_time']}}</h2>
    </div>
@endsection
