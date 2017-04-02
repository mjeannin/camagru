var heart = function () {
	this.src="/Camagru/img/full_heart.png"
}

var likeMe = document.querySelectorAll(".likeMe");

for (var i = 0; i < likeMe.length; i++) {
	likeMe[i].addEventListener('click', heart);
}

