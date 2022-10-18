@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        <h3>Просмотр представителей {{ $client->title }} ИНН {{ $client->inn }}</h3>
        <a type="button" class="btn btn-outline-primary my-8" href="{{ route('clients.representatives.create', $client) }}">Добавить представителя</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Телефон</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($representatives as $representative)
                <tr>
                    <td><a href="{{ route('representatives.show', $representative) }}">{{ $representative->id }}</a></td>
                    <td>{{ $representative->family }}</td>
                    <td>{{ $representative->name }}</td>
                    <td>{{ $representative->tel }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($representatives) > 1) {{ $representatives->links() }} @endif
        @if (count($representatives) < 1) Нет представителей. @endif
        </div>
    </div>
</div>
@endsection
