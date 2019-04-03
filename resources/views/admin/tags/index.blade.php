@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">List of All Categories</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                <th>ID</th>
                <th>Tag Name</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>

                <tbody>
                @if($tags->count()>0)
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->tag}}</td>
                            <td>
                                <a href="{{route('tag.edit', ['id' => $tag->id ]) }}" class="btn btn-xs btn-info">
                                    <i class="far fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('tag.destroy',['id'=>$tag->id])}}" method="post">
                                    @method('DELETE')
                                    {{csrf_field()}}
                                    <button class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan=5 class="text-center">Tag is empty</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>



@stop