const ham = document.getElementById('ham');
const menu_wrapper = document.getElementById('menu_wrapper');
ham.addEventListener('click', function() {
    ham.classList.toggle('clicked');
    menu_wrapper.classList.toggle('clicked');
});

const serch = document.getElementById('serch');
const text_wrapper = document.getElementById('text_wrapper');
serch.addEventListener('click', function() {
    serch.classList.toggle('clicked');
    text_wrapper.classList.toggle('clicked');
});

$(function(){
    $(".more").on("click", function() {
        $(this).toggleClass("on-click");
        $(".txt-hide").slideToggle(1000);
    });
});