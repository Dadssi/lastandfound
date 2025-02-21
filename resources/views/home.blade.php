<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
</head>
<body class="bg-gray-50">
    <!-- Navbar - hauteur fixe de 64px -->
    <nav class="h-16 bg-white border-b border-gray-200 fixed w-full z-50 transition-all duration-300">
        <div class="max-w-screen-xl h-full flex items-center justify-between mx-auto px-4">
            <!-- Logo -->
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


    <!-- Hero Section - prend toute la hauteur moins la navbar -->
    <div class="relative min-h-screen">
        <!-- Image de fond avec overlay et flou -->
        <div class="absolute inset-0">
            <!-- L'image de fond avec flou -->
            <div 
                class="absolute inset-0 bg-cover bg-center filter blur-[3px]" 
                style="background-image: url('/images/hero-section.png');">
            </div>
            <!-- Triple overlay pour un meilleur contraste -->
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="absolute inset-0 bg-blue-300 opacity-20"></div>
        </div>

        <!-- Contenu du hero -->
        <div class="relative h-screen flex items-center justify-center px-4">
            <div class="text-center max-w-screen-xl mx-auto z-10">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-blue-700 md:text-5xl lg:text-6xl drop-shadow-2xl">Retrouvez ce qui compte pour vous</h1>
                <p class="mb-8 text-lg font-normal text-gray-200 lg:text-xl sm:px-16 lg:px-48 drop-shadow-md">La plateforme qui relie les objets perdus à leurs propriétaires. Simple, rapide et efficace.</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-800 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 shadow-lg">
                        J'ai perdu un objet
                        <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg border-2 bg-blue-800 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 shadow-lg">
                        J'ai trouvé un objet
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Section -->
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16">
        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-3xl font-extrabold text-gray-900">Statistiques</h2>
            <p class="text-gray-500 sm:text-xl">Notre communauté grandit chaque jour pour aider plus de personnes à retrouver leurs objets perdus.</p>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                    <i class="fas fa-search text-blue-600"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">1,234</h3>
                <p class="text-gray-500">Objets retrouvés</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                    <i class="fas fa-users text-blue-600"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">5,678</h3>
                <p class="text-gray-500">Utilisateurs actifs</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12">
                    <i class="fas fa-check-circle text-blue-600"></i>
                </div>
                <h3 class="mb-2 text-xl font-bold">89%</h3>
                <p class="text-gray-500">Taux de succès</p>
            </div>
        </div>
    </div>

    <footer class="bg-white border-t border-gray-200">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="/" class="flex items-center space-x-3">
                        <span class="text-2xl font-bold text-blue-600">Lost<span class="text-gray-800">&</span>Found</span>
                    </a>
                    <p class="mt-4 max-w-xs text-sm text-gray-600">
                        Votre plateforme de confiance pour retrouver et restituer les objets perdus.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Navigation</h2>
                        <ul class="text-gray-600 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:text-blue-600">Objets Perdus</a>
                            </li>
                            <li class="mb-4">
                                <a href="#" class="hover:text-blue-600">Objets Trouvés</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600">Publier une annonce</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Légal</h2>
                        <ul class="text-gray-600 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:text-blue-600">Conditions d'utilisation</a>
                            </li>
                            <li>
                                <a href="#" class="hover:text-blue-600">Politique de confidentialité</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Contact</h2>
                        <ul class="text-gray-600 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:text-blue-600">Aide</a>
                            </li>
                            <li>
                                <a href="mailto:contact@lostandfound.com" class="hover:text-blue-600">contact@lostandfound.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center">
                    © 2024 Lost&Found™. Tous droits réservés.
                </span>
                <div class="flex mt-4 space-x-5 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-blue-600">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-blue-600">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-blue-600">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Script pour la navbar sticky avec effet de transition
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('nav');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        });
    </script>
</body>
</html>