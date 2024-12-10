<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Exibir formulário de edição
    public function edit(User $user)
    {
        // Garantir que o usuário logado seja o mesmo que está tentando editar
        if (Auth::id() !== $user->id) {
            return redirect('/')->with('error', 'Você não tem permissão para editar este perfil.');
        }

        return view('user.edit', compact('user'));
    }

    // Atualizar as informações do usuário
    public function update(Request $request, User $user)
    {
        // Garantir que o usuário logado seja o mesmo que está tentando editar
        if (Auth::id() !== $user->id) {
            return redirect('/')->with('error', 'Você não tem permissão para editar este perfil.');
        }

        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Atualizar os dados
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('user.edit', $user->id)->with('success', 'Perfil atualizado com sucesso!');
    }

    public function showRegistrationForm()
    {
        return view('user/register');
    }

    public function register(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|min:3|max:255|regex:/^[\pL\s\-]+$/u', // Permite apenas letras, espaços e traços
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:50|confirmed',
        ], [
            // Se caso o usuário preencher algum dado errado, retorna as mensagens:
            
            // Mensagens genéricas
            '*.required' => 'O campo :attribute é obrigatório.',
            '*.string' => 'O campo :attribute deve ser um texto.',
            '*.min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            '*.max' => 'O campo :attribute pode ter no máximo :max caracteres.',
            '*.confirmed' => 'Os campos de confirmação de :attribute não coincidem.',

            // Mensagens específicas
            'name.regex' => 'O nome pode conter apenas letras, espaços e traços.',
            'email.email' => 'Digite um e-mail válido.',
            'email.unique' => 'Este e-mail já está cadastrado.',
        ]);
        

        // Criação do usuário
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Login automático após cadastro
        Auth::login($user);

        return redirect('/')->with('success', 'Cadastro realizado com sucesso!');
    }

    // Excluir o usuário
    public function destroy(User $user)
    {

        if (Auth::id() !== $user->id) {
            return redirect('/')->with('error', 'Você não tem permissão para excluir este perfil.');
        }

        $user->delete();
        Auth::logout();

        return redirect('/')->with('success', 'Conta excluída com sucesso!');
    }
}
