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
           
    </div>
</x-app-layout>
