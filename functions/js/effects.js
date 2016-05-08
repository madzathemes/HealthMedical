/*!
 * jQuery Cookie Plugin v1.4.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2006, 2014 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
	if (typeof define === 'function' && define.amd) {
		// AMD
		define(['jquery'], factory);
	} else if (typeof exports === 'object') {
		// CommonJS
		factory(require('jquery'));
	} else {
		// Browser globals
		factory(jQuery);
	}
}(function ($) {

	var pluses = /\+/g;

	function encode(s) {
		return config.raw ? s : encodeURIComponent(s);
	}

	function decode(s) {
		return config.raw ? s : decodeURIComponent(s);
	}

	function stringifyCookieValue(value) {
		return encode(config.json ? JSON.stringify(value) : String(value));
	}

	function parseCookieValue(s) {
		if (s.indexOf('"') === 0) {
			// This is a quoted cookie as according to RFC2068, unescape...
			s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
		}

		try {
			// Replace server-side written pluses with spaces.
			// If we can't decode the cookie, ignore it, it's unusable.
			// If we can't parse the cookie, ignore it, it's unusable.
			s = decodeURIComponent(s.replace(pluses, ' '));
			return config.json ? JSON.parse(s) : s;
		} catch(e) {}
	}

	function read(s, converter) {
		var value = config.raw ? s : parseCookieValue(s);
		return $.isFunction(converter) ? converter(value) : value;
	}

	var config = $.cookie = function (key, value, options) {

		// Write

		if (arguments.length > 1 && !$.isFunction(value)) {
			options = $.extend({}, config.defaults, options);

			if (typeof options.expires === 'number') {
				var days = options.expires, t = options.expires = new Date();
				t.setTime(+t + days * 864e+5);
			}

			return (document.cookie = [
				encode(key), '=', stringifyCookieValue(value),
				options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
				options.path    ? '; path=' + options.path : '',
				options.domain  ? '; domain=' + options.domain : '',
				options.secure  ? '; secure' : ''
			].join(''));
		}

		// Read

		var result = key ? undefined : {};

		// To prevent the for loop in the first place assign an empty array
		// in case there are no cookies at all. Also prevents odd result when
		// calling $.cookie().
		var cookies = document.cookie ? document.cookie.split('; ') : [];

		for (var i = 0, l = cookies.length; i < l; i++) {
			var parts = cookies[i].split('=');
			var name = decode(parts.shift());
			var cookie = parts.join('=');

			if (key && key === name) {
				// If second argument (value) is a function it's a converter...
				result = read(cookie, value);
				break;
			}

			// Prevent storing a cookie that we couldn't decode.
			if (!key && (cookie = read(cookie)) !== undefined) {
				result[name] = cookie;
			}
		}

		return result;
	};

	config.defaults = {};

	$.removeCookie = function (key, options) {
		if ($.cookie(key) === undefined) {
			return false;
		}

		// Must not alter options, thus extending a fresh object...
		$.cookie(key, '', $.extend({}, options, { expires: -1 }));
		return !$.cookie(key);
	};

}));



jQuery.noConflict();

jQuery(window).load( function() {
            jQuery(document).smoothSlides({
            playTimer: 4000,
            navigation: false,
            pagination: false,
            effect:'zoomIn'
            /* options seperated by commas */
            });
});
  
  
  
  
// if no cookie
jQuery(document).ready(function(){
if (!jQuery.cookie('mt9')) {
	jQuery( ".mt-top-video" ).addClass( "mt-show" );
	jQuery(".close").click(function() {
        jQuery( ".mt-top-video" ).removeClass( "mt-show" );
        var date = new Date();
        date.setTime(date.getTime() + 01 * 05 * 60 * 1000); 
        jQuery.cookie('mt9', true, { expires: date });
         e.preventDefault();
        return false;
    });
}
});

jQuery(document).ready(function(){
	jQuery('.mt-scroll-top i, .mt-scroll-top p').click(function () {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
	});
});

jQuery(document).ready(function(){
	// Cache the Window object
	$window = jQuery(window);
                
   jQuery('div[data-type="mt-parallax-1"]').each(function(){
     var $bgobj = jQuery(this); // assigning the object
                    
      jQuery(window).scroll(function() {
                    
		// Scroll the background at var speed
		// the yPos is a negative value because we're scrolling it UP!								
		var yPos = +($window.scrollTop() / $bgobj.data('speed')); 
		
		// Put together our final background position
		var coords = '50% '+ yPos + 'px'; 

		// Move the background
		$bgobj.css({backgroundPosition: coords});
		
}); // window scroll Ends

 });	

}); 

