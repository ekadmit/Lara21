@extends('layouts.main')
@section('title') Категория с id {{ $category->title }} - @parent @stop
@section('slug') @parent @stop
@section('content')
    <h2>Категория: {{ $category->title }} </h2>
    <p>{{ $category->description }}</p>
@endsection
