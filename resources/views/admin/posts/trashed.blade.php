@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">List of All Posts</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                <th>Image</th>
                <th>Title</th>
                <th>Edit</th>
                <th>Restore</th>
                <th>Destroy</th>
                </thead>

                <tbody>
                @if($posts->count()>0)

                @foreach($posts as $post)
                    <tr>
                        <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="100px" height="100px"></td>
                        <td>{{$post->title}}</td>
                        
                        <td>
                            <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-info">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>

                        <td>
                            <form action="{{route('post.restore', ['id'=>$post->id])}}" method="POST">
                                {{csrf_field()}}
                                <button class="btn btn-success">
                                    <i class="fas fa-trash-restore-alt"></i>
                                </button>
                            </form>
                        </td>

                        <td>
                            <form action="{{route('post.kill', ['id'=>$post->id])}}" method="POST">
                                {{csrf_field()}}
                                <button class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @else
                    <tr>
                        <th colspan=5 class="text-center">No Trashed Post</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>



@stop