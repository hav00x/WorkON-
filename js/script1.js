$(document).ready(function () {
	if ((window.location.href.indexOf("cadastro-choice") > -1) || (window.location.href.indexOf("cadastro-PF") > -1) || (window.location.href.indexOf("cadastro-PJ") > -1)) {
		$('.loginM').addClass('hide');
	}
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