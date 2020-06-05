$(document).ready(function() {

    // LIMPA OS INPUTS
    $('#card_filtro').val(1);
    $('#pesquisar').val("");
    $('#cidade').val("");
    $('#local').val("");
    $('#data_inicio').val("");
    $('#data_fim').val("");
    $('#tipo').val("");
    $('#valor').val("");
    // //////////////////////


    // // FILTRO DE CIDADE
    // $('#cidade').keyup(function() {
    //     var cidade = $(this).val();
    //     console.log(cidade);
    //     $.ajax({
    //         url: '/card_cidade',
    //         type: 'GET',
    //         data: {
    //             cidade: cidade
    //         },
    //         success: function(cidade) {
    //             $('#card_imagem').html("");
    //             cidade.forEach(card_1 => {

    //                 $('#card_imagem').append(gerar_card(card_1.arquivo, card_1.local_sala, card_1.nome_evento, card_1.cidade, card_1.valor, card_1.tipo, card_1.descricao, card_1.hora_inicio));

    //             });
    //         }
    //     })
    // })
    // FIM DO FILTRO DE CIDADE


    // FUNÇÃO QUE CHAMA O SELECT
    $('#card_filtro').change(function() {
        funcaoClicar();
        carregar_card();
    });
    carregar_card();
    // $("#btn-buscar").trigger("click");
    // FIM DA FUNÇÃO QUE CHAMA O SELECT

});

// FUNÇÃO PARA FITRO 
// var arrayIds = [];

// $(document).on('blur', 'input:enabled', function() {

//     var id = $(this).attr("id");
//     if ($(this).val() != "") {
//         if (arrayIds.length == 0) {
//             arrayIds.push(id);
//         } else {
//             var boolean = true;
//             for (var i = 0; i < arrayIds.length; i++) {
//                 if (arrayIds[i] == id) {
//                     boolean = false;
//                     break;
//                 } else {
//                     boolean = true;
//                 }
//             }
//             if (boolean) {
//                 arrayIds.push(id);
//             }
//         }
//     }
//     var arrayWithIndex = [];

    
//     for(var i=0; i<arrayIds.length;i++){
//         var valorTeste = $("#"+arrayIds[i]).val();

//         if(valorTeste != ""){
//             arrayWithIndex[arrayIds[i]] = valorTeste;
//             // for(var j=0; j<arrayWithIndex.length; j++){
//             //     console.log(arrayWithIndex);
//             // }
//             console.log(arrayWithIndex);
//         }else{
            
//         }

        
        // for(var j=0; j<arrayWithIndex.length;i++){
            
        // }
        // .push(valorTeste);
        // arrayWithIndex[""+arrayIds[i]] = valorTeste;
        // if(arrayIds[i] == "data_inicio"){
        //     $.ajax({
        //         url: '/card_data_inicio',
        //         type: 'GET',
        //         data: {
        //             valor: arrayIds[i]
        //         },

        //         success: function(data_inicio){
        //             $('#card_imagem').html("");
        //             data_inicio.forEach(card_data =>{
        //             });
        //         }
        //     })
        // }
        // console.log(arrayWithIndex);
//         // console.log(arrayWithIndex[arrayIds[i]]);
//     }

    
    
    

    
// });
// FIM DA FUNÇÃO FILTRO

// FILTRO SELECT
function carregar_card() {
    var filtro = $("#card_filtro").val();
    $.ajax({
        url: '/card_filtro',
        type: 'GET',
        data: {
            filtro: filtro
        },
        success: function(filtro) {
            $('#card_imagem').html("");
            filtro.forEach(card => {

                $('#card_imagem').append(gerar_card(card.id, card.arquivo, card.data_inicio, card.local_sala, card.nome_evento, card.cidade, card.valor, card.tipo, card.descricao, card.hora_inicio));

            });
        }
    });
}
// FIM DO FILTRO SELECT
        
