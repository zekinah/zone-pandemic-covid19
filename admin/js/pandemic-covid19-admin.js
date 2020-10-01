(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();
	$( window ).load(function() {
		$('#tbl-countries').DataTable();

		$('.txt-shortcode').on("click", function () {
			$(this).focus();
			$(this).select();
		});
	});

})( jQuery );
