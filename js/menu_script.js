var ww = document.body.clientWidth;

jQuery(document).ready(function() {
	jQuery(".nav li a").each(function() {
		if (jQuery(this).next().length > 0) {
			jQuery(this).addClass("parent");
			jQuery(this).after( "<span class='parent_span icon icon-triangle-down'>&nbsp;</span>" );
			//$(this).parents('li').children("span").addClass("parent_span icon icon-fontawesome-webfont-8");
		};
	})
	
	jQuery(".toggleMenu").click(function(e) {
		e.preventDefault();
		jQuery(this).toggleClass("active");
		jQuery(".nav").stop(true, false).slideToggle(300);
	});
	adjustMenu();
	
	jQuery(".categories_widget").children("h3").children("span#categories_widget_menu_btn").click(function(){
		jQuery("#categories_widget_menu").stop(true, false).slideToggle(300);
	});
	jQuery(".logo_widget").children("h3").children("span#logo_widget_menu_btn").click(function(){
		jQuery("#logo_widget_list").stop(true, false).slideToggle(300);
	});
});

jQuery(window).bind('resize orientationchange', function($) {
	ww = document.body.clientWidth;
	adjustMenu();
});

var adjustMenu = function() {
	
	if (ww < 992) {
		jQuery(".header_top_left").children("ul").children("li").children("a").hide(300);
		
		jQuery(".toggleMenu").css("display", "inline-block");
		if (!jQuery(".toggleMenu").hasClass("active")) {
			jQuery(".nav").hide();
		} else {
			jQuery(".nav").show();
		}
		jQuery(".nav li").unbind('mouseenter mouseleave');
		jQuery(".nav li span.parent_span").unbind('click').bind('click', function(e) {
			// must be attached to anchor element to prevent bubbling
			//e.preventDefault();
			jQuery(this).parent("li").toggleClass("hover");
			jQuery(this).parent("li").children("ul").slideToggle(300);
			jQuery(this).toggleClass("icon icon-triangle-down");
			jQuery(this).toggleClass("icon icon-triangle-up");
		});
	} 
	else if (ww >= 992) {
		jQuery(".toggleMenu").css("display", "none");
		jQuery(".nav").show();
		jQuery(".nav li").removeClass("hover");
		jQuery(".nav li a").unbind('click');
		
		jQuery(".nav li").unbind('mouseenter').bind('mouseenter', function() {
		 	jQuery(this).addClass('hover');
		});
		jQuery(".nav li").unbind('mouseleave').bind('mouseleave', function() {
		 	jQuery(this).removeClass('hover');
		});
	}
}

