@extends('Index.index')

@section('css')
<style>
    /* #content-radius-image{
        width: 600px;
        height: 300px;
        border-radius: 10px;
    }
    #content-radius-card{
        padding: 1rem;
        border:solid black 1px;
        color:red !important;
        border-radius: 10px;
    } */
</style>
@endsection
    @section('body')
    <h1 style="color:green" id="relogio"></h1>
    <h1>Eventos Realizados</h1>
    <div class="line" style="border: 1px dashed grey "></div>
    <br>
    <form class="ui form">
        <div class="three fields">
            <div class="eight wide field">
                <label for="PesquisarEventos">Pesquisar Eventos:</label>
                <input id="pesquisar" type="text" placeholder="Pesquisar Eventos">
            </div>
            <div class="four wide field">
                <label for="Cidade">Cidade:</label>
                <input id="cidade" type="text" placeholder="Cidade">
            </div>
            <div class="four wide field">
                <label for="Local">Local:</label>
                <input id="local" type="text" placeholder="Local">
            </div>
        </div>

        <div class="five fields">
            <div class="four wide field">
                <div class="ui calendar" id="cal">
                    <label>Data Ínicio:</label>
                    <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input id="data_inicio" type="date"  placeholder="Data Ínicio">
                    </div>

                </div>
            </div>
            <div class="four wide field">
                <div class="ui calendar" id="cal">
                    <label>Data Fim:</label>
                    <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input id="data_fim" type="date"  placeholder="Data Fim">
                    </div>
                </div>
            </div>
            <div class="four wide field">
                <label>Tipo:</label>
                <input id="tipo" type="text" placeholder="Tipo">
            </div>
            <div class="four wide field">
                <label>Valor:</label>
                <input id="valor" type="text" placeholder="Valor">
            </div>
            <div class="four wide field">
                    <label>Filtro:</label>
                <select style="margin-top: 100px;" id="card_filtro" class="ui dropdown">
                    <option value="1">Próximos</option>
                    <option value="2">Realizados</option>
                </select>
            </div>
        </div>

        

    </form>
    
      

        <button onClick="funcaoClicar()" class="ui grey button" id="btn-buscar"><i class="search icon"></i>Buscar</button>
          
        <button onClick="funcaoLimpar()" class="ui red button" id="btn-limpar"><i class="trash alternate outline icon"></i>Limpar</button>
       
                
            
       
    <br>
    <br>

    <div class="ui card" style="max-width: 100%; min-width: 100%;">

        <div class="content" id="card_imagem" style="padding: 0;">

        </div>

        <br>
    </div>

    <div id="mini" class="ui tiny modal">
            <i class="close icon"></i>
        <div style="color:green; text-align:center" class="header">Descrição</div>
        <div class="content">
            <p id="desc"></p>
        </div>
    </div>
    
    @endsection

    <!-- <div class="ui floating labeled icon dropdown button">
        <i class="dropdown icon"></i>
        <span class="text">Menu</span>
        <div class="menu">
            <div class="item">
                <i class="left dropdown icon"></i>
                <span class="text">Left</span>
                <div class="left menu">
                    <div class="item">1</div>
                    <div class="item">2</div>
                    <div class="item">3</div>
                </div>
            </div>
            <div class="item">
                <i class="dropdown icon"></i>
                <span class="text">Right</span>
                <div class="right menu">
                    <div class="item">1</div>
                    <div class="item">2</div>
                    <div class="item">3</div>
                </div>
            </div>
        </div>
    </div> -->
    @section('js')
    <script>

        $(document).ready(function () {
            $('.ui.dropdown').dropdown();
        });
        // function texto() {
        //     $('#desc').html();
        //     var x = $('#input_desc').val();
        //     $('#desc').html(x);
        //     $('#mini').modal('show');
        // }

        // function aaa() {
        //     var a = $('#sdf').val();
        //     alert(a);
        // }


    </script>
    @endsection
</body>

</html>