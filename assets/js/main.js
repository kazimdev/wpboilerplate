/**
 * Theme Main Scripts
 * @since 1.0.0
 */
(function ($) {
  "use strict";

  jQuery(document).ready(function ($) {
    // Mega Menu Slider
    var menuSliderOptions = {
      arrows: true,
      loop: true,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 2,
      prevArrow:
        '<div class="prev-arrow"><svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path d="M14.5 17L9.5 12L14.5 7" stroke="#1B0832" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></div>',

      nextArrow:
        '<div class="next-arrow"><svg width="64px" height="64px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="24" height="24" fill="white"></rect> <path d="M9.5 7L14.5 12L9.5 17" stroke="#1B0832" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></div>',

      cssEase: "linear",
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 2,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    };

    $(".mega-menu.desktop .top-level-menu").slick(menuSliderOptions);

    $("#productCategoryTabs").slick(menuSliderOptions);

    $(document).on("click", "#productCategoryTabs.nav .nav-link", function(e){
      $("#productCategoryTabs.nav .nav-link").removeClass("active");
      $(this).addClass("active");
    });

    // Mega Menu Hover
    $(document).on(
      "mouseover",
      ".mega-menu.desktop .top-level-menu .menu-item",
      function (e) {
        var hasMegaMenu = $(this).find(".mega-menu-content").length;

        if (hasMegaMenu) {
          var megaMenuContent = $(this).find(".mega-menu-content").html();

          $(".mega-menu.desktop > .mega-menu-content-holder")
            .html(megaMenuContent)
            .css({
              display: "flex",
            });
        }
      }
    );

    $(document).on("mouseout", ".mega-menu.desktop", function (e) {
      if (!$(this).has(e.relatedTarget).length) {
        $(".mega-menu.desktop > .mega-menu-content-holder")
          .html("")
          .fadeOut(300);
      }
    });

    // Main Mobile Navigation Bar
    $(".navbar-toggler").click(function () {
      $(".wpboilerplate-mega-menu-mobile-overlay").addClass("show");
    });

    $(".wpboilerplate-mega-menu-mobile .close").click(function () {
      $(".wpboilerplate-mega-menu-mobile-overlay").removeClass("show");
    });

    $(".wpboilerplate-mega-menu-mobile-overlay").click(function (e) {
      var mobileMenu = $(".wpboilerplate-mega-menu-mobile");
      if (!mobileMenu.is(e.target) && mobileMenu.has(e.target).length === 0) {
        $(".wpboilerplate-mega-menu-mobile-overlay").removeClass("show");
      }
    });

    // navbar-click
    var categoryOpen = false;
    $(".wpboilerplate-mega-menu-mobile .menu-item-has-children > a").click(
      function (e) {
        e.preventDefault();

        if (categoryOpen) {
          $(this).closest("li").removeClass("show");
          $(this).closest("li").siblings("li").show();

          categoryOpen = false;
        } else {
          $(this).closest("li").addClass("show");
          $(this).closest("li").siblings("li").hide();

          categoryOpen = true;
        }
      }
    );

    window.addEventListener(
      "resize",
      function () {
        if (screen.width > 991) {
          $(".sub-menu").show();
        } else {
          $(".sub-menu").hide();
        }
      },
      true
    );

    //sidebar Menu
    $(document).on("click", ".header-toggle-area", function () {
      $(".page-wrapper").toggleClass("show");
    });

    //Cross Menu
    $(".nav-menu-close").on("click", function () {
      $(".page-wrapper").removeClass("show");
    });

    /*----------------------
           Search Popup
       -----------------------*/
    var bodyOvrelay = $("#body-overlay");
    var searchPopup = $("#search-popup");

    bodyOvrelay.on("click", function (e) {
      e.preventDefault();
      bodyOvrelay.removeClass("active");
      searchPopup.removeClass("active");
    });
    $(document).on("click", "#search", function (e) {
      e.preventDefault();
      searchPopup.addClass("active");
      bodyOvrelay.addClass("active");
    });

    /*-------------------------------
            back to top
        ------------------------------*/
    $(document).on("click", ".back-to-top", function () {
      $("html,body").animate(
        {
          scrollTop: 0,
        },
        2000
      );
    });
  });

  $(window).on("resize", function () {});

  //define variable for store last scrolltop
  var lastScrollTop = "";
  $(window).on("scroll", function () {
    /*---------------------------
            back to top show / hide
        ---------------------------*/
    var ScrollTop = $(".back-to-top");
    if ($(window).scrollTop() > 1000) {
      ScrollTop.fadeIn(1000);
    } else {
      ScrollTop.fadeOut(1000);
    }
    /*--------------------------
         sticky menu activation
        ---------------------------*/
    var st = $(this).scrollTop();
    var mainMenuTop = $(".navbar-area");
    if ($(window).scrollTop() > 1000) {
      if (st > lastScrollTop) {
        // hide sticky menu on scrolldown
        mainMenuTop.removeClass("nav-fixed");
      } else {
        // active sticky menu on scrollup
        mainMenuTop.addClass("nav-fixed");
      }
    } else {
      mainMenuTop.removeClass("nav-fixed ");
    }
    lastScrollTop = st;
  });

  $(window).on("load", function () {
    /*-----------------------------
            preloader
        -----------------------------*/
    var preLoder = $("#preloader");
    preLoder.fadeOut(1000);
    /*-----------------------------
            back to top
        -----------------------------*/
    var backtoTop = $(".back-to-top");
    backtoTop.fadeOut(100);
  });
})(jQuery);
