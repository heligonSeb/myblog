document.addEventListener("DOMContentLoaded", function () {
    let btnBurger = document.querySelector('.ico-btn');

    btnBurger.addEventListener('click', () => {
        btnBurger.classList.toggle('is-active');
    });
});



