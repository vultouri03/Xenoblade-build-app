<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $characters = Character::all();
        return view('characters.index', compact('characters'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(int $build)
    {
        //


        return view('characters.create', compact('build'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'gem_1' => 'required',
            'gem_2' => 'required',
            'gem_3' => 'required',
            'level' => 'required',
            'accessory_1' => 'required',
            'accessory_2' => 'required',
            'accessory_3' => 'required',
            'art_1' => 'required',
            'art_3' => 'required',
            'art_2' => 'required',
            'master_art_3' => 'required',
            'master_art_2' => 'required',
            'master_art_1' => 'required',
            'master_skill_3' => 'required',
            'master_skill_2' => 'required',
            'master_skill_1' => 'required',
            'build_id' => 'required',
        ]);
        Character::create($request->all());
        return redirect()->route('builds.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        //
        $characterId = Character::find($character->id);
        return view('characters.show', compact('characterId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
    }
}
