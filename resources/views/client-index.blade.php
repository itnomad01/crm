@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        <a type="button" class="btn btn-outline-primary my-8" href="{{ route('clients.create') }}">Добавить клиента</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Краткое наименование</th>
                    <th>Название бренда</th>
                    <th>ИНН</th>
                    <th>Телефон</th>
                    <th>Комментарий</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td><a href="{{ route('clients.show', $client) }}">{{ $client->id }}</a></td>
                    <td>{{ $client->title }}</td>
                    <td>{{ $client->brandtitle }}</td>
                    <td>{{ $client->inn }}</td>
                    <td>{{ $client->tel }}</td>
                    <td>{{ $client->comment }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($clients) > 1) {{ $clients->links() }} @endif
        @if (count($clients) < 1) Нет клиентов. @endif
        </div>
    </div>
</div>
@endsection
