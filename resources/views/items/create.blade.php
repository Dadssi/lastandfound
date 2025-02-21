@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h1 class="text-2xl font-semibold text-gray-900">Publier une annonce</h1>
        </div>

        <div class="border-t border-gray-200 p-4">
            <form action="{{ route('items.store') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300" value="{{ old('title') }}" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                            <option value="">Sélectionner une catégorie</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                            <option value="lost" {{ old('type') == 'lost' ? 'selected' : '' }}>Perdu</option>
                            <option value="found" {{ old('type') == 'found' ? 'selected' : '' }}>Trouvé</option>
                        </select>
                        @error('type')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                        <input type="date" name="date" id="date" class="mt-1 block w-full rounded-md border-gray-300" value="{{ old('date') }}" required>
                        @error('date')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300" required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="location" class="block text-sm font-medium text-gray-700">Lieu</label>
                        <input type="text" name="location" id="location" class="mt-1 block w-full rounded-md border-gray-300" value="{{ old('location') }}" required>
                        @error('location')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_email" class="block text-sm font-medium text-gray-700">Email de contact</label>
                        <input type="email" name="contact_email" id="contact_email" class="mt-1 block w-full rounded-md border-gray-300" value="{{ old('contact_email') }}" required>
                        @error('contact_email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="contact_phone" class="block text-sm font-medium text-gray-700">Téléphone de contact</label>
                        <input type="text" name="contact_phone" id="contact_phone" class="mt-1 block w-full rounded-md border-gray-300" value="{{ old('contact_phone') }}">
                        @error('contact_phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="col-span-full">
                        <label for="image_path" class="block text-sm font-medium text-gray-700">Lien de l'image</label>
                        <input type="text" name="image_path" id="image_path" class="mt-1 block w-full rounded-md border-gray-300" placeholder="https://exemple.com/image.jpg" value="{{ old('image_path') }}">
                        @error('image_path')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-blue-600 rounded-md hover:bg-indigo-700">
                        Publier l'annonce
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
