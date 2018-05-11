"use strict";

function dateLoop(el, min, max) {
  var e = document.querySelector(el);
  for (var i = min; i <= max; i++) {
    var opt = document.createElement("option");
    opt.value = i;
    opt.textContent = i;
    e.appendChild(opt);
  }
}