var SITE = {URL: 'http://ayonongkrong.com/beta/'};
// var SITE = {URL: 'http://localhost/projects/beta/'};


	    // $(window).scroll(function () {        	
	    //     if ($(window).scrollTop() == ( $(document).height() - $(window).height())) {
	    //         alert('asd');
	    //     }
	    // });
	//     function loadData() {
	//     	$.ajax({
	// 			type: "post",
	// 			url: SITE.URL + 'social/feed/load_more',
	// 			cache: false,				
	// 			data:'',
	// 			success: function(data){
	//     			console.log(data.create_date)
	// 					$('#content').append(data);
	// 			},
	// 			error: function(){						
	// 				alert('Error while request..');
	// 			}
	// 		 });
	//     }

	//comment textbox enter submit event
	$('input#comment').on('keypress', function(e) {
		if (e.which == 13) {
			e.preventDefault();
			var comment = $(this).val();
			var cpid = $(this).attr('data-cpid');
			var ct = $(this).attr('data-ct');

			$.ajax({
				type: "post",
				url: SITE.URL + 'social/content/comment',
				cache: false,				
				data:'comment='+comment+'&cpid='+cpid+'&ct='+ct,
				success: function(data){
					location.reload();
				},
				error: function(){						
					alert('Error while request..');
				}
			});
	    }
	});

	$('a#like').click(function(e){
		var like_module_id = $(this).attr('data-id');
		var like_module_name = $(this).attr('data-content');
		$.ajax({
			type: "post",
			url: SITE.URL + 'social/content/like',
			cache: false,				
			data:'like_module_id='+like_module_id+'&like_module_name='+like_module_name,
			success: function(data){
				location.reload();
			},
			error: function(){						
				alert('Error while request..');
			}
		});
		e.preventDefault();
	})

	$('a#unlike').click(function(e){
		var like_module_id = $(this).attr('data-id');
		var like_module_name = $(this).attr('data-content');
		$.ajax({
			type: "post",
			url: SITE.URL + 'social/content/unlike',
			cache: false,				
			data:'like_module_id='+like_module_id+'&like_module_name='+like_module_name,
			success: function(data){
				location.reload();
			},
			error: function(){						
				alert('Error while request..');
			}
		});
		e.preventDefault();
	})

	$('div.comment-content').hide();
	var expand = 0;
	$('a#view-all').click(function(e){
		var view_id = $(this).attr('data-view-id');
		var a = $('.comment-content[data-comment-id=' + view_id + ']');
		console.log(view_id)
		if (expand == 0) {
			a.show();
			expand = 1;
		}else{
			a.hide();
			expand = 0;
		};
		e.preventDefault();
	})

	$('[data-toggle="tooltip"]').tooltip({'placement': 'left'});
	$('.my-dropdown').dropdown();
	$('.my-dropdown').tooltip({'placement': 'left'});
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