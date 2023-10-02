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
        return view('builds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'hero' => 'required|max:255',
        ]);
        Build::create($request->all());
        return redirect()->route('builds.index');

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
        $editBuild = Build::find($build->id);
        return view('builds.update', compact('editBuild'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Build $build)
    {
        //
        $request->validate([
            'name' => 'required|max:255',
            'hero' => 'required|max:255',
        ]);
        Build::update($request->all());
        return redirect()->route('builds.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Build $build)
    {
        //
        $toBeDeleted = Build::find($build->id);
        $toBeDeleted->delete();
        return redirect()->route('builds.index');

    }

}
