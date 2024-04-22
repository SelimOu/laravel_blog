<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{

    public function index(request $request)
    {
        $categories = Categorie::all();
        $users = Auth::user()->role;
        
    
        if ($users === 'client') {
            
            if ($request->has('categorie')) {
                $posts = Post::where('user_id', Auth::user()->id)->whereHas('categories', function ($query) use ($request) {
                    $query->whereIn('categories.id', $request->categorie);
                })->paginate(5);
            } else {
                
                $posts = Post::where('user_id', Auth::user()->id)->paginate(5);
            }
        } else {
            if ($request->has('categorie')) {
                $posts = Post::whereHas('categories', function ($query) use ($request) {
                    $query->whereIn('categories.id', $request->categorie);
                })->paginate(5);
            }
            
            else{
            $posts = Post::query()->paginate(5);
            }
        }
    
        return view('posts.index', compact('posts', 'categories'));
  
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
            'image' => 'max:255',
            'categorie' => 'max:255',
            
        ]);


        $post =new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->description = $request->description;
        $post->image = $request->image;
        // dd($post->image);
       
        $post->user_id = Auth::id();
        $post->save();

        // dd($post);

        
        // foreach($request->categorie as $categories){
            $categories = $request->categorie;
            
        $post->categories()->attach($categories);
        // dd($request);
        // }
       

       $this->StoreImg($post);
       
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
            'categorie' => 'max:255',
        ]);


        

        $post = Post::find($id);
        $post->update($request->all());

        $categories = $request->categorie;

        $post->categories()->sync($categories);
            
        $this->StoreImg($post);

        return redirect()->route('posts.index')
            ->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {

        $post = Post::find($id);
        Post::find($id)->categories()->detach();
        
        
        $imagepath=public_path('storage/'.$post->image);
        unlink($imagepath);

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
        $categories = Categorie::all();

        return view('posts.edit', compact('post','categories'));
    }


private function StoreImg(Post $post){

    if(request('image')){
        $post->update([
            'image'=>request('image')->store('images', 'public'),
        ]);
    }
}


}