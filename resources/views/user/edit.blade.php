<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - DrinkLab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    @include('components.navbar')

    <!-- Formulário de Edição -->
    <section class="container mx-auto px-6 py-12">
        <div class="max-w-md mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-center text-gray-800">Editar Perfil</h2>
                <p class="text-gray-600 text-center mt-2">Atualize suas informações abaixo.</p>
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="mt-6 space-y-4">
                    @csrf
                    @method('PUT')
                    <!-- Nome -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome Completo</label>
                        <input type="text" id="name" name="name" required class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="Digite seu nome" value="{{ old('name', $user->name) }}">
                        @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- E-mail -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">E-mail</label>
                        <input type="email" id="email" name="email" required class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="exemplo@email.com" value="{{ old('email', $user->email) }}">
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Senha -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha (Deixe em branco para não alterar)</label>
                        <input type="password" id="password" name="password" class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="********">
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Confirmação de Senha -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a Senha</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full mt-1 p-3 border rounded-md focus:outline-none focus:ring focus:ring-blue-300" placeholder="********">
                    </div>
                    <!-- Botão -->
                    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-green-500 text-white py-3 rounded-md font-semibold hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                        Atualizar
                    </button>
                </form>
                <p class="text-center text-gray-600 mt-6">
                    Deseja excluir sua conta?
                    <!-- Tem que ser um Form pq se for um link, o Controller não aceita! -->
                    <form action="{{ route('user.delete', $user->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline" onclick="return confirmDelete()">Excluir conta</button>
                    </form>
                </p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <script src="{{ asset('js/scripts.js') }}"></script>
        <script>
        // Função para confirmar a exclusão
        function confirmDelete() {
            return confirm("Tem certeza de que deseja excluir sua conta? Esta ação não pode ser desfeita.");
        }
    </script>
</body>

</html>
