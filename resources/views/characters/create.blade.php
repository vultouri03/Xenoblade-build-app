@extends('layouts.app')

@section('content')


    <div class="container h-100 mt-5">
        <h3>Add a Character</h3>
        <form method="post" action="{{route('characters.store')}}">
            @csrf
            <div class="form-control">
                <label for="name">character Name</label>
                <input type="text" id="name" name="name" class="form-control" required>

            </div>
            <div class="form-control">
                <label for="level">level</label>
                <input type="text" id="level" name="level" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="class">class</label>
                <input type="text" id="class" name="class" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="gem_1">gem_1</label>
                <input type="text" id="gem_1" name="gem_1" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="gem_2">gem_2</label>
                <input type="text" id="gem_2" name="gem_2" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="gem_3">gem_3</label>
                <input type="text" id="gem_3" name="gem_3" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="accessory_1">accessory_1</label>
                <input type="text" id="accessory_1" name="accessory_1" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="accessory_2">accessory_2</label>
                <input type="text" id="accessory_2" name="accessory_2" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="accessory_3">accessory_3</label>
                <input type="text" id="accessory_3" name="accessory_3" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="art_1">art_1</label>
                <input type="text" id="art_1" name="art_1" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="art_2">art_2</label>
                <input type="text" id="art_2" name="art_2" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="art_3">art_3</label>
                <input type="text" id="art_3" name="art_3" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="master_art_1">master_art_1</label>
                <input type="text" id="master_art_1" name="master_art_1" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="master_art_2">master_art_2</label>
                <input type="text" id="master_art_2" name="master_art_2" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="master_art_3">master_art_3</label>
                <input type="text" id="master_art_3" name="master_art_3" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="master_skill_1">master_skill_1</label>
                <input type="text" id="master_skill_1" name="master_skill_1" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="master_skill_2">master_skill_2</label>
                <input type="text" id="master_skill_2" name="master_skill_2" class="form-control" required>
            </div>
            <div class="form-control">
                <label for="master_skill_3">master_skill_3</label>
                <input type="text" id="master_skill_3" name="master_skill_3" class="form-control" required>
            </div>
            <div>
                <label for="user_id"></label>
                <input type="hidden" name="build_id" id="build_id" value="{{$build}}">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Create Build</button>
            </div>
        </form>
    </div>
@endsection