jQuery(document).ready(function(){
	// Cache the Window object
	$window = jQuery(window);
                
   jQuery('div[data-type="mt-parallax-2"]').each(function(){
     var $bgobj = jQuery(this); // assigning the object
                    
      jQuery(window).scroll(function() {
                    
		// Scroll the background at var speed
		// the yPos is a negative value because we're scrolling it UP!								
		var yPos = -($window.scrollTop() / $bgobj.data('speed')); 
		
		// Put together our final background position
		var coords = '50% '+ yPos + 'px'; 

		// Move the background
		$bgobj.css({backgroundPosition: coords});
		
}); // window scroll Ends

 });	

}); 

        
jQuery(document).ready(function() { jQuery("ul.last-new-shortcode li:nth-child(even)").addClass("second-style"); });

jQuery("iframe").each(function(){
      var ifr_source = jQuery(this).attr('src');
      var wmode = "wmode=transparent";
      if(ifr_source.indexOf('?') != -1) jQuery(this).attr('src',ifr_source+'&'+wmode);
      else jQuery(this).attr('src',ifr_source+'?'+wmode);
});


jQuery(window).load(function() {    

        var theWindow        = jQuery(window),
            $bg              = jQuery("#background"),
            aspectRatio      = $bg.width() / $bg.height();

        function resizeBg() {

                if ( (theWindow.width() / theWindow.height()) < aspectRatio ) {
                    $bg
                        .removeClass()
                        .addClass('bgheight');
                } else {
                    $bg
                        .removeClass()
                        .addClass('bgwidth');
                }

        }

        theWindow.resize(function() {
                resizeBg();
        }).trigger("resize");

});
 
jQuery(document).ready(function() {
    
            jQuery('.portfolio_hover').fadeOut(); 
            
            jQuery('.bee-blog-full-image').children("a").hover(

                function() { jQuery(this).children('.portfolio_hover').fadeIn(); 
                    
                },
            
                function() { jQuery(this).children('.portfolio_hover').fadeOut(); 
                    
                }
            
            );
});

jQuery(document).ready(function() {
	jQuery('ul#filterm a').click(function() {
		jQuery(this).css('outline','none');
		jQuery('ul#filterm .current').removeClass('current');
		jQuery(this).parent().addClass('current');  
		
	});
});


jQuery(document).ready(function() {
    
            jQuery('.portfolio_hover').fadeOut(); 
            jQuery('ul#applications .sorting').children("a").hover(


                function() {  
                
                	jQuery(this).children('.portfolio_hover').fadeIn(); 
                },
            
                function() { jQuery(this).children('.portfolio_hover').fadeOut(); 
                    
                }
            
            );
});

 
jQuery(document).ready(function() {
 
    jQuery('.mt_portfolio_column, .slides li, .entry-page-image-cause').mouseenter(function(e) {
        jQuery(this).children('a').children('span').fadeIn(200);
    }).mouseleave(function(e) {
        jQuery(this).children('a').children('span').fadeOut(200);
        
    });
    
   
});

jQuery(document).ready(function() {
    
    jQuery(window).on("scroll", function() {
        var fromTop = jQuery(window).scrollTop();
        jQuery('body').toggleClass("mt-down", (fromTop > 300));
    });
});

