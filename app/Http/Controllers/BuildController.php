<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Models\Character;
use App\Models\Favorite;
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
        if (count(\App\Models\Favorite::where('user_id', \Auth::user()->id)->get()) >= 1) {
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
            'name' => 'required|max:255|min:5',
            'hero_id' => 'required|numeric',
            'description' => 'required|max:65535',
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

        if ($build->user_id === \Auth::user()->id || \Auth::user()->is_admin === 1) {
            return view('builds.update', compact('build'));
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
            'hero_id' => 'required|numeric',
        ]);
        $build->update($request->all());
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

    public function search(Request $request)
    {
        $data = $request->all();
        $favorite_id = [];
        if (!empty($data['is_favorite'])) {
            $favorite_id = Favorite::where('user_id', '=', \Auth::user()->id)->get('build_id');
        }

        $builds = Build::when(!empty($data['name']), function ($query) use ($data) {
            return $query->where('name', 'LIKE', "%" . $data['name'] . "%")->orwhere('description', 'LIKE', "%" . $data['name'] . "%");
        })
            ->when(!empty($data['hero_id']), function ($query) use ($data) {
                return $query->where('hero_id', '=', $data['hero_id']);
            })
            ->when(!empty($data['is_favorite']), function ($query) use ($favorite_id){
                    return$query->whereIn('id', $favorite_id);


            })->get();

        return view('builds.index', compact('builds'));
    }

    public function setActive(Request $request)
    {

        $data = $request->all();
        $id = $data['build'];
        $activate = Build::find($id);
        $activate->update([
            'is_active' => $data['status'],
        ]);
        return redirect()->route('builds.index');
    }


}
