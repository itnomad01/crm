<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user', ['users' => User::limitAL()->orderByDesc('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-edit', ['edit' => 0, 'user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (strlen($validated['password']) > 7)
        {
            $user->password = Hash::make($validated['password']);
        }
        $user->access_level = $validated['access_level'];
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ((Auth::user()->access_level > 1) or (Auth::id() == $user->id))
        {
            return view('user', ['users' => [$user]]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->access_level > 1)
        {
            return view('user-edit', ['edit' => 1, 'user' => $user]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (strlen($validated['password']) > 7)
        {
            $user->password = Hash::make($validated['password']);
        }
        $user->access_level = $validated['access_level'];
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Auth::user()->access_level == 2) {
            $user->delete();
            return redirect()->route('users.index');
        } else {
            return null;
        }
    }
}
