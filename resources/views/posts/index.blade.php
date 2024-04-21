<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>
  

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900">
                  {{ __("Connecté!") }}
                  <br><br>
                  <a  href="/dashboard/posts" ><button>Mes Posts</button> </a>
              </div>

              <nav class="navbar navbar-expand-lg navbar-light bg-warning p-6" >
                <div class="container-fluid">
                  <div class="justify-end ">
                    <div class="col ">
                      <a class="btn btn-sm btn-success  btn-sm rounded-full bg-blue-400 p-2" href={{ route('posts.create') }}>Ajouter des Posts </a>
                    </div>
                  </div>
                </div>
              </nav>

              <form action="" method="get">
                @csrf
            @foreach ($categories as $categorie)
            
            <input type="checkbox" id="categorie" name="categorie[]" 
            value ="{{$categorie->id}}"  > {{$categorie->title}}
            
            
            @endforeach 
            <input type="submit" value="trier" class= "btn btn-succes btn-sm rounded-full bg-slate-400 p-2">
            </form>
              <div class="container mt-5">
                <div class="row">
                  @foreach ($posts as $post)
                  <div class="blog_container">
                      <div>{{$post['title']}}</div>
                      <div class="content_Container">
                          <img src="{{ asset('storage/'.$post['image'])}}" alt="" class="imagesBlog">
                          Description: {{$post['description']}} <br>
                          Content: {{$post['content']}}<br>
                          Nom de l'auteur: {{$post->user->name}} <br>
                          @if ($post->categories->isNotEmpty())
                              Catégorie(s):
                              @foreach ($post->categories as $category)
                                  {{$category->title}}
                              @endforeach
                          @endif
                      </div>
                  </div><br>
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-sm">
                              <a class= "btn btn-danger btn-sm rounded-full bg-slate-400 p-2" href="{{ route('posts.edit', $post->id) }}"
                        class="btn btn-primary btn-sm">Editer</a>
                            </div>
                            <br>
                            <div class="col-sm">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm rounded-full bg-red-500 p-2		" >Supprimer</button>
                                </form>
                                
                            </div>
                          </div> <br>
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
    {{$posts->WithqueryString()->links()}}
  
  

  
 

</x-app-layout>

       