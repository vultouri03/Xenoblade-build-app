@extends('layouts.app')

@section('content')
    @if (session('timeError'))
        <div class="alert alert-danger">
            {{ session('timeError') }}
        </div>
    @endif





    <table class="table mt-5">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>creation date</th>
            <th>update date</th>
            <th>isAdmin</th>

        </tr>
        @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>{{$user->is_admin}}</td>

                    <td><a href="{{route('users.show', $user->id)}}" class="btn btn-info">Details</a></td>
                        <td>
                            <form action="{{route('users.destroy', $user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger btn">Delete</button>
                            </form>
                        </td>

                        <td>
                            <form action="{{route('admin.makeAdmin')}}" method="POST">
                                @csrf
                                <input type="hidden" id="user" name="user" value="{{$user->id}}">
                                @if($user->is_admin === 1 && count(\App\Models\User::where('is_admin', '=', '1')->get()) > 1)
                                    <input type="hidden" id="status" name="status" value={{0}}>
                                    <button type="submit" class="btn btn-outline-danger">deactivate</button>

                                @elseif($user->is_admin === 1)
                                    <h class="btn btn-secondary">cant be deactivated</h>
                                    @else
                                    <input type="hidden" id="status" name="status" value={{1}}>
                                    <button type="submit" class="btn btn-outline-primary">activate</button>
                                @endif


                            </form>
                        </td>


                </tr>
        @endforeach
    </table>
@endsection
