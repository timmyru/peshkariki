document.addEventListener('DOMContentLoaded', function () {

    let form = document.querySelector('.search-form');
    let inputs = document.querySelectorAll('.form-input');
    let nameInput = document.querySelector('.form-name');
    let phoneInput = document.querySelector('.form-phone');
    let addressInput = document.querySelector('.form-address');
    let nameValid = document.querySelector('.validation-name');
    let phoneValid = document.querySelector('.validation-phone');
    let addressValid = document.querySelector('.validation-address');
    let result = document.querySelector('.result');
    let resultDistance = document.querySelector('.result-distance__info');
    let resultPoint = document.querySelector('.result-point__info');
    let resultName = document.querySelector('.result-name__info');
    let resultPhone = document.querySelector('.result-phone__info');
    let resultImg = document.querySelector('.result-img');

    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function () {
            inputs[i].parentNode.children[2].innerHTML = '';
            inputs[i].style.borderColor = '#ced4da';
        })
    }

    phoneInput.addEventListener('keyup', function () {
        this.value = this.value.replace(/\D/g, '').substr(0, 10);
    });

    form.addEventListener('submit', function () {
        event.preventDefault();
        result.style.display = 'none';
        resultImg.innerHTML = '';

        let submit = true;
        if (nameInput.value.length === 0) {
            nameValid.innerHTML = 'Поле "ФИО" обязательно к заполнению';
            nameInput.style.borderColor = 'red';
            submit = false;
        }
        if (phoneInput.value.length === 0) {
            phoneValid.innerHTML = 'Поле "Телефон" обязательно к заполнению';
            phoneInput.style.borderColor = 'red';
            submit = false;
        } else if (phoneInput.value.length !== 10 || !phoneInput.value.match(/[0-9]{10}/g)) {
            phoneValid.innerHTML = 'Напишите телефон в формате 9213002040';
            phoneInput.style.borderColor = 'red';
            submit = false;
        }
        if (addressInput.value.length === 0) {
            addressValid.innerHTML = 'Поле "Адрес" обязательно к заполнению';
            addressInput.style.borderColor = 'red';
            submit = false;
        } else if (addressInput.value.length < 5) {
            addressValid.innerHTML = 'Не менее 5 символов';
            addressInput.style.borderColor = 'red';
            submit = false;
        }

        if (submit === true) {
            let name = nameInput.value;
            let phone = phoneInput.value;
            let address = addressInput.value;

            const request = new XMLHttpRequest();
            const url = "ajax.php?name=" + name + "&phone=" + phone + "&address=" + address;

            request.responseType = "json";
            request.open('GET', url);
            request.setRequestHeader('Content-Type', 'application/x-www-form-url');
            request.addEventListener("readystatechange", () => {
                {
                    if (request.readyState === 4 && request.status === 200) {
                        result.style.display = 'block';
                        resultName.innerHTML = request.response.name;
                        resultPhone.innerHTML = request.response.phone;
                        resultPoint.innerHTML = request.response.pointName;
                        resultDistance.innerHTML = request.response.distance;
                        let img = document.createElement('img');
                        img.setAttribute('src', 'img/' + request.response.image);
                        img.setAttribute('alt', request.response.pointName);
                        resultImg.appendChild(img);
                    }
                }
            });
            request.send();
        }
    });
});