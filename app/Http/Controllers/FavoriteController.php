<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = $request->all();
        $favorites = Favorite::where('build_id', $data['build_id'])
            ->where('user_id', $data['user_id'])
            ->first();

            if ($favorites === null) {
                Favorite::create([
                    'user_id' => $data['user_id'],
                    'build_id' => $data['build_id']
                ]);
            }

            return redirect(route('builds.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        //
        $favorite->delete();
        return redirect(route('builds.index'));

    }
}
