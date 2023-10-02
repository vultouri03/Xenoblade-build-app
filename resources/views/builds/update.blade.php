@extends('layouts.app')

@section('content')


    <div class="container h-100 mt-5">
        <h3>Add a build</h3>
    <form method="post" action="{{route('builds.update', $build->id)}}">
        @csrf
    <div class="form-control">
        <label for="name">Build Name</label>
            <input type="text" id="name" name="name" class="form-control" required>

    </div>
    <div class="form-control">
        <label for="hero">Hero</label>
            <input type="text" id="hero" name="hero" class="form-control" required>
    </div>
        <div>
            <label for="user_id"></label>
            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
        </div>
    <div>
        <button type="submit" class="btn btn-primary">Create Build</button>
    </div>
    </form>
    </div>
@endsection
