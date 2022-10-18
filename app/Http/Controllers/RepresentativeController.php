<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreRepresentativeRequest;
use App\Http\Requests\UpdateRepresentativeRequest;
use App\Models\Representative;

class RepresentativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return null;
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
     * @param  \App\Http\Requests\StoreRepresentativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRepresentativeRequest $request)
    {
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function show(Representative $representative)
    {
        return view('representative-show', ['representative' => $representative]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function edit(Representative $representative)
    {
        return view('representative-edit', ['edit' => 1, 'representative' => $representative]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRepresentativeRequest  $request
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRepresentativeRequest $request, Representative $representative)
    {
        $validated = $request->validated();
        $representative->fill($validated);
        $representative->updater_id = Auth::id();
        $representative->save();
        return redirect()->route('representatives.show', $representative);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Representative  $representative
     * @return \Illuminate\Http\Response
     */
    public function destroy(Representative $representative)
    {
        if (Auth::user()->access_level == 2) {
            $client_id = $representative->client->id;
            $representative->delete();
            return redirect()->route('clients.representatives.index', $client_id);
        } else {
            return null;
        }
    }
}
