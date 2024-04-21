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
        // dump($users);
        
        
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
    
    $afficherUser  = User::query()->paginate(3);
    // if ($users === 'admin'){
    return view('users',compact('afficherUser','users'));
// }
// else {
    // return redirect()->route('dashboard');
// }
}

public function destroy($id)
    
{
    $user = User::find($id);

    if(!$user) {
        return redirect()->route('users')->with('error', 'Utilisateur non trouvé');
    }
    
    $posts = Post::where('user_id', $id)->get();

    foreach($posts as $post){
        $post->categories()->detach();
        $post->delete();
    }

    $user->delete();

    

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

