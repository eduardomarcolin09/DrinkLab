# 🍹 **DrinkLab**
O **DrinkLab**  é uma aplicação web desenvolvida em **Laravel** que permite aos usuários explorar uma coleção de receitas de bebidas, como cafés, coquetéis e vitaminas. A aplicação oferece funcionalidades de **login social** utilizando **Google** e **GitHub**, além de permitir que os usuários cadastrados visualizem e interajam com receitas de bebidas.

## 🛠️ **Funcionalidades**

- **Login Social**: Permite autenticação via Google e GitHub.
- **Cadastro e Login**: Usuários podem se cadastrar com e-mail ou fazer login usando contas sociais.
- **Exploração de Receitas**: Os usuários podem acessar "galerias" de Receitas, ainda SEM páginas de cada drink e sua respectiva receita.
- **Autenticação de Acesso**: Algumas funcionalidades exigem que o usuário esteja autenticado para visualização.

## 💻 **Tecnologias Utilizadas**

- **Laravel**: Framework PHP para desenvolvimento web.
- **Laravel Socialite**: Biblioteca para integração com provedores de autenticação social (Google, GitHub).
- **Tailwind CSS**: Framework CSS para um design moderno e responsivo. 
- **Font Awesome**: Biblioteca de ícones para componentes da interface.
- **APIs externas**:
  - [Sample APIs - Coffee](https://api.sampleapis.com/coffee/hot)
  - [The Cocktail DB](https://www.thecocktaildb.com/api/json/v1/1/filter.php?c=Cocktail)

## ⚙ **Pré-requisitos**

- PHP >= 8.1
- Composer
- Laravel 10.x
- Credenciais de autenticação dos provedores sociais (Google, GitHub)

## 📝 **Instalação**

### 1. Clonar o Repositório

```bash
git clone https://github.com/eduardomarcolin09/DrinkLab.git
```
### 2. Instalar Dependências

```bash
composer install
```

### 3. Configurar o Ambiente

```bash
cp .env.example .env
```

### 4. Gerar a Chave de Aplicação

```bash
php artisan key:generate
```

### 5. Configurar Credenciais de Autenticação Social
No arquivo .env, adicione as credenciais de autenticação dos provedores sociais:

```
# Google
GOOGLE_CLIENT_ID=seu-client-id
GOOGLE_CLIENT_SECRET=seu-client-secret
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback

# GitHub
GITHUB_CLIENT_ID=seu-client-id
GITHUB_CLIENT_SECRET=seu-client-secret
GITHUB_REDIRECT_URI=http://localhost:8000/auth/github/callback
```

### 6. Configurar Banco de Dados
Crie o banco de dados e execute as migrations:

```bash
php artisan migrate
```

### 7. Executar o Servidor de Desenvolvimento

```bash
php artisan serve
```

Agora a aplicação estará disponível em http://localhost:8000.

## 📚 **Notas Finais**

- A aplicação ainda está em desenvolvimento, então novas funcionalidades e melhorias serão adicionadas.

- A autenticação social está funcional, mas para um ambiente de produção, não se esqueça de configurar corretamente as credenciais e URLs de retorno nos provedores (Google, GitHub).

- Objetivo do trabalho - Aprender mais sobre o Laravel Socialite e estilização utilizando o Tailwind CSS