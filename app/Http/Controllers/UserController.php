<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (\Auth::user()->is_admin === 1) {
            $users = User::all();
            return view('Admin.index', compact('users'));
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        $thisUser = User::find($user->id);
        return view('user.info', compact('thisUser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        if ($user->id === \Auth::user()->id || \Auth::user()->is_admin === 1) {
            return view('user.update', compact('user'));
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'name' => 'required|max:255',

        ]);
        $user->update($request->all());
        return redirect()->route('users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $toBeDeleted = Build::find($user->id);
        if ($toBeDeleted->user_id === \Auth::user()->id || \Auth::user()->is_admin === 1) {
            $toBeDeleted->delete();
            return redirect()->route('builds.index');
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }
    public function makeAdmin(Request $request){
        if (\Auth::user()->is_admin === 1) {
        $data = $request->all();
        $id = $data['user'];
        $activate = User::find($id);
        $activate->update([
            'is_admin' => $data['status'],
        ]);
        return redirect()->route('users.index') ;
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }
    }
}
