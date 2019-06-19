$(document).ready(function(){
    let modal = $('.modal'),
        modalBtn = $('.modal .btn__my');

    setTimeout(function(){
        modal.fadeIn();
    }, 300);

    modalBtn.on('click', function(){
        modal.fadeOut();
    });
});