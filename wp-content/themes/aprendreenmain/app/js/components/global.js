var $ = require('jquery');

module.exports = function () {

    (function () {

        document.addEventListener("DOMContentLoaded", function () {
            var $start = $('.start'),
                $header = $('.header'),
                $main = $('.main');
            setTimeout(function () {
                $start.each(function () {
                    $(this).removeClass('start');
                });
            }, 500);

            var headerTop = $header.offset().top;
            if ($(window).scrollTop() > headerTop) {
                $header.addClass('sticky');
                $main.addClass('sticky-header');
            }
            $(window).scroll(function () {
                if ($(window).scrollTop() > headerTop) {
                    $header.addClass('sticky');
                    $main.addClass('sticky-header');
                } else {
                    $header.removeClass('sticky');
                    $main.removeClass('sticky-header');
                }

            });

        })
    })();
};
