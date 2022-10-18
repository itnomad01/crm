<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Client;
use App\Http\Requests\StoreContractRequest;
use App\Http\Requests\UpdateContractRequest;

class ClientContractController extends Controller
{
    public function index(Client $client)
    {
        return view('contract-index', ['client' => $client, 'contracts' => Contract::where(['client_id' => $client->id])->orderByDesc('id')->paginate(20)]);
    }

    public function create(Client $client)
    {
        return view('contract-edit', ['edit' => 0, 'contract' => new Contract(['client_id' => $client->id])]);
    }

    public function store(StoreContractRequest $request, Client $client)
    {
        $validated = $request->validated();
        $contract = new Contract(['client_id' => $client->id]);
        $contract->fill($validated);
        $contract->save();
        return redirect()->route('contracts.show', $contract);
    }
}
