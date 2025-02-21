@extends('layouts.app')

@section('content')
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">{{ $item->title }}</h1>
            <div class="flex space-x-2">
                @if($item->user_id === auth()->id())
                    <a href="{{ route('items.edit', $item) }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        Modifier
                    </a>
                    <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette annonce ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                            Supprimer
                        </button>
                    </form>
                @endif
            </div>
        </div>

        <div class="border-t border-gray-200">
            <dl class="divide-y divide-gray-200">
                <!-- Image -->
                @if($item->image_path)
                    <div class="px-4 py-5 sm:px-6">
                        <img src="{{ $item->image_path }}" alt="{{ $item->title }}" class="max-h-96 object-contain mx-auto">
                    </div>
                @endif

                <!-- Informations -->
                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Status</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <span class="px-2 py-1 text-xs rounded {{ $item->type === 'lost' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                            {{ $item->type === 'lost' ? 'Perdu' : 'Trouvé' }}
                        </span>
                    </dd>
                </div>

                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Catégorie</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $item->category->name }}</dd>
                </div>

                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Description</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $item->description }}</dd>
                </div>

                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Date</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y') }}
                    </dd>
                </div>

                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Lieu</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $item->location }}</dd>
                </div>

                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Contact</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        <p>Email : {{ $item->contact_email }}</p>
                        @if($item->contact_phone)
                            <p>Téléphone : {{ $item->contact_phone }}</p>
                        @endif
                    </dd>
                </div>
            </dl>

            <!-- Section Commentaires -->
            <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <h2 class="text-lg font-medium text-gray-900">Commentaires</h2>
                
                @auth
                    <form action="{{ route('items.comments.store', $item) }}" method="POST" class="mt-4">
                        @csrf
                        <textarea name="content" rows="3" class="block w-full rounded-md border-gray-300" placeholder="Ajouter un commentaire..." required></textarea>
                        <div class="mt-3 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-blue-600 rounded-md hover:bg-indigo-700">
                                Commenter
                            </button>
                        </div>
                    </form>
                @endauth

                <div class="mt-6 space-y-4">
                    @forelse($item->comments as $comment)
                        <div class="bg-gray-50 rounded-lg p-4">
                            <div class="flex justify-between items-start">
                                <div>
                                    <p class="font-medium text-gray-900">{{ $comment->user->name }}</p>
                                    <p class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                                @if($comment->user_id === auth()->id())
                                    <div class="flex space-x-2">
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800 text-sm">Supprimer</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-4">Aucun commentaire pour le moment.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection