var TweenMax = require("gsap");

module.exports = function () {
    (function () {
        document.addEventListener("DOMContentLoaded", function () {
            duration = 1.8;

            // landAnimations

            landAnimation = {
                opacity: 0,
                bottom: "-10%",
                ease: SlowMo.ease.config(0.1, 0.1, false)
            };

            toLeft = {
                x: "-180%",
                ease: SlowMo.ease.config(0.1, 0.1, false)
            };

            toRight = {
                x: "300%",
                ease: toLeft.ease
            }

            textAnimation = {
                opacity: 0
            }


            offset1 = '-=0.6'
            offset2 = '-=2'

            // TImelines

            var tl = new TimelineMax();
            tl.from('.plx-z-7.fond', duration, landAnimation)
                .from('.plx-z-6.fond', duration, landAnimation, offset1)
                .from('.plx-z-5.fond', duration, landAnimation)
                .from('.plx-z-4.fond', duration, landAnimation)
                .from('.plx-z-3.fond', duration, landAnimation, offset1)
                .from('.plx-z-2.fond', duration, landAnimation, '-=1.2')
                .from('.plx-z-1.fond', duration, landAnimation, '-=1.7')

            duration2 = 2.2;
            
            var tl2 = new TimelineMax();
            tl2.from(['.arbre1', '.animal'], duration2, toLeft)
                .from('.arbre2', duration2, toRight, offset2)
                .from('.arbre3', duration2, toLeft, "-=1")
                .from('.arbre4', duration2, toRight, offset2)
                .from('.arbre4', duration2, toRight, offset2)
                .from('.plx-cartel', 0.3, textAnimation)

        });
    })();
};