const addProducts = () => {
    const addFormContainer = document.querySelector('.change-product__form'),
        cardTitleInput = document.querySelector("[name='title']"),
        cardCity = document.querySelector('.change-item__city'),
        previewTitle = document.querySelector('.preview-card__title'),
        previewCity = document.querySelector('.preview-card__location-text'),
        photoInput = document.querySelector('.change-item__input--photo');

    if (!addFormContainer) {
        return;
    }

    const loadFile = addFormContainer.querySelector('.load-file'),
        loadFileWrapper = addFormContainer.querySelector('.load-file__wrapper');

    loadFile.addEventListener('click', () => {
        photoInput.click();
    })

    photoInput.addEventListener("change", function (e) {
        let filesItems = e.target.files[0];

        let picture = new FileReader();

        picture.readAsDataURL(filesItems);
        picture.addEventListener('load', function (event) {
            document.getElementById('uploadedImage').setAttribute('src', event.target.result);
        });


        // if (filesItems.length > 1) {
        //     for (let i = 0; i < filesItems.length; i++) {
        //         itemFile = `
        //             <div class="load-file__item">
        //                 <h4 class="load-file__item-name">Название: ${filesItems[i].name}</h4>
        //             </div>`;
        //         // loadFileWrapper.insertAdjacentHTML('afterbegin', itemsHtml);
        //     }
        // } else {
        //     itemFile = `
        //         <div class="load-file__item">
        //             <h4 class="load-file__item-name">Название: ${filesItems[0].name}</h4>
        //         </div>`;
        //     loadFileWrapper.innerHTML = itemFile;
        // }


    });

    cardTitleInput.addEventListener('input', () => {
        let valueItem = cardTitleInput.value;

        if (!valueItem.length) {
            previewTitle.innerText = 'Название товар';
        } else {
            previewTitle.innerText = valueItem;
        }

    })

    cardCity.addEventListener('change', () => {
        let valueItem = cardCity.innerText;

        if (!valueItem.length) {
            previewCity.innerText = 'Ваш город';
        } else {
            previewCity.innerText = valueItem;
        }
    })
}

export default addProducts;
