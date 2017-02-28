var ayericlemeilleur = function () {
	this.src="img/full_heart.png"
}

var likeMe = document.querySelectorAll(".likeMe");

for (var i = 0; i < likeMe.length; i++) {
	likeMe[i].addEventListener('click', ayericlemeilleur);
}