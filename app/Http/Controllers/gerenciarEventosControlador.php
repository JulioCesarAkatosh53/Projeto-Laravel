<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CadastroEvento;
use App\SolicitarEvento;
use App\status;
use Illuminate\Support\Facades\DB;
class gerenciarEventosControlador extends Controller
{
    public function index(){
        return view('gerenciarEventos.gerenciarEventos');
    }
}
