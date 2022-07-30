@extends('layouts/layout')
@section('title') Главная страница @endsection
@section('main_content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="col-md-6  mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Отчет о квалификации</h1>

            <a class="btn btn-outline-secondary" href="{{route('report')}}">Посмотреть</a>
        </div>
        <div class="col-md-6  mx-auto my-5">
            <h1 class="display-4 font-weight-normal">Список гонщиков</h1>
            <a class="btn btn-outline-secondary" href="{{route('racers')}}">Посмотреть</a>
        </div>
    </div>
@endsection
