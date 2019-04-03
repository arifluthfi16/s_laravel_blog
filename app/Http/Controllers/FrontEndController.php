<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;

use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

        $posts = Post::orderBy('created_at','desc')->take(3)->get();

        return view('welcome')
            ->with('title', 'Dev Blog')
            ->with('categories', Category::take(5)->get())
            ->with('posts', $posts)
            ->with('ds', Category::find(3))
            ->with('node', Category::find(4))
            ->with('setting', Setting::first());
    }

    public function singlePost($slug){
        $post = Post::where('slug',$slug)->first();

        $next_id = Post::where('id','>',$post->id)->min('id');
        $prev_id = Post::where('id','<',$post->id)->max('id');

        return view('single')
            ->with('post', $post)
            ->with('title', $post->title)
            ->with('categories', Category::take(5)->get())
            ->with('setting', Setting::first())
            ->with('tags', Tag::all())
            ->with('user_info', $post->users()->first())
            ->with('next_post', Post::find($next_id))
            ->with('prev_post', Post::find($prev_id))
            ;

    }

    public function category($id){
        $category = Category::find($id);

        return view('category')
            ->with('category',$category)
            ->with('title', $category->name)
            ->with('categories', Category::take(5)->get())
            ->with('setting', Setting::first());

    }

    public function tag($id){
        $tag = Tag::find($id);
//        return $tag;

        return view('tag')
            ->with('tag',$tag)
            ->with('title', $tag->tag)
            ->with('categories', Category::take(5)->get())
            ->with('setting', Setting::first());
    }

}
