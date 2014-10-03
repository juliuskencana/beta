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

	$("#alert").hide();
	$('#ootd-post').click(function(){
		var photo = $('#photo-ootd').val();
		if (photo == "") {
			$("#alert").show();
		}else{
			$('#upload-ootd').submit();
		};
	});

	$("#alert-selfie").hide();
	$('#selfie-post').click(function(){
		var photo = $('#photo-selfie').val();
		if (photo == "") {
			$("#alert-selfie").show();
		}else{
			$('#upload-selfie').submit();
		};
	});