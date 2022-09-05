const addProducts = () => {
    const cardTitleInput = document.querySelector("[name='title']");
    const previewTitle = document.querySelector('.preview-card__title');
    const previewCity = document.querySelector('.preview-card__location-text');

    cardTitleInput.addEventListener('input', ()=> {
        let valueText = cardTitleInput.value;

        previewTitle.innerText = valueText;
    })
}

export default addProducts;
