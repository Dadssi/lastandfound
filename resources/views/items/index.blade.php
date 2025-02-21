@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Objets perdus et trouvés</h1>
            <a href="{{ route('items.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md textblue-600 bg-indigo-600 hover:bg-indigo-700">
                Publier une annonce
            </a>
        </div>

        <div class="border-t border-gray-200">
            <!-- Filtres -->
            <div class="p-4 bg-gray-50 border-b">
                <form action="{{ route('items.index') }}" method="GET" class="flex gap-4">
                    <select name="type" class="rounded-md border-gray-300">
                        <option value="">Type</option>
                        <option value="lost" {{ request('type') == 'lost' ? 'selected' : '' }}>Perdu</option>
                        <option value="found" {{ request('type') == 'found' ? 'selected' : '' }}>Trouvé</option>
                    </select>
                    <select name="category" class="rounded-md border-gray-300">
                        <option value="">Catégorie</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="text" name="search" placeholder="Rechercher..." class="rounded-md border-gray-300" value="{{ request('search') }}">
                    <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Filtrer
                    </button>
                </form>
            </div>

            <!-- Liste des objets -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
                @forelse($items as $item)
                    <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition">
                        @if($item->image_path)
                            <img src="{{ $item->image_path }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">Pas d'image</span>
                            </div>
                        @endif
                        <div class="p-4">
                            <div class="flex justify-between items-start">
                                <h3 class="text-lg font-semibold">{{ $item->title }}</h3>
                                <span class="px-2 py-1 text-xs rounded {{ $item->type === 'lost' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                    {{ $item->type === 'lost' ? 'Perdu' : 'Trouvé' }}
                                </span>
                            </div>
                            <p class="text-sm text-gray-600 mt-2">{{ Str::limit($item->description, 100) }}</p>
                            <div class="mt-4 flex justify-between items-center">
                                <span class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}</span>
                                <a href="{{ route('items.show', $item) }}" class="text-indigo-600 hover:text-indigo-800">
                                    Voir plus
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-500">
                        Aucun objet trouvé
                    </div>
                @endforelse
            </div>


            <!-- Pagination -->
            <div class="px-4 py-3 border-t">
                {{ $items->links() }}
            </div>
        </div>
    </div>
@endsection
