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
				},
				homeProcedure: function() {
					var $featured_image = $('.procedure--item.active').attr('data-image');
					$('.procedure--select-area .image__holder img').attr('src', $featured_image);

					$('.procedure--item').on('hover',function(){
						var $featured_image = $(this).attr('data-image');
						$('.procedure--select-area .image__holder img').attr('src', $featured_image);
						$('.procedure--item').removeClass('active');
						$(this).addClass('active');
					});
				},
        siteNavSticky: function() {
          $cache.window.scroll(function() {
            if ($cache.window.scrollTop() > 0) {
              $cache.siteNav.addClass("sticky");
            } else {
              $cache.siteNav.removeClass("sticky");
            }
          });
        },
        mobileMenu: function() {
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
                tl2.to($current.find(".fade-in"), 0.6, {
                  autoAlpha: 1
                });
                tl2.to($current.find(".fade-in-bottom"), 0.6, {
                  autoAlpha: 1,
                  bottom: 0
                });
                tl.play();
                tl2.play();
              })
              // Comment "addIndicators()" in/out to use
              // .addIndicators()
              .addTo(controller);
          });
        },
        galleryBuilder: function() {
          loadmore();
          clickLoadmore();
          clickLightBox();
          $('select[data-toggle="categories"]').on("change", function() {
            var $tax_id = $(this)
              .find(":selected")
              .data("setProcedure");
            console.log($tax_id);
            $("#grid__gallery").fadeOut("slow", function() {
              $.ajax({
                url: im.ajax_url,
                type: "get",
                data: {
                  action: "get_gallery_info",
                  taxid: $tax_id
                },
                success: function(response) {
                  console.log(response);
                  $("#grid__gallery")
                    .empty()
                    .append(response)
                    .fadeIn("slow", function() {
                      loadmore();
                    });
                  clickLoadmore();
                  clickLightBox();
                }
              });
            });
          });

          function loadmore() {
            $('button[data-toggle="load-more"]').fadeIn();
            $(".gallery__item")
              .slice(10, 100)
              .hide();
            if ($(".gallery__item:hidden").length === 0) {
              $('button[data-toggle="load-more"]').fadeOut("slow");
            }
          }

          function clickLoadmore() {
            $('button[data-toggle="load-more"]').on("click", function(e) {
              e.preventDefault();
              $(".gallery__item:hidden")
                .slice(0, 10)
                .slideDown();
              if ($(".gallery__item:hidden").length == 0) {
                $('button[data-toggle="load-more"]').fadeOut("slow");
              }
            });
          }

          function clickLightBox() {
            $('[data-toggle="lightbox"').on("click", function() {
              $(this).addClass("hi");
              $(this)
                .closest(".gallery__item")
                .find(".lightbox--patient")
                .toggleClass("open-lightbox");
            });
          }
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
        }
      }
    };

    IM.init();
  });
})(jQuery, window, document);
