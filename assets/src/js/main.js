(function($, window, document, undefined) {
  "use strict";

  $(document).ready(function() {
    var $cache = {
      window: $(window),
      document: $(document),
      html: $("html").eq(0),
      body: $("body").eq(0),
      jsToTop: $(".js-to-top"),
      jsScrollTo: $(".js-scroll-to"),
      siteWrap: $(".site-wrap"),
      siteNav: $(".site-nav")
    };

    var IM = {
      init: function() {
        this.utils.init();
      },
      utils: {
        init: function() {
          this.scrollTo();
          this.dataCss();
          this.scrollMagic();
          this.mobileMenu();
          this.siteNavSticky();
          this.galleryBuilder();
					this.swiperSetup();
					this.homeProcedure();
					this.homepageGalleryToggle();
					this.sectionSelect();
					this.rollingCount();
					this.openAnim();
					this.easeScroll();
				},
				easeScroll: function(){
					var $window = $(window);
					var scrollTime = .8;
					var scrollDistance = 100;
					$window.on("mousewheel DOMMouseScroll", function(event){
				
						var delta = event.originalEvent.wheelDelta/120 || -event.originalEvent.detail/3;
						var scrollTop = $window.scrollTop();
						var finalScroll = scrollTop - parseInt(delta*scrollDistance);
				
						TweenMax.to($window, scrollTime, {
							scrollTo : { y: finalScroll, autoKill:true },
								ease: Power1.easeOut,
								overwrite: 5							
							});
				
					});
				},
				openAnim: function(){
					if ($(".block--page_header h4, .block--hero h1").length > 0) {
            var tl = new TimelineLite(),
              text = $(".block--page_header h4, .block--hero h1"),
              split = new SplitText(".block--page_header h4,.block--hero h1", {
                type: "chars,words"
              }),
              chars = split.chars,
              centerIndex = Math.floor(chars.length / 2),
              i;
            tl.to(".block--page_header h4,.block--hero h1", 0, {
              opacity: 1
            });
            for (i = 0; i < chars.length; i++) {
              tl.from(
                chars[i],
                1.8,
                {
                  x: (i - centerIndex) * 40,
                  opacity: 0,
                  ease: Power2.easeOut
                },
                i * 0.1
              );
            }
          }
					
          //Open page animations
          var openTween = new TimelineMax();
          openTween.to(".site-nav .logo img", 0.6, { opacity: 1, left: 0 });
          openTween.to(".site-nav .address--nav", 0.3, { opacity: 1 });
          openTween.to(".site-nav .phone--nav", 0.3, { opacity: 1 });
          openTween.to(".site-nav .social-icons", 0.3, { opacity: 1 });
          openTween.to(".site-nav .button--area", 0.3, { opacity: 1 });
          openTween.staggerTo(
						".site-nav .menu > li",
            0.3,
            {
							opacity: 1,
              top: 0
            },
            0.1
						);
					openTween.to(".block--page_header .btn--teal, .block--hero .btn--teal", 0.5, { opacity: 1, top: 0 }, 2);

					
					},
				rollingCount: function(){
					$(".number--item").each(createEffect);
					$(".review--item").each(reviewEffect);
					
					function createEffect(i, element) {
						var controller = new ScrollMagic.Controller();
						var tl3 = new TimelineMax({ paused: false });
						var number = $(this).find(".number");
						var NewVal = number.attr('data-number');
						var game = {score:0};

						tl3.to(game, 2, {score:NewVal, roundProps:"score", onUpdate:updateHandler, ease:Linear.easeNone});

						var scene = new ScrollMagic.Scene({
							triggerElement: ".block--homepage_doctor",
							triggerHook: 0.5
						})
							.setTween(tl3)
							.addTo(controller);

						function updateHandler() {
							number.html(game.score);
						}
					}
					function reviewEffect(i, element) {
						var controller = new ScrollMagic.Controller();
						var tl4 = new TimelineMax({ paused: false });
						var number = $(this).find(".number");
						var NewVal = number.attr('data-number');
						var game = {score:0};

						tl4.to(game, 2, {score:NewVal, roundProps:"score", onUpdate:updateHandler, ease:Linear.easeNone});

						var scene2 = new ScrollMagic.Scene({
							triggerElement: ".block--homepage_testimonial",
							triggerHook: 0.3
						})
							.setTween(tl4)
							.addTo(controller);

						function updateHandler() {
							number.html(game.score);
						}
					}

				},
				sectionSelect: function(){
					$('.section--titles .item').on('click', function(){
						$('.section--titles .item').removeClass('active');
						$('.block--content').removeClass('active');
						$(this).addClass('active');
						var $block = $(this).attr('data-count');
						$('.'+$block).addClass('active');
					});
				},
				homepageGalleryToggle: function(){
					$('h3[data-toggle="gallery--toggle"]').on('click', function(){
						var $toggle = $(this).attr('data-name');
						$('.block--homepage_gallery .image__holder').removeClass('active');
						$('.term--area .child--terms').removeClass('active');
						$(this).next('.child--terms').addClass('active');
						$('[data-toggle="'+$toggle+'"]').addClass('active');
						console.log('[data-toggle="'+$toggle+'"]')
					});
				},
				homeProcedure: function() {
					var $featured_image = $('.procedure--item.active').attr('data-image');
					$('.procedure--select-area .image__holder img').attr('src', $featured_image);

					
						$('.procedure--item').on('click',function(e){
							e.preventDefault();
							$('.procedure--item').removeClass('active');
							var $featured_image = $(this).attr('data-image');
							$('.procedure--select-area .image__holder img').attr('src', $featured_image);
							$(this).toggleClass('active');
						});
					
				},
        siteNavSticky: function() {
					if ($cache.window.scrollTop() > 0) {
						$cache.siteNav.addClass("sticky");
					} 
          $cache.window.scroll(function() {
            if ($cache.window.scrollTop() > 0) {
              $cache.siteNav.addClass("sticky");
            } else {
              $cache.siteNav.removeClass("sticky");
            }
          });
        },
        mobileMenu: function() {
					$('a:not(.tinvwl_add_to_wishlist_button)').each(function() {
						var a = new RegExp('/' + window.location.host + '/');
						if(!a.test(this.href)) {
								$(this).click(function(event) {
										event.preventDefault();
										event.stopPropagation();
										window.open(this.href, '_blank');
								});
						}
				 });
				 
					$(".bottom-nav .menu .sub-menu li.menu-item-has-children > a").after(
						'<i class="fal fa-long-arrow-right"></i>'
					);

          /* stop jump to top if link is # */
          $('a[href="#"]').on("click", function(e) {
            e.preventDefault();
          });

          $(".menu__mobile .menu li.menu-item-has-children > a").after(
            '<i class="fal fa-angle-down"></i>'
          );

          $(".menu__mobile .menu li.menu-item-has-children i").on(
            "click",
            function() {
              $(this)
                .closest(".menu-item-has-children")
                .find("> .sub-menu")
                .toggleClass("active");
            }
          );

          var tl = new TimelineLite({ paused: true, reversed: true });

          tl.to(".menu__mobile", 0.1, {
            zIndex: 9999,
            opacity: 1,
            left: 0
          });
          tl.staggerTo(
            ".menu__mobile .menu > li",
            0.25,
            { left: 0, opacity: 1 },
            0.1
          );

          $('[data-toggle="menu"]').on("click", function() {
            tl.reversed() ? tl.play() : tl.reverse();
          });
        },
        scrollTo: function() {
          // Animate the scroll to top
          $cache.jsToTop.on("click", function(e) {
            e.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, 300);
          });

          // Animate scroll to id
          $cache.jsScrollTo.on("click", function(e) {
            e.preventDefault();
            var href = $(this).attr("href"),
              scrollPoint = $(href).offset();
            $("html, body").animate({ scrollTop: scrollPoint.top }, 300);
          });
        },
        dataCss: function() {
          // background images
          $("[data-bg-image]").each(function() {
            var $this = $(this);
            $this.css({
              "background-image": 'url("' + $this.data("bgImage") + '")'
            });
          });

          // background colors
          $("[data-bg-color]").each(function() {
            var $this = $(this);
            $this.css({
              "background-color": $this.data("bgColor")
            });
          });
        },
        scrollMagic: function() {
          var $blocks = $cache.siteWrap.children(".block"),
            controller = new ScrollMagic.Controller();

          $blocks.each(function(i, item) {
            new ScrollMagic.Scene({
              triggerElement: item,
              duration: item.outerHeight,
              triggerHook: 0.9,
              reverse: false
            })
              .on("enter", function() {
                var $current = $blocks.eq(i);
                // Example usage

                var tl = new TimelineMax({
                  paused: true,
                  force3D: true,
                  ease: Circ.easeInOut
                });
                var tl2 = new TimelineMax({
                  paused: true,
                  force3D: true,
                  ease: Circ.easeInOut
								});
								
                tl.to($current.find(".fade-in-left"), 0.6, {
                  autoAlpha: 1,
                  left: 0
                });
                tl.to($current.find(".fade-in-right"), 0.6, {
                  autoAlpha: 1,
                  right: 0
                });
                tl.to($current.find(".eapps-instagram-feed"), 0.5, {
                  autoAlpha: 1
                });
                tl.staggerTo($current.find(".gallery--item img"), 0.5, {
									autoAlpha: 1,
									left:0
                }, .3);
                tl.staggerTo($current.find(".section--titles .item"), 0.5, {
									autoAlpha: 1,
									top:0
                }, .3);
                tl2.to($current.find(".fade-in"), 0.6, {
									autoAlpha: 1
                });
                tl2.to($current.find(".fade-in-bottom"), 0.6, {
									autoAlpha: 1,
                  bottom: 0
                });
								tl2.staggerTo($current.find(".term--area"), 0.5, {
									autoAlpha: 1,
									top:0
								}, .3);
                tl.play();
                tl2.play();
              })
              // Comment "addIndicators()" in/out to use
              // .addIndicators()
              .addTo(controller);
          });
        },
        galleryBuilder: function() {
					var settings_thumb = {
						spaceBetween: 30,
						slidesPerView: 3,
						loop: false,
						watchSlidesVisibility: true,
						watchSlidesProgress: true,
					};
				/*	var gallery_thumb_settings = {
						spaceBetween: 15,
						slidesPerView: 1,
						loop: true,
						watchSlidesVisibility: true,
						watchSlidesProgress: true,
						navigation: {
							nextEl: '.tax-next',
							prevEl: '.tax-prev',
						},
						pagination: {
							el: '.swiper-pagination',
							clickable: true,
							renderBullet: function (index, className) {
								return '<span class="' + className + '">' + (index + 1) + '</span>';
							},
						},
					}
					var galleryTaxThumbs = new Swiper('.gallery--tax-thumbs', gallery_thumb_settings);*/

					var gallery_settings = {
						spaceBetween: 10,
						pagination: {
							el: '.gallery--nav .swiper-pagination',
							type: 'fraction',
						},
						navigation: {
							nextEl: '.gallery--nav .swiper-button-next',
							prevEl: '.gallery--nav .swiper-button-prev',
						},
					};

					var galleryTax = new Swiper('.gallery--tax-container', gallery_settings);

					$('.filters select').on('change',function(){
						if($('.swiper--hidden > .swiper-slide').length > 0){
							$('.swiper--hidden > .swiper-slide').each( function (){
								galleryTax.appendSlide($(this));	
							});
							galleryTax.destroy(false, true);
							galleryTax = new Swiper('.gallery--tax-container', gallery_settings);
						}
						var selected_doc = $('#doctors').children("option:selected").val();
						var selected_age = $('#age').children("option:selected").val();
						var selected_gender = $('#gender').children("option:selected").val();
						
						if( (selected_doc !== 'all') || (selected_age !== 'all') || (selected_gender !== 'all')){
							
								$('.gallery-count').each(function() {
									if ( 
										( ( $(this).data('doc') !== selected_doc ) && ( selected_doc !== 'all') ) || 
										
										( ( $(this).data('age') !== selected_age ) && ( selected_age !== 'all') ) || 
										
										( ( $(this).data('gender') !== selected_gender ) && ( selected_gender !== 'all') )
									)
									{
										$('.swiper--hidden').append($(this).parent());
									}
								});
	
								galleryTax.destroy(false, true);
								galleryTax = new Swiper('.gallery--tax-container', gallery_settings);
							}else{
								$('.swiper--hidden > .swiper-slide').each( function (){
									galleryTax.appendSlide($(this));	
								});
								galleryTax.destroy(false, true);
								galleryTax = new Swiper('.gallery--tax-container', gallery_settings);
							}
					});
        },
        swiperSetup: function() {
          var gallery_block = new Swiper(".swiper__gallery", {
            slidesPerView: 1,
            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
					});
          var shop_block = new Swiper(".shop--slider", {
            slidesPerView: 1,
            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
					});
          var event_block = new Swiper(".event-swiper", {
            slidesPerView: 1,
            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
					});
          var testimonial_block = new Swiper(".testimonial-container", {
						slidesPerView: 'auto',
						centeredSlides: true,
						autoplay: true,
            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
					});
					var testimonial_block = new Swiper(".testimonial--single-container", {
						slidesPerView: 1,
						centeredSlides: true,
            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
					});
					var testimonial_home = new Swiper(".testimonial--slider", {
						slidesPerView: 1,
						loop: true,
						autoplay: {
							delay: 4500,
							disableOnInteraction: false,
						},
					});
					
					var team_swiper = new Swiper(".team--scroller", {
						slidesPerView: 1,
						centeredSlides: true,
            loop: true,
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev"
            }
					});
					
					var galleryThumbs = new Swiper('.gallery-thumb', {
						spaceBetween: 30,
						slidesPerView: 3,
						loop: false,
						watchSlidesVisibility: true,
						watchSlidesProgress: true,
					});

					var galleryTop = new Swiper('.gallery-container', {
						spaceBetween: 10,
						loop:false,
						navigation: {
							nextEl: '.swiper-button-next',
							prevEl: '.swiper-button-prev',
						},
					});

					
					var gal_count = $('.gallery-count').length;
					for (var i = 0; i < gal_count; i++) {
						var name = '.gallery-container-' + i;
						var thumb_name = '.gallery-thumb-' + i;
						var galleryThumb = new Swiper(thumb_name, {
									spaceBetween: 30,
									slidesPerView: 3,
									loop: false,
									watchSlidesVisibility: true,
									watchSlidesProgress: true,
						});
						var galleryTop = new Swiper(name, {
							spaceBetween: 10,
							loop:false,
							thumbs: {
								swiper: galleryThumb,
							},
						});
					}
        }
      }
    };

    IM.init();
  });
})(jQuery, window, document);
