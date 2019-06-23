$(document).ready(function () {//função para inserir no banco de dados
          $("#formcar").on('submit',function (evento) {
                evento.preventDefault();
                var descri = $("[name = 'descri']").val();
                var marca = $("[name = 'marca']").val();
                var modelo = $("[name = 'modelo']").val();
                var tipov = $("[name = 'tipov']").val();
                var quantp = $("[name = 'quantp']").val();
                var vlvenda = $("[name = 'vlvenda']").val();
                var vlcompra = $("[name = 'vlcompra']").val();
                var dtcompra = $("[name = 'dtcompra']").val();
                var estato = $("[name = 'estato']").val();
                $('#erros').html('CARREGANDO....')
                $.ajax({
                    type: "POST",
                    url: "acoes/insert.php",
                    dataType: "json",
                    data: {
                        'descri': descri,
                        'marca': marca,
                        'modelo': modelo,
                        'tipov': tipov,
                        'quantp': quantp,
                        'vlvenda': vlvenda,
                        'vlcompra': vlcompra,
                        'dtcompra': dtcompra,
                        'estato': estato
                    }

              }).done(function (resposta) {
                  $('#erros').empty();
                   if (resposta.contem_erros) {
                     alert(resposta.mensagens['descri']);
                     alert(resposta.mensagens['marca']);
                     alert(resposta.mensagens['modelo']);
                     alert(resposta.mensagens['tipov']);
                     alert(resposta.mensagens['quantp']);
                     alert(resposta.mensagens['vlvenda']);
                     alert(resposta.mensagens['vlcompra']);
                     alert(resposta.mensagens['dtcompra']);
                     alert(resposta.mensagens['estato']);
                 }else{
                   console.log(resposta.contem_erros);
                    $('#erros').append(resposta.mensagens.sv);
                    location.reload(".carro");//atualiza o contener apos a execução com sucesso

                 }
              })
          $('#formcar').trigger("reset");//apaga os dados do formulario apos o envio
        })
      })
  //fim do insert


  //inicio do select
     function busca(busca) {
          $.ajax({
             type: "POST",
             url: "acoes/select.php",
             dataType: "json",
             data: {//tipo de dado
                 'busca':"busca"//botão pra inicia a ação
             }

  }).done(function (resposta) { //receber a resposta do busca
    console.log('encontrei ' + resposta.quant + ' registros');
  console.log(resposta.busca[0,'0'].id, resposta.busca[0,'0'].descri);
  if(resposta.erros){

    //criação das variaves apos o receber a resposta da pagina select
                 for (let i = 0; i < resposta.quant; i++) {
                          var id = resposta.busca[i]['0']
                          var desc = resposta.busca[i]['1']
                          var mar = resposta.busca[i]['2']
                          var mod = resposta.busca[i]['3']
                          var tpv = resposta.busca[i]['4']
                          var qntp = resposta.busca[i]['5']
                          var vlv = resposta.busca[i]['6']
                          var vlc = resposta.busca[i]['7']
                          var dtc = resposta.busca[i]['8']
                          var st = resposta.busca[i]['9']
                  //criação da tabela para exebição do resultado
                      $('.carro  td.descri').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize   id='des'  value='"+desc+"'>"+desc +'</p></td></tr>')
                      $('.carro  td.marca').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize    id='mar'  value='"+mar+"'>"+mar +'</p></td></tr>')
                      $('.carro  td.modelo').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize   id='mod'  value='"+mod+"'>"+mod +'</p></td></tr>')
                      $('.carro  td.tipov').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize    id='tpv'  value='"+tpv+"'>"+tpv +'</p></td></tr>')
                      $('.carro  td.quantp').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize   id='qnt'  value='"+qntp+"'>"+qntp +'</p></td></tr>')
                      $('.carro  td.vlvenda').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize  id='vlv'  value='"+vlv+"'>"+vlv +'</p></td></tr>')
                      $('.carro  td.vlcompra').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize id='vlc'  value='"+vlc+"'>"+vlc +'</p></td></tr>')
                      $('.carro  td.dtcompra').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize id='dtc'  value='"+dtc+"'>"+dtc +'</p></td></tr>')
                      $('.carro  td.estato').append(" <tr><td  class='col-3 col-md-6'><p class='  text-capitalize   id='st'  value='"+st+"'>"+st +'</p></td></tr>')
                      $('.carro  td.id').append(" <tr><td  class='col-3 col-md-6'><button  class='r btn btn-sm btn-primary nav-link' id='idvalor' type='button' data-toggle='modal' data-target='#atualFormulario' value='"+id+"'>"+"Edit"+'</button></td></tr>')
                      $('.carro  td.ider').append("<tr><td  class='col-3 col-md-6'><button class='del btn btn-sm btn-danger nav-link' type='button' name='idel' value='"+id+"'>"+"Del"+'</button></td></tr>')


                 }


                  //inserir valor do id do edite no input do formulario de atualização
                  //falta termina; nao ta inserirndo todos os campos ; pode apaga isso se quiser
                 var des1 =$("#des").text()
                 var mar1 =$("#mar").text()
                 var mod1 =$("#mod").text()
                 var tpv1 =$("#tpv").text()
                 var qnt1 =$("#qnt").text()
                 var vlv1 =$("#vlv").text()
                 var vlc1 =$("#vlc").text()
                 var dtc1 =$("#dtc").text()
                 var sta1 =$("#st").text()
                 console.log(des1);
                 $('#descri1').   val(des1);
                 $('#marca1').    val(mar1);
                 $('#modelo1').   val(mod1);
                 $('#tipov1').    val(tpv1);
                 $('#quantp1').   val(qnt1);
                 $('#vlvenda1').  val(vlv1);
                 $('#vlcompra1'). val(vlc1);
                 $('#dtcompra1'). val(dtc1);
                 $('#estato1').   val(sta1);
//pode apaga ate aqui ! o resto ta funcionando


//aqui insere os o ID no formulario de atualização
                 $('.r').click('button',function() {
                   var idvl = $(this).val();
                   $('#i1').        val(idvl);

                 })
//aqui finda

                 //deleta via ajax
                 $('.del').click('button',function() {
                   var idel = $(this).val();
                   console.log(idel);
                   $.ajax({
                     url: "acoes/del.php",
                     type: "POST",
                     data : { 'idel': idel },
                     success: function(data)
                     {
                       location.reload(".carro");//atualiza o contener apos a execução com sucesso
                     }
                   });
                 }); // delete close


             }
         })
     }
     busca()


