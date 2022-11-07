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

// document.getElementById("credit1").onclick = function () {
//   document.getElementById("check1").checked = true;
// };
// document.getElementById("credit2").onclick = function () {
//   document.getElementById("check2").checked = true;
// };


 
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
