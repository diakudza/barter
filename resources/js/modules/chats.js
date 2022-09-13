const chats = () => {
    if (window.innerWidth <= 1140) {
        let back = document.querySelector(".chats__back");
        let list = document.querySelector(".chats__list");
        let chat = document.querySelector(".chats__chat");
        function openChat() {
            back.style.display = "flex";
            list.style.display = "none";
            chat.style.display = "flex";
        }
        function closeChat() {
            back.style.display = "none";
            list.style.display = "flex";
            chat.style.display = "none";
        }
    }
};

export default chats;
