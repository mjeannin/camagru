var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
} else if(navigator.getUserMedia) {
    navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) {
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) {
    navigator.mozGetUserMedia({ video: true }, function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
    }, errBack);
}

document.getElementById("snap").addEventListener("click", function() {
    context.drawImage(video, 0, 0, 640, 480);
});

