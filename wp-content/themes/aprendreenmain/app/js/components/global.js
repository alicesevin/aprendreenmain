var $ = require('jquery');

module.exports = function () {

    (function () {

        document.addEventListener("DOMContentLoaded", function () {
            var $start = $('.start'),
                $header = $('.header'),
                $main = $('.main'),
                $navBar = $('#navbar');
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

            $('.navbar-toggle').on('click', function () {
                if ($navBar.hasClass('collapse')) {
                    $navBar.removeClass('collapse');
                } else {
                    $navBar.addClass('collapse');
                }
            });

            $('.tpl-tabs').on('click', '.tabs>a', function (e) {
                e.preventDefault();
                if (!$(this).hasClass('active')) {
                    $('.tabs>a').removeClass('active');
                    $(this).addClass('active');
                    $('.tabs-item').hide();
                    $($(this).attr('href')).show();
                }
            });

        })
    })();
};
