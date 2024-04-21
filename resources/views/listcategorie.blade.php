<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
       
        
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                
  
                <nav class="navbar navbar-expand-lg navbar-light bg-warning p-6" >
                  <div class="container-fluid">
                    <div class="justify-end ">
                      <div class="col ">
                        <a class="btn btn-sm btn-success  btn-sm rounded-full bg-blue-400 p-2" href="/dashboard/categories/formcategorie"><button>Ajouter une categorie</button></a>
                      </div>
                    </div>
                  </div>
                </nav>
                <div class="container mt-5">
                  <div class="row">
                    <br> <br>
                    @foreach ($categories as $categorie)
                  <div class ="blog_container">
                    <div>  {{$categorie['title']}}</div>
                    <div class="content_Container">
                      <img src="{{ asset('storage/'.$categorie['image'])}}" alt="" class="imagesBlog" >
                      Description: {{$categorie['description']}} <br>
                      <div class="col-sm">
                        <a href="{{ route('updateCategorie', $categorie->id) }}"
                          class="  btn btn-danger btn-sm rounded-full bg-slate-400 p-2">Editer</a>
                      </div>
                      <div class="col-sm">
                        <form action="{{ route('destroyCategorie', $categorie->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm rounded-full bg-red-500 p-2		">Supprimer</button>
                        </form>
                    </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        
      </div>
    </div>
</div>
</div>
</div>
<div>

    {{$categories->WithqueryString()->links()}}

</x-app-layout>
