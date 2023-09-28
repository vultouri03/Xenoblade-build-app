@extends('layouts.app')

@section('content')
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
            <td>{{$build->created_at}}</td>
            <td>{{$build->updated_at}}</td>
            <td>{{$build->hero}}</td>
            <td><a href="{{route('builds.show', $build->id)}}">details</a></td>
        </tr>
    @endforeach
    </table>
@endsection
