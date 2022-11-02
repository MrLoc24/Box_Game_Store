let checkout = document.querySelector('[data-checkout]');
const overlaycheckout = document.querySelector("[data-overlay-checkout]");

const showCheckOut = function () {
    checkout.classList.toggle("active");
    overlaycheckout.classList.toggle("active");
}

