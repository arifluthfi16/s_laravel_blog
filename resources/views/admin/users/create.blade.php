@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="card">

        <div class="card-header">Create New User</div>

        <div class="card-body">
            <form action="{{route("user.store")}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="tag">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="tag">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>


                <div class="form-group">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Create User</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
@stop