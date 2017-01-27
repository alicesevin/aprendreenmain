var ScrollMagic = require('scrollmagic');
require('scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap');
require('scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js');
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
                etapes = $('.plx-cartel'),
                section1 = $('#section1'),
                maisons = $('.maison'),
                arbres = $('.arbre.plx-z-7');

            var tl = new TimelineMax()
                .add(TweenMax.to(puit, 0.2, { opacity: 1 }))
                .add(TweenMax.to(etapes[0], 0.2, { opacity: 1 }))
                // etape 2
                // TODO texte etape2
                .add(TweenMax.to(garcon2, 0.8, { opacity: 1 }))
                // etape 3
                // TODO texte etape2
                .add(TweenMax.to(sceau, 0.4, { opacity: 1 }))
                .add(TweenMax.to(etapes[0], 0.2, { opacity: 0 }))
                // etape 4
                // TODO texte etape4
                .add(TweenMax.to(etapes[1], 0.2, { opacity: 1 }))
                .add(TweenMax.to(ouvrier, 0.8, { opacity: 1 }))
                // etape 5
                // TODO texte etape5
                .add(TweenMax.to([sceau, puit], 0.2, { opacity: 0 }))
                .add(TweenMax.to(pompe, 0.2, { opacity: 1 }));
            arbres.each(function () {
                if ($(this).position().left > $(window).width() / 2) {
                    tl.add(TweenMax.to($(this), 0.8, { left: 150 + '%' }));
                } else {
                    tl.add(TweenMax.to($(this), 0.8, { left: -80 + '%' }));
                }
            });
            // etape 6
            // TODO texte etape6
            tl.add(TweenMax.to(maisons, 0.8, { opacity: 1 }))
                .add(TweenMax.to([femme, pieces, homme], 0.8, { opacity: 1 }))
                // etape 7
                //TODO texte etape7
                .add(TweenMax.to(pieces2, 0.8, { opacity: 1 }))
                // etape 7
                //TODO texte etape7
                .add(TweenMax.to([femme2, femme3, homme2, homme3, garcon, garcon3], 1.5, { opacity: 1 }))
                .add(TweenMax.set(section1, { className: "+=section2", immediateRender: false }))
                .add(TweenMax.to($('.nuagecustom'), { className: "+=nuage", immediateRender: false }))
                //etape 8
                //TODO texte etape7
                .add(TweenMax.to([garcon2, ouvrier, femme, femme2, femme3, homme, homme2, homme3, garcon, garcon3, pieces, pieces2], 0.8, { opacity: 0 }))
            // init controller
            var controller = new ScrollMagic.Controller();
            // build scene

            var scene = new ScrollMagic.Scene({
                triggerHook: "onLeave",
                triggerElement: "#trigger1",
                duration: 2500
            }).setTween(tl)
                .setPin(".plx")
                // .addIndicators() // add indicators (requires plugin)
                .addTo(controller);
        })
    })();
};