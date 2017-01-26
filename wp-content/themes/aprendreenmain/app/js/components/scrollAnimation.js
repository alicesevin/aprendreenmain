var ScrollMagic = require('scrollmagic');
require('scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap');
// require('scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js');
var TweenMax = require("gsap");
var $ = require('jquery');

module.exports = function () {
    (function () {
        document.addEventListener("DOMContentLoaded", function () {
            var pompe = $('.pompe'),
                puit = $('.puit'),
                ouvrier = $('.ouvrier'),
                garcon = $('.garcon'),
                garcon2 = $('.garcon2'),
                garcon3 = $('.garcon3'),
                sceau = $('.sceau'),
                femme = $('.femme'),
                femme2 = $('.femme2'),
                femme3 = $('.femme3'),
                homme = $('.homme'),
                homme2 = $('.homme2'),
                homme3 = $('.homme3'),
                pieces = $('.pieces'),
                pieces2 = $('.pieces2'),
                etape1 = $('.plx-cartel'),
                section1 = $('#section1'),
                maisons = $('.maison');

            var tl = new TimelineMax()
                .add(TweenMax.to(puit, 0.1, { opacity: 1 }))
                .add(TweenMax.to(etape1, 0.1, { opacity: 0 }))
                // etape 2
                // TODO texte etape2
                .add(TweenMax.to(etape1, 0.1, { opacity: 0 }))
                .add(TweenMax.to(garcon2, 0.4, { opacity: 1 }))
                // etape 3
                // TODO texte etape2
                .add(TweenMax.to(sceau, 0.4, { opacity: 1 }))
                // etape 4
                // TODO texte etape4
                .add(TweenMax.to(ouvrier, 0.4, { opacity: 1 }))
                // etape 5
                // TODO texte etape5
                .add(TweenMax.to([sceau, puit], 0.1, { opacity: 0 }))
                .add(TweenMax.to(pompe, 0.1, { opacity: 1 }))
                // etape 6
                // TODO texte etape6
                .add(TweenMax.to([femme, pieces, homme], 0.4, { opacity: 1 }))
                // etape 7
                //TODO texte etape7
                .add(TweenMax.to(pieces2, 0.4, { opacity: 1 }))
                // etape 7
                //TODO texte etape7
                .add(TweenMax.to([femme2, femme3, homme2, homme3, garcon, garcon3], 0.4, { opacity: 1 }))
                //etape 8
                //TODO texte etape7
                .add(TweenMax.to(maisons, 0.4, { opacity: 1 }))
                .add(TweenMax.set(section1, { className: "-=section1", immediateRender: false }))
                .add(TweenMax.set(section1, { className: "+=section2", immediateRender: false }))
                .add(TweenMax.to([femme, femme2, femme3, homme, homme2, homme3, garcon, garcon3, pieces, pieces2], 0.4, { opacity: 0 }))
            // init controller
            var controller = new ScrollMagic.Controller();
            // build scene
            var scene = new ScrollMagic.Scene({
                triggerElement: "#trigger1",
                duration: 1000,
                offset: 395
            }).setTween(tl)
                .setPin(".plx")
                // .addIndicators() // add indicators (requires plugin)
                .addTo(controller);
        })

    })();
};