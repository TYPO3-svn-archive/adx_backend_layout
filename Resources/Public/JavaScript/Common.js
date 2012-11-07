
(function($){
	$(document).ready(function(){

		/**
		 * To top animation
		 */
		$('.toTop.bottom a, a.toTop').click(function(){
			$('html, body').animate( { scrollTop: 0 }, 'slow');
			$(this).blur();
			return false;
		});

	});
})(jQuery);