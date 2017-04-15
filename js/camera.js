var canvas = document.getElementById('canvas');
var canvase = document.getElementById('canevase');
var context = canvas.getContext('2d');
var contexte = canvase.getContext('2d');
var video = document.getElementById('video');

var apple = document.querySelector("#apple");
var beer = document.querySelector("#beer");
var frame = document.querySelector("#frame");
var hand = document.querySelector("#hand");
var mask = document.querySelector("#mask");
var send = document.querySelector("#send");
var result = document.querySelector("#result");

var appleSelected = false;
var beerSelected = false;
var frameSelected = false;
var handSelected = false;
var maskSelected = false;
var border = "5px solid #E82C0C";
var stuff = false;
var confirmed = false;

var errBack = function () {
	alert("Error");
};

HTMLCanvasElement.prototype.renderImage = function(blob){
  
  var ctx = this.getContext('2d');
  var img = new Image();

  img.onload = function(){
    ctx.drawImage(img, 0, 0)
  }

  img.src = URL.createObjectURL(blob);
};

if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
	navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
		video.src = window.URL.createObjectURL(stream);
		video.play();
	}, errBack);
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

function enableButton(){
	if (appleSelected == true || beerSelected == true || frameSelected == true || handSelected == true || maskSelected == true){
		document.getElementById("snap").disabled = false;

		document.getElementById("snap").addEventListener("click", function() {
			confirmed = true;
			contexte.drawImage(video, 0, 0, 426, 320);
			contexte.drawImage(canvas, 0, 0, 426, 320);
		})
	};
}

apple.addEventListener('click', function () {
	toggleVar('apple'); 
	context.clearRect(0, 0, canvas.width, canvas.height);
	if (stuff != false)
	{
		var img = new Image();
		img.src = URL.createObjectURL(stuff);
		var mythis = this;
		img.onload = function(){
		    context.drawImage(img, 0, 0)
			context.drawImage(mythis,100,100,100,100); 
		}
	}
	else
		context.drawImage(this,100,100,100,100);

});

beer.addEventListener('click', function () {
	toggleVar('beer');
	context.clearRect(0, 0, canvas.width, canvas.height);
	if (stuff != false)
	{
		var img = new Image();
		img.src = URL.createObjectURL(stuff);
		var mythis = this;
		img.onload = function(){
		    context.drawImage(img, 0, 0)
			context.drawImage(mythis,200,200,100,120); 
		}
	}
	else
		context.drawImage(this,200,200,100,120); 
});

frame.addEventListener('click', function () {
	toggleVar('frame');
	context.clearRect(0, 0, canvas.width, canvas.height);
	if (stuff != false)
	{
		var img = new Image();
		img.src = URL.createObjectURL(stuff);
		var mythis = this;
		img.onload = function(){
		    context.drawImage(img, 0, 0)
			context.drawImage(mythis,0,0,426,320); 
		}
	}
	else
		context.drawImage(this,0,0,426,320); 
});

hand.addEventListener('click', function () {
	toggleVar('hand');
	context.clearRect(0, 0, canvas.width, canvas.height);
	if (stuff != false)
	{
		var img = new Image();
		img.src = URL.createObjectURL(stuff);
		var mythis = this;
		img.onload = function(){
		    context.drawImage(img, 0, 0)
			context.drawImage(mythis,275,100,150,120); 
		}
	}
	else
		context.drawImage(this,275,100,150,120); 
});

mask.addEventListener('click', function () {
	toggleVar('mask');
	context.clearRect(0, 0, canvas.width, canvas.height);
	if (stuff != false)
	{
		var img = new Image();
		img.src = URL.createObjectURL(stuff);
		var mythis = this;
		img.onload = function(){
		    context.drawImage(img, 0, 0)
			context.drawImage(mythis,100,0,140,200); 
		}
	}
	else
		context.drawImage(this,100,0,140,200); 
});

send.addEventListener('click', function (e) {
	e.preventDefault();
	if (confirmed == false)
	{
		alert('Veuillez prendre une photo et sélectionner un filtre');
		return ;
	}
	var xhr = getHttpRequest();
	var data = new FormData();
	var URI = canvase.toDataURL();
	var new_div = "";
	data.append("img", URI);
	data.append("post_photo", 1);

	xhr.open('POST', '/Camagru/process/publish.php', true);
	xhr.setRequestHeader('X-Requested-With', 'xmlhttprequest');
	xhr.send(data);
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
				console.log(xhr.responseText);
				data = JSON.parse(xhr.responseText);
				console.log(data);
				if (data.status == true) {
					new_div += "<div class=\"pic\">" 
					new_div += "<img src=\""+ URI +"\" alt=\"ex1\" border=\"0\" height=\"250\">";
					new_div += "</div>";
					result.innerHTML = new_div + result.innerHTML;
				}
				else
					alert(data.message);
			}
			else
				alert('Une erreur est survenue');
		} 
	}
});

document.querySelector("#upload_picture").addEventListener("change", function() {
	if (this.files.length > 0) {
		stuff = this.files[0]
       canvas.renderImage(stuff);
	}
});

function toggleVar(name) {
	appleSelected = false;
	beerSelected = false;
	frameSelected = false;
	handSelected = false;
	maskSelected = false;
	apple.style.border = "";
	beer.style.border = "";
	frame.style.border = "";
	hand.style.border = "";
	mask.style.border = "";

	switch(name){
		case 'apple':
			appleSelected = true;
			apple.style.border = border;
			break;
		case 'beer':
			beerSelected = true;
			beer.style.border = border;
			break;
		case 'frame':
			frameSelected = true;
			frame.style.border = border;
			break;
		case 'hand':
			handSelected = true;
			hand.style.border = border;
			break;
		case 'mask':
			maskSelected = true;
			mask.style.border = border;
			break;
	}
	confirmed = false;
}

