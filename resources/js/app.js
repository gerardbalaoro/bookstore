jQuery(document).ready(function ($) {
    $('[data-toggle=menu]').on('click', function () {
        $('#menu').slideToggle('fast', function () {
            $(this).css('display', 'flex');
        });
    });
    
    if (jQuery().magnificPopup) {
        $('.magnific').magnificPopup({type:'image'});
        $('.magnific').css('cursor', 'pointer');
    }

    if (jQuery().imgLazyLoad) {
        $('img[data-src]').imgLazyLoad({
            container: window,
            effect: 'fadeIn',
            speed: 600,
            delay: 400,
            callback: function () {}
        });
    }

    if (jQuery().jcarousel) {
        $('.jcarousel').jcarousel({
            wrap: 'circular'
        });
        
        $('.jcarousel[data-jcarouselautoscroll=true]').jcarouselAutoscroll({
            target: '+=3',
            interval: 4000,
            autostart: true
        });

        $('.carousel-clip').jcarousel({
            vertical: true,
            wrap: 'circular'
        });
        
        $('.carousel-prev').jcarouselControl({
            target: '-=4'
        });

        $('.carousel-next').jcarouselControl({
            target: '+=4'
        });
    }
});