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
                  <a href="/dashboard/posts" ><button>Mes Posts</button> </a>
              </div>

              <nav class="navbar navbar-expand-lg navbar-light bg-warning p-6" >
                <div class="container-fluid">
                  <div class="justify-end ">
                    <div class="col ">
                      <a class="btn btn-sm btn-success" href={{ route('posts.create') }}>Ajouter des Posts </a>
                    </div>
                  </div>
                </div>
              </nav>
              <div class="container mt-5">
                <div class="row">
                  @foreach ($posts as $post)
                  <div class ="blog_container">
                    <div>  {{$post['title']}}</div>
                    <div class="content_Container">
                      <img src="{{$post['image']}}" alt="" class="imagesBlog" >
                      {{$post['description']}} <br>
                      {{$post['content']}}
                  </div>
                  </div> <br>
                        <div class="card-footer">
                          <div class="row">
                            <div class="col-sm">
                              <a href="{{ route('posts.edit', $post->id) }}"
                        class="btn btn-primary btn-sm">Editer</a>
                            </div>
                            <div class="col-sm">
                                <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
          </div>
      </div>
  </div>
  <div>
  
  

  
 

</x-app-layout>

        {{-- <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <meta http-equiv="X-UA-Compatible" content="ie=edge">
          @vite(['resources/css/app.css', 'resources/js/app.js'])
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
          <title>Posts</title>
        </head>
        <body>
      
        </body>
        </html> --}}