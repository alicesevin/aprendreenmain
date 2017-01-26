var TweenMax = require("gsap");
module.exports = function () {
  (function(){
    document.addEventListener("DOMContentLoaded", function(){
      // select last background
      var fond1 = document.querySelector('.plx-z-1.fond');
      var fond2 = document.querySelector('.plx-z-2.fond');

      // select cloud
      var cloud = document.querySelectorAll('nuage');

      // get a random number
      function getRandomNumber(max, min){
        var result = Math.random() * (max - min) + min;
        console.info(result);
        return Math.ceil(result);
      }
      
      // move background
      setInterval(function(){

        var distance = getRandomNumber(30, -30);
        var duree = getRandomNumber(4, 0);
        var anime = 3

        TweenMax.staggerTo([fond1, fond2], anime, {
          y : distance ,
        }, duree);
      }, 5000);


// anonimate function
    })
  })();
};
