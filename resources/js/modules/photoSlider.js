import {Carousel, Fancybox} from "@fancyapps/ui";

const photoSlider = () => {
    // Initialise Carousel
    const mainCarousel = new Carousel(document.querySelector("#mainCarousel"), {
        Dots: false,
    });

// Thumbnails
    const thumbCarousel = new Carousel(document.querySelector("#thumbCarousel"), {
        Sync: {
            target: mainCarousel,
            friction: 0,
        },
        Dots: false,
        Navigation: false,
        center: true,
        slidesPerPage: 1,
        infinite: false,
    });

// Customize Fancybox
    Fancybox.bind('[data-fancybox="product-card"]', {
        Toolbar: false,
        closeButton: "top",

        Carousel: {
            on: {
                change: (that) => {
                    mainCarousel.slideTo(mainCarousel.findPageForSlide(that.page), {
                        friction: 0,
                    });
                },
            },

            // Navigation: {
            //     prevTpl: '<svg class="slider-button__icon" width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.459 5.77144L0.958984 5.77144" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.41797 0.751099L13.4596 5.7711L8.41797 10.7919" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            //     nextTpl: '<svg class="slider-button__icon" width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.459 5.77144L0.958984 5.77144" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><path d="M8.41797 0.751099L13.4596 5.7711L8.41797 10.7919" stroke="#23262F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',
            //
            //     classNames: {
            //         button: 'slider-button',
            //
            //         next: 'slider-button-next',
            //         prev: 'slider-button-prev',
            //     },
            // },
        },
    });
};

export default photoSlider;
