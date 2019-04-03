<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class PostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0){
            Session::flash('info', 'Please fill category first');

            return redirect()->back();
        }

        return view('admin.posts.create')->with('category',$categories)
                                               ->with('tags', Tag::all());
    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'title'    => 'required|max:255',
            'featured' => 'required|image',
            'content'  => 'required',
            'category_id' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $content = $request->content;
        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/posts', $featured_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $content,
            'featured' => 'uploads/posts/'.$featured_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
        ]);

        $post->users()->attach($user_id);
        $post->tags()->attach($request->tags);

        Session::flash('success','Post Created Succesfully');

        return redirect()->back();
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit')->with('post',$post)
            ->with('category',$categories)
            ->with('tags', Tag::all());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $post = Post::find($id);

        if($request->hasFile('featured')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/', $featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }


        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id =$request->category_id;

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success','Post updated Successfully');

        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success','Post Succesfully Trashed');

        return redirect()->back();
    }

    public function kill($id){
        DB::table('posts')->where('id',$id)->delete();
        Session::flash('success','Post Destroyed Successfully');
        return redirect()->back();
    }

    public function trashed(){

        $post = Post::onlyTrashed()->get();



        return view('admin.posts.trashed')->with('posts',$post);

    }

    public function restore($id){
           $post = Post::withTrashed()->where('id',$id)->first();

           $post->restore();

           Session::flash('success','Post Restored Successfully');


           return redirect()->back();
    }
}
