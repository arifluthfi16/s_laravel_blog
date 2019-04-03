@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">Update Category</div>

        <div class="card-body">
            <form action="{{ route("category.update",['id'=>$category->id]) }}" method="post">
                @method('PUT')
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control">
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