// Require des composants
var appGlobal = require('./components/global');
var animationParallax = require('./components/animationParallax');
var startAnimation = require('./components/startAnime');
var scrollAnimation = require('./components/scrollAnimation');
var cwd = require('./components/cwd');

// Initialisation des globaux
appGlobal();
startAnimation();
scrollAnimation();
animationParallax();
cwd();
