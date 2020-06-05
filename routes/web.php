<?php




// PAGINA INICIAL
Route::get('/',function(){
    return view('Index.index');
})->name('sideBar');

Route::get('/Evento', 'eventoControlador@index')->name('Evento');
// ROTA DE PESSOA
Route::group(['prefix' => 'pessoa'], function(){

    Route::get('/minhasInscricoes', 'minhasInscricoesControlador@index')->name('minhasInscricoes');
    Route::get('/solicitarEventos', 'solicitarEventoControlador@index')->name('solicitarEventos');

});
// ROTA DE ADMINISTRAÇÃO
Route::group(['prefix' => 'admin'], function () {

    Route::get('/cadastrarEvento', 'cadastroEventoControlador@index')->name('cadastrarEvento');
    Route::get('/gerenciarEvento', 'gerenciarEventosControlador@index')->name('gerenciarEvento');

});
// CADASTRAR EVENTOS
Route::post('/salvarEvento', 'cadastroEventoControlador@salvar');
// -------------------
// CADASTRAR SOLICITAÇÃO DE EVENTOS
Route::post('/salvarSolicitacao', 'solicitarEventoControlador@salvar');
// -----------------------
// PEGAR INFORMAÇÕES DO BANCO PARA CRIAÇÃO DO CARD
Route::get('/card_filtro', 'cadastroEventoControlador@getCard');
// ------------------------------------------
// PEGAR DESCRIÇÃO DOS CARDS
Route::get('/desc/card', 'cadastroEventoControlador@descCard');
// -------------------------

Route::get('/filtro_card', 'cadastroEventoControlador@filtroCard');