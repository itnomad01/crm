@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
        <h3>Просмотр договоров @if($client){{ $client->title }} ИНН {{ $client->inn }}@endif</h3>
        @if($client)<a type="button" class="btn btn-outline-primary my-8" href="{{ route('clients.contracts.create', $client) }}">Добавить договор</a>@endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Клиент</th>
                    <th>Номер договора</th>
                    <th>Дата договора</th>
                    <th>Сумма</th>
                    <th>Дата завершения оказания услуг</th>
                    <th>Дата полной оплаты</th>
                    <th>Дата подписания акта</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contracts as $contract)
                <tr>
                    <td><a href="{{ route('contracts.show', $contract) }}">{{ $contract->id }}</a></td>
                    <td><a href="{{ route('clients.show', $contract->client) }}">{{ $contract->client->title }}</a></td>
                    <td>{{ $contract->number }} </td>
                    <td>{{ date_format(date_create($contract->date), 'd.m.Y') }}</td>
                    <td>{{ $contract->sum }} </td>
                    <td>{{ date_format(date_create($contract->end), 'd.m.Y') }}</td>
                    <td>{{ date_format(date_create($contract->date_billout_payment), 'd.m.Y') }}</td>
                    <td>{{ date_format(date_create($contract->date_act_accept), 'd.m.Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($contracts) > 1) {{ $contracts->links() }} @endif
        @if (count($contracts) < 1) Нет договоров. @endif
        </div>
    </div>
</div>
@endsection
