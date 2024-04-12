<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="/dashboard/posts"><button>Mes Posts</button></a>
        
        <a href="/dashboard/categories/formcategorie"><button>Ajouter une categorie</button></a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Connecté!") }}

                    <br> <br>
                    @foreach ($categories as $categorie)
                  <div class ="blog_container">
                    <div>  {{$categorie['title']}}</div>
                    <div class="content_Container">
                      <img src="{{$categorie['image']}}" alt="" class="imagesBlog" >
                      {{$categorie['description']}} <br>
                      <div class="col-sm">
                        <a href="{{ route('updateCategorie', $categorie->id) }}"
                  class="btn btn-primary btn-sm">Editer</a>
                      </div>
                      <div class="col-sm">
                        <form action="{{ route('destroyCategorie', $categorie->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
