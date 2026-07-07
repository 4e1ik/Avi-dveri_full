(function ($) {
    'use strict';

    function bindNestedSliderEvents($slider) {
        $slider.on('mousedown touchstart', function (e) {
            e.stopPropagation();
        });

        $slider.find('> .slick-prev, > .slick-next').on('click mousedown touchstart', function (e) {
            e.stopPropagation();
        });
    }

    window.initProductCardImagesSliders = function (root) {
        if (typeof $.fn.slick === 'undefined') {
            return;
        }

        var $scope = root ? $(root) : $(document);
        $scope.find('.product-card-images-slider:not(.slick-initialized)').each(function () {
            var $slider = $(this);
            if ($slider.children('.product-card-images-slide').length < 2) {
                return;
            }

            $slider.slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                dots: false,
                infinite: true,
                speed: 300
            });
            bindNestedSliderEvents($slider);
        });
    };

    $(function () {
        initProductCardImagesSliders();
    });
}(jQuery));
