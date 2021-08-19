@extends('layouts.main')
@section('title')Добро пожаловать - @parent @stop
@section('slug') @parent @stop
@section('content')
    <h1>Заказать выгрузку новостей</h1>
    <p>Заполните форму, чтобы выгрузить новости из нашего проекта</p>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('export.store') }}" method="head">
        @csrf
        <div class="form-group">
            <label for="title">Ваше имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="title">Номер телефона</label>
            <input type="text" class="form-control" name="tel" id="tel" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="title">Электронная почта</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="title">Описание необходимой информации</label>
            <textarea class="form-control" name="comment" id="comment">{!! old('comment') !!}</textarea>
        </div>
        <button class="btn btn-primary" style="margin-top: 10px;">Отправить</button>
    </form>
    <div style="margin-bottom: 50px"></div>
@endsection
