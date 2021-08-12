@extends('layouts.main')
@section('title') Категория с id {{ $id }} - @parent @stop
@section('slug') @parent @stop
@section('content')
    <h2>Категория с id {{ $id }} </h2>
@endsection
