<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|max:255',
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post created successfully.');
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|max:255',
        ]);

        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {

        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', 'Post deleted successfully');
    }

    public function create()
    {
        return view('posts.create');
    }


    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }
}

//     public function mypost(): View
//     {
//     $myPosts = post::all();
//     return view('myposts',[
//         'myPosts' =>$myPosts,
//     ]);
// }

// public function Ajouter(Request $request){
//     $request->validate([
        // 'title' => 'required|max:255',
        // 'desctiption' => 'required',
        // 'content' => 'required',
        // 'image' => 'required|max:255',
//     ]);
//     Post::create($request->all());
//     return redirect()->route('welcome')->whith('succes');

// }

