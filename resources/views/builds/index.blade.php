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
                <option disabled selected value> -- select an option --</option>
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
            <th>hero</th>
            <th>creation date</th>
            <th>update date</th>

        </tr>
        @foreach($builds as $build)
            @if($build->is_active === "active" || Auth::user()->id === $build->user_id)


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

                    <td>
                        <form action="{{route('builds.setActive')}}" method="POST">
                            @csrf
                            <input type="hidden" id="build" name="build" value="{{$build->id}}">
                            @if($build->is_active === "active")
                                <input type="hidden" id="status" name="status" value="inactive">
                                <button type="submit" class="btn btn-outline-danger">deactivate</button>
                            @else
                                <input type="hidden" id="status" name="status" value="active">
                                <button type="submit" class="btn btn-outline-primary">activate</button>
                            @endif


                        </form>
                    </td>
                    <td><a href="{{ route('characters.create', $build->id) }}" class="btn btn-outline-secondary">create a
                            new character</a></td>
                @endif
            </tr>
            @endif
        @endforeach
    </table>
    <div class="">
        <a href="{{ route('builds.create') }}" class="btn btn-secondary">create a new build</a>
    </div>

@endsection
