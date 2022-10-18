<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class BidEventController extends Controller
{
    public function index(Bid $bid)
    {
        return view('event-index', ['bid' => $bid, 'events' => Event::where(['bid_id' => $bid->id])->orderByDesc('id')->paginate(20)]);
    }

    public function create(Bid $bid)
    {
        return view('event-edit', ['edit' => 0, 'event' => new Event(['bid_id' => $bid->id])]);
    }

    public function store(StoreEventRequest $request, Bid $bid)
    {
        $validated = $request->validated();
        $event = new Event(['bid_id' => $bid->id]);
        $event->fill($validated);
        $event->save();
        return redirect()->route('events.show', $event);
    }
}
