@extends('layouts.app')

@section('content')
    <ul class="list-group">
        <li class="list-group-item">{{$buildDetails->name}}</li>
        <li class="list-group-item">{{$buildDetails->description}}</li>
        <li class="list-group-item">{{$buildDetails->created_at}}</li>
        <li class="list-group-item">{{$buildDetails->updated_at}}</li>
        <li class="list-group-item">{{$buildDetails->hero}}</li>
        <li class="list-group-item">{{$buildDetails->user->name}}</li>
        @foreach($characters as $character)
            <li class="list-group-item">{{$character->name}}</li>
        @endforeach

    </ul>
@endsection
