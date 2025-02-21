@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-2xl font-semibold text-gray-900">Modifier l'annonce</h1>
        </div>

        <div class="border-t border-gray-200 p-4">
            <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300" value="{{ old('title', $item->title) }}" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                        <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300" required>
                            <option value="lost" {{ old('type', $item->type) == 'lost' ? 'selected' : '' }}>Perdu</option>
                            <option value="found" {{ old('type', $item->type) == 'found' ? 'selected' : '' }}>Trouvé</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Autres champs identiques au create avec les valeurs de $item -->
                    <!-- ... -->

                    <div class="col-span-full">
                        @if($item->image_path)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600">Image actuelle :</p>
                                <img src="{{ Storage::url($item->image_path) }}" alt="Image actuelle" class="mt-2 h-32 object-cover rounded">
                            </div>
                        @endif
                        <label for="image_path" class="block text-sm font-medium text-gray-700">Nouvelle image (optionnel)</label>
                        <input type="file" name="image_path" id="image_path" class="mt-1 block w-full" accept="image/*">
                        @error('image_path')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('items.show', $item) }}" class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">
                        Annuler
                    </a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Mettre à jour
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection