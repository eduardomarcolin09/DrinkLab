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
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    @include('components.navbar')

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
                        <a href="#">Vitaminas</a>
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
    @include('components.footer')

    <!-- Modal de Cadastro/Login -->
    @include('components.modalCadastro')

    <!-- Jeito certo de referenciar Scripts em um projeto Laravel: (o script tem que estar na public)-->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
