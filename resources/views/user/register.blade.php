<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - DrinkLab</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans flex flex-col min-h-screen">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Formulário de Cadastro -->
    <section class="flex-grow container mx-auto px-6 py-12">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-center text-gray-800">Cadastro de Usuário</h2>
                <p class="text-gray-600 text-center mt-2">Preencha os campos abaixo para se cadastrar e explorar nossas
                    receitas incríveis!</p>
                <form action="{{ route('register') }}" method="POST" class="mt-6 space-y-4">
                    @csrf
                    <!-- Nome -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                        <input type="text" id="name" name="name" required
                            class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            placeholder="Digite seu nome" value="{{ old('name') }}">
                        @error('name')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- E-mail -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" id="email" name="email" required
                            class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            placeholder="exemplo@email.com" value="{{ old('email') }}">
                        @error('email')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Senha -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <input type="password" id="password" name="password" required
                            class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            placeholder="********">
                        @error('password')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirmação de Senha -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a
                            Senha</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                            class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300"
                            placeholder="********">
                        @error('password_confirmation')
                        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Botão -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-500 to-green-500 text-white py-3 rounded-md font-semibold hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                        Cadastrar
                    </button>
                </form>

                <p class="text-center text-gray-600 mt-6">
                    Já possui uma conta? <a href="{{ route('homepage') }}" class="text-blue-500 hover:underline">Entre aqui</a>.
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <!-- Modal de Cadastro/Login -->
    @include('components.modalCadastro')

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
