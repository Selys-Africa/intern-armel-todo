var swiper0 = new Swiper(".mySwiper0", {
  slidesPerView: 1,
  spaceBetween: 35,
  autoplay : {
    delay : 3000,
    duration : 3000
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 40,
    },
    1024: {
      slidesPerView: 4,
      spaceBetween: 20,
    },
  },
      
});


		var swiper00 = new Swiper(".mySwiper00", {
      slidesPerView: 1,
      spaceBetween: 35,
      autoplay : {
          delay : 3000,
          duration : 3000
      },
      breakpoints: {
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
      },
      
    });

		var typewriter = new Typewriter('#element', {
  loop: true,
  delay: 75,
});

typewriter
  .pauseFor(1000)
  .typeString('<span style="color:white;text-shadow:4px 4px 4px white">rapidité</span>')
  .pauseFor(3000)
  .deleteChars(8)
  .typeString('<span style="color:white;text-shadow:4px 4px 4px white">facilité</span>')
  .pauseFor(3000)
  .deleteChars(13)
  // .typeString('<span style="color:white;text-shadow:4px 4px 4px white"> organisation</span>')
  .pauseFor(3000)
  .start();
