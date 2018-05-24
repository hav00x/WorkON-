$(document).ready(function() {
var count = 0; // To Count Blank Fields
/*------------ Validation Function-----------------*/
$(".submit_btn").click(function(event) {
var input_field = $('.text_field'); // Fetching All Inputs With Same Class Name text_field & An HTML Tag textarea
var text_area = $('textarea');

// For Loop To Count Blank Inputs
for (var i = input_field.length; i > count; i--) {
	if (input_field[i - 1].value == '' || text_area.value == '') {
		count = count + 1;
	} else {
		count = 0;
	}
}
// Notifying Validation
if (count != 0) {
	alert("*All Fields are mandatory*");
	event.preventDefault();
} else {
	return true;
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
// Validating All Input And Textarea Fields
$(".submit_btn").click(function(e) {
	if ($('input').val() == "" || $('textarea').val() == "") {
		alert("*All Fields are mandatory*");
		return false;
	} else {
		return true;
	}
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