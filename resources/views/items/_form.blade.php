{{-- resources/views/items/_form.blade.php --}}
@csrf

<div class="space-y-6">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Titre de l'annonce</label>
        <input type="text" name="title" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
               value="{{ old('title', $item->title ?? '') }}" required>
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="4" 
                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                  required>{{ old('description', $item->description ?? '') }}</textarea>
    </div>

    <div>
        <label for="image_path" class="block text-sm font-medium text-gray-700">Image</label>
        <input type="file" name="image_path" 
               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
    </div>

    <div>
        <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
        <input type="date" name="date" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
               value="{{ old('date', $item->date ?? '') }}" required>
    </div>

    <div>
        <label for="location" class="block text-sm font-medium text-gray-700">Lieu</label>
        <input type="text" name="location" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
               value="{{ old('location', $item->location ?? '') }}" required>
    </div>

    <div>
        <label for="contact_email" class="block text-sm font-medium text-gray-700">Email de contact</label>
        <input type="email" name="contact_email" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
               value="{{ old('contact_email', $item->contact_email ?? '') }}" required>
    </div>

    <div>
        <label for="contact_phone" class="block text-sm font-medium text-gray-700">Téléphone</label>
        <input type="text" name="contact_phone" 
               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
               value="{{ old('contact_phone', $item->contact_phone ?? '') }}">
    </div>

    <div>
        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
        <select name="type" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                required>
            <option value="lost" {{ (old('type', $item->type ?? '') == 'lost') ? 'selected' : '' }}>Perdu</option>
            <option value="found" {{ (old('type', $item->type ?? '') == 'found') ? 'selected' : '' }}>Trouvé</option>
        </select>
    </div>

    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">Catégorie</label>
        <select name="category_id" 
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" 
                        {{ (old('category_id', $item->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>