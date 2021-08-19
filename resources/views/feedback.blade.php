@extends('layouts.main')
@section('title')Добро пожаловать - @parent @stop
@section('slug') @parent @stop
@section('content')
    <h1>Оставить отзыв о проекте</h1>
    <p>Заполните форму, чтобы поделиться вашим мнением о нашем портале</p>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('feedback.store') }}" method="head">
        @csrf
        <div class="form-group">
            <label for="title">Ваше имя</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="title">Комментарий</label>
            <textarea class="form-control" name="comment" id="comment">{!! old('comment') !!}</textarea>
        </div>
        <button class="btn btn-primary" style="margin-top: 10px;">Отправить</button>
    </form>
    <div style="margin-bottom: 50px"></div>
@endsection
