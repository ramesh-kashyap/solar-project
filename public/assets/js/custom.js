/*--------------------- Copyright (c) 2024 -----------------------
[Master Javascript]
Project: Solar Supplier HTML
-------------------------------------------------------------------*/
(function ($) {
  "use strict";
  var solarsupplier = {
    initialised: false,
    version: 1.0,
    init: function () {
      if (!this.initialised) {
        this.initialised = true;
      } else {
        return;
      }
      /*-------------- solar_supplier Functions Calling -------------------------------------------------*/
      this.ss_loader();
      this.ss_nav_menu();
      this.tr_fix_menu_scroll();
      // this.ayur_banner_slider();
      this.ss_care_slider();
      this.ss_testimonial_slider();
      this.ss_counter();
      this.ss_quantity();
      this.Select2();
      this.CheckoutPayment();
      this.PopupImage();
    },
    /*-------------- solar_supplier Functions Calling -------------------------------------------------*/

    // loader js
     ss_loader: function () {
      jQuery(window).on('load', function () {
        $(".ss-loader").fadeOut();
        $(".ss-spin").delay(500).fadeOut("slow");
      });
    },
    // nav menu toggle
    ss_nav_menu: function () {
      $(document).on("click", function (event) {
        var $trigger = $(".ss-toggle-btn");
        if ($trigger !== event.target && !$trigger.has(event.target).length) {
          $("body").removeClass("ss-menu-open");
        }
      });
      $(".ss-toggle-btn").click(function () {
        $("body").toggleClass("ss-menu-open");
      });

      //submenu
      $('.ss-has-menu > a').click(function (event) {
        event.stopPropagation();
        var $submenu = $(this).next('.ss-submenu');
        $('.ss-submenu').not($submenu).removeClass('ss-submenu-open');
        $submenu.toggleClass('ss-submenu-open');
      });
      $('.ss-submenu a').click(function (event) {
        event.stopPropagation();
      });
      $(document).on("click", function (event) {
        if (!$(event.target).closest('.ss-has-menu').length) {
          $('.ss-submenu').removeClass('ss-submenu-open')
        }
      })
    },
    // fix menu scroll
    tr_fix_menu_scroll: function () {
      $(window).on('scroll', function () {
        if ($(window).scrollTop() > 300) {
          $(".tr_menu_wrapper1").addClass("tr-fixed");
        } else {
          $(".tr_menu_wrapper1").removeClass("tr-fixed");
        }
      });
    },

    // banner slider
    // ayur_banner_slider: function () {
    //   const not_active_slide_scale_value = 0.85;
    //   const not_active_slide_opacity_value = 0.5;
    //   var swiper_scale_active = new Swiper("[swiper_scale_active]", {
    //     slidesPerView: 2,
    //     parallax: true,
    //     loop: true,
    //     breakpoints: {
    //       320: {
    //         speed: 900,
    //         slidesPerView: 1,
    //       },
    //       670: {
    //         slidesPerView: 1,
    //       },
    //       767: {
    //         slidesPerView: 2,
    //       },
    //       768: {
    //         slidesPerView: 2,
    //       },
    //     },
    //     keyboard: {
    //       enabled: true,
    //     },
    //     centeredSlides: true,
    //     loop: true,
    //     slideToClickedSlide: true,
    //     spaceBetween: 0,
    //     grabCursor: true,
    //     speed: 1500,
    //     autoplay: {
    //       delay: 2000,
    //     },
    //     effect: "creative",
    //     creativeEffect: {
    //       limitProgress: 2,
    //       rotate: 0,
    //       stretch: 0,
    //       depth: 100,
    //       prev: {
    //         opacity: not_active_slide_opacity_value,
    //         scale: not_active_slide_scale_value,
    //         translate: ["-65%", 0, 0],
    //       },
    //       next: {
    //         opacity: not_active_slide_opacity_value,
    //         scale: not_active_slide_scale_value,
    //         translate: ["65%", 0, 0],
    //       },
    //     },
    //     navigation: {
    //       nextEl: '.swiper-button-next',
    //       prevEl: '.swiper-button-prev',
    //     },
    //   });
    // },


    // care slider
    ss_care_slider: function () {
      var careSwiper = new Swiper(".ss-logo-slider", {
        loop: true,
        slidesPerView: 6,
        spaceBetween: 30,
        speed: 2000,
        autoplay: {
          delay: 2000,
        },
        breakpoints: {
          1500: {
            slidesPerView: 6,
            spaceBetween: 30,
          },
          1250: {
            slidesPerView: 5,
            spaceBetween: 0,
          },
          991: {
            slidesPerView: 4,
            spaceBetween: 0,
          },
          750: {
            slidesPerView: 3,
            spaceBetween: 0,
          },
          500: {
            slidesPerView: 2,
            spaceBetween: 0,
          },
          0: {
            slidesPerView: 1,
            spaceBetween: 0,
          },
        },
      });
    },
    // testimonial slider
    ss_testimonial_slider: function () {
      var testimonialSwiper = new Swiper(".ss-testimonial-slider", {
        loop: true,
        slidesPerView: 2,
        spaceBetween: 30,
        loop: true,
        speed: 2000,
        // autoplay: {
        //   delay: 2000,
        // },
        navigation: {
          nextEl: '.ss-testimonial-section .swiper-button-next',
          prevEl: '.ss-testimonial-section .swiper-button-prev',
        },
        breakpoints: {
          1251: {
            slidesPerView: 2,
            spaceBetween: 30,
          },
          0: {
            slidesPerView: 1,
            spaceBetween: 10,
          },
        },
      });
    },

    ss_counter: function () {
      $('.ss-counting').text('');
      $('.ss-counting').each(function () {
        var $this = $(this),
          countTo = $this.attr("data-to");
        $({ countNum: $this.text() }).animate(
          { countNum: countTo, },
          {
            duration: 3000,
            easing: 'linear',
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
            },
          }
        )
      })

    },
    ss_quantity: function () {
      $('.shop-add').click(function () {
        if ($(this).prev().val() < 50000) {
          $(this).prev().val(+$(this).prev().val() + 1);
        }
      });
      $('.shop-sub').click(function () {
        let inputElement = $(this).siblings('input');
        if (inputElement.val() > 1) {
          inputElement.val(+inputElement.val() - 1);
        }
      });

    },
    Select2: function () {
      $('.mySelect').select2({
        placeholder: 'Select an option',
        width: '100%',
        dropdownAutoWidth: true,
        minimumResultsForSearch: Infinity
      });
    },
    // Checkout Payment			
    CheckoutPayment: function () {
      $("input[name$='checkout']").on("click", function () {
        var test = $(this).val();
        $(".payment_box").hide('slow');
        $(".payment_box[data-period='" + test + "']").show('slow');
      });
    },
    PopupImage: function() {
      $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".popup-imgshow").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".popup-imgshow").fadeOut();
    });
    },
  };
  solarsupplier.init();
}
  (jQuery));


