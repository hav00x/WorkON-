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