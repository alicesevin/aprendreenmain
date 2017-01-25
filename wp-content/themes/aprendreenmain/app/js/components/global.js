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
