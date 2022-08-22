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
            allowHTML: true,

            // classNames: {
            //     containerOuter: "choices",
            //     containerInner: "choices__inner",
            //     input: "choices__input",
            //     inputCloned: "choices__input--cloned",
            //     list: "choices__list",
            //     listItems: "choices__list--multiple",
            //     listSingle: "choices__list--single",
            //     listDropdown: "choices__list--dropdown",
            //     item: "choices__item",
            //     itemSelectable: "choices__item--selectable",
            //     itemDisabled: "choices__item--disabled",
            //     itemChoice: "choices__item--choice",
            //     placeholder: "choices__placeholder",
            //     group: "choices__group",
            //     groupHeading: "choices__heading",
            //     button: "choices__button",
            //     activeState: "is-active",
            //     focusState: "is-focused",
            //     openState: "is-open",
            //     disabledState: "is-disabled",
            //     highlightedState: "is-highlighted",
            //     selectedState: "is-selected",
            //     flippedState: "is-flipped",
            //     loadingState: "is-loading",
            //     noResults: "has-no-results",
            //     noChoices: "has-no-choices",
            // },
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
