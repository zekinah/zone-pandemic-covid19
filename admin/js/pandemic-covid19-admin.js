(function( $ ) {
	'use strict';
	$ = jQuery.noConflict();
	$( window ).load(function() {
		$('#tbl-countries').DataTable();
	});

})( jQuery );
