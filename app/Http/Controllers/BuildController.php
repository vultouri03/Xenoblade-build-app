<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Character;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class BuildController extends Controller
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
        $builds = Build::all();
        return view('builds.index', compact('builds'));
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
    public function show(Build $build)
    {
        //
        $buildDetails = Build::find($build->id);
        return view('builds.show', compact('buildDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Build $build)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Build $build)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Build $build)
    {
        //
    }

}
