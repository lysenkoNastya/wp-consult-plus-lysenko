
$( document ).ready(function() {
    $('.slider-quote-list').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-image-list',
        autoplay: true
    });
    $('.slider-image-list').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '.slider-quote-list',
        centerMode: true,
        FocusOnSelect: true,
        dots: true
    });

});

















