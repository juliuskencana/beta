
</body>
<script src="<?= assets_url('js/jquery-1.11.1.min.js'); ?>"></script>
<script src="<?= assets_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?= assets_url('js/masonry.pkgd.js'); ?>"></script>
<script>
	var container = document.querySelector('#container');
	var msnry = new Masonry( container, {
	  // options...
	  itemSelector: '.item',
	  columnWidth: 200
	});
	
	$('[data-toggle="tooltip"]').tooltip({'placement': 'left'});
</script>
</html>