<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitarEvento;
use App\CadastroEvento;
use App\status;
use Illuminate\Support\Facades\DB;
class solicitarEventoControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitar = SolicitarEvento::all();
        $evento = CadastroEvento::all();
        return view('solicitarEventos.solicitarEventos', compact('evento','solicitar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $path = $request->file('arquivo_s')->store('imagens_s','public');
        $solicitar_evento = new SolicitarEvento();
        $solicitar_evento->nome_s_evento = $request->input('nome_s_evento');
        $solicitar_evento->local_s_sala = $request->input('local_s_sala');
        $solicitar_evento->cidade_s = $request->input('cidade_s');
        $solicitar_evento->data_s_inicio = $request->input('data_s_inicio');
        $solicitar_evento->data_s_fim = $request->input('data_s_fim');
        $solicitar_evento->hora_s_inicio = $request->input('hora_s_inicio');
        $solicitar_evento->hora_s_fim = $request->input('hora_s_fim');
        $solicitar_evento->tipo_s = $request->input('tipo_s');
        $solicitar_evento->valor_s = $request->input('valor_s');
        $solicitar_evento->vagas_s = $request->input('vagas_s');
        $solicitar_evento->evento_s = $request->input('evento_s');
        $solicitar_evento->descricao_s = $request->input('descricao_s');
        $solicitar_evento->arquivo_s = $path;
        $solicitar_evento->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
