@extends('layouts.main')
@section('title')Список категорий - @parent @stop
@section('slug') @parent @stop
@section('content')
<h2 class="post-title" style="margin-bottom: 50px;">Список категорий</h2>

@forelse($category as $c)
<div class="post-preview">
    <a href="
{{ route('category.show', [
        'category' => $c->id
    ]) }}">
        <h3 class="post-subtitle">{{ $c->title }}</h3></a>
</div>
<!-- Divider-->
<hr class="my-4" />
@empty
    <h2>Новостей нет</h2>
@endforelse
<!-- Pager-->
<div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
</div>

@endsection



