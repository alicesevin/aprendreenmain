var $ = require('jquery');

module.exports = function () {
    (function () {
// SVG Loader
    document.addEventListener("DOMContentLoaded", function () {
        var duration = 2000;
// variable de la value du compteur
        var count = ulule.total;
        var toReach = ulule.require;
        var percent = count / toReach * 75;

        $({Counter: 0}).animate({Counter: count}, {
            duration: duration,
            easing: 'linear',
            step: function () {
                $('#count').text(numberWithCommas((this.Counter)) + " €")
            }
        });
        var s = Snap('#animated');
        var progress = s.select('#progress');

        progress.attr({strokeDasharray: '0, 251.2'});

        Snap.animate(0, (251.2 / 100) * percent, function (value) {
            progress.attr({'stroke-dasharray': value + ',251.2'});
        }, duration);

        function numberWithCommas(x) {
            return x.toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                .replace(/\..*$/, '');
        }

// Team

        var cards = document.querySelectorAll('.team-card');

        var sceneTop = new ScrollMagic.Scene({
            triggerElement: "#trigger-team",
        })
            .setTween(cards, 3, {opacity: 1})
            .addTo(controller);

    })
    })();
};