@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>Просмотр клиента</h3>
            <div class="card my-4">
            <div class="card-header">{{ $client->title }}. Создано: {{ date_format(date_create($client->created_at), 'd.m.Y H:i:s') }} {{ $client->creater->name }}, изменёно {{ date_format(date_create($client->updated_at), 'd.m.Y H:i:s') }} @if($client->updater){{ $client->updater->name }}@endif </div>
            <div class="card-body">
                <h5 class="card-title">{{ $client->brandtitle }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $client->fulltitle }}</h6>
                <dl class="row">
                    <dt class="col-sm-4">Тип</dt>
                    <dd class="col-sm-8">{{ $client->T }}</dd>
                    <dt class="col-sm-4">ОГРН</dt>
                    <dd class="col-sm-8">{{ $client->ogrn }}</dd>
                    <dt class="col-sm-4">ИНН</dt>
                    <dd class="col-sm-8">{{ $client->inn }}</dd>
                    <dt class="col-sm-4">КПП</dt>
                    <dd class="col-sm-8">{{ $client->kpp }}</dd>
                    <dt class="col-sm-4">Адрес регистрации</dt>
                    <dd class="col-sm-8">{{ $client->address }}</dd>
                    <dt class="col-sm-4">Наименование получателя платежей</dt>
                    <dd class="col-sm-8">{{ $client->fintitle }}</dd>
                    <dt class="col-sm-4">Номер расчётного(казначейского) счёта</dt>
                    <dd class="col-sm-8">{{ $client->personal_acc }}</dd>
                    <dt class="col-sm-4">Наименование банка получателя</dt>
                    <dd class="col-sm-8">{{ $client->bank_name }}</dd>
                    <dt class="col-sm-4">БИК</dt>
                    <dd class="col-sm-8">{{ $client->bic }}</dd>
                    <dt class="col-sm-4">Корреспондентский счёт (ЕКС)</dt>
                    <dd class="col-sm-8">{{ $client->corresp_acc }}</dd>
                    <dt class="col-sm-4">ОКТМО</dt>
                    <dd class="col-sm-8">{{ $client->oktmo }}</dd>
                    <dt class="col-sm-4">E-mail</dt>
                    <dd class="col-sm-8"><a target="_blank" href="mailto:{{ $client->email }}">{{ $client->email }}</a></dd>
                    <dt class="col-sm-4">Адрес сайте</dt>
                    <dd class="col-sm-8"><a target="_blank" href="{{ $client->site }}">{{ $client->site }}</a></dd>
                    <dt class="col-sm-4">Телефон</dt>
                    <dd class="col-sm-8"><a target="_blank" href="tel:+7{{ $client->email }}">+7{{ $client->tel }}</a></dd>
                    <dt class="col-sm-4">Комментарий</dt>
                    <dd class="col-sm-8">{{ $client->comment }}</dd>
                </dl>
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-outline-primary" href="{{ route('clients.bids.index', $client->id) }}">Заявки</a>
                <a type="button" class="btn btn-outline-primary" href="{{ route('clients.contracts.index', $client->id) }}">Договора</a>
                <a type="button" class="btn btn-outline-primary" href="{{ route('clients.representatives.index', $client->id) }}">Представители</a>
                @if(Auth::user()->access_level > 0)
                <a type="button" class="btn btn-outline-warning" href="{{ route('clients.edit', $client->id) }}">Изменить</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
