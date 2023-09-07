const video = document.getElementById("video");


video.addEventListener("play", function () {
    video.play();
    video.removeAttribute("controls");
    video.addEventListener("ended", function () {
        video.setAttribute("controls", "controls");
    });
});