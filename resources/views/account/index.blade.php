@extends('layouts.app')
@section('content')
    <h1>Привет, {{ Auth::user()->name }}</h1>
    <br>
    @if(Auth::user()->avatar)
    <img src="{{ Auth::user()->avatar }}"  style="width:250px">
    @endif

    <h3>Кабинет пользователя</h3><br>
    <p><a href="{{ route('admin.index') }}">Перейти в админку</a></p>

@endsection

