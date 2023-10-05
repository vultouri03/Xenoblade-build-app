@extends('layouts.app')

@section('content')
    <table class="table">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>class</th>
            <th>gem 1</th>
            <th>gem 2</th>
            <th>gem 3</th>
            <th>level</th>
            <th>accessory 1</th>
            <th>accessory 2</th>
            <th>accessory 3</th>
            <th>art 1</th>
            <th>art 2</th>
            <th>art 3</th>
            <th>master art 1</th>
            <th>master art 2</th>
            <th>master art 3</th>
            <th>master skill 1</th>
            <th>master skill 2</th>
            <th>master skill 3</th>
            <th>creation date</th>
            <th>update date</th>
            <th>hero</th>
        </tr>
        @foreach($characters as $character)
            <tr>
                <td>{{$character->id}}</td>
                <td>{{$character->name}}</td>
                <td>{{$character->class}}</td>
                <td>{{$character->gem_1}}</td>
                <td>{{$character->gem_2}}</td>
                <td>{{$character->gem_3}}</td>
                <td>{{$character->level}}</td>
                <td>{{$character->accessory_1}}</td>
                <td>{{$character->accessory_2}}</td>
                <td>{{$character->accessory_3}}</td>
                <td>{{$character->art_1}}</td>
                <td>{{$character->art_2}}</td>
                <td>{{$character->art_3}}</td>
                <td>{{$character->master_art_1}}</td>
                <td>{{$character->master_art_2}}</td>
                <td>{{$character->master_art_3}}</td>
                <td>{{$character->master_skill_1}}</td>
                <td>{{$character->master_skill_2}}</td>
                <td>{{$character->master_skill_3}}</td>
                <td>{{$character->created_at}}</td>
                <td>{{$character->updated_at}}</td>

                <td><a href="{{route('characters.show', $character->id)}}" class="btn btn-info">Details</a></td>
                    <td><a href="{{route('characters.edit', $character->id)}}" class="btn btn-warning">Update</a></td>

                    <td><form action="{{route('characters.destroy', $character->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger btn">Delete</button>
                        </form>

                    </td>
            </tr>
        @endforeach
    </table>
    <div class="">
        <a href="{{ route('characters.create') }}" class="btn btn-secondary">create a new character</a>
    </div>
@endsection
