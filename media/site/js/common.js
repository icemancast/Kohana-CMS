var liveNow = '<div id="online-live"><span>CBC Online</span><a href="http://www.communitybible.com/online" target="_blank">Live Now</a></div>';

function getTimer() {
	
	$.ajaxSetup({ cache: false});
	
	$.get('http://localhost/communitybible/cron/timer', function(timer) {
		
		if(timer < 1) {
			$('#online-service').html(liveNow);
		} else {

			$('#online-service').countdown({
				until: +timer, 
				format: 'HMS',
				layout: '<div id="timer-head">Online Service Starts in:</div>'+
						'<div id="timer">'+
						'<div id="timer-values">'+
						'<a href="http://www.communitybible.com/online" target="_blank" class="timer-link">'+
							'<div id="timer-hours" class="timer-numbers">{hnn}</div>'+
							'<div id="timer-minutes" class="timer-numbers">{mnn}</div>'+
							'<div id="timer-seconds" class="timer-numbers">{snn}</div>'+
						'</a>'+
						'</div>'+
						'<div id="timer-labels">'+
							'<div id="timer-label-hours" class="timer-labels">hours</div>'+
							'<div id="timer-label-minutes" class="timer-labels">mins</div>'+
							'<div id="timer-label-seconds" class="timer-labels">secs</div>'+
						'</div>'+
					'</div>',
				expiryText: liveNow
			});
		}
		
	});
	
}

$(document).ready(
	
	function() {
		
		// Timer on front page
		getTimer();
		setInterval("getTimer()", 30000);
		
		// Front web banners or web tiles, speed is transition
		$('.banner-slideshow').cycle({
			speed: 1000,
			timeout: 2000
		});
		
		$('.photo-slideshow').cycle({
			speed: 1000,
			timeout:  2500
		});
		
		// $('.left-nav-content').hide();
		// $('.show-hide').show();
		
		$('.show-hide').mouseover(function(){
			
			var currentselected = $('#' + $(this).attr('data-leftnav'));
			$(this).addClass('current');
			$(currentselected).addClass('current');
			
			$(currentselected).slideToggle();
			$('.current').mouseout(function(){
				$('.current').removeClass('current');
			//	$(currentselected).slideToggle();
			});
			
		});
		
		$('input').toggleValue();
		
	}	
	
);