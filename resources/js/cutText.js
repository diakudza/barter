//Это обрезать текст т.е. поставить ...
import "ellipsis.js";

const cutText = () => {
    Ellipsis({
        ellipsis: "…",
        debounce: 100,
        responsive: true,
        className: ".card__title",
        lines: 2,
        portrait: null,
        break_word: false,
    });
};

export default cutText;
