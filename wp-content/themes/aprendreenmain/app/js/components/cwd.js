var ScrollMagic = require('scrollmagic');
require('scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap');
require('scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js');
var $ = require('jquery');

module.exports = function () {
// SVG Loader
    $(document).ready(function () {
        var duration = 2000;
// variable de la value du compteur
        var count = ulule.total;
        var toReach = ulule.require;
        var percent = count / toReach * 75;
        var countTop = $('#animated').offset().top;
        var start = true;


        var s = Snap('#animated');
        var progress = s.select('#progress');

        progress.attr({strokeDasharray: '0, 251.2'});

        $(window).scroll(function () {
            if ($(window).scrollTop() > countTop - 400 && start == true) {

                $({Counter: 0}).animate({Counter: count}, {
                    duration: duration,
                    easing: 'linear',
                    step: function () {
                        $('#count').text(numberWithCommas((this.Counter)) + " €")
                    }
                });
                Snap.animate(0, (251.2 / 100) * percent, function (value) {
                    progress.attr({'stroke-dasharray': value + ',251.2'});
                }, duration);
                start = false;
            }
        });
        function numberWithCommas(x) {
            return x.toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                .replace(/\..*$/, '');
        }

        var controller = new ScrollMagic.Controller();

        //Forms
        $('.form').each(function () {
            var from = parseInt($(this).find('.from').html()),
                to = parseInt($(this).find('.to').html()),
                property = $(this).find('.property').html(),
                duration = parseInt($(this).find('.duration').html());

            if (property == "left") {
                var objFrom = {left: from + '%'},
                    objTo = {
                        left: to + '%',
                        ease: Back.easeOut
                    };
            } else if (property == "top") {
                objFrom = {top: from + '%'};
                objTo = {
                    top: to + '%',
                    ease: Back.easeOut
                };
            }

            var form = TweenMax.staggerFromTo($(this), 40, objFrom, objTo, 40);

            var forms = new ScrollMagic.Scene({triggerElement: $(this).closest('.tpl')[0], duration: duration})
                .setTween(form)
                .addTo(controller);
        });
        // Team

        /*var controller = new ScrollMagic.Controller();

         var cards = TweenMax.staggerFromTo(".list-item__tpl-eqp", 2, {opacity: 0}, {opacity: 1, ease: Back.easeOut}, 0.15);

         var team = new ScrollMagic.Scene({triggerElement: ".trigger-team", duration: 1000})
         .setTween(cards)
         .addTo(controller);

         */
    });
};