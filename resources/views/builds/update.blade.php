@extends('layouts.app')

@section('content')


    <div class="container h-100 mt-5">
        <h3>edit a build</h3>
    <form method="post" action="{{route('builds.update', $build->id)}}">
        @csrf
        @method('PUT')
        <div class="form-control">
            <label for="name">Build Name</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$build->name}}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-control">
            <label for="description">Description</label>
            <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror" >{{$build->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="form-control">
            <label for="hero_id">Hero</label>
            <select class="form-select @error('hero_id') is-invalid @enderror" id="hero_id" name="hero_id">
                <option disabled selected value={{$build->hero_id}}>{{$build->hero->name}}</option>
                @foreach(\App\Models\Hero::all() as $hero)
                    <option value="{{$hero->id}}">{{$hero->name}}</option>
                @endforeach
            </select>
            @error('hero_id')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div>
            <label for="user_id"></label>
            <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
        </div>
    <div>
        <button type="submit" class="btn btn-primary">Edit Build</button>
    </div>
    </form>
    </div>
@endsection
