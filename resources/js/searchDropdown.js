//Кастомные селекторы
import Choices from "choices.js";
import "simplebar";

const searchDropdown = () => {
    const elements = document.querySelectorAll(".form-control-input");

    elements.forEach((element) => {
        const choices = new Choices(element, {
            searchEnabled: false,
            itemSelectText: "",
            noResultsText: "Ничего не найдено",
        });

        //Это назначение aril label на самый верх
        let ariaLabel = element.getAttribute("aria-label");
        element.closest(".choices").setAttribute("aria-label", ariaLabel);

        let classElement = element.dataset.class;
        element.closest(".choices__inner").classList.add(classElement);

        if (classElement === "search__category") {
            element.closest(".choices").setAttribute("data-elem", classElement);
        } else {
            element.closest(".choices").setAttribute("data-elem", "gray-arrow");
        }

        //Подключение simplebar
        element
            .closest(".choices")
            .querySelector(".choices__list--dropdown > .choices__list")
            .setAttribute("data-simplebar", "");
    });
};

export default searchDropdown;
