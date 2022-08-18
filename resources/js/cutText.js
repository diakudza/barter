const cutText = () => {
    Ellipsis({
        ellipsis: "…",
        debounce: 0,
        responsive: true,
        className: ".card__title",
        lines: 1,
        portrait: null,
        break_word: false,
    });
};

export default cutText;
