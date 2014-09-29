var SITE = {URL: 'http://localhost/projects/beta/'};
var container = document.querySelector('#container');

	var msnry = new Masonry( container, {
	  // options...
	  itemSelector: '.item',
	  columnWidth: 200
	});
	
	$('[data-toggle="tooltip"]').tooltip({'placement': 'left'});

	$('#photo').change(function(){
		$('#upload').submit();
	});

	$('#cover').change(function(){
		$('#upload').submit();
	});