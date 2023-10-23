@extends('layouts.app')

@section('content')
    <div class="align-items-lg-center container">
    <ul class="list-group text-center">
        <li class="list-group-item">{{$buildDetails->name}}</li>
        <li class="list-group-item">{{$buildDetails->description}}</li>
        <li class="list-group-item">{{$buildDetails->created_at}}</li>
        <li class="list-group-item">{{$buildDetails->updated_at}}</li>
        <li class="list-group-item">{{$buildDetails->hero->name}}</li>
        <li class="list-group-item">{{$buildDetails->user->name}}</li>
        @foreach($characters as $character)
            <li class="list-group-item"><a href="{{ route('characters.show', $character->id) }}">{{$character->name}}</a></li>
        @endforeach


    </ul>

    <a href="{{ route('builds.index') }}" class="btn btn-primary">go back</a>
        </div>

@endsection
