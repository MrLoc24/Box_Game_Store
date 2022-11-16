'use strict';



/**
 * add event on element
 */

const addEventOnElem = function (elem, type, callback) {
  if (elem.length > 1) {
    for (let i = 0; i < elem.length; i++) {
      elem[i].addEventListener(type, callback);
    }
  } else {
    elem.addEventListener(type, callback);
  }
}



/**
 * navbar toggle
 */

const navTogglers = document.querySelectorAll("[data-nav-toggler]");
const navbar = document.querySelector("[data-navbar]");
const navbarLinks = document.querySelectorAll("[data-nav-link]");
const overlay = document.querySelector("[data-overlay]");

const toggleNavbar = function () {
  navbar.classList.toggle("active");
  overlay.classList.toggle("active");
}

addEventOnElem(navTogglers, "click", toggleNavbar);

const closeNavbar = function () {
  navbar.classList.remove("active");
  overlay.classList.remove("active");
}

addEventOnElem(navbarLinks, "click", closeNavbar);



/**
 * header sticky & back top btn active
 */

const header = document.querySelector("[data-header]");
const backTopBtn = document.querySelector("[data-back-top-btn]");

const headerActive = function () {
  if (window.scrollY > 0) {
    header.classList.add("active");
    backTopBtn.classList.add("active");
  } else {
    header.classList.remove("active");
    backTopBtn.classList.remove("active");
  }
}

addEventOnElem(window, "scroll", headerActive);

let lastScrolledPos = 0;

const headerSticky = function () {
  if (lastScrolledPos >= window.scrollY) {
    header.classList.remove("header-hide");
  } else {
    header.classList.add("header-hide");
  }

  lastScrolledPos = window.scrollY;
}

addEventOnElem(window, "scroll", headerSticky);



/**
 * scroll reveal effect
 */

const sections = document.querySelectorAll("[data-section]");

const scrollReveal = function () {
  for (let i = 0; i < sections.length; i++) {
    if (sections[i].getBoundingClientRect().top < window.innerHeight / 2) {
      sections[i].classList.add("active");
    }
  }
}

scrollReveal();

addEventOnElem(window, "scroll", scrollReveal);


let changenameForm = document.querySelector('[data-changename]');

const showchangenameForm = function () {
  changenameForm.classList.toggle("active");
}

let changeemailForm = document.querySelector('[data-changeemail]');

const showchangeemailForm = function () {
  changeemailForm.classList.toggle("active");
}

let deleteForm = document.querySelector('[data-delete]');

const showdeleteForm = function () {
  deleteForm.classList.toggle("active");
}

function previewFile(input) {
  var file = $(".image_preview").get(0).files[0];
  if (file) {
    var reader = new FileReader();
    reader.onload = function () {
      $("#previewImage").attr('src', reader.result);
    }
    reader.readAsDataURL(file);
  }
}

$(document).ready(function() {

  $('#evaluationFormEdit').click(function() {
    $('#evaluationForm').find(':input[type=text]').each(function(i, elem) {
      $(this).data("previous-value", $(this).val());
    });
  });

  function restore() {

    $('#evaluationForm').find(':input[type=text]').each(function(i, elem) {
      $(this).val($(this).data("previous-value"));
    });
  }

  $('#evaluationFormEditCancel').click(function() {

      restore();
  });
  
});