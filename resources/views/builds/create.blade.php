@extends('layouts.app')

@section('content')

    <div class="container h-100 mt-5">
        <h3>Add a build</h3>
        <form method="post" action="{{route('builds.store')}}">
            @csrf
            <div class="form-control">
                <label for="name">Build Name</label>
                <input type="text" id="name" name="name" class="form-control" required>

            </div>
            <div class="form-control">
                <label for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-control">
                <label for="hero_id">Hero</label>
                <select class="form-select" id="hero_id" name="hero_id" required>
                    <option disabled selected value> -- select an option --</option>
                    @foreach(\App\Models\Hero::all() as $hero)
                        <option value="{{$hero->id}}">{{$hero->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="user_id"></label>
                <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
            </div>
            <div>
                <label for="is_active"></label>
                <input type="hidden" name="is_active" id="is_active" value="active">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create Build</button>
            </div>
        </form>
    </div>
@endsection
