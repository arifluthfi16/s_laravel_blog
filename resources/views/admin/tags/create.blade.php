@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="card">

        <div class="card-header">Create A New Category</div>

        <div class="card-body">
            <form action="{{route("tag.store")}}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="tag">Tag Name</label>
                    <input type="text" name="tag" id="tag" class="form-control">
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