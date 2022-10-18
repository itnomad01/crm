<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRepresentativeRequest;
use App\Http\Requests\UpdateRepresentativeRequest;
use App\Models\Representative;
use App\Models\Client;

class ClientRepresentativeController extends Controller
{
    public function index(Client $client)
    {
        return view('representative-index', ['client' => $client, 'representatives' => Representative::where(['client_id' => $client->id])->orderByDesc('id')->paginate(20)]);
    }

    public function create(Client $client)
    {
        return view('representative-edit', ['edit' => 0, 'representative' => new Representative(['client_id' => $client->id])]);
    }

    public function store(StoreRepresentativeRequest $request, Client $client)
    {
        $validated = $request->validated();
        $representative = new Representative(['client_id' => $client->id]);
        $representative->fill($validated);
        $representative->save();
        return redirect()->route('representatives.show', $representative);
    }
}
