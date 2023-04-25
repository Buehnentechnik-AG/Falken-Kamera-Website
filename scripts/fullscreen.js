window.addEventListener("DOMContentLoaded", () => {
	var imgs = document.querySelectorAll(".zoomable");
	for (let img of imgs) {
		console.log(img);
		img.onclick = () => {
			// (B1) EXIT FULLSCREEN
			if (document.webkitFullscreenElement || document.fullscreenElement) {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				} else if (document.webkitExitFullscreen) {
					document.webkitExitFullscreen();
				}
			}

			// (B2) ENGAGE FULLSCREEN
			else {
				if (img.requestFullscreen) {
					img.requestFullscreen();
				} else if (img.webkitRequestFullscreen) {
					img.webkitRequestFullscreen();
				}
			}
		};
	}
});