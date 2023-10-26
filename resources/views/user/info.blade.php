@extends('layouts.app')

@section('content')
    <div class="align-items-lg-center container">
        <ul class="list-group text-center">
            <li class="list-group-item">{{$thisUser->name}}</li>
            <li class="list-group-item">{{$thisUser->created_at}}</li>
            <li class="list-group-item">{{$thisUser->updated_at}}</li>
            @if(Auth::user()->id === $thisUser->id || Auth::user()->is_admin === 1)
                <li class="list-group-item"><a href="{{route('users.edit', $thisUser->id)}}" class="btn btn-warning">Update</a></li>
            @if($thisUser->is_admin === 0)
                <li class="list-group-item"><form action="{{route('users.destroy', $thisUser->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-danger btn">Delete</button>
                    </form></li>
                @endif
            @endif

        </ul>

        <a href="{{ route('home')}}" class="btn btn-primary">go back</a>
    </div>

@endsection
