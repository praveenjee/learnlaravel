var $ = jQuery.noConflict();
var simpleartigo = simpleartigo || {};

(function($){
	"use strict";

	simpleartigo.header = {

		fullScreenMenuSearch: function(){

			var t1 = $("a.artigo-full-screen-search");

			if( t1.length ){

				t1.on("click", function(e){
					e.preventDefault();

					$("div.artigo-theme-container").addClass("main-container-move");
					$("div.artigo-full-screen-search-container").addClass("search-open");

					setTimeout(function(){

						$("div.artigo-full-screen-search-container").find('[name="s"]').focus();
					});
				});
			}

			var t2 = $("div.artigo-full-screen-search-container").find("a.artigo-search-close");

			if( t2.length ) {

				t2.on("click", function(e){

					e.preventDefault();

					$("div.artigo-theme-container").removeClass("main-container-move");
					$("div.artigo-full-screen-search-container").removeClass("search-open");
					$("div.artigo-full-screen-search-container").find('[name="s"]').blur();
					$("div.artigo-full-screen-search-container").find('[name="s"]').val("");					
				});
			}
		},

		fullScreenMenuAuthorBio: function(){

			var t1 = $("a.artigo-full-screen-author");

			if( t1.length ){

				t1.on("click", function(e){
					e.preventDefault();

					$("div.artigo-theme-container").addClass("main-container-move");
					$("div.artigo-full-screen-author-container").addClass("author-open");
				});
			}

			var t2 = $("div.artigo-full-screen-author-container").find("a.artigo-author-close");

			if( t2.length ) {

				t2.on("click", function(e){
					e.preventDefault();
					$("div.artigo-theme-container").removeClass("main-container-move");
					$("div.artigo-full-screen-author-container").removeClass("author-open");
				});
			}
		},

		stickyHeader: function() {

			if( !$('body').hasClass('no-sticky') ) {

				if( $(window).scrollTop() > 0 ) {
					$(".header-main","#artigo-masthead").addClass("sticky");
				} else {
					if( $(".header-main","#artigo-masthead").hasClass("sticky") ) {
						$(".header-main","#artigo-masthead").removeClass("sticky");
					}
				}
			}			
		},
		
		subMenu : function() {
			$( 'nav.main-nav ul li:has(ul)',"#artigo-masthead").addClass('artigo-has-sub-menu');
		},

		responsiveMenu : function() {

			$("#artigo-responsive-menu-trigger","#artigo-masthead").on("click",function(e){
				$("#artigo-responsive-menu-trigger").toggleClass("close");
				$(".main-nav > ul").toggleClass('show');
				return false;
			});
		},
	},

	simpleartigo.ui = {
		init: function() {

			simpleartigo.ui.lightBox();
			simpleartigo.ui.flickrFeeds();
			simpleartigo.ui.twitterTweets();
			simpleartigo.ui.commentForm();
			simpleartigo.ui.gMap();
			simpleartigo.ui.iframeVideo();
			simpleartigo.ui.galleryPostFormat();
			simpleartigo.ui.closeErrorMessage();
		},

		lightBox: function(){

			var gallery = $('[data-lightbox="gallery"]',".artigo-theme-container");

			gallery.length > 0 && gallery.each(function(){
				var ele = $(this);
				ele.magnificPopup({
					delegate: 'a[data-lightbox="gallery-item"]',
					type: "image",
					closeOnContentClick: true,
					closeBtnInside: false,
					image:{ verticalFit: true },
					gallery:{ enabled: true }
				});
			});			
		},

		flickrFeeds: function(){

			var t = $(".artigo-flickr-widget",".artigo-theme-container");
			t.length > 0 && t.each(function(){
				var	t      = $(this).find("div.flickr-widget"),
					id     = t.data("id"),
					count  = t.data("count"),
					size   = t.data("image-size"),
					type   = t.data("type"),
					stream = "photos_public.gne";

				count || ( count = 9 );
				count = parseInt( count, 10);

				"group" == type && (stream = "groups_pool.gne");
				size || ( size = "s" );

				t.jflickrfeed({
					feedapi: stream,
					limit: Number(count),
					qstrings:{ id: id },
					itemTemplate:'<div class="flickr_badge_image"><a href="{{image_b}}" title="{{title}}" data-lightbox="gallery-item"><img src="{{image_s}}" alt="{{title}}" /></a></div>'
				}, function(){
					simpleartigo.ui.lightBox();
				});
			});
		},

		twitterTweets : function(){
			var t = $("ul.artigo-tweets-list",".artigo-theme-container");
			t.length > 0 && t.each(function(){
				var t       = $(this),
					account = t.data('account'),
					limit   = t.data('limit');

				account || ( account = 'envato' );

				limit || ( limit = 1 );
				limit = parseInt(limit, 10);

				var url = "twitter/tweets.php?username="+account+"&limit="+limit;

				$.getJSON(url,function(data){
					t.html( simpleartigo.utils.formatTwitterTweets(data) );
				});
			});
		},		

		commentForm: function() {

			var t = $("form.artigo-contact-form");
			t.length > 0 && t.each(function(){
				var t = $(this);
				t.validate({
					ignore: ".ignore",
					errorPlacement: function( error, element ){},
					/* submitHandler: function(form) {
						$(form).find('.artigo-form-process').fadeIn();
						$(form).ajaxSubmit({
							target: $(form).find('.artigo-contact-form-result'),
							success: function() {
								$(form).find('.artigo-form-process').fadeOut();
								$(form).find(".artigo-form-control").val('');
							}
						});
					} */
				});				
			});
		},
		
		closeErrorMessage: function(){
			var t1 = $(".close");

			if( t1.length ){
				t1.on("click", function(e){
					$(".alert-danger, .alert-success").empty();
					//$(".alert-success").empty();
				});
			}
		},

		gMap: function(){
			var t = $(".artigo-map-holder",".artigo-theme-container");
			t.length > 0 && t.each(function(){
				var ele       	  = $(this),
					width         = ele.data("width"),
					height        = ele.data("height"),
					maptype       = ele.data("maptype"),
					zoom          = ele.data("zoom"),
					address       = ele.data("address"),
					description   = ele.data("description"),
					icon          = ele.data("icon"),
					iconsize      = ele.data("iconsize"),
					popup         = ele.data("popup"),
					pancontrol    = ele.data("pancontrol"),
					zoomcontrol   = ele.data("zoomcontrol"),
					draggable     = ele.data("draggable"),
					scrollwheel   = ele.data("scrollwheel"),
					typecontrol   = ele.data("typecontrol"),
					scalecontrol  = ele.data("scalecontrol"),
					streetcontrol = ele.data("streetcontrol"),
					center        = ele.data("center");

				width || ( width     = '100%' );
				height || ( height   = '500px' );
				maptype || ( maptype = 'roadmap' ); //roadmap, satellite, terrain or hybrid

				zoom || ( zoom = '14' ); //1-19
				zoom = parseInt(zoom, 10);

				address || ( address = '' ); //street, city, country | street, city, country | street, city, country
				description || ( description = '' );
				icon || ( icon = '' );
				iconsize || ( iconsize = '' );
				popup = true == popup ? !0 : !1;
				pancontrol = true == pancontrol ? !0 : !1;
				zoomcontrol = true == zoomcontrol ? !0 : !1;
				draggable = false == draggable ? !1 : !0;
				scrollwheel = true == scrollwheel ? !0 : !1;
				typecontrol = true == typecontrol ? !0 : !1;
				scalecontrol = true == scalecontrol ? !0 : !1;
				streetcontrol = true == streetcontrol ? !0 : !1;
				center || ( center = '' ); // latitude, longitude

				$.post( 'gmap/generatemap.php', { 'config':
					{
						'width' : width,
						'height' : height,
						'maptype' : maptype,
						'zoom' : zoom,
						'address' : address,
						'description' : description,
						'popup' : popup,
						'icon' : icon,
						'iconsize' : iconsize,
						'pancontrol' : pancontrol,
						'zoomcontrol' : zoomcontrol,
						'draggable' : draggable,
						'scrollwheel' : scrollwheel,
						'typecontrol' : typecontrol,
						'scalecontrol' : scalecontrol,
						'streetcontrol' : streetcontrol,
						'center' : center
					},
				}).done(function( result ) {
					ele.html(result);
				});
			});
		},

		gMapResize: function(){
			var t = $(".artigo-map",".artigo-theme-container");
			t.length > 0 && t.each(function(){
				var t   = $(this),
					map = t.data('gmap').gmap;

				 google.maps.event.trigger( map, 'resize' );
				 t.gMap('fixAfterResize');
			});
		},

		iframeVideo : function() {
			var t = $(".artigo-iframe-video-wrap",".artigo-theme-container");
			t.length > 0 && t.each(function(){
				$(this).fitVids();
			});
		},

		galleryPostFormat: function(){
			var t = $(".artigo-blog-item-slideshow-wrap",".artigo-theme-container");
			t.length > 0 && t.each(function(){
				var ele         = t.find(".artigo-blog-item-slideshow"),
					transition  = ele.data("transition"),
					autoplay    = ele.data("autoplay"),
					stoponhover = ele.data("stoponhover"),
					navigation  = t.find(".artigo-blog-item-slideshow-nav");

				transition || ( transition = "fadeUp" ); // fade, backSlide, goDown, fadeUp
				autoplay = false == autoplay ? !1 : !0;
				stoponhover = false == stoponhover ? !1 : !0;

				ele.owlCarousel({
					pagination: false,
					singleItem: true,
					autoHeight: true,
					navigation: navigation,
					autoPlay: autoplay,
					stopOnHover: stoponhover,
					transitionStyle: transition
				});

				navigation.find(".next").on("click", function(){
					ele.trigger('owl.next');
				});

				navigation.find(".prev").on("click",function(){
					ele.trigger('owl.prev');
				});				
			});
		},
	},

	simpleartigo.footer = {

		goToTop: function(){

			$("div#artigo-goto-top a").on("click", function(e){
				e.preventDefault();

        		$("body,html").stop(true).animate({ scrollTop:0 },700);
			});
		}
	},

	simpleartigo.utils = {

        formatTwitterTweets: function( tweets ) {
        	var html = [];
        	for( var i=0; i<tweets.length; i++ ) {
        		var username = tweets[i].user.screen_name;
        		var status = tweets[i].text.replace( /((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g , function(url){
        			return '<a href="'+url+'" target="_blank">'+url+'</a>';
        		}).replace(/\B@([_a-z0-9]+)/ig, function(reply) {
        			return  reply.charAt(0)+'<a href="http://twitter.com/'+reply.substring(1)+'" target="_blank">'+reply.substring(1)+'</a>';
        		});

        		html.push('<li><small><a href="http://twitter.com/'+username+'/statuses/'+tweets[i].id_str+'" target="_blank">'+simpleartigo.utils.formatTwitterTweetTime(tweets[i].created_at)+'</a></small> <span>'+status+'</span> </li>');
        	}

        	return html.join('');
        },

        formatTwitterTweetTime: function( time ) {
        	var values      = time.split(" ");
			var time        = values[1] + " " + values[2] + ", " + values[5] + " " + values[3];
			var parsed_date = Date.parse( time );
			var relative_to = (arguments.length > 1) ? arguments[1] : new Date();
			var delta       = parseInt((relative_to.getTime() - parsed_date) / 1000);

			delta = delta + (relative_to.getTimezoneOffset() * 60);

			if (delta < 60) {
				return 'less than a minute ago';
			} else if(delta < 120) {
				return 'about a minute ago';
			} else if(delta < (60*60)) {
				return (parseInt(delta / 60)).toString() + ' minutes ago';
			} else if(delta < (120*60)) {
				return 'about an hour ago';
			} else if(delta < (24*60*60)) {
				return 'about ' + (parseInt(delta / 3600)).toString() + ' hours ago';
			} else if(delta < (48*60*60)) {
				return '1 day ago';
			} else {
				return (parseInt(delta / 86400)).toString() + ' days ago';
			}
        },        		
	},

	simpleartigo.documentOnReady = {
		init: function() {
			simpleartigo.header.fullScreenMenuSearch();
			simpleartigo.header.fullScreenMenuAuthorBio();
			simpleartigo.header.stickyHeader();
			simpleartigo.ui.init();
			simpleartigo.footer.goToTop();

			simpleartigo.header.responsiveMenu();
			simpleartigo.header.subMenu();

			simpleartigo.documentOnReady.windowscroll();
		},

		windowscroll: function(){
			$(window).on( 'scroll', function(){

				simpleartigo.header.stickyHeader();
			});
		}
	};

	simpleartigo.documentOnLoad = {
		init: function(){
			
			simpleartigo.header.stickyHeader();
		}
	};

	simpleartigo.documentOnResize = {
		init: function(){
			simpleartigo.ui.gMapResize();
		}
	};

	$(document).on( "ready", simpleartigo.documentOnReady.init );
	$(window).on( "load", simpleartigo.documentOnLoad.init );
	$(window).on( "resize" , simpleartigo.documentOnResize.init );		
})(jQuery);