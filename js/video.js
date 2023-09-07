const video = document.getElementById("video");


video.addEventListener("play", function () {
  video.play();
  video.controls=false;
});