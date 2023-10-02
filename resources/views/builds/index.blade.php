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
            <td>{{$build->hero}}</td>
            <td>{{$build->created_at}}</td>
            <td>{{$build->updated_at}}</td>
            <td><a href="{{route('builds.show', $build->id)}}" class="btn btn-info">Details</a></td>
            <td><a href="{{route('builds.edit', $build->id)}}" class="btn btn-warning">Update</a></td>
            <td><form action="{{route('builds.destroy', $build->id)}}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn-danger btn">Delete</button>
            </form>
            </td>
        </tr>
    @endforeach
    </table>
    <div class="">
        <a href="{{ route('builds.create') }}" class="btn btn-secondary">create a new build</a>
    </div>
@endsection
