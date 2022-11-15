$(document).ready(function() {

	$('#cari').hide();

	$('#keyword').on('keyup', function() {
		$('.loading').show();

		// $('#container').load('ajax/players.php?keyword=' + $('#keyword').val() );

		$.get('ajax/players.php?keyword=' + $('#keyword').val(), function($data) {

			$('#container').html($data);
			$('.loading').hide();
		});
	});
});