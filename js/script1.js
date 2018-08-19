var etapaCount = 1;
var count = 1;
var atividadeCount = 1;


$(document).ready(function () {
	if ((window.location.href.indexOf("cadastro-choice") > -1) || (window.location.href.indexOf("cadastro-PF") > -1) || (window.location.href.indexOf("cadastro-PJ") > -1)) {
		$('.loginM').addClass('hide');
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
  window.addEventListener("popstate", function(e) {
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

$('#edita-projeto').on('click', function(){
	$('#nome-projeto').attr('contenteditable', 'true');
	$('#nome-projeto').focus();
});

$('#nome-projeto').on('blur', function(){
	$('#nome-projeto').attr('contenteditable', 'false');
});

$('#accordion').on('click', '.edita-txt', function(){
	$(this).prev().attr('contenteditable', 'true');
	$(this).prev().focus();
	$(this).prev().attr('data-toggle', '');
});      

$('#nome-projeto').on('keydown', function(e){
	if(e.which === 13){
            e.preventDefault();//previne o usuario de quebrar linhas no nome do projeto
            return false;
        }
    });

$('#accordion').on('keydown', '.nome-etapa', function(e){
	if(e.which === 13){
            e.preventDefault();//previne o usuario de quebrar linhas no nome do projeto
            return false;
        }
        $(this).next().next().val($(this).html());
    });

$('#accordion').on('blur', '.nome-etapa', function(){
	$(this).attr('contenteditable', 'false');
	$(this).attr('data-toggle', 'collapse');
});

$('#add-etapa').on('click', function(){
	count = count + 1;
	$('#accordion #add-etapa').before("<div class='panel panel-default'><div class='panel-heading' role='tab' id='heading"+count+"'> <h4 class='panel-title'> <div> <a class='nome-etapa collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseZ"+count+"' aria-expanded='false' aria-controls='collapseZ"+count+"' data-value='0' id='nome-etapa"+count+"'>Etapa #"+count+"</a> <button type='button' id='edita-etapa"+count+"' class='btn-edicao edita-txt'> <img class='img-etapa-edicao' src='img/edit-file.png'> </button>  <input class='nomeetp' id='input-etapa"+count+"' type='text' name='nomeetapa["+count+"]' style='display: none;'> </div> </h4> </div> <div id='collapseZ"+count+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+count+"'> <div class='acordion-st row' id='acordion"+count+"'> <div class='col-md-4'> <label data-value='"+count+".1'>Atividade #1</label> <input type='text' name='campo["+count+"][1]'> </div> <button type='button' id='btnc"+count+"' class='btn-edicao add-passo' style='float: right;'> <img class='img-edicao' src='img/add-circular-button.png'> </button> <button type='button' id='btnr"+count+"' class='btn-edicao rmv-passo' style='float: right;'> <img class='img-edicao' src='img/minus.png'> </button> </div> </div> </div>");
	$('#input-etapa'+count).val($('#nome-etapa'+count).text());
});

$('#rmv-etapa').on('click', function(){
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
          	guardaEtapa = pegaId.split('Z');
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
	$(this).before("<div class='col-md-4'> <label data-value='"+etapaCount+"."+atividadeCount+"'>Atividade #"+atividadeCount+"</label> <input type='text'name='campo["+etapaCount+"]["+atividadeCount+"]'> </div>");
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

$('#testando').on('click', function(){
	$('.nomeetp').each(function(){
		alert($(this).val());
	});
});

});