@extends('Index.index')

@section('css')
    <style>


        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            outline: none;
            cursor: inherit;
            display: block;
        }

        #imagem-pessoa {
            max-width: 100%;
            width: 395px;
            height: 300px;
            object-fit: cover;
        }
    </style>
@endsection


@section('body')


    <h1>Solicitar Públicação de Eventos</h1>
    <div class="line" style="border: 1px dashed grey "></div>
    <br>
    <form class="ui form" action="/salvarSolicitacao" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">

        <div class="three fields">
            <div class="eight wide field">
                <label for="PesquisarEventos">Nome do Evento:</label>
                <input id="nome_s_evento" type="text" name="nome_s_evento" placeholder="Nome do Evento">
            </div>

            <div class="four wide field">
                <label for="Cidade">Local/Sala:</label>
                <input id="local_s_sala" type="text" name="local_s_sala" placeholder="Local/sala">
            </div>

            <div class="four wide field">
                <label for="Local">Cidade:</label>
                <input id="cidade_s" type="text" name="cidade_s" placeholder="Cidade">
            </div>
        </div>

        <div class="ui form">

            <div class="four fields">
                <div class="four wide field">
                    <div class="ui calendar" id="cal">
                        <label>Data Ínicio:</label>
                        <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input id="data_s_inicio" type="date" name="data_s_inicio" placeholder="Data Ínicio">
                        </div>

                    </div>
                </div>
                <div class="four wide field">
                    <div class="ui calendar" id="cal">
                        <label>Data Fim:</label>
                        <div class="ui input left icon">
                            <i class="calendar icon"></i>
                            <input id="data_s_fim" type="date" name="data_s_fim" placeholder="Data Fim">
                        </div>
                    </div>
                </div>

                <div class="four wide field">
                    <label>Hora Ínicio:</label>

                            <div class="ui input left icon">
                              <i class="time icon"></i>
                              <input type="text" id="hora_s_inicio" name="hora_s_inicio" placeholder="Ex.:00:00:00">
                            </div>

                </div>

                <div class="four wide field">
                    <label>Hora Fim:</label>

                            <div class="ui input left icon">
                              <i class="time icon"></i>
                              <input type="text" id="hora_s_fim" name="hora_s_fim" placeholder="Ex.:00:00:00">
                            </div>

                </div>

            </div>
        </div>

        <div class="ui form">
            <div class="four fields">
                <div class="four wide field">
                    <label>Tipo:</label>
                    <input id="tipo_s" type="text" name="tipo_s" placeholder="Tipo">
                </div>
                <div class="four wide field">
                    <label>Valor:</label>
                    <input id="valor_s" type="text" name="valor_s" placeholder="Valor">
                </div>
                <div class="four wide field">
                    <label>Vagas:</label>
                    <input id="vagas_s" type="text" name="vagas_s" placeholder="Vagas">
                </div>
                <div class="four wide field">
                    <label>Evento:</label>
                    <input id="evento_s" type="text" name="evento_s" placeholder="Evento">
                </div <div>
     
            </div>
        </div>


    
            <div class="field">
                <label>Descrição:</label>
                <textarea style="height: 320px;" name="descricao_s" id="texto_s"></textarea>
            </div>

            <div class="ui right aligned container">
                <label style="width:200px" for="upload" class="ui icon button">
                    <i class="file icon"></i> Upload
                </label>
                <input id="upload" onclick="previewPessoa()" value="" type="file" name="arquivo_s" style="display:none">

                <a class="ui orange button" onClick="preVisualizacao();" style="width:200px">Pré Visualizar</a>
                <button class="ui green button" type="submit" style="width:200px">Cadastrar</button>
            </div>
        </div>
    </form>


    <div id="modal" class="ui modal">
        <div class="header">Pré Visualização</div>

        <div class="ui card" style="max-width: 100%; min-width: 100%;">
            <div class="content">
                <div class="ui items">
                    <div class="item">
                        <div style="width: 600px;" class="ui medium image">
                            <img style="width: 600px; height: 300px; border-top-left-radius: 10px;border-bottom-left-radius:10px" src="" id="visualizarImagem">
                        </div>

                        <div class="content" style="padding: 1rem;border:solid black 1px; color:black !important;border-top-right-radius: 10px;border-bottom-right-radius:10px">
                            <div class="ui center aligned container">
                                <div id="header"></div>
                            </div>

                            <div class="ui justified container">
                                <div id="descricao" class="description">

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
@endsection

@section('js')
    <script>


        function preVisualizacao() {

            var nome_evento = $('#nome_s_evento').val();
            var local_s_sala = $('#local_s_sala').val();
            var cidade_s = $('#cidade_s').val();
            var data_s_inicio = $('#data_s_inicio').val();
            var data_s_fim = $('#data_s_fim').val();
            var hora_s_inicio = $('#hora_s_inicio').val();
            var hora_s_fim = $('#hora_s_fim').val();
            var tipo_s = $('#tipo_s').val();
            var valor_s = $('#valor_s').val();
            var vagas_s = $('#vagas_s').val();
            var evento_s = $('#evento_s').val();
            var texto_s = $('#texto_s').val();

            $('#modal').modal('show');
            $('#header').html('<h1>' + nome_evento + '</h1>');
            $('#descricao').html('<p>'+'<i class="big green calendar check outline icon"></i>' + local_s_sala + ' - ' + cidade_s + '</p>' + 
                '<p>' + '<i class="big green clock outline icon"></i>' + hora_s_inicio + ' h' +
                '<p>' + 'Tipo:' + tipo_s + '</p>'  +
                '<p>' + 'Valor: '+'R$' + valor_s + '</p>' + '<br><br><br>');

            if (texto_s.length > 200) {
                $('#extra').html('<button style="width:100%;border-radius:10px" onClick="verTexto()" class="ui basic button"><i class="sticky note outline icon"></i>Ver Detalhes</button>');
            } else {
                $('#extra').html(texto_s);
            }

        }
        function previewPessoa() {
            $("#upload").change(function () {
                const file = $(this)[0].files[0]
                const fileReader = new FileReader()

                 fileReader.onloadend = function () {
                     $("#visualizarImagem").attr('src', fileReader.result)
                 } 
                fileReader.readAsDataURL(file)
            });
        }

        function verTexto() {
            var texto = $('#texto_s').val();
            $('#modal_2').modal('show');
            $('#texto_g').html(texto);
        }
    </script>

@endsection

