export const headerJS = () => {
    const burgerBtn = document.querySelector(".btn-toggel");
    const navMenu = document.querySelector(".nav-menu__body");

    const profileBody = document.querySelector(".nav-profile__body");

    document.addEventListener("click", (e) => {
        const target = e.target;

        if (target.closest(".btn-toggel")) {
            burgerBtn.classList.toggle("active");
            navMenu.classList.toggle("show");
        }

        if (target.closest(".nav-profile__avatar")) {
            profileBody.classList.toggle("show");
        }
    });
};
