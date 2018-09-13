var etapaCount = 1;
var count = 1;
var atividadeCount = 1;
var contador = 0;
var vazio = false;

$(document).ready(function () {
  if ((window.location.href.indexOf('cadastro-choice') > -1) || (window.location.href.indexOf('cadastro-PF') > -1) || (window.location.href.indexOf('cadastro-PJ') > -1)) {
    $('.loginM').addClass('hide');
    $('.divisor').addClass('hide');
  }

  // Javascript to enable link to tab
  var url = document.location.toString();
  if (url.match('#')) {
    $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  }

  // Change hash for page-reload
  $('.nav-tabs a').on('shown.bs.tab', function (e) {
  	window.location.hash = e.target.hash;
  });

  // Fix hash links
  $('a[href^="#"]').click(function (e) {
  	var url = this.href;
  	if (url.match('#')) {
  		$('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
  	}
  });

  // Fix popstate
  window.addEventListener('popstate', function(e) {
  	$('.nav-tabs a[href="' + location.hash + '"]').tab('show');
  });


  /*$(document).ready(function () {
	$("#sidebar").mCustomScrollbar({
		theme: "minimal"
	});

	$('#sidebarCollapse').on('click', function () {
		$('#sidebar, #content').toggleClass('active');
		$('.collapse.in').toggleClass('in');
		$('a[aria-expanded=true]').attr('aria-expanded', 'false');
	});

	console.log(window.location.href.indexOf("localhost"));
	console.log('1');
});*/

/*------------ Formulário de Projeto -----------------*/

$('#edita-projeto').on('click', function(){
  $('#nome-projeto').attr('contenteditable', 'true');
  $('#nome-projeto').focus();
});

$('#nome-projeto').on('blur', function(){
  $('#nome-projeto').attr('contenteditable', 'false');
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
            e.preventDefault();//previne o usuario de quebrar linhas no nome do projeto
            return false;
          }
          $(this).next().next().val($(this).html());
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

$('#accordion').on('click', '.nome-etapa', function(){
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

$('#accordion').on('click', '.add-passo', function(){
  atividadeCount = atividadeCount +1;
  $(this).before('<div class=\'col-md-4\'> <label data-value=\''+etapaCount+'.'+atividadeCount+'\'>Atividade #'+atividadeCount+'</label> <input type=\'text\'name=\'campo['+etapaCount+']['+atividadeCount+']\'> </div>');
});

$('#accordion').on('click', '.rmv-passo', function(){
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
});

$('#nome-projeto').on('keyup', function(){
  $('#nomeproj').val($('#nome-projeto').text());
});

$('#precoest').on('keyup', function(e){
  if (/\D/g.test(this.value)){
    	// Filter non-digits from input value.
    	this.value = this.value.replace(/\D/g, '');
    }
  });

/*------------ Formulário de Cadastro Conta -----------------*/

$('.submit_btn').on('click', function(e){
  $('#arquivo').val($('#imgInp').val().replace(/C:\\fakepath\\/i, ''));
});

$('.submit_btn').click(function(event) {
    // For Loop To Count Blank Inputs
    $('.regform input').each(function(){
      if ($(this).val() == ''){
        var id = $(this).attr('id');

        if(id == 'telcom' || id == 'tel' || id == 'site' || id == 'insta' || id == 'fb'){
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
      // $('#modalErro .modal-body p').append('Preencha todos os campos');
      $('#modalErro').modal('show');
      event.preventDefault();
    }

  });

/*---------------------------------------------------------*/

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
});