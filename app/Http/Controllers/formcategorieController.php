<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Post;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class formcategorieController extends Controller
{
    public function formcategorie(): View
    {
        return view('formcategorie');
}

public function listcategorie()
{
    $users = Auth::user()->role;
    
    $categories  = Categorie::all();
    if ($users === 'admin'){
    return view('listcategorie',compact('categories','users'));
}
else {
    return redirect()->route('dashboard');
}
}

public function CreerCategorie(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image' => 'required|max:255',
        
    ]);

    Categorie::create($request->all());
    return redirect()->route('listcategorie');
    
}

public function updateCategorie(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|max:255',
        ]);

        $categories = Categorie::find($id);
        $categories->update($request->all());

        return redirect()->route('listcategorie');
    }

    public function destroyCategorie($id)
    {

        $categories = Categorie::find($id);
        Categorie::find($id)->post()->detach();
        
        $categories->delete();

        return redirect()->route('listcategorie');
    }

    public function editCategorie($id)
    {
        $categories = Categorie::find($id);

        return view('editformCategorie', compact('categories'));

}
}

