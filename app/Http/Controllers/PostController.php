<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{

    public function index()
    {
        $posts = Post::where('user_id',Auth::User()->id)->get();

        return view('posts.index', compact('posts'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'required|max:255',
            'categorie' => 'required|max:255',
            
        ]);
        $post =new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->image = $request->image; 
        $post->user_id = Auth::id();
        $post->save();


        foreach($request->categorie as $categories){

        $post->categorie()->attach($categories);
        }
       

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
            'categorie' => 'required|max:255',
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
        $categories = Categorie::all();
        return view('posts.create',[
            'categories'=>$categories
        ]);
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

