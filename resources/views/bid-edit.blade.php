@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>@if ($edit == 1) Изменение @else Создание @endif заявки от {{ $bid->client->title }} ИНН {{ $bid->client->inn }}</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-2" method="POST" action="@if($edit == 1){{ route('bids.update', $bid) }}@else{{ route('clients.bids.store', $bid->client) }}@endif">@csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="title" name="title" maxlength="128" value="{{ $bid->title }}">
                    <label for="title" class="form-label">Название заявки</label>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" id="about" name="about" rows="3">{{ $bid->about }}</textarea>
                    <label for="about" class="form-label">Текст задания</label>
                </div>
                <div class="mb-3">
                    <select id="type" name="type" class="form-select" required>
                        <option value="1" @if ($bid->type == 1) selected @endif>Обращение</option>
                        <option value="2" @if ($bid->type == 2) selected @endif>Ожидание решения клиента</option>
                        <option value="3" @if ($bid->type == 3) selected @endif>Договор заключен</option>
                        <option value="4" @if ($bid->type == 4) selected @endif>Договор завершен</option>
                        <option value="0" @if ($bid->type == 0) selected @endif>Отказ клиента</option>
                    </select>
                    <label for="type" class="form-label">Статус заявки</label>
                </div>
                <div class="mb-3">
                    <select id="representative_id" name="representative_id" class="form-select">
                    @foreach ($bid->client->representatives as $repr)
                        <option value="{{ $repr->id }}" @if ($bid->representative_id == $repr->id) selected @endif>{{ $repr->id }} {{ $repr->role }} {{ $repr->family }} {{ $repr->name }}</option>
                    @endforeach
                    </select>
                    <label for="representative_id" class="form-label">Основной представитель клиента по заявке</label>
                </div>
                @if($edit == 1)<input type="hidden" name="_method" value="PATCH">@endif
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            @if($edit == 1)
            <form class="mt-2" action="{{ route('bids.destroy', $bid) }}" method="POST">@csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger">Удалить</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
