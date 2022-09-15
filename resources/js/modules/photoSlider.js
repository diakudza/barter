import Swiper, { Navigation, Pagination, Autoplay } from 'swiper';

const photoSlider = () => {
    new Swiper('.works__slider', {
        slidesPerView: 3,
        centeredSlides: true,
        initialSlide: 1,
        loop: true,
        modules: [Navigation, Pagination, Autoplay],

        navigation: {
            nextEl: '.works__slider-btn-next',
            prevEl: '.works__slider-btn-prev',
        },

        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },

        autoplay: {
            delay: 3000,
        },
    });
};

export default photoSlider;