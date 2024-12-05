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
