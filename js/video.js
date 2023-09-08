const video = document.getElementById("video");
const play = document.getElementById("play");

play.addEventListener("click", function () {
    
  video.play();
  video.controls=false;
});