<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CadastroEvento;
use App\SolicitarEvento;
use App\status;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class cadastroEventoControlador extends Controller
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
        return view('cadastrarEventos.cadastrarEventos', compact('evento','solicitar'));
    }


    public function filtroCard(Request $request){
            $filtro = $request->index;
            $nome_evento = '%'.$filtro[0].'%';
            $local_sala = '%'.$filtro[1].'%';
            $cidade = '%'.$filtro[2].'%';
            $data_inicio = '%'.$filtro[3].'%';
            $data_fim = '%'.$filtro[4].'%';
            $tipo = '%'.$filtro[5].'%';
            $valor = '%'.$filtro[6].'%';
            
            

                // $filtro_card = DB::select('SELECT * FROM cadastro_eventos WHERE id_stts = ? AND (nome_evento like ? OR  local_sala like ? OR cidade like ? OR data_inicio like ? OR data_fim like ? OR tipo like ? OR valor like ?)ORDER BY data_inicio DESC', [$filtro[7], $nome_evento, $local_sala, $cidade, $data_inicio, $data_fim, $tipo, $valor]);

                $filtro_card = DB::select('SELECT * FROM cadastro_eventos WHERE id_stts = ? AND (nome_evento like ? OR  local_sala like ? OR cidade like ? OR data_inicio like ? OR data_fim like ? OR tipo like ? OR valor like ?)ORDER BY data_inicio DESC', [$filtro[7], $filtro[0], $filtro[1], $filtro[2], $filtro[3], $filtro[4], $filtro[5], $filtro[6]]);

                return $filtro_card;
            

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

    public function descCard(Request $request){
        $id = $request->id;
        $desc = DB::select('SELECT * FROM cadastro_eventos WHERE id = ?', [$id]);
        return $desc;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(Request $request)
    {
        $data_atual = now()->setTimezone('America/Sao_Paulo')->format("d/m/Y H:i");
        $path = $request->file('arquivo')->store('imagens','public');
        $cadastrar = new CadastroEvento();
        $cadastrar->nome_evento = $request->input('nome_evento');
        $cadastrar->local_sala = $request->input('local_sala');
        $cadastrar->cidade = $request->input('cidade');
        $cadastrar->data_inicio = $request->input('data_inicio');
        $cadastrar->data_fim = $request->input('data_fim');
        $cadastrar->hora_inicio = $request->input('hora_inicio');
        $cadastrar->hora_fim = $request->input('hora_fim');
        $cadastrar->tipo = $request->input('tipo');
        $cadastrar->valor = $request->input('valor');
        $cadastrar->vagas = $request->input('vagas');
        $cadastrar->descricao = $request->input('descricao');
        $cadastrar->arquivo = $path;

        if(date("d/m/Y H:i", strtotime($cadastrar->data_inicio . " " . $cadastrar->hora_fim )) >= $data_atual || date("d/m/Y H:i", strtotime($cadastrar->data_fim . " " . $cadastrar->hora_fim)) > $data_atual){
            $cadastrar->id_stts = 1;
        }elseif(date("d/m/Y H:i", strtotime($cadastrar->data_inicio . " " . $cadastrar->hora_fim)) < $data_atual && date("d/m/Y H:i", strtotime($cadastrar->data_fim . " " . $cadastrar->hora_fim)) <= $data_atual){
            $cadastrar->id_stts = 2;
        }

        $cadastrar->save();

        return redirect('/');

    }

    public function getCard(Request $request){

            $val = $request->filtro;
            $filtro = DB::select('SELECT * FROM cadastro_eventos WHERE id_stts= ? ORDER BY data_inicio DESC ',[$val]);
            // return response()->json($card);
            return $filtro;
            
    }

    public function cardDataInicio(Request $request){

        $val = $request->valor;
        $data_inicio = DB::select('SELECT * FROM cadastro_eventos WHERE data_inicio = ? ORDER BY data_inicio DESC ',[$val]);
        return $data_inicio;

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
