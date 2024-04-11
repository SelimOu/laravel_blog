<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Post;

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
    public function welcome(): View
    {
        $myPosts = post::all();
    return view('welcome',[
        'myPosts' =>$myPosts,
    ]);
    }

}
