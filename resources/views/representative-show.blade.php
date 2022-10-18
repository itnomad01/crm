@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>Просмотр представителя {{ $representative->client->title }} ИНН {{ $representative->client->inn }}</h3>
            <div class="card my-4">
            <div class="card-header">{{ $representative->client->title }}. Создано: {{ date_format(date_create($representative->created_at), 'd.m.Y H:i:s') }} {{ $representative->creater->name }}, изменёно {{ date_format(date_create($representative->updated_at), 'd.m.Y H:i:s') }} @if($representative->updater){{ $representative->updater->name }}@endif </div>
            <div class="card-body">
                <h5 class="card-title">{{ $representative->client->brandtitle }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $representative->client->fulltitle }}</h6>
                <dl class="row">
                    <dt class="col-sm-4">Фамилия</dt>
                    <dd class="col-sm-8">{{ $representative->family }}</dd>
                    <dt class="col-sm-4">Имя</dt>
                    <dd class="col-sm-8">{{ $representative->name }}</dd>
                    <dt class="col-sm-4">Отчество</dt>
                    <dd class="col-sm-8">{{ $representative->ibn }}</dd>
                    <dt class="col-sm-4">Должность (роль)</dt>
                    <dd class="col-sm-8">{{ $representative->role }}</dd>
                    <dt class="col-sm-4">E-mail</dt>
                    <dd class="col-sm-8"><a target="_blank" href="mailto:{{ $representative->email }}">{{ $representative->email }}</a></dd>
                    <dt class="col-sm-4">Телефон</dt>
                    <dd class="col-sm-8"><a target="_blank" href="tel:+7{{ $representative->email }}">+7{{ $representative->tel }}</a></dd>
                </dl>
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-outline-primary" href="{{ route('clients.show', $representative->client) }}">Клиент</a>
                @if(Auth::user()->access_level > 0)
                <a type="button" class="btn btn-outline-warning" href="{{ route('representatives.edit', $representative->id) }}">Изменить</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
