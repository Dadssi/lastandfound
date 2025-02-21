<nav class="h-16 bg-white border-b border-gray-200 fixed w-full z-50 transition-all duration-300">
    <div class="max-w-screen-xl h-full flex items-center justify-between mx-auto px-4">
        <a href="/" class="flex items-center space-x-3">
            <span class="text-2xl font-bold text-blue-600">Lost<span class="text-gray-800">&</span>Found</span>
        </a>
        <!-- Mobile menu button -->
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Menu principal</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <!-- Navigation links -->
        <div class="hidden w-full md:flex md:items-center md:justify-between" id="navbar-default">
            <ul class="font-medium flex flex-col md:flex-row md:space-x-8 md:mt-0 md:p-0">
                <li><a href="#" class="block py-2 pl-3 pr-4 text-blue-600 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Accueil</a></li>
                <li><a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Objets Perdus</a></li>
                <li><a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Objets Trouvés</a></li>
                <li><a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700">Publier une annonce</a></li>
            </ul>

            <!-- Boutons Se connecter / S'inscrire -->
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="px-4 py-2 text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition">Se connecter</a>
                <a href="#" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition">S'inscrire</a>
            </div>
        </div>
    </div>
</nav>
