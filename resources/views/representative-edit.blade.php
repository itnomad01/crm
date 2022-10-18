@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>@if ($edit == 1) Изменение @else Создание @endif представителя {{ $representative->client->title }} ИНН {{ $representative->client->inn }}</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-2" method="POST" action="@if($edit == 1){{ route('representatives.update', $representative) }}@else{{ route('clients.representatives.store', $representative->client) }}@endif">@csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="family" name="family" maxlength="256" value="{{ $representative->family }}">
                    <label for="family" class="form-label">Фамилия</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" maxlength="256" value="{{ $representative->name }}">
                    <label for="name" class="form-label">Имя</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="ibn" name="ibn" maxlength="256" value="{{ $representative->ibn }}">
                    <label for="ibn" class="form-label">Отчество</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="role" name="role" maxlength="256" value="{{ $representative->role }}">
                    <label for="role" class="form-label">Должность (роль)</label>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" maxlength="255" value="{{ $representative->email }}">
                    <label for="email" class="form-label">E-mail</label>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" id="tel" name="tel" maxlength="10" value="{{ $representative->tel }}" required>
                    <label for="tel" class="form-label">Телефон (без +7)</label>
                </div>
                @if($edit == 1)<input type="hidden" name="_method" value="PATCH">@endif
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            @if($edit == 1)
            <form class="mt-2" action="{{ route('representatives.destroy', $representative) }}" method="POST">@csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger">Удалить</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
