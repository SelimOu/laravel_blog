<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(): View
    {
        
        $users = Auth::user()->role;
        dump($users);
        
            # code...
        
        if ($users === 'admin'){
        return view('dashboard',[
            'users' => $users,
        ]);
    }
    
    
    else if($users === 'client'){
    
        return view('dashboard',[
            'users' => $users,
        ]);

    }


}
    }

