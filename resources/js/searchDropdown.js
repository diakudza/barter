const searchDropdown = () => {
    let box = document.querySelector(".textBox"),
        dropdownItems = document.querySelectorAll(".dropdown"),
        option = document.querySelectorAll(".option > div");

    option.forEach((item) => {
        item.addEventListener("click", (e) => {
            let content = item.innerHTML;
            box.innerHTML = content;
        });
    });

    dropdownItems.forEach((dropdown) => {
        dropdown.addEventListener("click", () => {
            dropdown.classList.toggle("active");
        });
    });
};

export default searchDropdown;
