<body class="bg-gray-50 font-sans">
<div id="auth-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center z-50">
    <div class="m-auto bg-white rounded-lg shadow-lg w-full max-w-md p-6 my-3 overflow-hidden">
        <h2 class="text-2xl font-bold text-gray-800 text-center">Entrar</h2>
        <p class="text-gray-600 text-center mt-2">Insira seu email e senha, ou entre com suas redes sociais.</p>

        <!-- Formulário de Login -->
        <form action="{{ route('login') }}" method="POST" class="mt-6 space-y-4">
            @csrf
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

        <!-- Exibe erros de login, se houver -->
        <div id="error-messages" class="mt-4 text-red-500 text-sm @if(!$errors->any()) hidden @endif">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <p class="text-center mt-4 text-gray-600">Não tem uma conta? <a href="/register" class="text-blue-500 hover:underline">Cadastre-se</a></p>

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

<!-- Script para abrir o modal se houver erro -->
<script>
    @if($errors->any())
        document.getElementById('auth-modal').classList.remove('hidden');
    @endif
</script>

</body>