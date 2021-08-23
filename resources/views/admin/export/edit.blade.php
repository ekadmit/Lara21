@extends('layouts.admin')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить запрос на выгрузку</h1>
        <a href="{{ route('admin.export.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-list fa-sm text-white-50"></i> К списку новостей</a>
    </div>
    <div class="row">
        <!-- Выводим ошибки при валидации -->
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="table-responsive">
            <form method="post" action="{{ route('admin.export.update', ['export' => $export]) }}">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">Имя</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="title">Номер телефона</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="image">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="title">Информация</label>
                    <input type="text" class="form-control" name="information" id="information" value="{{ old('information') }}">
                </div>
                <div class="form-group">
                    <label for="status">Статус</label>
                    <select class="form-control" name="status" id="status">
                        <option value="PENDING" @if(old('status') === 'PENDING') selected @endif>PENDING</option>
                        <option value="ACTIVE" @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                        <option value="FINISHED" @if(old('status') === 'FINISHED') selected @endif>FINISHED</option>
                    </select>
                </div>
                <button class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>

@endsection

