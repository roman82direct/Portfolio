var video = document.getElementById('myVideo');
var playbutton = document.getElementById("playBut");

playbutton.addEventListener("click", function (e) {
  //  Toggle between play and pause based on the paused property
  if (video.paused) {
    video.play();
  } else {
    video.pause();
  }
}, false);

//video.addEventListener("play", function () {
//  playbutton.innerHTML = "Pause";
//}, false);
//
//video.addEventListener("pause", function () {
//  playbutton.innerHTML = "Play";
//}, false);


// PARALLAX effect
        var imageLeft = document.querySelector('.leftimg'),
            imageRight = document.querySelector('.rightimg'),
            imageCenter = document.querySelector('.centerimg'),
            imagePhone = document.querySelector('.phoneimg');


        new simpleParallax(imageLeft, {
            orientation: 'left',
            delay: .6,
            transition: 'cubic-bezier(0,0,0,1)'
        });
        new simpleParallax(imageRight, {
            orientation: 'right',
            delay: .6,
            transition: 'cubic-bezier(0,0,0,1)'
        });
        new simpleParallax(imageCenter, {
//            scale: 2,
//            overflow: true,
            delay: .6,
            transition: 'cubic-bezier(0,0,0,1)'
        });
//        new simpleParallax(imagePhone, {
//            scale: 1.2,
//            delay: .6,
//            transition: 'cubic-bezier(0,0,0,1)'
//        });