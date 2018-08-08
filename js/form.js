$(document).ready(function() {
var contador = 0; // To Count Blank Fields
var vazio = false;
/*------------ Validation Function-----------------*/
$(".submit_btn").click(function(event) {
// For Loop To Count Blank Inputs
$('.regform input').each(function(){
	if ($(this).val() == ''){
		var id = $(this).attr('id');

		if(id != 'tel'){ //falta fazer os outros 4 campos, não consegui fazer não sei pq
			console.log(id);
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
alert(contador + ' ' + vazio);
contador = 0;

if(vazio == true){
	$('#modalErro').modal('show');
	event.preventDefault();
}

});
/*---------------------------------------------------------*/
$(".next_btn").click(function() { // Function Runs On NEXT Button Click
	$(this).closest('fieldset').next().fadeIn('slow');
	$(this).closest('fieldset').css({
		'display': 'none'
	});
// Adding Class Active To Show Steps Forward;
$('.active1').next().addClass('active1');
});
$(".pre_btn").click(function() { // Function Runs On PREVIOUS Button Click
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

$("#imgInp").change(function() {
	readURL(this);
});

});