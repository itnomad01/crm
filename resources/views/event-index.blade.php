@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        <h3>Просмотр договоров @if($bid){{ $bid->title }} ID {{ $bid->id }}@endif</h3>
        @if($bid)<a type="button" class="btn btn-outline-primary my-8" href="{{ route('bids.events.create', $bid) }}">Добавить событие</a>@endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Текст события</th>
                    <th>ID заявки</th>
                    <th>Название заявки</th>
                    <th>Статус заявки</th>
                    <th>Клиент</th>
                    <th>Дата события (создание)</th>
                    <th>Дата события (обновление)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td><a href="{{ route('events.show', $event) }}">{{ $event->id }}</a></td>
                    <td>{{ $event->text }} </td>
                    <td>@if($event->bid){{ $event->bid->id }}@endif</td>
                    <td>@if($event->bid)<a href="{{ route('bids.show', $event->bid) }}">{{ $event->bid->title }}</a>@endif</td>
                    <td>@if($event->bid){{ $event->bid->T }}@endif</td>
                    <td>@if($event->bid)<a href="{{ route('clients.show', $event->bid->client) }}">{{ $event->bid->client->title }}</a>@endif</td>
                    <td>{{ date_format(date_create($event->created_at), 'd.m.Y H:i:s') }}</td>
                    <td>{{ date_format(date_create($event->updated_at), 'd.m.Y H:i:s') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($events) > 1) {{ $events->links() }} @endif
        @if (count($events) < 1) Нет событий. @endif
        </div>
    </div>
</div>
@endsection
