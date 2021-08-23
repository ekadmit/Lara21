@extends('layouts.main')
@section('title') Новость с id {{ $news->id }} - @parent @stop
@section('slug') @parent @stop
@section('content')
<h2> {{ $news->title}} </h2>
    <p> {{ $news->description }}</p>
@endsection

{{--@push('js')--}}
{{--<script>--}}
{{--    alert("It's news with id # {{$id}}");--}}
{{--</script>--}}
{{--@endpush--}}

