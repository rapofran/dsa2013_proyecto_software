	$(document).ready(
		function(){
			$('#noticias_rotativas').innerfade({
				animationtype: 'slide',
				speed: 750,
				timeout: 3000,
				type: 'random',
				containerheight: '1em'
			});
		}
	);
