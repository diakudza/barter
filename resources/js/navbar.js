export const headerJS = () => {
    const heighthNavbar = document.getElementById("navbar").offsetHeight;
    const navMenuContent = document.querySelector(".nav-menu__content");

    window.addEventListener("resize", (e) => {
        const windowSize = window.outerWidth;

        if (windowSize < 991) {
            navMenuContent.style.cssText = `top: ${heighthNavbar}px; height: calc(100vh - ${heighthNavbar}px);`;
        } else {
            navMenuContent.style.cssText = `top: initial; height: initial;`;
        }
    });
};
