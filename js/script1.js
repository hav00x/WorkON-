var etapaCount = 1;
var count = 1;
var atividadeCount = 1;
var contador = 0;
var vazio = false;
var projetos = 0;
var data_erro = 0;

$(document).ready(function(){
  if ((window.location.href.indexOf('cadastro-choice') > -1) || (window.location.href.indexOf('cadastro-PF') > -1) || (window.location.href.indexOf('cadastro-PJ') > -1)) {
    $('.loginM').addClass('hide');
    $('.divisor').addClass('hide');
  }

  $('[data-toggle="tooltip"]').tooltip(); 

$('#perfil-data').load('carrega_infoperfil.php'); // pega o perfil do usuário
$('#img-perfil').load('carrega_infoperfil.php',
  {foto:1});

/*------------ Pegando projeto e atualizando projeto -----------------*/

if (window.location.href.indexOf('projetos')){
  $(window).load('qtd_projetosbd.php', function(data){
    projetos = data;
    if(projetos <= 0 || projetos < 7){
      $('#navega-pag').remove();
    }
  });
}

$('#ficha-projeto').load('carrega_projetosbd.php', {url:window.location.href}, function(){// carrega preview dos projetos

  if(projetos >= 6){
    var pg = Math.ceil(projetos/6); // sempre arredonda o número pra cima
    for(var i = pg; i > 0; i--){
      $('#anterior').after('<li><a href="#corpo-proj" class="pag-projetos" id="pag-'+i+'">'+ i +'</a></li>');
    }
  }

});

$('#corpo-proj').on('click', '.pag-projetos', function(){
  selecao = this.id;
  $('#ficha-projeto').load('carrega_projetosbd.php', {qtdprojetos:selecao});
});

$('#corpo-proj').on('click', '#primeira-pag', function(){
  $('#ficha-projeto').load('carrega_projetosbd.php');
});

$('#corpo-proj').on('click', '#ultima-pag', function(){
  selecao = $(this).parent().prev().children().attr('id');
  $('#ficha-projeto').load('carrega_projetosbd.php', {qtdprojetos:selecao});
});

$('#ficha-projeto').on('click', '.btn-maisdeta', function(){
  var num_form = $(this).attr('data-value');
  $('#atualizando').val($(this).prev().val());

  $.post('abre_projetosbd.php', // carrega primeiro o projeto
    $('#form'+num_form).serialize(),
    function(data){
      $('#nome-projetoupd').text(data['nome_projeto']);
      $('#nomeprojupd').val(data['nome_projeto']);
      $('#nomecliupd').val(data['nome_cliente']);
      $('#tipoproupd').val(data['tipo_projeto']);
      $('#datainiupd').val(data['data_inicio']);
      $('#dataentupd').val(data['data_entrega']);
      $('#nomecliupd').val(data['nome_cliente']);
      $('#precoestupd').val(data['preco_estabelecido']);
      $('#descriupd').val(data['descri_projeto']);
      if(data['andamento'] == 1){
        $('#andamento').prop('checked', true);
      } else{
        $('#andamento').prop('checked', false);
      }
      
    }, 'json');

  $.post('abre_projetosbd.php', // depois as etapas
   $('#form'+num_form).serialize() + '&check=' + 1,
   function(data){
    $('#accordionupd').contents().remove();
    $('#accordionupd').append(data);
    $('#accordionupd').append("<button type='button' class='button -regular add-etapa' style='float: right;'>Mais etapas</button> <button type='button' class='button -regular rmv-etapa' style='float: right;'>Menos etapas</button>");
    count = $('#accordionupd').children('div').last().data('value');

    $.post('abre_projetosbd.php', // e os passos
      $('#form'+num_form).serialize() + '&check=' + 2,
      function(data){
        var numEtapas = $('.cntetap').length;
        for(i = 0; i < numEtapas; i++){
          var k = i+1;
          for(var index in data) {
            if(data[index][i] != undefined){
              $('#btnc'+k+'upd').before(data[index][i]);
            }
          }
        }

      }, 'json');
  });

  $('.nome-edit-etp').each(function(){
    $(this).attr('value', $(this).before().before().text());
  });
  $('#modalEdit').modal('show');

});

$('#btn-atencao').on('click', function(){
  $('#divalerta').removeClass('hide');
  setTimeout(function(){
    $('#divalerta').addClass('hide');
  }, 5000);
});

$('#btn-cancelar').on('click', function(){
  $('#divalerta').addClass('hide');
});

$('#btn-excluiproj').on('click', function(e){
  e.preventDefault();
  $.post('atualiza_projetosbd.php',
    $('#atualiza-projetos').serialize()  + '&delete=' + 1,
    function(data){
      $('#ficha-projeto').contents().remove();
      $('#ficha-projeto').load('carrega_projetosbd.php');
      $('#modal_edit_close').click();
      setTimeout(function(){
        $('#ficha-projeto').prepend('<div class="col-md-12" style="border-bottom: 1px solid #DFDCDC;" id="att-sucesso"><h3>'+data+'</h3></div>');
      }, 50);
    });
});

$('#accordionupd').on('click', '.rmv-etapa', function(){
  if($(this).prev().prev().children().first().attr('id').indexOf("upd") >= 0){
    if(count <= 1){
      return false;
    }else{
      $.post('remove_etp_passobd.php',
        $('#atualiza-projetos').serialize(),
        function(data){
         console.log(data);
       });
    }
  }
});

$('#accordionupd').on('click', '.rmv-passo', function(){
  console.log($(this).closest('div.panel-heading').find('a'));
});

/*------------ Formulário de Projeto -----------------*/

$('.edita-projeto').on('click', function(){
  $(this).prev().attr('contenteditable', 'true');
  $(this).prev().focus();
});

$('#nome-projeto, #nome-projetoupd').on('blur', function(){
  $(this).attr('contenteditable', 'false');
});

$('#accordion, #accordionupd').on('click', '.edita-txt', function(){
 $(this).prev().attr('contenteditable', 'true');
 $(this).prev().focus();
 $(this).prev().attr('data-toggle', '');
});      

$('#nome-projeto, #nome-projetoupd').on('keydown', function(e){
  if(e.which === 13){
    e.preventDefault();//previne o usuario de quebrar linhas no nome do projeto
    return false;
  }
});

$('#accordion, #accordionupd').on('keydown', '.nome-etapa', function(e){
  if(e.which === 13){
    e.preventDefault();//previne o usuario de quebrar linhas na etapa do projeto
    return false;
  } 
  $(this).next().next().attr('value', $(this).text());
});

$('#accordion, #accordionupd').on('keyup', '.nome-etapa', function(e){
  if(e.which === 13){
     e.preventDefault();//previne o usuario de quebrar linhas na etapa do projeto
     return false;
   } 
   $(this).next().next().attr('value', $(this).text());
 });

$('#accordion, #accordionupd').on('blur', '.nome-etapa', function(){
 $(this).attr('contenteditable', 'false');
 $(this).attr('data-toggle', 'collapse');
});

$('#accordion, #accordionupd').on('click', '.add-etapa', function(){
 count = count + 1;
 $(this).before("<div class='panel panel-default'><div class='panel-heading' role='tab' id='heading"+count+"'> <h4 class='panel-title'> <div> <a class='nome-etapa collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseZ"+count+"' aria-expanded='false' aria-controls='collapseZ"+count+"' data-value='0' id='nome-etapa"+count+"'>Etapa #"+count+"</a> <button type='button' id='edita-etapa"+count+"' class='btn-edicao edita-txt'> <img class='img-etapa-edicao' src='img/edit-file.png'> </button>  <input class='nomeetp' id='input-etapa"+count+"' type='text' name='nome_etapa["+count+"]' style='display: none;'> </div> </h4> </div> <div id='collapseZ"+count+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+count+"'> <div class='acordion-st row' id='acordion"+count+"'> <div class='col-md-4'> <label data-value='"+count+".1'>Atividade #1</label> <input type='text' name='campo["+count+"][1]'> </div> <button type='button' id='btnc"+count+"' class='btn-edicao add-passo' style='float: right;'> <img class='img-edicao' src='img/add-circular-button.png'> </button> <button type='button' id='btnr"+count+"' class='btn-edicao rmv-passo' style='float: right;'> <img class='img-edicao' src='img/minus.png'> </button> </div> </div> </div>");
 $('#input-etapa'+count).val($('#nome-etapa'+count).text());
});

$('#accordion, #accordionupd').on('click', '.rmv-etapa', function(){
 if(count <= 1){
  return false;
}else{
  count = count -1;
  $(this).prev().prev().remove();
}
});

$('#accordion, #accordionupd').on('click', '.nome-etapa', function(){
 setTimeout(function(){
            $('.nome-etapa').each(function(){ //checando se as etapas estão com o data-value certo pela classe collapsed, e se não, arruma eles, pois o codigo abaixo não funciona quando a etapa é fechada automaticamente
              if($(this).hasClass('collapsed')){
                $(this).attr('data-value', 0);
              }
            });
          }, 350);
    if($(this).attr('data-value') == 1){ //reseta o contador toda vez que uma etapa é fechada manualmente
     $(this).attr('data-value', 0);
     atividadeCount = 1;
    } else{ //grava o numero da atividade pelo data-value da ultima etapa
     $(this).attr('data-value', 1);
     var pegaId = $(this).attr('aria-controls');
     var guardaEtapa = pegaId.split('Z');
     etapaCount = parseInt(guardaEtapa[1]);
     pegaId = $('#'+pegaId).children().first().attr('id');
     pegaId = $('#'+pegaId).children().last().attr('id');
     var ultimoInput = $('#'+pegaId).prev().prev().children().first().attr('data-value');
     var retorno = ultimoInput.split('.');
     atividadeCount = parseInt(retorno[1]);
   }
 });

$('#accordion, #accordionupd').on('click', '.add-passo', function(){
  atividadeCount = atividadeCount +1;
  $(this).before('<div class=\'col-md-4\'> <label data-value=\''+etapaCount+'.'+atividadeCount+'\'>Atividade #'+atividadeCount+'</label> <input type=\'text\'name=\'campo['+etapaCount+']['+atividadeCount+']\'> </div>');
});

$('#accordion, #accordionupd').on('click', '.rmv-passo', function(){
  if(atividadeCount <= 1){
    return false;
  } else{
    atividadeCount = atividadeCount -1;
    $(this).prev().prev().remove();
  }
});

$('#criaproj').on('click', function(){
  $('#nomeproj').val($('#nome-projeto').text());
  $('#input-etapa1').val($('#nome-etapa1').html());
  holder = $('#accordion').children('div').last().children().attr('id').split('g');
  count = parseInt(holder[1]);
});

$('#nome-projeto').on('keyup', function(){
  $('#nomeproj').val($('#nome-projeto').text());
});

$('#nome-projetoupd').on('keyup', function(){
  $('#nomeprojupd').val($('#nome-projetoupd').text());
});

$('#precoest').on('keyup', function(e){
  if (/\D/g.test(this.value)){
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});

$('.submit-projatt').on('click', function(){
  var input = this;
  input.disabled = true;
  setTimeout(function() {
   input.disabled = false;
 }, 3000);
  $('#atualiza-projetos input').each(function(){
    if ($(this).val() == ''){
      vazio = true;
      contador = contador +1;
    }

    if (contador == 0){
      vazio = false;
    }

  });

  $('#atualiza-projetos textarea').each(function(){
    if ($(this).val() == ''){
      vazio = true;
      contador = contador +1;
    }

    if (contador == 0){
      vazio = false;
    }

  });

  if(contador != 0){

    $('#modalErroProj .modal-body p').remove();

    if(vazio == true){
      $('#modalErroProj .modal-body').append('<p>Preencha todos os campos</p><br>');
    }

    var dataent = $('#dataentupd').val();
    var dataini = $('#datainiupd').val();

    if(dataini > dataent){
      $('#modalErroProj .modal-body').append('<p>Data de início não pode vir depois da entrega</p><br>');
    }

    $('#modalCadastro').modal('hide');
    setTimeout(function(){
      $('#modalErroProj').modal('show');
    }, 200);

  }

  contador = 0;

});


$('.submit-proj').on('click', function(){
  var input = this;
  input.disabled = true;
  setTimeout(function() {
   input.disabled = false;
 }, 3000);
  $('#formcadastro input').each(function(){
    if ($(this).val() == ''){
      vazio = true;
      contador = contador +1;
    }

    if (contador == 0){
      vazio = false;
    }

  });

  $('#formcadastro textarea').each(function(){
    if ($(this).val() == ''){
      vazio = true;
      contador = contador +1;
    }

    if (contador == 0){
      vazio = false;
    }

  });

  if(contador != 0){

    $('#modalErroProj .modal-body p').remove();

    if(vazio == true){
      $('#modalErroProj .modal-body').append('<p>Preencha todos os campos</p><br>');
    }

    var dataent = $('#dataent').val();
    var dataini = $('#dataini').val();

    if(dataini > dataent){
      $('#modalErroProj .modal-body').append('<p>Data de início não pode vir depois da entrega</p><br>');
    }

    $('#modalCadastro').modal('hide');
    setTimeout(function(){
      $('#modalErroProj').modal('show');
    }, 200);

  }

  contador = 0;

});

$('#btn-enviaproj').on('click', function(e){
  e.preventDefault();
  $.post('cadastrarprojeto_bd.php',
    $('#formcadastro').serialize(),
    function(data){
      $('#ficha-projeto').contents().remove();
      $('#ficha-projeto').load('carrega_projetosbd.php');
      $('#modal-close').click();
      setTimeout(function(){
        $('#ficha-projeto').prepend('<div class="col-md-12" style="border-bottom: 1px solid #DFDCDC;" id="att-sucesso"><h3>'+data+'</h3></div>');
      }, 50);
    });
});

$('#btn-attproj').on('click', function(e){
  e.preventDefault();
  $.post('atualiza_projetosbd.php',
    $('#atualiza-projetos').serialize(),
    function(data){
      $('#ficha-projeto').contents().remove();
      $('#ficha-projeto').load('carrega_projetosbd.php');
      $('#modal_edit_close').click();
      setTimeout(function(){
        $('#ficha-projeto').prepend('<div class="col-md-12" style="border-bottom: 1px solid #DFDCDC;" id="att-sucesso"><h3>'+data+'</h3></div>');
      }, 50);
    });
});

/*------------ Formulário de Cadastro Conta -----------------*/

$('.submit_btn').on('click', function(e){
  $('#arquivo').val($('#imgInp').val().replace(/C:\\fakepath\\/i, ''));
});

$('.submit_btn').click(function(event) {
  if(document.getElementById('checkcli').checked || document.getElementById('checkdev').checked){

    if(document.getElementById('checkcli').checked){

      $('.regform input').each(function(){
        if ($(this).val() == ''){
          var id = $(this).attr('id');
          var checando = checando + $(this).attr('id');
          if(id == 'telcom' || id == 'tel' || id == 'site' || id == 'insta' || id == 'fb' || id == 'segmento' || id == 'checkdev'){
            contador = contador;
          } else{
            vazio = true;
            contador = contador +1;
          }
        }

        if (contador == 0){
          vazio = false;
        }

      });

      contador = 0;

      if(vazio == true){
        $('<p>Preencha todos os campos</p>').replaceAll('#modalErro .modal-body p');
        $('#modalErro').modal('show');
        event.preventDefault();
      }

    } else if(document.getElementById('checkdev').checked){

      $('.regform input').each(function(){
        if ($(this).val() == ''){
          var id = $(this).attr('id');

          if(id == 'telcom' || id == 'tel' || id == 'site' || id == 'insta' || id == 'fb' || id == 'checkcli'){
            contador = contador;
          } else{
            vazio = true;
            contador = contador +1;
          }
        }

        if (contador == 0){
          vazio = false;
        }

      });

      $('.regform textarea').each(function(){
        if ($(this).val() == ''){
          vazio = true;
          contador = contador +1;
        }

        if (contador == 0){
          vazio = false;
        }

      });

      contador = 0;

      if(vazio == true){
        $('<p>Preencha todos os campos</p>').replaceAll('#modalErro .modal-body p');
        $('#modalErro').modal('show');
        event.preventDefault();
      }

    }
  } else{
   $('<p>Preencha todos os campos</p>').replaceAll('#modalErro .modal-body p');
   $('#modalErro').modal('show');
   event.preventDefault();
 }
});

$('.radiobtncad').on('click', function(){
  var valor_radio = $(this).val();
  if(valor_radio == 1){
    $('#segunda-parte').addClass('hide');
  } else if(valor_radio == 2){
    $('#segunda-parte').removeClass('hide');
  }
});

  $('.next_btn').click(function() { // Function Runs On NEXT Button Click
    $(this).closest('fieldset').next().fadeIn('slow');
    $(this).closest('fieldset').css({
      'display': 'none'
    });
    // Adding Class Active To Show Steps Forward;
    $('.active1').next().addClass('active1');
  });
  $('.pre_btn').click(function() { // Function Runs On PREVIOUS Button Click
    $(this).closest('fieldset').prev().fadeIn('slow');
    $(this).closest('fieldset').css({
      'display': 'none'
    });
    // Removing Class Active To Show Steps Backward;
    $('.active1:last').removeClass('active1');
  });

  //preview da imagem
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', e.target.result);
        $('#img-suaconta').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
    }
  }

  $('#imgInp').change(function() {
    readURL(this);
  });

  // Impede o usuário de dar enter para enviar o formulário
  $('.pagcadastro input').keypress(function (e) {
    var code = null;
    code = (e.keyCode ? e.keyCode : e.which);
    return (code == 13) ? false : true;
  });

  function limpa_formulário_cep() {
    // Limpa valores do formulário de cep.
    $('#rua').val('');
    $('#bairro').val('');
    $('#cidade').val('');
    $('#uf').val('');
    //$("#ibge").val("");
  }

  //Quando o campo cep perde o foco.
  $('#cep').blur(function() {

    //Nova variável "cep" somente com dígitos.
    var cep = $(this).val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != '') {

      //Expressão regular para validar o CEP.
      var validacep = /^[0-9]{8}$/;

      //Valida o formato do CEP.
      if(validacep.test(cep)) {

        //Preenche os campos com "..." enquanto consulta webservice.
        $('#rua').val('...');
        $('#bairro').val('...');
        $('#cidade').val('...');
        $('#uf').val('...');
        //$("#ibge").val("...");

        //Consulta o webservice viacep.com.br/
        $.getJSON('https://viacep.com.br/ws/'+ cep +'/json/?callback=?', function(dados) {

         if (!('erro' in dados)) {
            //Atualiza os campos com os valores da consulta.
            $('#rua').val(dados.logradouro);
            $('#bairro').val(dados.bairro);
            $('#cidade').val(dados.localidade);
            $('#uf').val(dados.uf);
            //$("#ibge").val(dados.ibge);
          } //end if.
          else {
            //CEP pesquisado não foi encontrado.
            limpa_formulário_cep();
            alert('CEP não encontrado.');
          }
        });
      } //end if.
      else {
        //cep é inválido.
        limpa_formulário_cep();
        $('#modalErro .modal-body p').append('Formato de CEP inválido');
        $('#modalErro').modal('show');
      }
    } //end if.
    else {
      //cep sem valor, limpa formulário.
      limpa_formulário_cep();
    }
  });

  /*-------------------------------- Sua Conta --------------------------------*/

  if(window.location.href.indexOf('http://localhost/root2/sua_conta.php') > -1){
    $.post('carrega_contabd.php', function(data){

      var array = JSON.parse(data);

      if(array['pjoupf'] == 'pf'){
        $('#img-suaconta').attr('src', array.foto);
        $('#arquivo').val(array.foto);
        $('#nome-suaconta').val(array.nome);
        $('#sobrenome-suaconta').val(array.sobrenome);
        $('#cel-suaconta').val(array.cel);
        $('#fixo-suaconta').val(array.fixo);
        $('#comercial-suaconta').val(array.comercial);
        $('#descri-suaconta').val(array.descr);
        $('#fb-suaconta').val(array.facebook);
        $('#insta-suaconta').val(array.instagram);
        $('#site-suaconta').val(array.site);
        $("#segmento").val(array.segmento);
      } else if(array['pjoupf'] == 'pj'){
        $('#img-suaconta').attr('src', array.foto);
        $('#arquivo').val(array.foto);
        $('#nome-suaconta').val(array.nomefant);
        $('#sobrenome-suaconta').val(array.razaosoci);
        $('#cel-suaconta').val(array.cel);
        $('#fixo-suaconta').val(array.fixo);
        $('#comercial-suaconta').val(array.comercial);
        $('#descri-suaconta').val(array.descr);
        $('#fb-suaconta').val(array.facebook);
        $('#insta-suaconta').val(array.instagram);
        $('#site-suaconta').val(array.site);
        $("#segmento").val(array.segmento);
      }
    });
  }

  function isJson(item) {
    item = typeof item !== "string"
    ? JSON.stringify(item)
    : item;

    try {
      item = JSON.parse(item);
    } catch (e) {
      return false;
    }

    if (typeof item === "object" && item !== null) {
      return true;
    }

    return false;
  }

  $('#attdadousu').on('click', function(){
    $('#arquivo').val($('#imgInp').val().replace(/C:\\fakepath\\/i, ''));
  });

  $('.radiopriv').on('click', function(){
    var valor_radio = $(this).val();
    if(valor_radio == 1){
      $('#divemail').removeClass('hide');
      $('#divsenha').addClass('hide');
    } else if(valor_radio == 2){
      $('#divsenha').removeClass('hide');
      $('#divemail').addClass('hide');
    }
  });

  $('#attsenha').on('click', function(e){
    e.preventDefault();

    $.post('att_priv.php', $('#formpass').serialize() + '&senha=' +1, function(data){
      var resposta = JSON.parse(data);
      if(resposta.campo_vazio || resposta.senha_dif || resposta.senha_errada){
        $('#modalErroSuaContaPriv .modal-body p').remove();
        if(resposta.campo_vazio){
          $('#modalErroSuaContaPriv .modal-body').append('<p>Preencha todos os campos corretamente</p>');
        }
        if(resposta.senha_dif){
          $('#modalErroSuaContaPriv .modal-body').append('<p>A senha nova e a confirmação estão diferentes, preencha-as iguais</p>');
        }
        if(resposta.senha_errada){
          $('#modalErroSuaContaPriv .modal-body').append('<p>Sua senha antiga foi preenchida errada, preencha-a novamente</p>');
        }
        $('#modalErroSuaContaPriv').modal('show');
      } if(resposta.sucesso){
        $('#status-senha').removeClass('hide');
        setTimeout(function(){
          $('#status-senha').addClass('hide');
        }, 10000);
      }
    });
  });

  $('#attemail').on('click', function(e){
    e.preventDefault();
    $.post('att_priv.php', $('#formemail').serialize() + '&email=' +1, function(data){
      var resposta = JSON.parse(data);
      if(resposta.campo_vazio || resposta.email_dif || resposta.email_invalido || resposta.email_existe || resposta.email_errado){
        $('#modalErroSuaContaPriv .modal-body p').remove();
        if(resposta.campo_vazio){
          $('#modalErroSuaContaPriv .modal-body').append('<p>Preencha todos os campos corretamente</p>');
        }
        if(resposta.email_dif){
          $('#modalErroSuaContaPriv .modal-body').append('<p>O email novo e a confirmação estão diferentes, preencha-os iguais</p>');
        }
        if(resposta.email_invalido){
          $('#modalErroSuaContaPriv .modal-body').append('<p>Use um email válido para preenchimento</p>');
        }
        if(resposta.email_existe){
          $('#modalErroSuaContaPriv .modal-body').append('<p>Esse email já está em uso, use outro email</p>');
        }
        if(resposta.email_errado){
          $('#modalErroSuaContaPriv .modal-body').append('<p>Seu email antigo foi preenchido errado, preencha-o novamente</p>');
        }
        $('#modalErroSuaContaPriv').modal('show');
      } if(resposta.sucesso){
        $('#status-email').removeClass('hide');
        setTimeout(function(){
          $('#status-email').addClass('hide');
        }, 10000);
      }
    })
  });

  /*-------------------------------- Pesquisar --------------------------------*/

  $('#pesquisar-devs').on('click', function(e){
    e.preventDefault();
    $.post('pesquisarbd.php',
     $('#form-pesquisa').serialize(),
     function(data){
      if(data){
        $('#perfil-d').contents().remove();
        $('#perfil-d').append(data);
        $('#resultado-pesq').removeClass('hide');
      }else{
        $('#perfil-d').contents().remove();
        $('#perfil-d').append('<p class="alinha-meio">Não foi encontrado nenhum profissional com esses critérios.</p>');
        $('#resultado-pesq').removeClass('hide');
      }
    });
  });
});

