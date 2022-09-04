const scrollingTop = (targetBtn, targetSection) => {
    const btn = document.querySelector(targetBtn),
        section = document.querySelector(targetSection);

    const scrollTop = () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth',
        });
    };

    const scrolling = () => {
        btn.addEventListener('click', (event) => {
            const eventCount = event.detail;
            event.preventDefault();
            if (eventCount === 1) {
                scrollTop();
            }
            return;
        });
    };

    window.addEventListener('scroll', () => {
        if (section.offsetTop < document.documentElement.scrollTop) {
            btn.classList.add('show');
            scrolling();
        } else {
            btn.classList.remove('show');
        }
    });
}

export default scrollingTop;
