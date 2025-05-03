window.addEventListener('DOMContentLoaded', () => {
  document.body.classList.add('loaded');
});

var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  var navbar = document.getElementsByClassName("navbar")[0];

  if (prevScrollpos > currentScrollPos) {
    navbar.style.top = "0";
  } else {
    navbar.style.top = "-65px";
  }

  prevScrollpos = currentScrollPos;
};

const homeBtn = document.querySelector('.home-button');

homeBtn.addEventListener('mouseenter', () => {
    homeBtn.classList.add('pulse');
});

homeBtn.addEventListener('animationend', () => {
    homeBtn.classList.remove('pulse');
});
