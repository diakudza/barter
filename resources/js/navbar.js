export const headerJS = () => {
    const burgerBtn = document.querySelector(".btn-toggel");
    const navMenu = document.querySelector(".header__content");

    const profileBody = document.querySelector(".top-profile__menu");

    document.addEventListener("click", (e) => {
        const target = e.target;

        console.log(target);

        if (target.closest(".btn-toggel")) {
            burgerBtn.classList.toggle("active");
            navMenu.classList.toggle("show");
        }

        if (target.closest(".top-profile__avatar")) {
            profileBody.classList.toggle("show");
        }

        // if (target.closest('#main') || target.closest('#header')) {
        //     console.log(target);
        //     profileBody.classList.remove("show");
        // }
    });
};
