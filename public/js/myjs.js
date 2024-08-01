$(document).ready(function () {
  // *Collapse tabs
  function collapse() {
    $('.collapse_btn').each(function (index) {
      let this_id = $(this).data("item") - 1;
      $(this).children(".program_num").children("span").text(this_id)
      if($(this).hasClass("clp_clicked")) {
        $(this).siblings(".collapse_content").addClass("active");
        $(this).siblings(".collapse_content.active").slideDown();
      }
    });
    $('.collapse_btn').click(function (e) {
      e.preventDefault();
      $(this).toggleClass("clp_clicked");
      $(this).siblings(".collapse_content").slideToggle("linear");
      $(this).siblings(".collapse_content").addClass("active");

      $(this).parents(".collapse_row").siblings().find(".collapse_btn").removeClass("clp_clicked");

      $(this).parents(".collapse_row").siblings().find(".collapse_content").removeClass("active");
      $(this).parents(".collapse_row").siblings().find(".collapse_content").slideUp("linear");
    });
  }
  collapse();
  // *Collapse tabs
  // *language 
  function dropLangs() {
    $(".lang_sect").click(function (e) {
      e.stopPropagation()
      $(this).toggleClass("clicked");
      // $(this).find(".langs").slideToggle();
    });
    $("body").click(function () {
      $(".lang_sect").removeClass("clicked");
      $(".form_item").removeClass("show_price_wrap");
    });
  }
  dropLangs();
  // *language


  // *Header fixed end
  // function fixedMobileNav() {
  //   // var hd_top = $(' ');
  //   var nav = $('header');
  //   var main = $('main');
  //   var scrolled = false;
  //   if(320 < $(window).scrollTop() && !scrolled) {
  //     nav.addClass('visible_mob');
  //     main.addClass('p_top');
  //     // hd_top.addClass('scroll_head');
  //     scrolled = true;
  //   }

  //   if(320 > $(window).scrollTop() && scrolled) {
  //     nav.removeClass('visible_mob');
  //     main.removeClass('p_top');
  //     // hd_top.removeClass('scroll_head');
  //     scrolled = false;
  //   }

  //   $(window).scroll(function () {
  //     if(320 < $(window).scrollTop() && !scrolled) {
  //       nav.addClass('visible_mob');
  //       main.addClass('p_top');
  //       // hd_top.addClass('scroll_head');
  //       scrolled = true;
  //     }

  //     if(320 > $(window).scrollTop() && scrolled) {
  //       nav.removeClass('visible_mob');
  //       main.removeClass('p_top');
  //       // hd_top.removeClass('scroll_head');
  //       scrolled = false;
  //     }
  //   });
  // }
  // fixedMobileNav();
  // *Header fixed end

  // *benefit tabs
  function benefitTabs() {
    $(".clicked_tab_btn").each(function (index) {
      let this_id = $(this).data("id");
      if($(this).hasClass("active")) {
        $(this).parents(".benefit_tabs").find(".bf_tb_content").find(".bf_tb_items[data-id=" + this_id + "]").addClass("active");
        $(this).parents(".benefit_tabs").find(".bf_tb_content").find(".bf_tb_items[data-id=" + this_id + "]").siblings().removeClass("active");
      }

      $(this).click(function () {
        let this_id = $(this).data("id");
        $(this).addClass("active");
        $(this).siblings().removeClass("active");
        $(this).parents(".benefit_tabs").find(".bf_tb_content").find(".bf_tb_items[data-id=" + this_id + "]").addClass("active");
        $(this).parents(".benefit_tabs").find(".bf_tb_content").find(".bf_tb_items[data-id=" + this_id + "]").siblings().removeClass("active");
      });
    });
  }
  benefitTabs();
  // *benefit tabs

  // *Menu 
  function menuClick() {
    $(".menu_btn.open").click(function () {
      // $(this).toggleClass("clicked");
      $("nav.nav_mobile").addClass("transformed");
      $("body").addClass("mm_noscroll");
    });
    $(".menu_btn.close").click(function () {
      // $(this).toggleClass("clicked");
      $("nav.nav_mobile").removeClass("transformed");
      $("body").removeClass("mm_noscroll");
    });
    // $("nav.nav_mobile ul.hdr_menu>li>a").click(function (e) {
    //   e.preventDefault();
    //   e.stopPropagation();
    //   // $(".menu_btn").removeClass("clicked");
    //   // $("nav.nav_mobile").removeClass("transformed");
    //   $(this).toggleClass("show");
    //   $(this).siblings("ul").slideToggle();
    //   $(this).parents("li").siblings().find("ul").slideUp();
    //   $(this).parents("li").siblings().find("a").removeClass("show");
    //   // $("body").removeClass("mm_noscroll");
    // });



    $(".drop_list li").each(function () {
      if($(this).children("ul").length > 0) {
        $(this).addClass("has_sub");
      }
    });
    $(".drop_list> li.has_sub>a").click(function (e) {
      e.preventDefault();
      e.stopPropagation();

      $(this).parents("li").toggleClass("show");
      $(this).siblings("ul").slideToggle();
      $(this).parents("li").siblings().removeClass("show");
      $(this).parents("li").siblings().children("ul").slideUp();
    });


  }
  menuClick();
  // *Menu
  // *Favorite 
  function favItem() {
    $(".fav_tour").click(function (e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).toggleClass("befav");
    });
  }
  favItem();
  // *Favorite
  // *dropFilterItem
  function dropFilterItem() {
    $(".drop_filter_item .filter_head").click(function (e) {
      e.preventDefault();
      e.stopPropagation();

      $(this).parents(".drop_filter_item").toggleClass("hide");
      $(this).siblings(".filter_check_items").slideToggle();
    });

    $(".filter_btn.btn_reset").click(function () {
      $(".filter_container input").each(function () {
        if($(this).attr("type") == "checkbox" || $(this).attr("type") == "radio") {
          $(this).prop("checked", false);
        } else {
          // $(this).val('');
        }
      });
    });


  }
  dropFilterItem();
  // *dropFilterItem

  // * Form input
  $(".form_item select").each(function () {
    if($(this).val() == "" || $(this).val() == null) {
      $(this).parents(".form_item").removeClass("show_label");
    } else {
      $(this).parents(".form_item").addClass("show_label");
    }
    $(".form_item select").change(function () {
      if($(this).val() == "" || $(this).val() == null) {
        $(this).parents(".form_item").removeClass("show_label");
      } else {
        $(this).parents(".form_item").addClass("show_label");
      }
    });
  });

  $('.item_input').on("input", function () {
    if($(this).val() === "") {
      $(this).parents(".form_item").removeClass("show_label");
    } else {
      $(this).parents(".form_item").addClass("show_label");
    }
  });

  $(".item_input").each(function () {
    if($(this).val() === "") {
      $(this).parents(".form_item").removeClass("show_label");
    } else {
      $(this).parents(".form_item").addClass("show_label");
    }
  });
  $(".price_show").click(function () {
    $(this).parents(".form_item").toggleClass("show_price_wrap ");
  });

  $(".form_item.prc").click(function (e) {
    e.stopPropagation()
  });

  $(".reset_filter").click(function (e) {
    e.stopPropagation()
    e.stopPropagation()

    $(".find_tour").removeClass("clear")
    $(".wrap_filter").find("input[type=hidden],input[type=text],input[type=number],select").each(function () {
      $(this).val("")
      // $(this).prop("selected", false)
      $(this).parents(".form_item").removeClass("show_price_result")
      $(this).parents(".form_item").removeClass("show_label")
      $(this).parents(".form_item").removeClass("show_price_wrap")

    });
    $(".wrap_filter").find("select").each(function () {
      $(this).val(null).trigger('change');

      $(this).parents(".form_item").removeClass("show_price_result")
      $(this).parents(".form_item").removeClass("show_label")
      $(this).parents(".form_item").removeClass("show_price_wrap")

    });
    // $(this).parents(".wrap_filter").find("input").val("")
  });
  $(".find_tour").each(function () {

    if($(this).siblings("input").val() !== "") {
      $(this).addClass("clear")
      $(this).click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass("clear")
        $(this).siblings("input").val("")
        $(this).parents(".form_item").removeClass("show_price_result")
        $(this).parents(".form_item").removeClass("show_label")
        $(this).parents(".form_item").removeClass("show_price_wrap")
      })
    }

  })
  $(".open_filter").click(function (e) {
    $(this).addClass("dropped")
    $(".mobile_filter_drop").addClass("opened")
    $("body").addClass("mm_noscroll");
  });
  $(".close_filter").click(function (e) {
    $(".open_filter").removeClass("dropped")
    $(".mobile_filter_drop").removeClass("opened")
    $("body").removeClass("mm_noscroll");
  });
  // * Form input

  // * Tour Form input
  $(".slide_apply").click(function () {
    $(this).toggleClass("clicked")
    $(".tour_apply").slideToggle()
  });

  // * Tour Form input

  // * Modal js
  $(".open_modal").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(".modal[data-id=" + $(this).data("id") + "]").fadeIn();
  })
  $(".close_modal").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).parents(".modal").fadeOut();
  })
  // * Modal js

  // * Category filter
  const rangeInput = document.querySelectorAll(".range-input input"),
    priceInput = document.querySelectorAll(".price-input input"),
    range = document.querySelector(".slider .progress");
  let priceGap = 100;

  priceInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minPrice = parseInt(priceInput[0].value),
        maxPrice = parseInt(priceInput[1].value);

      if(maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
        if(e.target.className === "input-min") {
          rangeInput[0].value = minPrice;
          range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
        } else {
          rangeInput[1].value = maxPrice;
          range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
        }
      }
    });
  });

  rangeInput.forEach((input) => {
    input.addEventListener("input", (e) => {
      let minVal = parseInt(rangeInput[0].value),
        maxVal = parseInt(rangeInput[1].value);

      if(maxVal - minVal < priceGap) {
        if(e.target.className === "range-min") {
          rangeInput[0].value = maxVal - priceGap;
        } else {
          rangeInput[1].value = minVal + priceGap;
        }
      } else {
        priceInput[0].value = minVal;
        priceInput[1].value = maxVal;
        range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
        range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
      }
    });
  });

  $(".custom-min").on("input", function () {

    let cminVal = parseInt($(this).val()),
      cmaxVal = parseInt($(".range-max").val());

    if($(this).val() == 0 || $(this).val() == "") {
      cminVal = 0

      $(".minVal").text(cminVal)
      $(".minValGet").val(cminVal)

      if(cminVal - cmaxVal < priceGap) {
        $(".range-min").val(cminVal)
      } else {
        $(this).val(cmaxVal - priceGap)
      }
    } else {
      if(cminVal - cmaxVal < priceGap) {
        $(".range-min").val(cminVal)
      } else {
        $(this).val(cmaxVal - priceGap)
      }
      $(".minVal").text(parseInt($(this).val()))
      $(".minValGet").val(parseInt($(this).val()))
      $(".range-min").val(parseInt($(this).val()))
    }

    var range = $(".slider .progress")
    var minVal = parseInt($(".range-min").val());
    var maxVal = parseInt($(".range-min").attr('max'));

    range.css("left", (minVal / maxVal) * 100 + "%")
    $(this).parents(".form_item").addClass("show_label")
    $(this).parents(".form_item").addClass("show_price_result")

  });
  $(".custom-max").on("input", function () {
    let thismaxVal = parseInt($(this).attr('max'));
    if($(this).val() >= thismaxVal) {

      $(this).val(thismaxVal)
      let cminVal = parseInt($(".range-min").val()),
        cmaxVal = parseInt($(this).val());

      if($(this).val() == 0 || $(this).val() == "" || $(this).val() <= priceGap) {

        $(".maxVal").text(cmaxVal)
        $(".maxValGet").val(cmaxVal)
        //$(this).val(cmaxVal)
        if(cminVal - cmaxVal < priceGap) {
          $(".range-max").val(cmaxVal + priceGap)
          $(this).val(cminVal + priceGap)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
        } else {
          $(".range-max").val(cminVal + priceGap)
          $(this).val(cminVal + priceGap)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
        }
      } else {
        if(cminVal - cmaxVal < priceGap) {
          $(".range-max").val(cmaxVal)
          $(this).val(cmaxVal)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
          if($(this).val() >= thismaxVal) {
            $(this).val(thismaxVal)
          }
        } else {
          $(".range-max").val(cminVal + priceGap)
          $(this).val(cminVal + priceGap)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
          if($(this).val() >= thismaxVal) {
            $(this).val(thismaxVal)
          }
        }
        //$(this).val(cmaxVal + priceGap)
        //$(".maxVal").text(parseInt($(this).val()))
        //$(".maxValGet").val(parseInt($(this).val()))
        //$(".range-max").val(parseInt($(this).val()))
      }

    } else {
      let cminVal = parseInt($(".range-min").val()),
        cmaxVal = parseInt($(this).val());

      if($(this).val() == 0 || $(this).val() == "" || $(this).val() <= priceGap) {

        $(".maxVal").text(cmaxVal)
        $(".maxValGet").val(cmaxVal)
        //$(this).val(cmaxVal)
        if(cminVal - cmaxVal < priceGap) {
          $(".range-max").val(cmaxVal + priceGap)
          $(this).val(cminVal + priceGap)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
        } else {
          $(".range-max").val(cminVal + priceGap)
          $(this).val(cminVal + priceGap)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
        }
      } else {
        if(cminVal - cmaxVal < priceGap) {
          $(".range-max").val(cmaxVal)
          $(this).val(cmaxVal)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
          if($(this).val() >= thismaxVal) {
            $(this).val(thismaxVal)
          }
        } else {
          $(".range-max").val(cminVal + priceGap)
          $(this).val(cminVal + priceGap)
          $(".maxVal").text(parseInt($(this).val()))
          $(".maxValGet").val(parseInt($(this).val()))
          if($(this).val() >= thismaxVal) {
            $(this).val(thismaxVal)
          }
        }
        //$(this).val(cmaxVal + priceGap)
        //$(".maxVal").text(parseInt($(this).val()))
        //$(".maxValGet").val(parseInt($(this).val()))
        //$(".range-max").val(parseInt($(this).val()))
      }

    }


    var range = $(".slider .progress")
    var minVal = parseInt($(".range-max").val());
    var maxVal = parseInt($(".range-max").attr('max'));

    range.css("right", 100 - (minVal / maxVal) * 100 + "%")

    $(this).parents(".form_item").addClass("show_label")
    $(this).parents(".form_item").addClass("show_price_result")


  });


  $(".range-min").on("input", function () {
    $(".minVal").text(parseInt($(this).val()))
    $(".minValGet").val(parseInt($(this).val()))
    $(".custom-min").val(parseInt($(this).val()))

    $(this).parents(".form_item").addClass("show_label")
    $(this).parents(".form_item").addClass("show_price_result")
  });
  $(".range-min").each(function () {
    var range = $(".slider .progress")
    var minVal = parseInt($(this).val());
    var maxVal = parseInt($(this).attr('max'));

    range.css("left", (minVal / maxVal) * 100 + "%")
    $(".minVal").text(parseInt($(this).val()))
  });

  $(".range-max").on("input", function () {
    $(".maxVal").text(parseInt($(this).val()))
    $(".maxValGet").val(parseInt($(this).val()))
    $(".custom-max").val(parseInt($(this).val()))

    $(this).parents(".form_item").addClass("show_label")
    $(this).parents(".form_item").addClass("show_price_result")
  });
  $(".range-max").each(function () {
    var range = $(".slider .progress")
    var minVal = parseInt($(this).val());
    var maxVal = parseInt($(this).attr('max'));

    range.css("right", 100 - (minVal / maxVal) * 100 + "%")
    //range.style.right = 100 - (minVal / maxVal) * 100 + "%";
    $(".maxVal").text(parseInt($(this).val()))
  });
  // * Category filter


  // *Equal height
  equalHeight();
  function equalHeight(event) {
    $('.item_content').matchHeight({ property: 'min-height' });
    $('.wrap_category .col_in').matchHeight({ property: 'min-height' });
    $('.item_content_btm').matchHeight({ property: 'min-height' });
    $('.item_content_btm .itm_title').matchHeight({ property: 'min-height' });
    $('.atg_item').matchHeight({ property: 'min-height' });
    $('.atg_content').matchHeight({ property: 'min-height' });
    $('.service_item_title').matchHeight({ property: 'min-height' });
    $('.abt_h').matchHeight({ property: 'min-height' });
  }
  // *Equal height
});
