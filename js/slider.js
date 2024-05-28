let swiper = new Swiper('.mySwiper', {
  slidesPerView: 1,
  grabCursor: true,
  loop: false,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});
