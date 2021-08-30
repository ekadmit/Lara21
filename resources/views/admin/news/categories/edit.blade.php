@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать категорию</h1>
        <a href="{{ route('admin.categories.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> К списку категорий</a>
    </div>
    <div class="row">
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        @include('inc.message')
        <div class="table-responsive">
            <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Заголовок</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                </div>
                <div class="form-group">
                    <label for="title">Описание</label>
                    <textarea class="form-control" name="description" id="description">{!! $category->description !!}</textarea>
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

@endsection
