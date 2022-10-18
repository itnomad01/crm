@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        <h3>Просмотр заявок @if($client){{ $client->title }} ИНН {{ $client->inn }}@endif</h3>
        @if($client)<a type="button" class="btn btn-outline-primary my-8" href="{{ route('clients.bids.create', $client) }}">Добавить заявку</a>@endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Клиент</th>
                    <th>Название заявки</th>
                    <th>Статус заявки</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bids as $bid)
                <tr>
                    <td><a href="{{ route('bids.show', $bid) }}">{{ $bid->id }}</a></td>
                    <td><a href="{{ route('clients.show', $bid->client) }}">{{ $bid->client->title }}</a></td>
                    <td>{{ $bid->title }}</td>
                    <td>{{ $bid->T }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($bids) > 1) {{ $bids->links() }} @endif
        @if (count($bids) < 1) Нет заявок. @endif
        </div>
    </div>
</div>
@endsection
