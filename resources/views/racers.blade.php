@extends('layouts/layout')
@section('title') Список гонщиков @endsection
@section('main_content')
    <h1>Список участников</h1>
    <form>
        <label>
            <input type="radio" @if($sortOrder=="ASC")checked @endif name="sort_order" value="asc">
            Сортировать начиная с самого быстрого
        </label>
        <br>
        <label>
            <input type="radio" @if($sortOrder=="DESC")checked @endif name="sort_order" value="desc">
            Сортировать начиная с самого медленного
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
                        <h3>{{$racerInfo['name']}} --
                            <a href="/report/racers/id={{$racerInfo['abbreviation']}}">
                                {{$racerInfo['abbreviation']}}
                            </a>
                        </h3>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
@endsection

