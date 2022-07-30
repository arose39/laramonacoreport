@extends('layouts/admin_layout')

@section('title', 'Все зарегистрированные пользователи')

@section('main_content')

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">id</th>
                <th>name</th>
                <th>email</th>
                <th>password</th>
                <th style="width: 40px">is_admin</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->is_admin}}</td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>

@endsection
