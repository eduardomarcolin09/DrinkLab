<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-gray-800 hover:text-blue-500">DrinkLab</a>
        <div class="flex items-center space-x-6">
            <a href="{{ route('homepage') }}" class="text-gray-800 hover:text-blue-500">Início</a>
            <a href="#sobre" class="text-gray-800 hover:text-blue-500">Sobre nós</a>
            <a href="#contatos" class="text-gray-800 hover:text-blue-500">Contatos</a>
            <!-- Verificar se o usuário está logado -->
            @auth
            <div class="relative">
                <!-- Ícone do Usuário (Avatar) e Nome -->
                <button onclick="toggleDropdown()" class="flex items-center space-x-2 text-gray-800">
                    <img src="{{ Auth::user()->provider_avatar ? Auth::user()->provider_avatar : asset('imagens/default-avatar.jpg') }}" alt="Avatar" class="w-8 h-8 rounded-full">
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
            @else
            <button onclick="toggleModal()" class="text-gray-800 hover:text-blue-500">
                Entrar
            </button>
            @endauth
        </div>
    </div>
</nav>
