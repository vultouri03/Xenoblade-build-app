@extends('layouts.app')

@section('content')
    <ul>
        <li>{{$buildDetails->id}}</li>
        <li>{{$buildDetails->name}}</li>
        <li>{{$buildDetails->created_at}}</li>
        <li>{{$buildDetails->updated_at}}</li>
        <li>{{$buildDetails->hero}}</li>
    </ul>
@endsection
