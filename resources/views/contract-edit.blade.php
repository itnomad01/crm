@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>@if ($edit == 1) Изменение @else Создание @endif договора с {{ $contract->client->title }} ИНН {{ $contract->client->inn }}</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="mt-2" method="POST" action="@if($edit == 1){{ route('contracts.update', $contract) }}@else{{ route('clients.contracts.store', $contract->client) }}@endif">@csrf
                <div class="mb-3">
                    <input type="number" class="form-control" id="number" name="number" value="{{ $contract->number }}">
                    <label for="number" class="form-label">Номер договора</label>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" id="date" name="date" value="{{ $contract->date }}">
                    <label for="date" class="form-label">Дата договора</label>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" id="begin" name="begin" value="{{ $contract->begin }}">
                    <label for="begin" class="form-label">Дата начала оказания услуг</label>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" id="end" name="end" value="{{ $contract->end }}">
                    <label for="end" class="form-label">Дата завершения оказания услуг</label>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="sum" name="sum" min="0.01" step="0.01" value="{{ $contract->sum }}">
                    <label for="sum" class="form-label">Сумма договора</label>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="number_billout" name="number_billout" value="{{ $contract->number_billout }}">
                    <label for="number_billout" class="form-label">Номер счёта на оплату</label>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" id="date_billout" name="date_billout" value="{{ $contract->date_billout }}">
                    <label for="date_billout" class="form-label">Дата выставления счёта на оплату</label>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" id="date_billout_payment" name="date_billout_payment" value="{{ $contract->date_billout_payment }}">
                    <label for="date_billout_payment" class="form-label">Дата полной оплаты по счёту</label>
                </div>
                <div class="mb-3">
                    <input type="number" class="form-control" id="number_act" name="number_act" value="{{ $contract->number_act }}">
                    <label for="number_act" class="form-label">Номер акта</label>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" id="date_act" name="date_act" value="{{ $contract->date_act }}">
                    <label for="date_act" class="form-label">Дата акта</label>
                </div>
                <div class="mb-3">
                    <input type="date" class="form-control" id="date_act_accept" name="date_act_accept" value="{{ $contract->date_act_accept }}">
                    <label for="date_act" class="form-label">Дата подписания акта</label>
                </div>
                <div class="mb-3">
                    <select id="representative_id" name="representative_id" class="form-select">
                    @foreach ($contract->client->representatives as $repr)
                        <option value="{{ $repr->id }}" @if ($contract->representative_id == $repr->id) selected @endif>{{ $repr->id }} {{ $repr->role }} {{ $repr->family }} {{ $repr->name }}</option>
                    @endforeach
                    </select>
                    <label for="representative_id" class="form-label">Договор от имени клиента подписал(а)</label>
                </div>
                @if($edit == 1)<input type="hidden" name="_method" value="PATCH">@endif
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            @if($edit == 1)
            <form class="mt-2" action="{{ route('contracts.destroy', $contract) }}" method="POST">@csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-outline-danger">Удалить</button>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
