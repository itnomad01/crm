@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>Просмотр события {{ $event->id }} заявки @if($event->bid){{ $event->bid->title }} ID {{ $event->bid->id }}@endif</h3>
            <div class="card my-4">
            <div class="card-header">@if($event->bid){{ $event->bid->T }}@endif. Создано: {{ date_format(date_create($event->created_at), 'd.m.Y H:i:s') }} {{ $event->creater->name }}, изменёно {{ date_format(date_create($event->updated_at), 'd.m.Y H:i:s') }} @if($event->updater){{ $event->updater->name }}@endif </div>
            <div class="card-body">
                <p class="card-text">{{ $event->text }}</p>
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-outline-primary" href="{{ route('bids.show', $event->bid) }}">Заявка</a>
                @if(Auth::user()->access_level > 0)
                <a type="button" class="btn btn-outline-warning" href="{{ route('events.edit', $event->id) }}">Изменить</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
