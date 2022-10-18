@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>@if ($edit == 1) Изменение @else Создание @endif пользователя</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-2" method="POST" action="@if($edit == 1){{ route('users.update', $user) }}@else{{ route('users.store') }}@endif">@csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="name" name="name" maxlength="255" value="{{ $user->name }}" required>
                    <label for="name" class="form-label">Имя</label>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" maxlength="255" value="{{ $user->email }}" required>
                    <label for="email" class="form-label">E-mail</label>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" maxlength="255" @if($edit == 0) required @endif>
                    <label for="password" class="form-label">Пароль</label>
                </div>
                <div class="mb-3">
                    <select id="access_level" name="access_level" class="form-select" required>
                        <option value="0" @if ($user->access_level == 0) selected @endif>Только чтение</option>
                        <option value="1" @if ($user->access_level == 1) selected @endif>Редактор</option>
                        <option value="2" @if ($user->access_level == 2) selected @endif>Администратор</option>
                    </select>
                    <label for="access_level" class="form-label">Уровень доступа</label>
                </div>
                @if($edit == 1)<input type="hidden" name="_method" value="PATCH">@endif
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            @if($edit == 1)
            <form class="mt-2" action="{{ route('users.destroy', $user) }}" method="POST">@csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger">Удалить</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
