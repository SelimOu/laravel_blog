<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\View\View;

class formPostsController extends Controller
{
    public function formposts(): View
    {
        return view('formposts');
}
}
