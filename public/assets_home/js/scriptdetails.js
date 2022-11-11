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
    spaceBetween: 10,
    slidesPerView: 6,
    freeMode: true,
    // watchSlidesProgress: true,
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

let checkout = document.querySelector('[data-checkout]');
const overlaycheckout = document.querySelector("[data-overlay-checkout]");

const showCheckOut = function () {
    checkout.classList.toggle("active");
    overlaycheckout.classList.toggle("active");
}

const datacartpayment1 = document.querySelector("[data-cart-payment1]");
const datacartpayment2 = document.querySelector("[data-cart-payment2]");
const datacartpayment3 = document.querySelector("[data-cart-payment3]");
const datacartpayment4 = document.querySelector("[data-cart-payment4]");
const datacartpayment5 = document.querySelector("[data-cart-payment5]");




 
 //paypal
 
 
 const showcartpayment1 = function () {
   datacartpayment1.classList.toggle("active");
   datacartpayment2.classList.remove("active");
   datacartpayment3.classList.remove("active");
   datacartpayment4.classList.remove("active");
   datacartpayment5.classList.remove("active");
 }


 //visa
 const showcartpayment2 = function () {
  datacartpayment2.classList.toggle("active");
  datacartpayment1.classList.remove("active");
  datacartpayment3.classList.remove("active");
  datacartpayment4.classList.remove("active");
  datacartpayment5.classList.remove("active");
}


//master
const showcartpayment3 = function () {
  datacartpayment3.classList.toggle("active");
  datacartpayment2.classList.remove("active");
  datacartpayment1.classList.remove("active");
  datacartpayment4.classList.remove("active");
  datacartpayment5.classList.remove("active");
}


//vnpay
const showcartpayment4 = function () {
  datacartpayment4.classList.toggle("active");
  datacartpayment2.classList.remove("active");
  datacartpayment3.classList.remove("active");
  datacartpayment1.classList.remove("active");
  datacartpayment5.classList.remove("active");
}


//momo
const showcartpayment5 = function () {
  datacartpayment5.classList.toggle("active");
  datacartpayment2.classList.remove("active");
  datacartpayment3.classList.remove("active");
  datacartpayment4.classList.remove("active");
  datacartpayment1.classList.remove("active");
}


const paymenthide = document.querySelector("[data-payment-hide]");
const rotateArrow = document.querySelector("[data-arrow]");
const paymenthidehide1 = document.querySelector("[data-paymenthide-hide1]");
const paymenthidehide2 = document.querySelector("[data-paymenthide-hide2]");
const paymenthidehide3 = document.querySelector("[data-paymenthide-hide3]");
const paymenthidehide4 = document.querySelector("[data-paymenthide-hide4]");
const paymenthidehide5 = document.querySelector("[data-paymenthide-hide5]");

const showotherpayment = function () {
    rotateArrow.classList.toggle("active");
    paymenthide.classList.toggle("active");
}


//paypal


const showpaymentdetails1 = function () {
  paymenthidehide1.classList.toggle("active");
  paymenthidehide2.classList.remove("active");
  paymenthidehide3.classList.remove("active");
  paymenthidehide4.classList.remove("active");
  paymenthidehide5.classList.remove("active");
  document.getElementById("check1").checked = true;
}


//visa


const showpaymentdetails2 = function () {
  paymenthidehide2.classList.toggle("active");
  paymenthidehide1.classList.remove("active");
  paymenthidehide3.classList.remove("active");
  paymenthidehide4.classList.remove("active");
  paymenthidehide5.classList.remove("active");
  document.getElementById("check2").checked = true;
}

//master


const showpaymentdetails3 = function () {
  paymenthidehide3.classList.toggle("active");
  paymenthidehide2.classList.remove("active");
  paymenthidehide1.classList.remove("active");
  paymenthidehide4.classList.remove("active");
  paymenthidehide5.classList.remove("active");
  document.getElementById("check3").checked = true;
}


//vnpay


const showpaymentdetails4 = function () {
  paymenthidehide4.classList.toggle("active");
  paymenthidehide2.classList.remove("active");
  paymenthidehide3.classList.remove("active");
  paymenthidehide1.classList.remove("active");
  paymenthidehide5.classList.remove("active");
  document.getElementById("check4").checked = true;
}


//momo


const showpaymentdetails5 = function () {
  paymenthidehide5.classList.toggle("active");
  paymenthidehide2.classList.remove("active");
  paymenthidehide3.classList.remove("active");
  paymenthidehide4.classList.remove("active");
  paymenthidehide1.classList.remove("active");
  document.getElementById("check5").checked = true;
}

const cleaveCC = new Cleave("#card_number", {
    creditCard: true,
    delimiter: "-"
  });
  
  const cleaveDate = new Cleave("#expiration", {
    date: true, 
    datePattern: ["m", "y"]
  });
   
  const cleaveCVV = new Cleave("#cvv", {
    blocks: [3]
  });
  
  const cleaveCC1 = new Cleave("#card_number1", {
    creditCard: true,
    delimiter: "-"
  });
  
  const cleaveDate1 = new Cleave("#expiration1", {
    date: true, 
    datePattern: ["m", "y"]
  });
   
  const cleaveCVV1 = new Cleave("#cvv1", {
    blocks: [3]
  });
