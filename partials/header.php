<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio FitZone</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Contrail+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Racing+Sans+One&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.17/index.global.min.js'></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Contrail One", sans-serif;
            font-weight: 400;
            font-style: normal;
        }

        .racing-sans-one-regular {
            font-family: "Racing Sans One", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-900">
    <!-- Header Responsive con Menú Hamburguesa -->
    <header class="bg-white shadow p-4 sticky top-0 z-10">
        <div class="flex justify-between items-center max-w-7xl mx-auto">
            <!-- Logo -->
            <h1 class="racing-sans-one-regular text-3xl md:text-5xl font-bold text-sky-700 flex items-center gap-2">
                <span>FitZone</span>
            </h1>

            <!-- Botón Hamburguesa -->
            <button id="menu-toggle" class="md:hidden text-orange-400 focus:outline-none" aria-label="Abrir menú">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Navegación escritorio -->
            <nav id="nav-menu" class="hidden md:block">
                <ul class="flex flex-col md:flex-row md:space-x-6 text-base font-medium">
                    <li class="content-center">
                        <a href="#"
                            class="block py-2 md:py-0 hover:text-orange-600 hover:underline underline-offset-4 decoration-2 transition">Inicio</a>
                    </li>
                    <li class="content-center">
                        <a href="#"
                            class="block py-2 md:py-0 hover:text-orange-600 hover:underline underline-offset-4 decoration-2 transition">Actividades</a>
                    </li>
                    <li class="content-center">
                        <a href="#"
                            class="block py-2 md:py-0 hover:text-orange-600 hover:underline underline-offset-4 decoration-2 transition">Tarifas</a>
                    </li>
                    <li class="content-center">
                        <a href="#"
                            class="block py-2 md:py-0 hover:text-orange-600 hover:underline underline-offset-4 decoration-2 transition">Reservas</a>
                    </li>
                    <li>
                        <!-- Avatar escritorio -->
                        <div class="hidden md:flex items-center gap-2 cursor-pointer" title="Usuario">
                            <img src="https://i.pravatar.cc/150?u=fake@pravatar.com" alt="Avatar usuario"
                                class="w-10 h-10 rounded-full border-2 border-sky-700" />
                            <span class="font-medium text-gray-700">Juan</span>
                        </div>

                    </li>
                </ul>
            </nav>
        </div>

        <!-- Overlay -->
        <div id="menu-overlay" class="fixed inset-0 bg-black/50 z-10 hidden md:hidden"></div>

        <!-- Navegación móvil deslizante desde la derecha -->
        <div id="mobile-menu"
            class="md:hidden fixed top-0 right-0 h-full w-64 bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-20">
            <ul class="flex flex-col gap-4 py-4 px-2 text-base font-medium">
                <li><a href="#" class="block px-4 py-2 hover:bg-blue-50 rounded">Inicio</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-blue-50 rounded">Actividades</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-blue-50 rounded">Tarifas</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-blue-50 rounded">Reservas</a></li>
            </ul>
            <!-- Avatar móvil debajo del menú -->
            <div class="border-t mt-4 pt-4 px-4 flex items-center gap-3 cursor-pointer">
                <img src="https://i.pravatar.cc/150?u=fake@pravatar.com" alt="Avatar usuario"
                    class="w-10 h-10 rounded-full border-2 border-sky-700" />
                <span class="font-medium text-gray-700">Juan</span>
            </div>
        </div>
    </header>
    <script>
        const toggleBtn = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const overlay = document.getElementById('menu-overlay');

        function toggleMenu() {
            const isOpen = mobileMenu.classList.contains('translate-x-0');

            if (isOpen) {
                mobileMenu.classList.replace('translate-x-0', 'translate-x-full');
                overlay.classList.add('hidden');
            } else {
                mobileMenu.classList.replace('translate-x-full', 'translate-x-0');
                overlay.classList.remove('hidden');
            }
        }

        toggleBtn.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                toggleMenu()
            });
        });


    </script>