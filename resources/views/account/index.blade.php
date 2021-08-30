@extends('layouts.app')
@section('content')
    <h1>Привет, {{ Auth::user()->name }}</h1>
    <br>
    <h3>Кабинет пользователя</h3><br>
    <p><a href="{{ route('admin.index') }}">Перейти в админку</a></p>

@endsection

