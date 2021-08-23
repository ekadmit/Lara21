@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Запросы на выгрузку</h1>
        <a href="{{ route('admin.export.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Добавить новый</a>
    </div>
<div class="row">
    @include('inc.message')
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Имя</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Информация</th>
                <th>Статус</th>
                <th>Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($exportList as $export)
                <tr>
                    <th>{{$export->name}}</th>
                    <th>{{$export->phone}}</th>
                    <th>{{$export->email}}</th>
                    <th>{{$export->information}}</th>
                    <th>{{$export->status}}</th>
                    <th><a href="{{route('admin.export.edit', ['export' => $export->id])}}" style="font-size:12px;"> ред.</a><a href="javascript:;" style="font-size:12px; color: red;"> уд.</a></th>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Выгрузок не запрашивали</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{ $exportList->links() }}

    </div>
</div>

@endsection
