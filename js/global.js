jQuery(document).ready(function() {
    jQuery('#home-slider').slick({
        cssEase: 'ease-in-out',
        infinite: true,
        arrows:false,
        dots: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1
    });
});