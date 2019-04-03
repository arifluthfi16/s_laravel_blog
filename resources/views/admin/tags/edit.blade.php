@extends('layouts.app')

@section('content')

    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">Update Tag</div>

        <div class="card-body">
            <form action="{{ route("tag.update",['id'=>$tag->id]) }}" method="post">
                @method('PUT')
                {{csrf_field()}}

                <div class="form-group">
                    <label for="tag">Category Name</label>
                    <input type="text" name="tag" id="tag" value="{{$tag->tag}}" class="form-control">
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