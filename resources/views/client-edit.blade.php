@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>@if ($edit == 1) Изменение @else Создание @endif клиента</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-2" method="POST" action="@if($edit == 1){{ route('clients.update', $client) }}@else{{ route('clients.store') }}@endif">@csrf
                <div class="mb-3">
                    <input type="text" class="form-control" id="fulltitle" name="fulltitle" maxlength="512" value="{{ $client->fulltitle }}">
                    <label for="fulltitle" class="form-label">Полное наименование</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="title" name="title" maxlength="128" value="{{ $client->title }}">
                    <label for="title" class="form-label">Краткое наименование</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="brandtitle" name="brandtitle" maxlength="128" value="{{ $client->brandtitle }}">
                    <label for="brandtitle" class="form-label">Название бренда</label>
                </div>
                <div class="mb-3">
                    <select id="type" name="type" class="form-select" required>
                        <option value="0" @if ($client->type == 0) selected @endif>Юридическое лицо</option>
                        <option value="1" @if ($client->type == 1) selected @endif>Индивидуальный предприниматель</option>
                        <option value="2" @if ($client->type == 2) selected @endif>Физическое лицо</option>
                    </select>
                    <label for="type" class="form-label">Тип клиента</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="ogrn" name="ogrn" maxlength="15" value="{{ $client->ogrn }}">
                    <label for="ogrn" class="form-label">ОРГН(ИП)</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="inn" name="inn" maxlength="12" value="{{ $client->inn }}">
                    <label for="inn" class="form-label">ИНН</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="kpp" name="kpp" maxlength="9" value="{{ $client->kpp }}">
                    <label for="kpp" class="form-label">КПП</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="address" name="address" maxlength="255" value="{{ $client->address }}" required>
                    <label for="address" class="form-label">Адрес регистрации</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="fintitle" name="fintitle" maxlength="255" value="{{ $client->fintitle }}">
                    <label for="fintitle" class="form-label">Наименование получателя в платежном документе в пользу клиента</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="personal_acc" name="personal_acc" maxlength="20" value="{{ $client->personal_acc }}">
                    <label for="personal_acc" class="form-label">Расчётный счёт</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="bank_name" name="bank_name" maxlength="128" value="{{ $client->bank_name }}">
                    <label for="bank_name" class="form-label">Наименование банка</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="bic" name="bic" maxlength="9" value="{{ $client->bic }}">
                    <label for="bic" class="form-label">БИК банка</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="corresp_acc" name="corresp_acc" maxlength="20" value="{{ $client->corresp_acc }}">
                    <label for="corresp_acc" class="form-label">Корр.счёт</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="oktmo" name="oktmo" maxlength="11" value="{{ $client->oktmo }}">
                    <label for="oktmo" class="form-label">ОКТМО</label>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" maxlength="255" value="{{ $client->email }}">
                    <label for="email" class="form-label">E-mail</label>
                </div>
                <div class="mb-3">
                    <input type="url" class="form-control" id="site" name="site" maxlength="255" value="{{ $client->site }}">
                    <label for="site" class="form-label">Адрес сайта</label>
                </div>
                <div class="mb-3">
                    <input type="tel" class="form-control" id="tel" name="tel" maxlength="10" value="{{ $client->tel }}">
                    <label for="tel" class="form-label">Телефон (без +7)</label>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="comment" name="comment" maxlength="255" value="{{ $client->comment }}">
                    <label for="comment" class="form-label">Комментарий</label>
                </div>
                @if($edit == 1)<input type="hidden" name="_method" value="PATCH">@endif
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            @if($edit == 1)
            <form class="mt-2" action="{{ route('clients.destroy', $client) }}" method="POST">@csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger">Удалить</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
