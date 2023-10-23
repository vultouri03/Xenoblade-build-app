@extends('layouts.app')

@section('content')
    <div class="align-items-lg-center container">
        <ul class="list-group text-center">
            <li class="list-group-item">{{$characterId->name}}</li>
            <li class="list-group-item">{{$characterId->level}}</li>
            <li class="list-group-item">{{$characterId->class}}</li>
        </ul>

        <a href="{{ route('builds.show', $characterId->build_id) }}" class="btn btn-primary">go back</a>
    </div>

@endsection
