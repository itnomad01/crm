@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        <a type="button" class="btn btn-outline-primary my-8" href="{{ route('users.create') }}">Добавить пользователя</a>
        <table class="table table-striped">
            <thead><tr><th>ID</th><th>Имя</th><th>E-mail</th><th>Уровень доступа</th><th>Дата создания</th><th>Дата обновления</th></tr></thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td><a href="{{ route('users.show', $user) }}">{{ $user->id }}</a></td>
                    <td><a href="{{ route('users.edit', $user) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->AL }}</td>
                    <td>{{ $user->ST }}</td><td>{{ date_format(date_create($user->created_at), 'd.m.Y H:i:s') }}</td>
                    <td>{{ date_format(date_create($user->updated_at), 'd.m.Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($users) > 1) {{ $users->links() }} @endif
        @if (count($users) < 1) Нет пользователей. @endif
        </div>
    </div>
</div>
@endsection
