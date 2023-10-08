const swiper = new Swiper(".swiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    slidesPerView: 4,
    spaceBetween: 0,
    autoHeight: true,

    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 0,
        },
        767: {
            slidesPerView: 3,
        },
        991: {
            slidesPerView: 4,
            spaceBetween: 20,
        },
    },
});
