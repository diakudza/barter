const checkImg = () => {

    document.addEventListener('DOMContentLoaded', () => {

        window.addEventListener('error', function(e) {

            const target = e.target;

            if (target.classList.contains('card__product-img')) {
                target.src = '/images/product/placeholder400x400.png';
            }

            if (target.classList.contains('.author-img')) {
                target.src = 'https://via.placeholder.com/40x40';
            }

        }, true);
    });

};

export default checkImg;