function checkRequire(formId, targetResp) {
  targetResp.html('');
  var email = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
  var url = /(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/;
  var image = /\.(jpe?g|gif|png|PNG|JPE?G)$/;
  var mobile = /^[\s()+-]*([0-9][\s()+-]*){6,20}$/;
  var facebook = /^(https?:\/\/)?(www\.)?facebook.com\/[a-zA-Z0-9(\.\?)?]/;
  var twitter = /^(https?:\/\/)?(www\.)?twitter.com\/[a-zA-Z0-9(\.\?)?]/;
  var google_plus = /^(https?:\/\/)?(www\.)?plus.google.com\/[a-zA-Z0-9(\.\?)?]/;
  var check = 0;
  $('#er_msg').remove();
  var target = (typeof formId == 'object') ? $(formId) : $('#' + formId);
  target.find('input , textarea , select').each(function () {
    if ($(this).hasClass('require')) {
      if ($(this).val().trim() == '') {
        check = 1;
        $(this).focus();
        $(this).parent('div').addClass('form_error');
        targetResp.html('You missed out some fields.');
        $(this).addClass('error');
        return false;
      } else {
        $(this).removeClass('error');
        $(this).parent('div').removeClass('form_error');
        targetResp.addClass("sent"); 
        targetResp.html('Message sent succefully.');
      }
    }
    if ($(this).val().trim() != '') {
      var valid = $(this).attr('data-valid');
      if (typeof valid != 'undefined') {
        if (!eval(valid).test($(this).val().trim())) {
          $(this).addClass('error');
          $(this).focus();
          check = 1;
          targetResp.html($(this).attr('data-error'));
          return false;
        } else {
          $(this).removeClass('error');
        }
      }
    }
  });
  return check;
}
$(document).ready(function () {
  $('.ss-tpro-like a').click(function () {
    $(this).toggleClass("likeproduct")
  })
});

$(".submitForm").on('click', function () {
  var _this = $(this);
  var targetForm = _this.closest('form');
  var errroTarget = targetForm.find('.response');
  var check = checkRequire(targetForm, errroTarget);

  if (check == 0) {
    var formDetail = new FormData(targetForm[0]);
    formDetail.append('form_type', _this.attr('form-type'));
    $.ajax({
      method: 'post',
      url: 'ajaxmail.php',
      data: formDetail,
      cache: false,
      contentType: false,
      processData: false
    }).done(function (resp) {
      console.log(resp);
      if (resp == 1) {
        targetForm.find('input').val('');
        targetForm.find('textarea').val('');
        errroTarget.html('<p style="color:green;">Mail has been sent successfully.</p>');
      } else {
        errroTarget.html('<p style="color:red;">Something went wrong please try again latter.</p>');
      }
    });
  }
});

$(document).ready(function () {
  $('.ayur-tpro-like a').click(function () {
    $(this).toggleClass("likeproduct")
  })
});;