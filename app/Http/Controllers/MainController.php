<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MainController extends Controller
{
    public function index()
    {
        $id = session('user.id');
        $user = User::find($id);
        $notes = User::find($id)->notes()->get()->toArray();

        return view('home', ['notes' => $notes, 'user' => $user]);
    }

    public function newNote()
    {
        echo 'Nova nota';
    }

    public function editNote($id)
    {
        $id = $this->decryptId($id);

        echo 'Editar nota ' . $id;
    }

    public function deleteNote($id)
    {
        $id = $this->decryptId($id);

        echo 'Deletar nota ' . $id;
    }

    private function decryptId($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->route('home');
        }

        return $id;
    }
}
