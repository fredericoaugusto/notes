<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'text_username' => 'required|email',
            'text_password' => 'required|min:6|max:16'
        ], [
            'text_username.required' => 'O username é obrigatório',
            'text_username.email' => 'O username deve ser um email válido',
            'text_password.required' => 'A senha é obrigatória',
            'text_password.min' => 'A senha deve ter no mínimo :min caracteres',
            'text_password.max' => 'A senha deve ter no máximo :max caracteres'
        ]);



        $username = $request->input('text_username');
        $password = $request->input('text_password');

        try {
            DB::connection()->getPdo();
            echo 'Conexão funcionando';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }


    }
    public function logout()
    {
        echo 'Logout';
    }
}