$('#btn-fazpedido').on('click', function(){
  if($('#messagem-dev').hasClass('hide')){
    $('#messagem-dev').removeClass('hide');
  } else{
    $('#messagem-dev').addClass('hide');
  }
});

$('#resultado-pesq').on('click', '.btn-maisdetal', function(e){
  e.preventDefault();
  var email = $(this).prev().val();
  $.post('carrega_infopesquisa.php', {email:email}, function(data){
    var dados = JSON.parse(data);
    if(dados.nome){
      $('#nome-detal').text(dados.nome);
    } else {
      $('#nome-detal').text(dados.nomefant);
    }
    $('#img-detal').attr('src', dados.foto);
    $('#descri-detal').text(dados.descr);
    $('#segmento-detal').text(dados.segmento);
    $('#local-detal').text(dados.estado);
    $('#face-detal').text(dados.facebook);
    $('#insta-detal').text(dados.instagram);
    $('#site-detal').text(dados.site);
    $('#email-msg').val(dados.email);

  });

  $('#btn-mensagem').on('click', function(e){
    e.preventDefault();
    if(!$(this).prev().val()){
      $('#modalErroPerfis .modal-body p').remove();
      $('#modalErroPerfis .modal-body').append('<p>Preencha a mensagem corretamente</p>');
      $('#detalheperf').modal('hide');
      setTimeout(function(){
        $('#modalErroPerfis').modal('show');
      }, 200);
    } else{
      $.post('insere_mensagembd.php',
        $('#form-mensagem').serialize(),
        function(data){
          $('#detalheperf').modal('hide');
          if(data == 'Mensagem enviada com sucesso!'){
            $('#retorno-msg').text(data);
            $('#retorno-msg').css('color', 'green');
            $('#retorno-msg').removeClass('hide');
            setTimeout(function(){
              $('#retorno-msg').addClass('hide');
            }, 10000);
            $('#mensagem-cli').val('');
            $('#messagem-dev').addClass('hide');
          } else{
            $('#retorno-msg').text(data);
            $('#retorno-msg').css('color', 'red');
            $('#retorno-msg').removeClass('hide');
            setTimeout(function(){
              $('#retorno-msg').addClass('hide');
            }, 10000);
            $('#mensagem-cli').val('');
            $('#messagem-dev').addClass('hide');
          }
        });
    }
  });

  $('.erro-msgfechar').on('click', function(){
    setTimeout(function(){
     $('#detalheperf').modal('show');
   }, 350);
  });

});