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


/**
 * show-addpayment
 */

const paymenthide = document.querySelector("[data-payment-hide]");
const rotateArrow = document.querySelector("[data-arrow]");
const paymenthidehide1 = document.querySelector("[data-paymenthide-hide1]");
const paymenthidehide2 = document.querySelector("[data-paymenthide-hide2]");
const paymenthidehide3 = document.querySelector("[data-paymenthide-hide3]");
const paymenthidehide4 = document.querySelector("[data-paymenthide-hide4]");
const paymenthidehide5 = document.querySelector("[data-paymenthide-hide5]");

const showpayment = function () {
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
}


//visa


const showpaymentdetails2 = function () {
  paymenthidehide2.classList.toggle("active");
  paymenthidehide1.classList.remove("active");
  paymenthidehide3.classList.remove("active");
  paymenthidehide4.classList.remove("active");
  paymenthidehide5.classList.remove("active");
}

//master


const showpaymentdetails3 = function () {
  paymenthidehide3.classList.toggle("active");
  paymenthidehide2.classList.remove("active");
  paymenthidehide1.classList.remove("active");
  paymenthidehide4.classList.remove("active");
  paymenthidehide5.classList.remove("active");
}


//vnpay


const showpaymentdetails4 = function () {
  paymenthidehide4.classList.toggle("active");
  paymenthidehide2.classList.remove("active");
  paymenthidehide3.classList.remove("active");
  paymenthidehide1.classList.remove("active");
  paymenthidehide5.classList.remove("active");
}


//momo


const showpaymentdetails5 = function () {
  paymenthidehide5.classList.toggle("active");
  paymenthidehide2.classList.remove("active");
  paymenthidehide3.classList.remove("active");
  paymenthidehide4.classList.remove("active");
  paymenthidehide1.classList.remove("active");
}


/**
 * show-manageypayment
 */

 const paymenthide1 = document.querySelector("[data-payment-hide1]");
 const rotateArrow1 = document.querySelector("[data-arrow1]");
 const paymenthidehide6 = document.querySelector("[data-paymenthide-hide6]");
 const paymenthidehide7 = document.querySelector("[data-paymenthide-hide7]");
 const paymenthidehide8 = document.querySelector("[data-paymenthide-hide8]");
 const paymenthidehide9 = document.querySelector("[data-paymenthide-hide9]");
 const paymenthidehide10 = document.querySelector("[data-paymenthide-hide10]");
 
 const showpayment1 = function () {
     rotateArrow1.classList.toggle("active");
     paymenthide1.classList.toggle("active");
 }
 
 
 //paypal
 
 
 const showpaymentdetails6 = function () {
   paymenthidehide6.classList.toggle("active");
   paymenthidehide7.classList.remove("active");
   paymenthidehide8.classList.remove("active");
   paymenthidehide9.classList.remove("active");
   paymenthidehide10.classList.remove("active");
 }


 //visa
 const showpaymentdetails7 = function () {
  paymenthidehide7.classList.toggle("active");
  paymenthidehide6.classList.remove("active");
  paymenthidehide8.classList.remove("active");
  paymenthidehide9.classList.remove("active");
  paymenthidehide10.classList.remove("active");
}


//master
const showpaymentdetails8 = function () {
  paymenthidehide8.classList.toggle("active");
  paymenthidehide7.classList.remove("active");
  paymenthidehide6.classList.remove("active");
  paymenthidehide9.classList.remove("active");
  paymenthidehide10.classList.remove("active");
}


//vnpay
const showpaymentdetails9 = function () {
  paymenthidehide9.classList.toggle("active");
  paymenthidehide7.classList.remove("active");
  paymenthidehide8.classList.remove("active");
  paymenthidehide6.classList.remove("active");
  paymenthidehide10.classList.remove("active");
}


//momo
const showpaymentdetails10 = function () {
  paymenthidehide10.classList.toggle("active");
  paymenthidehide7.classList.remove("active");
  paymenthidehide8.classList.remove("active");
  paymenthidehide9.classList.remove("active");
  paymenthidehide6.classList.remove("active");
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

 