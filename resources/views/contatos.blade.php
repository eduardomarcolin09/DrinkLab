<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - DrinkLab</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Navbar -->
    @include('components.navbar')

    <!-- Seção de Contato -->
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Fale Conosco</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Informações de Contato e Mapa -->
            <div>
                <!-- Informações de Contato -->
                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-map-marker-alt text-red-500 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Endereço</h3>
                            <p class="text-gray-600">IFRS - Campus Bento Gonçalves</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-phone-alt text-green-500 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Telefone</h3>
                            <p class="text-gray-600">+54 91234-5678</p>
                            <p class="text-gray-600">+54 95678-1234</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fas fa-envelope text-blue-500 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Email</h3>
                            <p class="text-gray-600">DrinkLab9@info.com</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <i class="fab fa-instagram text-pink-500 text-2xl"></i>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">Instagram</h3>
                            <p class="text-gray-600">@DrinkLab9</p>
                        </div>
                    </div>
                </div>

            <!-- Mapa -->
                <div class="w-full h-48 rounded overflow-hidden shadow-lg">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d111489.17325234818!2d-51.61345484739339!3d-29.163591809097927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951c3caeba8136ab%3A0x468b5d9415ef0fd8!2sIFRS%20-%20Campus%20Bento%20Gon%C3%A7alves!5e0!3m2!1spt-BR!2sbr!4v1733865692071!5m2!1spt-BR!2sbr" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <!-- 
            Obs: Pra pegar o mapa eu tive que ir: Google Maps -> Digitar uma loc. -> Compartilhar -> Incorporar um mapa -> Copiei o código HTML
            -->

            <!-- Formulário -->
            <div>
                <form class="bg-white shadow-md rounded-lg p-6 space-y-4" method="POST" action="">
                @csrf
                    <div>
                        <label for="name" class="block text-gray-700">Nome</label>
                        <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500">
                    </div>
                    <div>
                        <label for="message" class="block text-gray-700">Mensagem</label>
                        <textarea id="message" name="message" rows="4" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>
                    </div>
                    <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded hover:bg-red-600">Enviar</button>
                </form>
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