//fim dpo select



//inicio do pesquisa
     $(document).ready(function(){
       $("#form_pesquisa").on('submit',function (evento) {
             evento.preventDefault();
       //Aqui a ativa a imagem de load
       function loading_show(){
   		$('#loading').html("<img src='img/loading.gif'/>").fadeIn('fast');
       }

       //Aqui desativa a imagem de loading
       function loading_hide(){
           $('#loading').fadeOut('fast');
       }

       // aqui a fun��o ajax que busca os dados em outra pagina do tipo html, n�o � json
       function load_dados(valores, page, div)
       {
               $.ajax({
                   type: "POST",
                   url: page,
                   beforeSend: function(){//Chama o loading antes do carregamento
                     loading_show();
           },
                   dataType: "html",
                   data: valores,
                   success: function(msg)
                   {
                       loading_hide();
                       var data = msg;
                 $(div).html(data).fadeIn();
                   }
             });
       }
       //Aqui eu chamo o metodo de load pela primeira vez sem parametros para pode exibir todos
       load_dados(null, 'acoes/pesquisa.php', '#MostraPesq');
       //Aqui uso o evento key up para come�ar a pesquisar, se valor for maior q 0 ele faz a pesquisa
       $('#pesquisaDesc').keyup(function(){
           var valores =  $('#form_pesquisa').serialize()//o serialize retorna uma string pronta para ser enviada
           //pegando o valor do campo #pesquisaDesc
           var $parametro = $(this).val();
           console.log($parametro);
         //  document.write(valores);
           if($parametro.length >= 1)
           {
               load_dados(valores, 'acoes/pesquisa.php', '#MostraPesq');
           }else
           {
               load_dados(null, 'acoes/pesquisa.php', '#MostraPesq');
           }
       });
   	});
   	});
// atualizar cadastro
$(document).ready(function () {

          $("#updatform").on('submit',function (evento) {
                evento.preventDefault();
                var ider = $("[name = 'ider']").val();
                var descricao = $("[name = 'descricao']").val();
                var marcas = $("[name = 'marcas']").val();
                var modelos = $("[name = 'modelos']").val();
                var tipove = $("[name = 'tipove']").val();
                var quantpe = $("[name = 'quantpe']").val();
                var vlvend = $("[name = 'vlvend']").val();
                var vlcompr = $("[name = 'vlcompr']").val();
                var dtcompr = $("[name = 'dtcompr']").val();
                var estat = $("[name = 'estat']").val();
                $('#erros').html('CARREGANDO....')
                $.ajax({
                    type: "POST",
                    url: "acoes/updat.php",
                    dataType: "json",
                    data: {
                        'ider': ider,
                        'descricao': descricao,
                        'marcas': marcas,
                        'modelos': modelos,
                        'tipove': tipove,
                        'quantpe': quantpe,
                        'vlvend': vlvend,
                        'vlcompr': vlcompr,
                        'dtcompr': dtcompr,
                        'estat': estat
                    }

              }).done(function (resposta) {
                  $('#erros').empty();
                 if (resposta.contem_erros) {
                   alert(resposta.mensagens['descricao']);
                     alert(resposta.mensagens['marcas']);
                     alert(resposta.mensagens['modelos']);
                     alert(resposta.mensagens['tipove']);
                     alert(resposta.mensagens['quantpe']);
                     alert(resposta.mensagens['vlvend']);
                     alert(resposta.mensagens['vlcompr']);
                     alert(resposta.mensagens['dtcompr']);
                     alert(resposta.mensagens['estat']);
                 }else{
                   console.log(resposta.contem_erros);
                    $('#erros').append(resposta.mensagens.sv);
                    location.reload(".carro");//atualiza o contener apos a execução com sucesso

                 }
              })
          $('#updatform').trigger("reset");//apaga os campos dos inputs apos o envio da informação
        })
      })
