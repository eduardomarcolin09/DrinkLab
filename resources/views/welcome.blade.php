<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DrinkLab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Função para abrir e fechar a modal
        function toggleModal() {
            const modal = document.getElementById('auth-modal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

    </script>
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800 hover:text-blue-500">DrinkLab</a>
            <div class="flex items-center space-x-6">
                <a href="#" class="text-gray-800 hover:text-blue-500">Início</a>
                <a href="#sobre" class="text-gray-800 hover:text-blue-500">Sobre nós</a>
                <a href="#contatos" class="text-gray-800 hover:text-blue-500">Contatos</a>
                <!-- Verificar se o usuário está logado -->
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
                @else
                <button onclick="toggleModal()" class="text-gray-800 hover:text-blue-500">
                    Entrar
                </button>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="bg-cover bg-center h-96 flex items-center justify-center" style="background-image: url('https://www.beerpassclub.com/wp-content/uploads/2023/11/fresh-cocktails-with-ice-lemon-lime-fruits-generative-ai-scaled.webp');">
        <div class="bg-gray-800 bg-opacity-50 p-8 rounded">
            <h1 class="text-4xl font-bold text-white text-center">Bem-vindo ao Mundo das Bebidas</h1>
            <p class="text-gray-200 mt-4 text-center">Descubra receitas incríveis para todas as ocasiões!</p>
        </div>
    </header>

    <!-- Categorias Populares -->
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Categorias Populares</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- C1 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://blog.coffeemais.com/wp-content/uploads/2022/02/cafe-com-leite-condensado-topo.jpg" alt="Cafés" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">
                        @auth
                        <a href="{{ route('cafes') }}">Cafés</a>
                        @else
                        <span>Cafés</span>
                        @endauth
                    </h3>
                    <p class="text-gray-600 mt-2">Explore receitas deliciosas de cafés para começar bem o dia.</p>
                    <!-- o @ guest verifica se o Usuário NÃO está logado, mt melhor do que usar JS pra esconder o elemento e etc..-->
                    @guest
                    <span class="text-red-500 text-sm">Você precisa estar logado para acessar</span>
                    @endguest
                </div>
            </div>
            <!-- C2 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://media.istockphoto.com/id/1323890695/pt/foto/pink-grapefruit-and-rosemary-gin-cocktail-is-served-in-a-prepared-gin-glasses.jpg?s=612x612&w=0&k=20&c=VKC8YW2hiWKH53GhPpFaYKHqsqDvk-LJ3OPuWhtm4MU=" alt="Coquetéis" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">
                        @auth
                        <a href="{{ route('coqueteis') }}">Coquetéis</a>
                        @else
                        <span>Coquetéis</span>
                        @endauth
                    </h3>
                    <p class="text-gray-600 mt-2">Aprenda a preparar coquetéis sofisticados para qualquer evento.</p>
                    @guest
                    <span class="text-red-500 text-sm">Você precisa estar logado para acessar</span>
                    @endguest
                </div>
            </div>
            <!-- C3 -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <img src="https://cdn.oantagonista.com/uploads/2024/10/vitamina-de-frutas_1728190598846-1024x576.jpg" alt="Vitaminas" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800">
                        @auth
                        <a href="{{ route('vitaminas') }}">Vitaminas</a>
                        @else
                        <span>Vitaminas</span>
                        @endauth
                    </h3>
                    <p class="text-gray-600 mt-2">Receitas nutritivas para tornar seu dia mais saboroso e saudável.</p>
                    @guest
                    <span class="text-red-500 text-sm">Você precisa estar logado para acessar</span>
                    @endguest
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto text-center">
            <p>© 2024 Receitas de Bebidas. Todos os direitos reservados.</p>
        </div>
    </footer>

    <!-- Modal de Cadastro/Login -->
    <div id="auth-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex">
        <div class="m-auto bg-white rounded-lg shadow-lg w-full max-w-md p-6 my-3">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Entrar</h2>
            <p class="text-gray-600 text-center mt-2">Insira seu email e senha, ou entre com suas redes sociais.</p>

            <!-- Formulário de Login -->
            <form action="/login" method="POST" class="mt-6 space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" required class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="exemploemail@gmail.com">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-lock"></i> Senha</label>
                    <input type="password" id="password" name="password" required class="w-full mt-1 p-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="exemplosenha123">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">
                    Entrar
                </button>
            </form>

            <div class="mt-6 flex items-center justify-between">
                <span class="w-1/5 border-b"></span>
                <span class="text-xs text-gray-500 uppercase">ou</span>
                <span class="w-1/5 border-b"></span>
            </div>

            <!-- Login com Redes Sociais -->
            <div class="mt-6 flex flex-col space-y-4">
                <a href="/auth/google/redirect" class="w-full text-center py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    <i class="fa-brands fa-google"></i> Entrar com Google
                </a>
                <a href="/auth/github/redirect" class="w-full text-center py-2 bg-gray-800 text-white rounded-md hover:bg-gray-900">
                    <i class="fa-brands fa-github"></i> Entrar com GitHub
                </a>
            </div>

            <button onclick="toggleModal()" class="mt-6 w-full text-center py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400">
                Fechar
            </button>
        </div>
    </div>

    <!-- Jeito certo de referenciar Scripts em um projeto Laravel: (o script tem que estar na public)-->
    <script src="{{ asset('js/scripts.js') }}"></script>

    <!-- Jeito errado: -->
    <!-- <script src="/resources/js/scripts.js"></script> -->
</body>
</html>
