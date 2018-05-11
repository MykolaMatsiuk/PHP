"use strict";

// function changeSearchView() {
//   if ($(document).width() <= 561) {
//     $(".search").css("display", "none");
//     $(".logo-kicks").css({
//       "z-index": 50,
//       "position": "absolute",
//       "top": 10,
//       "font-size": "5rem",
//       "transform": "translate(-50%, 0px)",
//       "left": "60%"
//     });
//   } else {
//     $(".search").css("display", "block");
//     $(".logo-kicks").css({
//       "position": "static",
//       "transform": "none"
//     });
//   }
// }

// // $(window).resize(changeSearchView);

function stickyElement($el) {
  let position = $(".navbar").scrollTop();
  let nav = $(".cat-nav");

  $(window).scroll(function() {
    if ($(window).scrollTop() > 25) {
      $el.hasClass("container")
        ? $el.removeClass("container")
        : null;
      $el.addClass("fixed").css({
        width: "100%"
        // "padding-left": "15px",
        // "padding-right": "15px",
        // "margin-left": "auto",
        // "margin-right": "auto"
      });
      nav.css("margin-top", "70px");
    } else {
      $el.removeClass("fixed").addClass("container");
      nav.css("margin-top", "0");
    }
  });
}
window.onload = () => {
  stickyElement($(".cart-search"));
};
