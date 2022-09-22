// ––––– PAIRED IMAGES ––––– //
if (document.querySelectorAll(".swiperPairedImages").length > 0) {
  // init paired image slider
  const pairedSlider = () => {
    let pairedSliders = document.querySelectorAll(".swiperPairedImages");
    let prevArrow = document.querySelectorAll(".swiper-button-prev");
    let nextArrow = document.querySelectorAll(".swiper-button-next");
    pairedSliders.forEach((slider, index) => {
      // this bit checks if there's more than 1 slide, if there's only 1 it won't loop
      let sliderLength = slider.children[0].children.length;
      let result = sliderLength > 1 ? true : false;
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
        loop: result,
        allowTouchMove: true,
        simulateTouch: true,
        grabCursor: true,
        autoplay: {
          delay: 5500,
        },
        effect: "creative",
        speed: 750,
        creativeEffect: {
          prev: {
            shadow: false,
            translate: [0, 0, -400],
          },
          next: {
            translate: ["100%", 0, 0],
          },
        },
        navigation: {
          // the 'index' bit below is just the order of the class in the queryselectorAll array, so the first one would be NextArrow[0] etc
          nextEl: nextArrow[index],
          prevEl: prevArrow[index],
        },
      });
    });
  };
  window.addEventListener("load", pairedSlider);
}

// ––––– SIDE BY SIDE IMAGE + CONTENT ––––– //
if (document.querySelectorAll(".swiperSideBySide").length > 0) {
  // init paired image slider
  const sideSlider = () => {
    let sideSliders = document.querySelectorAll(".swiperSideBySide");
    let prevArrow = document.querySelectorAll(".swiper-button-prev");
    let nextArrow = document.querySelectorAll(".swiper-button-next");
    sideSliders.forEach((slider, index) => {
      // this bit checks if there's more than 1 slide, if there's only 1 it won't loop
      let sliderLength = slider.children[0].children.length;
      let result = sliderLength > 1 ? true : false;
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
        loop: result,
        allowTouchMove: true,
        simulateTouch: true,
        grabCursor: true,
        autoplay: {
          delay: 5500,
        },
        effect: "creative",
        speed: 750,
        creativeEffect: {
          prev: {
            shadow: false,
            translate: [0, 0, -400],
          },
          next: {
            translate: ["100%", 0, 0],
          },
        },
        navigation: {
          // the 'index' bit below is just the order of the class in the queryselectorAll array, so the first one would be NextArrow[0] etc
          nextEl: nextArrow[index],
          prevEl: prevArrow[index],
        },
      });
    });
  };
  window.addEventListener("load", sideSlider);
}

// ––––– PACKAGES ––––– //
if (document.querySelectorAll(".swiperPackages").length > 0) {
  // init paired image slider
  const packageSlider = () => {
    let packageSliders = document.querySelectorAll(".swiperPackages");
    packageSliders.forEach((slider, index) => {
      // this bit checks if there's more than 1 slide, if there's only 1 it won't loop
      let sliderLength = slider.children[0].children.length;
      let result = sliderLength > 1 ? true : false;
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
        loop: result,
        allowTouchMove: false,
        simulateTouch: false,
        grabCursor: false,
        autoplay: {
          delay: 3000,
        },
        effect: "creative",
        speed: 750,
        creativeEffect: {
          prev: {
            shadow: false,
            translate: [0, 0, -400],
          },
          next: {
            translate: ["100%", 0, 0],
          },
        },
      });
    });
  };
  window.addEventListener("load", packageSlider);
}



// ––––– TESTIMONIALS ––––– //
if (document.querySelectorAll(".swiperTestimonial").length > 0) {
  console.log("One exists");

  // init testimonial slider
  const testimonialSlider = () => {
    let testimonialSliders = document.querySelectorAll(".swiperTestimonial");
    let paginationEls = document.querySelectorAll(".swiper-pagination");
    testimonialSliders.forEach((slider, index) => {
      // this bit checks if there's more than 1 slide, if there's only 1 it won't loop
      let sliderLength = slider.children[0].children.length;
      let result = sliderLength > 1 ? true : false;
      const swiper = new Swiper(slider, {
        slidesPerView: 1,
        loop: result,
        allowTouchMove: true,
        simulateTouch: true,
        grabCursor: true,
        autoplay: {
          delay: 5500,
        },
        speed: 1000,
        pagination: {
          el: paginationEls[index],
          type: "bullets",
          clickable: true,
        },
      });
    });
  };
  window.addEventListener("load", testimonialSlider);
}
