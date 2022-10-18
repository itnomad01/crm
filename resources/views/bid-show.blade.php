@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>Просмотр заявки {{ $bid->id }} от {{ $bid->client->title }} ИНН {{ $bid->client->inn }}</h3>
            <div class="card my-4">
            <div class="card-header">{{ $bid->T }}. Создано: {{ date_format(date_create($bid->created_at), 'd.m.Y H:i:s') }} {{ $bid->creater->name }}, изменёно {{ date_format(date_create($bid->updated_at), 'd.m.Y H:i:s') }} @if($bid->updater){{ $bid->updater->name }}@endif </div>
            <div class="card-body">
                <h5 class="card-title">{{ $bid->client->brandtitle }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $bid->client->fulltitle }}</h6>
                <dl class="row">
                    <dt class="col-sm-4">Название заявки</dt>
                    <dd class="col-sm-8">{{ $bid->title }}</dd>
                    <dt class="col-sm-4">Статус заявки</dt>
                    <dd class="col-sm-8">{{ $bid->T }}</dd>
                    <dt class="col-sm-4">Клиент</dt>
                    <dd class="col-sm-8"><a href="{{ route('clients.show', $bid->client) }}">{{ $bid->client->title }}</a></dd>
                    <dt class="col-sm-4">Основной представитель клиента по заявке</dt>
                    <dd class="col-sm-8">@if($bid->representative)<a href="{{ route('representatives.show', $bid->representative) }}">{{ $bid->representative->role }} {{ $bid->representative->family }} {{ $bid->representative->name }}</a>@endif</dd>
                </dl>
                <p class="card-text">{{ $bid->about }}</p>
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-outline-primary" href="{{ route('clients.show', $bid->client) }}">Клиент</a>
                <a type="button" class="btn btn-outline-primary" href="{{ route('bids.events.index', $bid) }}">События</a>
                @if(Auth::user()->access_level > 0)
                <a type="button" class="btn btn-outline-warning" href="{{ route('bids.edit', $bid->id) }}">Изменить</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
