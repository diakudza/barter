export const headerJS = () => {
    const profileMenu = document.querySelector('.profile-menu');

    const burgerBtn = document.querySelector(".btn-toggel"),
     navMenu = document.querySelector(".header__content");

    if (!profileMenu) {
        return;
    }

    document.addEventListener('click', (event) => {
        const target = event.target;

        if (target.closest('.top-profile__avatar')) {
            profileMenu.classList.toggle('show');
        }

        if (!target.closest('.top-profile__avatar') && profileMenu.classList.contains('show')) {
             profileMenu.classList.remove('show');
        }

        //Бургер
        if (target.closest('.btn-toggel')) {
            burgerBtn.classList.toggle("active");
            navMenu.classList.toggle('show');
        }
    });

    document.addEventListener('scroll', (event)=> {
        if (profileMenu.classList.contains('show')) {
            profileMenu.classList.remove('show');
        }
    });
};

