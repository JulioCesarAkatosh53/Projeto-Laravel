<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CadastroEvento;
use App\SolicitarEvento;
use App\status;
use Illuminate\Support\Facades\DB;

class eventoControlador extends Controller
{
      public function index()
{
    // $stts = status::get();'stts'
    $evento = CadastroEvento::orderBy('data_inicio')->get();
    $data_atual = now()->setTimezone('America/Sao_Paulo')->format("d/m/Y");
    return view('Evento.Evento', compact('evento','data_atual'));
}

// public function testando(){
//     $data_atual = now()->setTimezone('America/Sao_Paulo')->format("d/m/Y");
//     $evento = CadastroEvento::orderBy('data_inicio')->get();

//     if(){

//     }else{

//     }
// }

}
