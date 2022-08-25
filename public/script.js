document.addEventListener("DOMContentLoaded", function () {
    // burger menu
    let btnBurger = document.querySelector('.ico-btn');

    btnBurger.addEventListener('click', () => {
        btnBurger.classList.toggle('is-active');
    });

    // ajout de commentaire pour un post
    let addCommentButton = document.querySelector('#addCommentButton');
    let closeCommentButton = document.querySelector('#closeCommentButton');
    let cardAddComment = document.querySelector('#addComment');

    addCommentButton.addEventListener('click', () => {
        cardAddComment.classList.remove('d-none');
    });

    closeCommentButton.addEventListener('click', () => {
        cardAddComment.classList.add('d-none');
    });
});



