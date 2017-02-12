
 $(function(){
	
	var menu = $('#site-navbar'),
		pos = menu.offset();
		
		$(window).scroll(function(){
			if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('col-md-12')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('col-md-12').addClass('col-md-8').fadeIn('fast');
				});
			} else if($(this).scrollTop() <= pos.top && menu.hasClass('col-md-8')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('col-md-8').addClass('col-md-12').fadeIn('fast');
				});
			}
		});

});

$(function(){
	
	var menu = $('.navbar-static-top'),
		pos = menu.offset();
		
		$(window).scroll(function(){
			if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('menus')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('menus').addClass('fixed-top').fadeIn('fast');
				});
			} else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed-top')){
				menu.fadeOut('fast', function(){
					$(this).removeClass('fixed-top').addClass('menus').fadeIn('fast');
				});
			}
		});

});
