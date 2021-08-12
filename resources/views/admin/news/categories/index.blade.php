@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Категории</h1>
        <a href="{{ route('admin.categories.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новую</a>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Дата добавления</th>
                    <th>Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($category as $c)
                    <tr>
                        <th>{{$c['title']}}</th>
                        <th>{{now()->format('d-m-Y H:i')}}</th>
                        <th><a href="#" style="font-size:12px;"> ред.</a><a href="javascript:;" style="font-size:12px; color: red;"> уд.</a></th>

                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Категорий нет</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>

    </div>
@endsection
