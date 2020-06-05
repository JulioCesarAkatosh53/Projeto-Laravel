
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Próximos Eventos</title>
</head>
<body>


        <h1>Próximos Eventos</h1>
        <div class="line" style="border: 1px dashed grey "></div>
        <br>
        <form class="ui form">
        <div class="three fields">
        <div class="eight wide field">
                <label for="PesquisarEventos">Pesquisar Eventos:</label>
                <input type="text" placeholder="Pesquisar Eventos">
            </div>

            <div class="four wide field">
                <label for="Cidade">Cidade:</label>
                <input type="text" placeholder="Cidade">
            </div>

            <div class="four wide field">
                <label for="Local" >Local:</label>
                <input type="text" placeholder="Local">
            </div>    
        </div>
        <div class="ui form">
            <div class="four fields" >
                <div class="four wide field">
                    <label>Data Ínicio:</label>
                    <input type="text" placeholder="Data Ínicio">
                </div>
                <div class="four wide field">
                    <label>Data Fim:</label>
                    <input type="text" placeholder="Data Fim">
                </div>
                <div class="four wide field">
                    <label>Tipo:</label>
                    <input type="text" placeholder="Tipo">
                </div>
                <div class="four wide field">
                    <label>Valor:</label>
                    <input type="text" placeholder="Valor">
                </div>
            </div>
        </div>
        </form>



</div>

<br>
<br>



<div class="ui card" style="max-width: 100%; min-width: 100%;">
        @foreach($evento as $e) 
        @if( date("d/m/Y", strtotime($e->data_fim)) <= $data_atual)
        
        @elseif(date("d/m/Y", strtotime($e->data_inicio)) <= $data_atual || date("d/m/Y", strtotime($e->data_fim)) > $data_atual)
        <div class="content" id="card" style="padding: 0;">
                <div class="ui items">
                    <div class="item">
                        <div style="width: 600px;" class="ui medium image">
                            <img style="width: 600px; height: 300px;border-radius: 10px" src="/storage/{{$e->arquivo}}">
                        </div>
                        <div class="content" style="padding: 1rem;border:solid black 1px; color:black !important;">
                            <div class="ui center aligned container">
                                <div class="header">
                                    <h1 style="color:black !important">{{$e->nome_evento}}</h1>
                                </div>
                            </div>
    
                            <div class="description">
                                <p>{{$e->local_sala}} - {{$e->cidade}}</p>
                                <p><i class="clock outline icon"></i> {{date("H:i", strtotime($e->hora_inicio))}} h</p>
                                <p>Tipo: {{$e->tipo}}</p>
                                <p>Valor: R${{$e->valor}}</p>
                            </div>
                            <div class="ui center aligned container">
                                <div id="texto" class="description">
                                    {{$e->data_inicio}} -
                                    {{$e->data_fim}}
                                @if(strlen($e->descricao) > 200)
                                <br><br><br><br>
                                <button id="btn" class="ui basic button">Ver Detalhes</button>
                                @else
                                {{$e->descricao}}
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
            <div style="display: none;">{{$e->descricao}}</div>
        @endforeach
    <br>
    <br>

    <div id="Modal_proximoE" class="ui mini modal">
  <div class="header">Descrição</div>
    <div class="description">
    </div>
  </div>



</div>

<script>

    $('btn').click(function(){
        console.log('ahagdhasgvd');

    });



</script>



</body>
</html>






