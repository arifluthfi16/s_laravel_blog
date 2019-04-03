@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="card">
        <div class="card-header">Create A New Post</div>

        <div class="card-body">
            <form action="{{ route("post.update",['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" value="{{$post->title}}" class="form-control">
                </div>


                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" class="form-control-file" value="{{$post->featured}}" id="featured" name="featured">
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}"
                                    @if($post->category_id == $cat->id)
                                    selected
                                    @endif
                            >{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>

                <label for="title">Select Tags</label>
                @foreach($tags as $tag)
                    <div class="form-check">
                        <input class="form-check-input" name="tags[]" type="checkbox" value="{{$tag->id}}"
                               @foreach($post->tags as $t)
                                   @if($tag->id == $t->id)
                                       checked
                                   @endif
                                @endforeach
                        >
                        <label class="form-check-label">
                            {{$tag->tag}}
                        </label>
                    </div>
                @endforeach

                <div class="form-group">
                    <label for="title">Content</label>
                    <textarea name="content" id="editor" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
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

@section('scripts')

    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@stop