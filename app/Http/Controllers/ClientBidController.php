<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Client;
use App\Http\Requests\StoreBidRequest;
use App\Http\Requests\UpdateBidRequest;

class ClientBidController extends Controller
{
    public function index(Client $client)
    {
        return view('bid-index', ['client' => $client, 'bids' => Bid::where(['client_id' => $client->id])->orderByDesc('id')->paginate(20)]);
    }

    public function create(Client $client)
    {
        return view('bid-edit', ['edit' => 0, 'bid' => new Bid(['client_id' => $client->id])]);
    }

    public function store(StoreBidRequest $request, Client $client)
    {
        $validated = $request->validated();
        $bid = new Bid(['client_id' => $client->id]);
        $bid->fill($validated);
        $bid->save();
        return redirect()->route('bids.show', $bid);
    }
}
