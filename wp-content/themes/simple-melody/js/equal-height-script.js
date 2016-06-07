(function($) {

	$(document).ready(function() {

		$('.element-height').matchHeight();

		$( document.body ).on( 'post-load', function () {
			$('.element-height').matchHeight();
		});

	});

})(jQuery); //End of ( function( $ ) {
