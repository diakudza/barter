const notification = () => {
    const alertBlock = document.querySelector(".alert");

    const hideBlock = () => {
        alertBlock.classList.add("class");
    };

    if (alertBlock) {
        setTimeout(hideBlock, 3000);
    }
};

export default notification;
