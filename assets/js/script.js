"use strict"

const headerBurger = document.querySelector('.header__burger');
const headerMenu = document.querySelector('.header__menu');
const bodyNow = document.querySelector('body');

headerBurger.addEventListener('click', function () {
  headerBurger.classList.toggle('active');
  headerMenu.classList.toggle('active');
  bodyNow.classList.toggle('lock');
})

$(document).ready(function () {
  $('.carousel').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="slick-prev hvr-shutter-in-vertical">&#10094;</button>',
    nextArrow: '<button type="button" class="slick-next hvr-shutter-in-vertical">&#10095;</button>',
  });
});


