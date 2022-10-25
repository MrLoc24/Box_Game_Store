"use strict";

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
};

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
};

addEventOnElem(navTogglers, "click", toggleNavbar);

const closeNavbar = function () {
    navbar.classList.remove("active");
    overlay.classList.remove("active");
};

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
};

addEventOnElem(window, "scroll", headerActive);

let lastScrolledPos = 0;

const headerSticky = function () {
    if (lastScrolledPos >= window.scrollY) {
        header.classList.remove("header-hide");
    } else {
        header.classList.add("header-hide");
    }

    lastScrolledPos = window.scrollY;
};

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
};

scrollReveal();

addEventOnElem(window, "scroll", scrollReveal);

/**
 * details slide
 */

var swiper = new Swiper(".mySwiper", {
    // grabCursor: true,
    spaceBetween: 15,
    slidesPerView: 6,
    // freeMode: true,
    watchSlidesProgress: true,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper2 = new Swiper(".mySwiper2", {
    loop: true,
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});

// const info = document.querySelector("[data-info]");

// const infoActive = function () {
//   if (window.scrollY > 0) {
//     info.classList.add("active");
//   } else {
//     info.classList.remove("active");
//   }
// }

// addEventOnElem(window, "scroll", infoActive);

// let box = document.querySelectorAll('.products .product-container .box');
// let loadmore = document.querySelector('#load-more');
// let currentItem = 8;

// for (var i=0; i<8; i++){
//     box[i].style.display = 'inline-block';
// }

// loadmore.onclick = () =>{
//     for (var i=currentItem; i< currentItem+8; i++){
//         box[i].style.display = 'inline-block'
//     }
//     currentItem += 8;

//     if (currentItem >= box.length){
//         loadmore.style.display = 'none';
//     }
// }
