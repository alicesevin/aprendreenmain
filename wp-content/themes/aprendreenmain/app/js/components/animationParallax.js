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
        return Math.ceil(result);
      }
      
      // move background
      setInterval(function(){

        var distance = getRandomNumber(10, 0);
        var duree = getRandomNumber(4, 0);
        var anime = 3;

        TweenMax.to(fond2, anime, {
          y : distance
        });

        TweenMax.staggerTo(cloud, 2, {
          y : distance
        });
      }, 3000);


// anonimate function
    })
  })();
};
