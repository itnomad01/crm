<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBidRequest;
use App\Http\Requests\UpdateBidRequest;
use App\Models\Bid;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bid-index', ['client' => false, 'bids' => Bid::orderByDesc('id')->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBidRequest $request)
    {
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function show(Bid $bid)
    {
        return view('bid-show', ['bid' => $bid]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function edit(Bid $bid)
    {
        return view('bid-edit', ['edit' => 1, 'bid' => $bid]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBidRequest  $request
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBidRequest $request, Bid $bid)
    {
        $validated = $request->validated();
        if (Auth::user()->access_level == 1) {
            $bid->type = $validated['type'];
        } elseif (Auth::user()->access_level == 2) {
            $bid->fill($validated);
        }
        $bid->updater_id = Auth::id();
        $bid->save();
        return redirect()->route('bids.show', $bid);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bid  $bid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bid $bid)
    {
        if (Auth::user()->access_level == 2) {
            $client_id = $bid->client->id;
            $bid->delete();
            return redirect()->route('clients.bids.index', $client_id);
        } else {
            return null;
        }
    }
}
