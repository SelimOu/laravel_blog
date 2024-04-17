<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    public function legals(): View
    {
        return view('legals');
    }
    public function about(): View
    {

        $table =[
            'test1',
            'test2',
            'test3',
            'test4',
        ];
        return view('about' ,[
        'table' => $table,
        ]);
    }
    public function welcome(request $request): view
    {
        $categories = Categorie::all();
        // $cate = categorie::find('title');
        
        // foreach($categories as $cate){
        //     $cate=$cate->title;
        dump($request->categorie);
        if (isset($request->categorie)){
            foreach($request->categorie as $cate){
        $post = Post::whereHas('categories', function ($query) use ($cate) {
            $query->where('categories.id', $cate );
           })->get();
        }
        }
        // dump($categorie);
        else{
            $post = Post::all();
        }
    return view('welcome', compact('categories'),[
        'posts' => $post
    ]);
    }


    

}
