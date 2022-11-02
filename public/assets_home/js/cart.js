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

