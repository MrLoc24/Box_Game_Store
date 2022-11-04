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

const storehide = document.querySelector("[data-store-hide]");
const rotateArrow6 = document.querySelector("[data-arrow6]");

const showstorelist = function () {
    rotateArrow6.classList.toggle("active");
    storehide.classList.toggle("active");
}



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

/**
 * genre-slide
 */

var swiper = new Swiper(".genre-container", {
  loop: true,
  spaceBetween: 20,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
      slidesPerGroup: 1,
    },
    575: {
      slidesPerView: 2,
      slidesPerGroup: 2,
    },
    768: {
      slidesPerView: 4,
      slidesPerGroup: 4,
    },
    1200: {
      slidesPerView: 4,
      slidesPerGroup: 4,
    },
  },
});

/**
 * show-filter
 */

const filtershow = document.querySelector("[data-filter-show]");
const filterhide = document.querySelector("[data-filter-hide]");
const rotateArrow = document.querySelector("[data-arrow]");

const showfilter = function () {
    filtershow.classList.toggle("active");
    rotateArrow.classList.toggle("active");
    filterhide.classList.toggle("active");
}

const filtershow1 = document.querySelector("[data-filter-show1]");
const filterhide1 = document.querySelector("[data-filter-hide1]");
const rotateArrow1 = document.querySelector("[data-arrow1]");

const showfilter1 = function () {
    filtershow1.classList.toggle("active");
    rotateArrow1.classList.toggle("active");
    filterhide1.classList.toggle("active");
}

const filtershow2 = document.querySelector("[data-filter-show2]");
const filterhide2 = document.querySelector("[data-filter-hide2]");
const rotateArrow2 = document.querySelector("[data-arrow2]");

const showfilter2 = function () {
    filtershow2.classList.toggle("active");
    rotateArrow2.classList.toggle("active");
    filterhide2.classList.toggle("active");
}


/**
 * filter toggle
 */

const filterToggles = document.querySelectorAll("[data-filter-toggler]");
const filternavbar = document.querySelector("[data-filter-sidebar]");
const overlay1 = document.querySelector("[data-overlay1]");

const toggleFilter = function () {
    filternavbar.classList.toggle("active");
    overlay1.classList.toggle("active");
}

const closeFilter = function () {
  filternavbar.classList.remove("active");
  overlay1.classList.remove("active");
}


const filtershow3 = document.querySelector("[data-filter-show3]");
const filterhide3 = document.querySelector("[data-filter-hide3]");
const rotateArrow3 = document.querySelector("[data-arrow3]");

const showfilter3 = function () {
    filtershow3.classList.toggle("active");
    rotateArrow3.classList.toggle("active");
    filterhide3.classList.toggle("active");
}

const filtershow4 = document.querySelector("[data-filter-show4]");
const filterhide4 = document.querySelector("[data-filter-hide4]");
const rotateArrow4 = document.querySelector("[data-arrow4]");

const showfilter4 = function () {
    filtershow4.classList.toggle("active");
    rotateArrow4.classList.toggle("active");
    filterhide4.classList.toggle("active");
}

const filtershow5 = document.querySelector("[data-filter-show5]");
const filterhide5 = document.querySelector("[data-filter-hide5]");
const rotateArrow5 = document.querySelector("[data-arrow5]");

const showfilter5 = function () {
    filtershow5.classList.toggle("active");
    rotateArrow5.classList.toggle("active");
    filterhide5.classList.toggle("active");
}

  

