@extends('layouts/layout')
@section('title') Отчет о квалификации @endsection
@section('main_content')
    <h1>Отчет о квалификации</h1>
    <form>
        <label>
            <input type="radio" @if($sortOrder=="ASC")checked @endif name="sort_order" value="asc">
            Сортировать по возрастанию
        </label>
        <br>
        <label>
            <input type="radio" @if($sortOrder=="DESC")checked @endif name="sort_order" value="desc">
            Сортировать по убыванию
        </label>
        <p>
            <button class="btn btn-success" type="submit">Выбрать</button>
        </p>
    </form>
    <div class="container">
        <ol>
            @foreach($report as $racerInfo)
                <li>
                    <div class="alert alert-warning">
                        <h3>{{$racerInfo['name']}}</h3>
                        <h5>{{$racerInfo['team']}}</h5>
                        <h5>{{$racerInfo['lap_time']}}</h5>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
@endsection
