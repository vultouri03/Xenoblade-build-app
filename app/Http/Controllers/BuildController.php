<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Character;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        date_default_timezone_set("UTC");
        $creationDate = strtotime(\Auth::user()->created_at);
        $currentDate = strtotime(date("Y-m-d h:i:s"));
        if(($currentDate- $creationDate)/(86400) >= 4) {
            return view('builds.create');
        } else {
            return redirect(route("builds.index"))
                ->with('timeError', 'Your account needs to be five days old!');
        }

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
        $characters = Build::find($build->id)->characters;
        return view('builds.show', compact('buildDetails', 'characters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Build $build)
    {
        //
        $editBuild = Build::find($build->id);
        if ($editBuild->user_id === \Auth::user()->id || \Auth::user()->is_admin === 1) {
            return view('builds.update', compact('editBuild'));
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }


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
        if ($toBeDeleted->user_id === \Auth::user()->id || \Auth::user()->is_admin === 1) {
            $toBeDeleted->delete();
            return redirect()->route('builds.index');
        } else {
            abort(Response::HTTP_FORBIDDEN);
        }


    }

    public function myIndex()
    {
        $builds = Build::where('user_id', '=', \Auth::user()->id)->get();
        return view('builds.index', compact('builds'));
    }


}
