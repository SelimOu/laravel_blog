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
                    <div class="flex justify-end">
                       
                    </div>
                </div>

                <div class="container mx-auto mt-5">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach ($afficherUser as $user)
                            <div class="bg-gray-800 p-4 rounded-lg w-full">
                                <div class="font-bold"> Nom:  {{ $user['name'] }}</div>
                                <div class="mt-2"> Role: {{ $user['role'] }}</div>
                                <div> Email: {{ $user['email'] }}</div>
                                <div class="mt-4 flex justify-between items-center">
                                    <form action="{{ route('updateUsers', $user->id) }}" method="post">
                                        @csrf
                                        @method('PUT')

                                        <select name="role" id="role" class="bg-white rounded border border-gray-300 p-1 appearance-none w-full text-base text-black">
                                            <option value="admin" @if($user['role'] === 'admin') selected @endif class="bg-gray-200">Admin</option>
                                            <option value="client" @if($user['role'] === 'client') selected @endif class="bg-gray-200">Client</option>
                                        </select>   
                                        <br>
                                        <br>                                                                            
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded ml-2">
                                            Modifier
                                        </button>
                                    </form>
                                    <br>
                                    <form action="{{ route('destroyUsers', $user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{$afficherUser->WithqueryString()->links()}}
</x-app-layout>
