<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\Operations;
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
        return view('new_note');
    }

    public function newNoteSubmit(Request $request)
    {
        echo 'Criando nova nota';
    }

    public function editNote($id)
    {
        $id = Operations::decryptId($id);

        echo 'Editar nota ' . $id;
    }

    public function deleteNote($id)
    {
        $id = Operations::decryptId($id);

        echo 'Deletar nota ' . $id;
    }
}
