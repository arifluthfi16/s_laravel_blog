@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">List of All Categories</div>
        <div class="card-body">
            <table class="table table-hover">

                <thead>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </thead>

                <tbody>
                @if($categories->count()>0)
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('category.edit', ['id' => $category->id ]) }}" class="btn btn-xs btn-info">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route('category.destroy',['id'=>$category->id])}}" method="post">
                                @method('DELETE')
                                {{csrf_field()}}
                                <button class="btn btn-xs btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @else
                    <tr>
                        <th colspan=5 class="text-center">No Categories Here</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>



@stop