(function($) {
    var owl = $('.Slideshow__Items');
    owl.owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true
    });
})(jQuery);