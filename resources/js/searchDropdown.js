//Кастомные селекторы
import Choices from "choices.js";

const searchDropdown = () => {
    // let box = document.querySelector(".textBox"),
    //     dropdownItems = document.querySelectorAll(".dropdown"),
    //     option = document.querySelectorAll(".option > div");
    // option.forEach((item) => {
    //     item.addEventListener("click", (e) => {
    //         let content = item.innerHTML;
    //         box.innerHTML = content;
    //     });
    // });
    // dropdownItems.forEach((dropdown) => {
    //     dropdown.addEventListener("click", () => {
    //         dropdown.classList.toggle("active");
    //     });
    // });

    const element = document.querySelector(".form-control-input");
    const choices = new Choices(element, {
        // searchEnabled: false,
        noResultsText: "Ничего не найдено",
    });

    let ariaLabel = element.getAttribute("aria-label");
    element.closest(".choices").setAttribute("aria-label", ariaLabel);
};

export default searchDropdown;
