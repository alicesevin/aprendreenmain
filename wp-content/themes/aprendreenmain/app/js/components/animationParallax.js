var TweenMax = require("gsap");
module.exports = function () {
  (function(){
    document.addEventListener("DOMContentLoaded", function(){
      // select last background
      var fond1 = document.querySelector('.plx-z-1.fond');
      var fond2 = document.querySelector('.plx-z-2.fond');

      // select cloud
      var cloud = document.querySelectorAll('.nuage');
      var cloud1 = cloud[0];
      console.log(cloud);

      // get a random number
      function getRandomNumber(max, min){
        var result = Math.random() * (max - min) + min;
        console.info(result);
        return Math.ceil(result);
      }

      // move background
      setInterval(function(){

        var distanceP = getRandomNumber(30, 0);
        var distanceN = getRandomNumber(0, -30);
        var cloudP = getRandomNumber(40, -40);
        var duree = getRandomNumber(4, 0);
        var anime = 3

        TweenMax.to(fond1, anime, {
          y : distanceP
        });
        TweenMax.to(fond2, anime,{
          y : distanceN
        });
        TweenMax.to(cloud, anime, {
          x : cloudP,
          repeat : -1,
          yoyo : true
        });
      }, 5000);


// anonimate function
    })
  })();
};
