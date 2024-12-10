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

    <!-- Navbar -->
    @include('components.navbar')

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
    @include('components.footer')
    
    <!-- Modal de Cadastro/Login -->
    @include('components.modalCadastro')

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>