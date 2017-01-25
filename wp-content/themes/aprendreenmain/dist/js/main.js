(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
module.exports = function () {

    document.addEventListener("DOMContentLoaded", function () {
        initApp();
    });

    function initApp() {
        var $start = document.querySelectorAll('.start');
        setTimeout(function(){
            for (var i = 0; i < $start.length; ++i) {
                $start[i].classList.remove("start");
            }
        }, 500);
    }
};

},{}],2:[function(require,module,exports){
module.exports = function () {
    
};
},{}],3:[function(require,module,exports){
// Require des composants
var appGlobal = require('./components/global');
var startAnimation = require('./components/startAnime');
// Initialisation des globaux
appGlobal();
},{"./components/global":1,"./components/startAnime":2}]},{},[3])

//# sourceMappingURL=main.js.map