// CARD GERADO NA TELA
function gerar_card(id, arquivo, data_inicio, local_sala, nome_evento, cidade, valor, tipo, descricao, hora_inicio,) {

    if (descricao.length > 200) {
        var card = '<div class="ui items"> <div class="item"><div style="width: 600px;" class="ui medium image"><img style="width: 600px; height: 300px;border-top-left-radius: 10px;border-bottom-left-radius:10px" src="/storage/' + arquivo + '"></div><div class="content" style="padding: 1rem;border:solid black 1px; color:black !important;border-bottom-right-radius: 10px;border-top-right-radius:10px;border-left:dashed 1px"><div class="ui center aligned container"><div class="header"><h1 style="color:black !important">' + nome_evento + '</h1></div></div><div class="description"><p>' +'<i class="big green calendar check outline icon"></i>'+ local_sala + ' - ' + cidade + '</p><p><i class="big green clock outline icon">' + '</i>' + hora_inicio + 'h' + '</p><p>' + 'Tipo:' + tipo + '</p><p>' + 'Valor: R$' + valor + '</p></div><div class="ui center aligned container"><div id="texto" class="description"><br> <button style="width:100%;border-radius:10px" onClick="texto_2('+id+');" class="ui basic button"><i class="sticky note outline icon"></i>Ver Detalhes</button> <br><br>  <button style="width:100%;border-radius:10px"  class="ui green button"><i class="sticky note outline icon"></i>Participar</button> </div></div></div></div></div>';
        // $('#desc').html('');
        // $('#desc').append(descricao);
    } else {
        var card = '<div class="ui items"><div class="item"><div style="width: 600px;" class="ui medium image"><img style="width: 600px; height: 300px;border-top-left-radius: 10px;border-bottom-left-radius:10px" src="/storage/' + arquivo + '"></div><div class="content" style="padding: 1rem;border:solid black 1px; color:black !important;border-bottom-right-radius: 10px;border-top-right-radius:10px; border-left:dashed 1px"><div class="ui center aligned container"><div class="header"><h1 style="color:black !important">' + nome_evento + '</h1></div></div><div class="description"><p>'+'<i class="big green calendar check outline icon"></i>' + local_sala + ' - ' + cidade + '</p><p><i class="big green clock outline icon">' + '</i>' + hora_inicio + 'h' + '</p><p>' + 'Tipo:' + tipo + '</p><p>' + 'Valor: R$' + valor + '</p></div><div class="ui center aligned container"><div id="texto" class="description"> ' + descricao + '<br><br><br><button style="width:100%;border-radius:10px"  class="ui green button"><i class="sticky note outline icon"></i>Participar</button></div></div></div></div></div>';
    }
    

    return card;
}






// FIM DO CARD

// MODAL

function texto_2(id) {
    // console.log(id);
    $.ajax({
        url: '/desc/card',
        type:   'GET',
        data:{
            id : id
        },
        success: function(id){
            id.forEach(desc => {
                $('#desc').html("");
                $('#desc').append(desc.descricao);
                $('#mini').modal('show');
            });
        }
    });
}
// FIM MODAL



function funcaoClicar(){
        var arrayValues = [];
        var count = 0;
        $( "input:enabled" ).each(function( ) {
            arrayValues[count] = $(this).val();
            count++;
          });

          arrayValues[7] = $('#card_filtro').val()
          console.log(arrayValues);

          if(arrayValues[0] == "" && arrayValues[1] == "" && arrayValues[2] == "" && arrayValues[3] == "" && arrayValues[4] == "" && arrayValues[5] == "" && arrayValues[6] == ""){



          }else{


          $.ajax({
                url: '/filtro_card',
                type: 'GET',
                data:{
                    index : arrayValues
                },
                success: function(filtro_card){
                    $('#card_imagem').html("");
                    filtro_card.forEach(cards => {

                        $('#card_imagem').append(gerar_card(cards.id, cards.arquivo, cards.data_inicio, cards.local_sala, cards.nome_evento, cards.cidade, cards.valor, cards.tipo, cards.descricao, cards.hora_inicio));

                    });
                }
          });

        }

}


function funcaoLimpar(){
    // var x = 1;
    // document.getElementById('card_filtro').value = 1;
    $('.ui.dropdown select#card_filtro').dropdown('set selected',1);
    // $('#card_filtro').change(1);
    $('#pesquisar').val("");
    $('#cidade').val("");
    $('#local').val("");
    $('#data_inicio').val("");
    $('#data_fim').val("");
    $('#tipo').val("");
    $('#valor').val("");

    // $('#card_filtro').value = x;

    carregar_card();

}

function relogio(){
    today = new Date();

    h = today.getHours();
    m = today.getMinutes();
    s = today.getSeconds();

     $("#relogio").html(h + ":" + m + ":" + s);

     if(h == 0 && m == 0 && s == 0){

        $.ajax({
            url: '/mudar_stts',
            type: 'GET',
            data:{
                index : index
            },
            success: function(){
           
            }
      });

     }else{

     }
     
     setTimeout( 'relogio()' , 500);
}

$(document).ready(function(){

   relogio();

})



  $('#upload_2').on('change', function() {
    var fileName = $(this)[0].files[0].name;
    $('#inputFile').val(fileName);
  });