/* SLIDE FOR TITLE */
!function($){$.fn.extend({smoothSlides:function(options){function captionUpdater(){if($(".ss-slide:eq(-2)").attr("title")){var a=$(".ss-slide:eq(-2)").attr("title");$(".ss-caption").html(a).fadeIn(500)}else $(".ss-caption").fadeOut(500,function(){$(".ss-caption").empty()})}function paginateForwards(){var a=$(".ss-current").index()+1,c=$(".ss-paginate a").length;a>=c?($(".ss-current").removeClass("ss-current"),$(".ss-paginate a:first").addClass("ss-current")):($(".ss-current").removeClass("ss-current"),$(".ss-paginate a").eq(a).addClass("ss-current"))}function paginateBackwards(){var a=$(".ss-current").index()+1,b=a-2;$(".ss-paginate a").length,1>=a?($(".ss-current").removeClass("ss-current"),$(".ss-paginate a:last").addClass("ss-current")):($(".ss-current").removeClass("ss-current"),$(".ss-paginate a").eq(b).addClass("ss-current"))}function crossFade(){captionUpdater(),paginateForwards(),$(".ss-slide:last").addClass("notrans").fadeOut("slow",function(){$(this).prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)",opacity:"0"}).show(),$(".ss-slide:first").css({opacity:"1"})})}function zoomIn(){captionUpdater(),paginateForwards(),$(".ss-slide:last").addClass("notrans").fadeOut("slow",function(){$(this).prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"}).show(),$(".ss-slide:last").css({webkitTransform:"scale(1.2)  rotate(2deg)",msTransform:"scale(1.2)  rotate(2deg)",transform:"scale(1.2)  rotate(2deg)"})})}function zoomOut(){captionUpdater(),paginateForwards(),$(".ss-slide:eq(-2)").addClass("notrans").css({webkitTransform:"scale(1.2) rotate(2deg)",msTransform:"scale(1.2) rotate(2deg)",transform:"scale(1.2) rotate(2deg)"}),$(".ss-slide:last").addClass("notrans").fadeOut("slow",function(){$(this).prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"}).show(),$(".ss-slide:last").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"})})}function panRight(){captionUpdater(),paginateForwards(),$(".ss-slide:eq(-2)").addClass("notrans").css({webkitTransform:"scale(1.3) translate(-10%, 0)",msTransform:"scale(1.3) translate(-10%, 0)",transform:"scale(1.3) translate(-10%, 0)"}),$(".ss-slide:last").addClass("notrans").fadeOut("slow",function(){$(this).prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"}).show(),$(".ss-slide:last").removeClass("notrans").css({webkitTransform:"scale(1.3) translate(0,0)",msTransform:"scale(1.3) translate(0,0)",transform:"scale(1.3) translate(0,0)"})})}function panLeft(){captionUpdater(),paginateForwards(),$(".ss-slide:eq(-2)").addClass("notrans").css({webkitTransform:"scale(1.3) translate(10%, 0)",msTransform:"scale(1.3) translate(10%, 0)",transform:"scale(1.3) translate(10%, 0)"}),$(".ss-slide:last").addClass("notrans").fadeOut("slow",function(){$(this).prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"}).show(),$(".ss-slide:last").removeClass("notrans").css({webkitTransform:"scale(1.3) translate(0,0)",msTransform:"scale(1.3) translate(0,0)",transform:"scale(1.3) translate(0,0)"})})}function panUp(){captionUpdater(),paginateForwards(),$(".ss-slide:eq(-2)").addClass("notrans").css({webkitTransform:"scale(1.3) translate(0, 10%)",msTransform:"scale(1.3) translate(0, 10%)",transform:"scale(1.3) translate(0, 10%)"}),$(".ss-slide:last").addClass("notrans").fadeOut("slow",function(){$(this).prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"}).show(),$(".ss-slide:last").removeClass("notrans").css({webkitTransform:"scale(1.3) translate(0,0)",msTransform:"scale(1.3) translate(0,0)",transform:"scale(1.3) translate(0,0)"})})}function panDown(){captionUpdater(),paginateForwards(),$(".ss-slide:eq(-2)").addClass("notrans").css({webkitTransform:"scale(1.3) translate(0, -10%)",msTransform:"scale(1.3) translate(0, -10%)",transform:"scale(1.3) translate(0, -10%)"}),$(".ss-slide:last").addClass("notrans").fadeOut("slow",function(){$(this).prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"}).show(),$(".ss-slide:last").removeClass("notrans").css({webkitTransform:"scale(1.3) translate(0,0)",msTransform:"scale(1.3) translate(0,0)",transform:"scale(1.3) translate(0,0)"})})}var defaults={duration:6e3,autoPlay:"true",effect:"random",effectEasing:"ease-in-out",nextText:" \u25ba",prevText:"\u25c4 ",captions:"true",navigation:"true",pagination:"true",order:"normal"},options=$.extend(defaults,options),convertSeconds=options.duration/1e3-.5;if($(".ss-slide").css({webkitTransition:"all "+convertSeconds+"s "+options.effectEasing,mozTransition:"all "+convertSeconds+"s "+options.effectEasing,msTransition:"all "+convertSeconds+"s "+options.effectEasing,oTransition:"all "+convertSeconds+"s "+options.effectEasing,transition:"all "+convertSeconds+"s "+options.effectEasing}),$(".ss-slide:last").css("position","relative"),$(".ss-slides").wrap('<div class="ss-slides-wrap"></div>'),$.fn.randomize=function(a){return(a?this.find(a):this).parent().each(function(){$(this).children(a).sort(function(){return Math.random()-.5}).detach().appendTo(this)}),this},"true"==options.captions&&$(".ss-slides-wrap").append('<div class="ss-capwrap"><div class="ss-caption"></div></div>'),"true"==options.autoPlay){if($(".ss-slide:last").attr("title")){var caption=$(".ss-slide:last").attr("title");$(".ss-caption").html(caption)}}else if($(".ss-slide:first").attr("title")){var caption=$(".ss-slide:first").attr("title");$(".ss-caption").html(caption)}else $(".ss-caption").hide();if("true"==options.pagination&&($(".ss-slides-wrap").append('<div class="ss-pag-wrap"><div class="ss-paginate"></div></div>'),$(".ss-slide").each(function(){$(".ss-paginate").append('<a href="#"></a>')}),"true"==options.autoPlay?$(".ss-paginate a:last").addClass("ss-current"):$(".ss-paginate a:first").addClass("ss-current")),"true"==options.navigation&&$(".ss-slides-wrap").append('<a href="#" id="ss-prev">'+options.prevText+'</a><a href="#" id="ss-next">'+options.nextText+"</a>"),"normal"==options.order?($(".ss-slide").each(function(){$(this).prependTo(this.parentNode)}),"true"==options.autoPlay&&$(".ss-slide:first").appendTo(".ss-slides")):"random"==options.order?$(".ss-slide").randomize():"reverse"==options.order&&$(".ss-slide:first").appendTo(".ss-slides"),"false"==options.autoPlay);else if("random"==options.effect){var fns=[zoomOut,zoomIn,panRight,panLeft];fns[Math.floor(Math.random()*fns.length)]()}else"false"==options.effect||eval(options.effect+"()");var fn=function(){if("random"==options.effect&&"true"==options.autoPlay){var fns=[zoomOut,zoomIn,panRight,panLeft,panUp,panDown];fns[Math.floor(Math.random()*fns.length)]()}else"false"==options.effect||eval(options.effect+"()")};if("true"==options.autoPlay)var myInterval=setInterval(fn,options.duration);$("#ss-prev, #ss-next, .ss-paginate").hover(function(){clearInterval(myInterval)},function(){myInterval=setInterval(fn,options.duration)});var quickNext=function(){$("#ss-next").off("click"),$(".ss-slide:last").addClass("notrans").fadeOut("250",function(){$(".ss-slide:last").prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)",opacity:"1"}).show(),$("#ss-next").on("click",quickNext)}),captionUpdater(),paginateForwards(),event.preventDefault()};$("#ss-next").on("click",quickNext);var quickPrev=function(){if($("#ss-prev").off("click"),$(".ss-slide:first").attr("title")){var a=$(".ss-slide:first").attr("title");$(".ss-caption").html(a).show()}else $(".ss-caption").empty().hide();paginateBackwards(),$(".ss-slide:first").hide().addClass("notrans").appendTo(".ss-slides").fadeIn(),$("#ss-prev").on("click",quickPrev),event.preventDefault()};$("#ss-prev").on("click",quickPrev),$(document.body).on("click",".ss-paginate a",function(a){var b=$(this).index()+1,c=$(".ss-current").index()+1;if(c>b)for(var d=c-b,e=0;d>e;e++)$(".ss-slide:first").appendTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)"}).show(),$(".ss-current").removeClass(),$(".ss-paginate a").eq(b-1).addClass("ss-current");else if(b>c)for(var d=b-c,e=0;d>e;e++)$(".ss-slide:last").prependTo(".ss-slides").removeClass("notrans").css({webkitTransform:"scale(1) rotate(0deg)",msTransform:"scale(1) rotate(0deg)",transform:"scale(1) rotate(0deg)",display:"none"}).show(),$(".ss-current").removeClass(),$(".ss-paginate a").eq(b-1).addClass("ss-current");if($(".ss-slide:last").attr("title")){var f=$(".ss-slide:last").attr("title");$(".ss-caption").html(f).fadeIn(500)}else $(".ss-caption").fadeOut(500,function(){$(".ss-caption").empty()});a.preventDefault()})}})}(jQuery);