var TweenMax = require("gsap");

module.exports = function () {
    (function () {
        document.addEventListener("DOMContentLoaded", function () {
            mainAnime = Sine.easeOut;
            duration = 1.8;

            // landAnimations

            landAnimation = {
                opacity: 0,
                bottom: "-10%",
                ease: mainAnime
            };

            toLeft = {
                x: "-190%",
                ease: mainAnime
            };

            toRight = {
                x: "280%",
                ease: mainAnime
            }

            textAnimation = {
                opacity: 0
            }


            offset1 = '-=1.2'
            offset2 = '-=2'

            // TImelines

            var tl = new TimelineMax();
            tl.to('.plx-z-7.fond', duration, landAnimation)
                .from('.plx-z-6.fond', duration, landAnimation, offset1)
                .from('.plx-z-5.fond', duration - 0.5, landAnimation)
                .from(['.plx-z-4.fond', '.plx-z-3.fond'], duration, landAnimation)
                .from(['.plx-z-1.fond', '.plx-z-2.fond'], duration, landAnimation, 'end')
            // .from(', duration, landAnimation, '-=1.8')

            duration2 = 1.8;

            var tl2 = new TimelineMax();
            tl2.from(['.arbre1', '.animal'], duration2, toLeft)
                .from('.arbre2', duration2, toRight)
                .from('.arbre3', duration2, toLeft)
                .from('.arbre4', duration2, toRight,"-=1.6")
                .from('.plx-cartel', 0.3, textAnimation)


        });
    })();
};