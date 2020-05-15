document.addEventListener('DOMContentLoaded', function(){
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems, {
        height: 250,
        indicators: false
    });
});