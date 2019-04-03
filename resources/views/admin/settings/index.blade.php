@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">Update Category</div>

        <div class="card-body">
            <form action="{{ route("setting.update")}}" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" name="sitename" id="name" value="{{$setting->sitename}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" name="email" id="name" value="{{$setting->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Location</label>
                    <input type="text" name="location" id="name" value="{{$setting->location}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" name="phone" id="name" value="{{$setting->phone}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About Site</label>
                    <textarea name="about" id="about" class="form-control"   rows="6">{{$setting->about}}</textarea>
                </div>


                <div class="form-group">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Submit</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@stop