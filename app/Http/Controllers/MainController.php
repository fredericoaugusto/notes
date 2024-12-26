<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        echo 'Página inicial';
    }

    public function newNote()
    {
        echo 'Nova nota';
    }
}
