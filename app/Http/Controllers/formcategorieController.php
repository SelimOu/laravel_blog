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
    
    $categories  = Categorie::query()->paginate(2);;
    
    return view('listcategorie',compact('categories','users'));
}



public function CreerCategorie(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image' => 'required|max:255',
        
    ]);

    $categories =Categorie::create($request->all());
    $this->StoreImg($categories);
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

        $this->StoreImg($categories);

        return redirect()->route('listcategorie');
    }

    public function destroyCategorie($id)
    {

        $categories = Categorie::find($id);
        $categories->post()->detach();
        
        $categories->delete();

        return redirect()->route('listcategorie');
    }

    public function editCategorie($id)
    {
        $categories = Categorie::find($id);

        return view('editformCategorie', compact('categories'));

}
private function StoreImg(Categorie $categories){

    if(request('image')){
        $categories->update([
            'image'=>request('image')->store('images', 'public'),
        ]);
    }
}

}

