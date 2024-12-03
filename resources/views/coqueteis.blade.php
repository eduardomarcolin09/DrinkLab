<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coquetéis - DrinkLab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar com Avatar e Menu de Usuário -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800 hover:text-blue-500">DrinkLab</a>
            <div class="flex items-center space-x-6">
                <a href="/" class="text-gray-800 hover:text-blue-500">Início</a>
                <a href="#sobre" class="text-gray-800 hover:text-blue-500">Sobre nós</a>
                <a href="#contatos" class="text-gray-800 hover:text-blue-500">Contatos</a>
                
                <!-- Se o usuário estiver logado -->
                @auth
                <div class="relative">
                    <!-- Ícone do Usuário (Avatar) e Nome -->
                    <button onclick="toggleDropdown()" class="flex items-center space-x-2 text-gray-800">
                        <img src="{{ Auth::user()->provider_avatar }}" alt="Avatar" class="w-8 h-8 rounded-full">
                        <span>{{ Auth::user()->name }}</span>
                    </button>

                    <!-- Dropdown com as opções Meu Perfil e Deslogar -->
                    <div id="dropdown-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg hidden">
                        <ul>
                            <li>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Meu Perfil</a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Deslogar</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
                @endauth

                <!-- Se o usuário não estiver logado -->
                @guest
                <a href="{{ route('login') }}" class="text-gray-800 hover:text-blue-500">Entrar</a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Galeria de Coquetéis -->
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-8">Explore Nossos Coquetéis</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($coqueteis as $coquetel)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg transform hover:scale-105 transition-transform duration-500">
                <img src="{{ $coquetel['strDrinkThumb'] }}" alt="{{ $coquetel['strDrink'] }}"
                    class="w-full h-48 object-cover rounded-t-lg">
                <div class="p-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $coquetel['strDrink'] }}</h3>
                    <p class="text-gray-600 mt-2 text-sm">Clique para ver a receita completa.</p>
                    <a href="#" class="text-indigo-600 text-sm mt-2 inline-block hover:underline">Ver Receita</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>© 2024 DrinkLab. Todos os direitos reservados.</p>
        </div>
    </footer>

    <script>
        // Função para abrir e fechar o menu de dropdown do usuário
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdown-menu');
            dropdown.classList.toggle('hidden');
        }
    </script>

</body>

</html>
