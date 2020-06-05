@extends('Index.index')
@section('css')
    <style>
    body{
        padding:20px;
    }
    </style>
@endsection

@section('body')



         <h1>Cadastro de Eventos</h1>
         <div class="line" style="border: 1px dashed grey "></div>
         <br>
        <form class="ui form" action="/salvarEvento" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="three fields">
        <div class="eight wide field">
                <label for="PesquisarEventos">Nome do Evento:</label>
                <input type="text" name="nome_evento" id="nome_evento" required="nome" placeholder="Nome do Evento">
            </div>

            <div class="four wide field">
                <label for="Cidade">Local/Sala:</label>
                <input type="text" name="local_sala" id="local_sala" placeholder="Local/sala">
            </div>

            <div class="four wide field">
                <label for="Local" >Cidade:</label>
                <input type="text" name="cidade" id="cidade" placeholder="Cidade">
            </div>    
        </div>

        <div class="ui form">

            <div class="four fields" >
                <div class="four wide field">
                    <div class="ui calendar" id="cal">
                    <label>Data Ínicio:</label>
                    <div class="ui input left icon">
                 <i class="calendar icon"></i>
                <input type="date" name="data_inicio" id="data_inicio" placeholder="Data Ínicio">
                </div>

                    </div>            
                </div>
                <div class="four wide field">
                    <div class="ui calendar" id="cal">
                    <label>Data Fim:</label>
                    <div class="ui input left icon">
                 <i class="calendar icon"></i>
                <input type="date" name="data_fim" id="data_fim"  placeholder="Data Fim">
                </div>
                    </div>            
                </div>

                <div class="four wide field">
                        <label>Hora Ínicio:</label>
           
                        <div class="ui calendar" id="example3">
                                <div class="ui input left icon">
                                  <i class="time icon"></i>
                                  <input type="text" id="hora_inicio" name="hora_inicio" placeholder="Ex.:00:00:00">
                                </div>
                              </div>
                </div>

                <div class="four wide field">
                        <label>Hora Ínicio:</label>
           
                        <div class="ui calendar" id="example3">
                                <div class="ui input left icon">
                                  <i class="time icon"></i>
                                  <input type="text" id="hora_fim" name="hora_fim" placeholder="Ex.:00:00:00">
                                </div>
                              </div>
                </div>
                
            </div>
        </div>

        <div class="ui form">
            <div class="four fields" >
                <div class="four wide field">
                    <label>Tipo:</label>
                    <input type="text" name="tipo" id="tipo" placeholder="Tipo">
                </div>
                <div class="four wide field">
                    <label>Valor:</label>
                    <input type="text" name="valor" id="valor" placeholder="Valor">
                </div>
                <div class="four wide field">
                    <label>Vagas:</label>
                    <input type="text" name="vagas" id="vagas" placeholder="Vagas">
                </div>

                <div style="margin-top:25px" class="four wide field">
                        
                <label for="upload_2" class="ui icon button">
                    <i class="file icon"></i>
                    Upload</label>
                    
                 <input onClick="previewPessoa();" type="file" name="arquivo" id="upload_2" style="display:none">
                 {{-- <input type="text" id="inputFile"> --}}
                 {{-- <a class="ui red label" id="inputFile"></a> --}}
                 {{-- <p style="color:green" id="inputFile"></p> --}}
                 <p id="inputFile"></p>
                 
                </div>

            </div>
  
        </div>

        

<div class="ui form">
  <div class="field">
    <label>Descrição:</label>
    <textarea style="height: 320px;" name="descricao" id="descricao"></textarea>
</div>

<div class="ui right aligned container">
<a class="ui orange button" onClick="preVisualizacao();" style="width:200px">Pré Visualizar</a>
<button class="ui green button" style="width:200px">Cadastrar</button>
</div>




        </form>

            <div id="modal" class="ui modal">
        <div class="header">Pré Visualização</div>

        <div class="ui card" style="max-width: 100%; min-width: 100%;">
            <div class="content">
                <div class="ui items">
                    <div class="item">
                        <div style="width: 600px;" class="ui medium image">
                            <img style="width: 600px; height: 300px;  border-top-left-radius: 10px;border-bottom-left-radius:10px" src="" id="visualizarImagem_2">
                        </div>

                        <div class="content" style="padding: 1rem;border:solid black 1px; color:black !important; border-top-right-radius: 10px;border-bottom-right-radius:10px">
                            <div class="ui center aligned container">
                                <div id="header_2"></div>
                            </div>

                            <div class="ui justified container">
                                <div id="descricao_2" class="description">

                                </div>

                                <div class="ui center aligned container">
                                    <div id="extra" class="description">

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="ui mini modal" id="modal_2">
        <div class="header">Ver Detalhes</div>
        <div class="content">
            <p id="texto_g"></p>
        </div>
        </div>

   

    <h1>Solicitação de Cadastro de Eventos</h1>
    <div class="line" style="border: 1px dashed grey "></div>


    <table class="ui fixed table">
<thead>
    <tr>
    <th>Solicitante</th>
    <th>Evento</th>
    <th>Ações</th>
    </tr>
</thead>
 <tbody>
        @foreach($solicitar as $s)

        
        <tr>
            <th>{{date("d/m/Y", strtotime($s->data_inicio))}}</th>
            <th>{{$s->nome_s_evento}}</th>
            <th><button class="ui yellow button"><i class="pencil alternate icon"></i></button>
            <button class="ui red button"><center><i class="trash alternate outline icon"></i></center></button></th>
        </tr>
        
        @endforeach
 </tbody>
 </table>
           
  
@endsection


@section('js')
 <script>
 function preVisualizacao() {

var nome_evento = $('#nome_evento').val();
var local_sala = $('#local_sala').val();
var cidade = $('#cidade').val();
var data_inicio = $('#data_inicio').val();
var data_fim = $('#data_fim').val();
var hora_inicio = $('#hora_inicio').val();
var hora_fim = $('#hora_fim').val();
var tipo = $('#tipo').val();
var valor = $('#valor').val();
var vagas = $('#vagas').val();
var evento = $('#evento').val();
var texto = $('#descricao').val();

$('#modal').modal('show');
$('#header_2').html('<h1>' + nome_evento + '</h1>');
$('#descricao_2').html('<p>' +'<i class="big green calendar check outline icon"></i>'+ local_sala + ' - ' + cidade + '</p>' + '<br>' +
    '<p>' + '<i class="big green clock outline icon">' + '</i>' + hora_inicio + ' h' +
    '<p>' + 'Tipo:' + tipo + '</p>' + '<br>' +
    '<p>' + 'Valor:' +'R$ '+ valor + '</p>' + '<br><br><br><br>');

if (texto.length > 200) {
    $('#extra').html('<button style="width:100%;border-radius:10px" onClick="verTexto()" class="ui basic button"><i class="sticky note outline icon"></i>Ver Detalhes</button>');
} else {
    $('#extra').html(texto);
}

}

function previewPessoa() {
$("#upload_2").change(function () {
    const file = $(this)[0].files[0]
    const fileReader = new FileReader()
    var fileName = $(this)[0].files[0].name;

    $('#inputFile').html("");
    $('#inputFile').html('<a class="ui green label">'+fileName+'</a>' );

     fileReader.onloadend = function () {
         $("#visualizarImagem_2").attr('src', fileReader.result)
     } 
    fileReader.readAsDataURL(file)
});
}
function verTexto() {
var texto = $('#descricao').val();
$('#modal_2').modal('show');
$('#texto_g').html(texto);
}





</script>
@endsection



