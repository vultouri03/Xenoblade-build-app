@extends('layouts.app')

@section('content')


    <div class="container h-100 mt-5">
        <h3>Edit your userinfo</h3>
        <form method="post" action="{{route('users.update', $user->id)}}">
            @csrf
            @method('PUT')
            <div class="form-control">
                <label for="name">User Name</label>
                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" required>

            </div>
            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
            <div>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
@endsection
