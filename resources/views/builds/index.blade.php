@extends('layouts.app')

@section('content')
    @if (session('timeError'))
        <div class="alert alert-danger">
            {{ session('timeError') }}
        </div>
    @endif



    <form action="{{ route('builds.search') }}" method="post" class="form-control">
        @csrf
        <div class="form-control">
            <label for="name">search</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-control">
            <label for="hero_id">Hero</label>
            <select class="form-select" id="hero_id" name="hero_id">
                <option disabled selected value> -- select an option -- </option>
                @foreach(\App\Models\Hero::all() as $hero)

                    <option class="form-select" value="{{$hero->id}}">{{$hero->name}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">search</button>
        </div>
    </form>



    <table class="table">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>creation date</th>
            <th>update date</th>
            <th>hero</th>
        </tr>
        @foreach($builds as $build)
            <tr>
                <td>{{$build->id}}</td>
                <td>{{$build->name}}</td>
                <td>{{$build->hero->name}}</td>
                <td>{{$build->created_at}}</td>
                <td>{{$build->updated_at}}</td>

                <td><a href="{{route('builds.show', $build->id)}}" class="btn btn-info">Details</a></td>

                @if($build->user_id === Auth::user()->id || Auth::user()->is_admin === 1)
                    <td><a href="{{route('builds.edit', $build->id)}}" class="btn btn-warning">Update</a></td>

                    <td>
                        <form action="{{route('builds.destroy', $build->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger btn">Delete</button>
                        </form>
                    </td>
                    <td><a href="{{ route('characters.create', $build->id) }}" class="btn btn-outline-primary">create a
                            new character</a></td>
                @endif
            </tr>
        @endforeach
    </table>
    <div class="">
        <a href="{{ route('builds.create') }}" class="btn btn-secondary">create a new build</a>
    </div>

@endsection
