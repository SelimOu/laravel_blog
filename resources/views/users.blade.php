<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <a href="/dashboard/posts"><button>Mes Posts</button></a>
        @if($users === 'admin')
        <a href="/dashboard/categories"><button>Toutes les categories</button></a>
        <a href="/dashboard/users"><button>Touts les Utulisateurs</button></a>
        @endif
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Connecté!") }}
                    <br> <br>

                    <div class="p-6 text-gray-900">
                        {{ __("Connecté!") }}
                        <br> <br>
                        @foreach ($afficherUser as $user)
                        <div class ="blog_container">
                          <div>  {{$user['name']}}</div>
                          <div class="content_Container">
                            {{$user['role']}}<br>
                            {{$user['email']}} <br>
                            
                            <div >
                                <form action="{{ route('updateUsers', $user->id) }}" method="post">
                                  @csrf
                                  @method('PUT')
                                  <select name="role" id="role">
                                  <option value="admin">Admin</option>
                                  <option value="client">Client</option>
                                  </select>
                                  <button type="submit" class="btn btn-danger btn-sm">modifier</button>
                                </form>
                            </div>
                            <div class="col-sm">
                              <form action="{{ route('destroyUsers', $user->id) }}" method="post">
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
            </div>
            
        </div>
    </div>
</x-app-layout>