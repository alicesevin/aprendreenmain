var ScrollMagic = require('scrollmagic');
require('scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap');
require('scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js');
var TweenMax = require("gsap");

module.exports = function () {
    (function () {
        document.addEventListener("DOMContentLoaded", function () {
            // init controller
            var controller = new ScrollMagic.Controller();
            // build scene
            var scene = new ScrollMagic.Scene({
                triggerElement: "#trigger1"
            })
                // .setTween("#animate1", 0.5, { backgroundColor: "green", scale: 2.5 }) // trigger a TweenMax.to tween
                .on("enter leave", function (e) {
						console.log('trigger')
					})
                .addIndicators() // add indicators (requires plugin)
                .addTo(controller);
        })

    })();
};