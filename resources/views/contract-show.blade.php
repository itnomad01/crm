@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>Просмотр договора с {{ $contract->client->title }} ИНН {{ $contract->client->inn }}</h3>
            <div class="card my-4">
            <div class="card-header">Договор № {{ $contract->number }} от {{ date_format(date_create($contract->date), 'd.m.Y') }}. Создано: {{ date_format(date_create($contract->created_at), 'd.m.Y H:i:s') }} {{ $contract->creater->name }}, изменёно {{ date_format(date_create($contract->updated_at), 'd.m.Y H:i:s') }} @if($contract->updater){{ $contract->updater->name }}@endif </div>
            <div class="card-body">
                <h5 class="card-title">{{ $contract->client->brandtitle }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $contract->client->fulltitle }}</h6>
                <dl class="row">
                    <dt class="col-sm-4">Номер договора</dt>
                    <dd class="col-sm-8">{{ $contract->number }}</dd>
                    <dt class="col-sm-4">Дата договора</dt>
                    <dd class="col-sm-8">{{ date_format(date_create($contract->date), 'd.m.Y') }}</dd>
                    <dt class="col-sm-4">Дата начала оказания услуг</dt>
                    <dd class="col-sm-8">{{ date_format(date_create($contract->begin), 'd.m.Y') }}</dd>
                    <dt class="col-sm-4">Дата завершения оказания услуг</dt>
                    <dd class="col-sm-8">{{ date_format(date_create($contract->end), 'd.m.Y') }}</dd>
                    <dt class="col-sm-4">Сумма договора</dt>
                    <dd class="col-sm-8">{{ $contract->sum }}</dd>
                    <dt class="col-sm-4">Номер счёта на оплату</dt>
                    <dd class="col-sm-8">{{ $contract->number_billout }}</dd>
                    <dt class="col-sm-4">Дата выставления счёта на оплату</dt>
                    <dd class="col-sm-8">{{ date_format(date_create($contract->date_billout), 'd.m.Y') }}</dd>
                    <dt class="col-sm-4">Дата полной оплаты по счёту</dt>
                    <dd class="col-sm-8">{{ date_format(date_create($contract->date_billout_payment), 'd.m.Y') }}</dd>
                    <dt class="col-sm-4">Номер акта</dt>
                    <dd class="col-sm-8">{{ $contract->number_act }}</dd>
                    <dt class="col-sm-4">Дата акта</dt>
                    <dd class="col-sm-8">{{ date_format(date_create($contract->date_act), 'd.m.Y') }}</dd>
                    <dt class="col-sm-4">Дата подписания акта</dt>
                    <dd class="col-sm-8">{{ date_format(date_create($contract->date_act_accept), 'd.m.Y') }}</dd>
                    <dt class="col-sm-4">Клиент</dt>
                    <dd class="col-sm-8"><a href="{{ route('clients.show', $contract->client) }}">{{ $contract->client->title }}</a></dd>
                    <dt class="col-sm-4">Договор от имени клиента подписал(а)</dt>
                    <dd class="col-sm-8">@if($contract->representative)<a href="{{ route('representatives.show', $contract->representative) }}">{{ $contract->representative->role }} {{ $contract->representative->family }} {{ $contract->representative->name }}</a>@endif</dd>
                </dl>
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-outline-primary" href="{{ route('clients.show', $contract->client) }}">Клиент</a>
                @if(Auth::user()->access_level > 0)
                <a type="button" class="btn btn-outline-warning" href="{{ route('contracts.edit', $contract->id) }}">Изменить</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
