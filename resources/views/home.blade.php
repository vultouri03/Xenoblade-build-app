@extends('layouts.app')
@section('title', 'home')

@section('content')
    <h1>welcome {{Auth::user()->name}}, on this site with infos, there will be more</h1>
@endsection
