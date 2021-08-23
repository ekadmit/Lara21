@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Категории</h1>
        <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новую</a>
    </div>
    <div class="row">
        @include('inc.message')
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID&nbsp;<a href="?sort=desc">ds</a>&nbsp;<a href="?sort=asc">as</a></th>
                    <th>Название</th>
                    <th>Описание</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <th>{{$category->id}}</th>
                        <th>{{$category->title}}</th>
                        <th>{{$category->description}}</th>
                        <th><a href="{{ route('admin.categories.edit',['category'=>$category->id]) }}" style="font-size:12px;"> ред.</a><a href="javascript:;" style="font-size:12px; color: red;"> уд.</a></th>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Категорий нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}

        </div>

    </div>
@endsection
