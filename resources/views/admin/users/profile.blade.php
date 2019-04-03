@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="card">

        <div class="card-header">Edit Your Profile</div>

        <div class="card-body">
            <form action="{{route("user.profile.update")}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="tag">Name</label>
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tag">Email</label>
                    <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tag">New Password</label>
                    <input type="password" name="password" id="password"  class="form-control">
                </div>

                <div class="form-group">
                    <label for="tag">Upload Avatar</label>
                    <input type="file" class="form-control-file" id="avatar" name="avatar">
                </div>

                <div class="form-group">
                    <label for="tag">Facbook Profile</label>
                    <input type="text" name="facebook" id="facebook" value="{{$user->profile->facebook}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tag">Youtube Profile</label>
                    <input type="text" name="youtube" id="youtube" value="{{$user->profile->youtube}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="about" cols="10" rows="8" class="form-control">{{$user->profile->about}}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Update Profile </button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@stop