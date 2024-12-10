<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - DrinkLab</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon_io/site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    @include('components.navbar')

    <section class="container mx-auto px-6 py-12">
        <h1 class="text-3xl font-bold text-gray-800 text-center mb-8">O Laboratório de Sabores e Emoções</h1>
        <div class="flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="md:w-1/2">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-8">Nossa Missão</h3>
                <p class="text-gray-600 text-lg leading-relaxed">
                    No DrinkLab, acreditamos que cada bebida conta uma história. Nossa missão é criar uma comunidade
                    apaixonada por sabores, inovação e experiências inesquecíveis. Inspiramos pessoas a explorarem receitas únicas,
                    desde coquetéis sofisticados até cafés aconchegantes.
                </p>
                <div class="mt-6">
                    <p class="text-gray-800 font-semibold italic">"Sabores que despertam sorrisos e criam memórias inesquecíveis."</p>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="https://territoriosecreto.com.br/wp-content/uploads/2021/04/drink.jpg" alt="Drinks" class="rounded-lg shadow-md">
            </div>
        </div>
    </section>

    <section class="bg-gray-100 py-12">
        <div class="container mx-auto px-6">
            <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Nossa História</h2>
            <p class="text-gray-600 text-lg leading-relaxed text-center max-w-3xl mx-auto">
                Fundado em 2024, o DrinkLab nasceu da paixão por bebidas que unem as pessoas.
                Nossa jornada começou com a ideia de criar um espaço onde amantes de bebidas
                de todos os tipos pudessem compartilhar receitas e experiências.
                Hoje, somos uma plataforma em constante crescimento, com milhares de usuários explorando e
                criando receitas todos os dias.
            </p>
        </div>
    </section>

    <!-- Footer -->
    @include('components.footer')

    <!-- Modal de Cadastro/Login -->
    @include('components.modalCadastro')

    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
