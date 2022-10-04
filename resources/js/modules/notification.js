const notification = () => {

    document.addEventListener('DOMContentLoaded', () => {
        const alertBlock = document.querySelector(".alert");

        if (!alertBlock) {
            return;
        }

        const hiddenAlert = () => {
            alertBlock.classList.add('animate__fadeOutRight');
        }

        setTimeout(hiddenAlert, 3000);
    })

};

export default notification;
