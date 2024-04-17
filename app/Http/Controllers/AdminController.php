<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\post;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin(): View
    {
        
        $users = Auth::user()->role;
        dump($users);
        
        
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

public function users()
{
    $users = Auth::user()->role;
    
    $afficherUser  = User::all();
    if ($users === 'admin'){
    return view('users',compact('afficherUser','users'));
}
else {
    return redirect()->route('dashboard');
}
}

public function destroy($id)
    {

        $users = User::find($id);
        
        $post = Post::all()->where('user_id',$id);
        $users->delete();
        foreach($post as $pos){
          $pos->categories()->detach();
          $pos->delete();
        }
        return redirect()->route('users');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|max:255']);
            

        $user = User::find($id);
        
        $user->update($request->all());

        return redirect()->route('users');
    }



    }

