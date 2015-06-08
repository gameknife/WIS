<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no"/>
	<link href="/public/css/islider.css" rel="stylesheet">
	<style>
		body {
			margin: 0;
			padding: 0;
			background: #fff;
			overflow: hidden;
			font-family: "Helvetica Neue", Helvetica, STHeiTi, sans-serif;
		}
		/*ul wrapper*/
		#iSlider-wrapper {
			height: 100%;
			width: 100%;
			overflow: hidden;
			position: absolute;
		}

		#iSlider-wrapper ul {
			list-style: none;
			margin: 0;
			padding: 0;
			height: 100%;
			overflow: hidden;
		}
		#iSlider-wrapper li {
			position: absolute;
			margin: 0;
			padding: 0;
			height: 100%;
			overflow: hidden;
			display: -webkit-box;
			-webkit-box-pack: center;
			-webkit-box-align: center;
			list-style: none;
		}
		#iSlider-wrapper li  img{
			max-width: 100%;
			max-height: 100%;
		}
		.music-btn {
		  	float: right;
		  	width: 1.8333333333333rem;
		  	height: 1.8333333333333rem;
		  	background: url('/images/card/music-icon.png');
		  	background-size: cover;
		}
		.music-btn.on {
		  	-webkit-animation: reverseRotataZ 1.2s linear infinite;
		}
		.media-wrap {
		  	overflow: hidden;
		  	position: fixed;
		  	top: 2.9166666666667rem;
		  	right: 1.375rem;
		  	z-index: 10000;
		  	width: 6.5em;
		  	height: 6.5em;
		  	font-size: 16px;
		}
		.media-wrap span {
			float: left;
		  	height: 4em;
		  	width: 4em;
		  	line-height: 3rem;
		  	color: #fff;
		  	font-size: 1em;
		}
		.media-wrap i {
			width: 2.5em;
			height: 2.5em;
		}
		@-webkit-keyframes reverseRotataZ {
		  	0% {
		    	-webkit-transform: rotateZ(0deg);
		  	}
		  	100% {
		    	-webkit-transform: rotateZ(-360deg);
		  	}
		}
		/* Arrow */
		#iSlider-arrow {
			position: absolute;
			width: 3em;
			height: 3em;
			left: 0;
			right: 0;
			bottom: 5%;
			margin: 0 auto;
			border-top: 2px solid #fff;
			border-right: 2px solid #fff;
			z-index: 10000;
			opacity: 0.8;
			-webkit-animation: nextPage 1.2s linear infinite;
		}
		@-webkit-keyframes nextPage {
		  	0% {
		    	-webkit-transform: translateY(40px) rotate(-45deg);
		    	opacity: 0.8;
		  	}
		  	50% {
		  		-webkit-transform: translateY(20px) rotate(-45deg);
		  		opacity: 0.4;
		  	}
		  	100% {
		    	-webkit-transform: translateY(10px) rotate(-45deg);
		    	opacity: 0;
		  	}
		}
	</style>
</head>

<body>
	<!-- Outer Canvas 外层画布 -->
	<div id="iSlider-wrapper"></div>
	<aside class="media-wrap">
		<span id="musicBtnTxt" style="display: none;">关闭</span>
		<i id="musicBtn" class="music-btn on"></i>
	</aside>
	<audio src="/images/card/bgm1.mp3" autoplay="autoplay" loop="loop" id="autoplay"></audio>
	<div id="iSlider-arrow"></div>
	<script src="/public/js/islider.js"></script>

	<script>
		var list = [
			{content: "/images/card/1.jpg"},
			{content: "/images/card/2.jpg"},
			{content: "/images/card/3.jpg"},
			{content: "/images/card/4.jpg"},
			{content: "/images/card/5.jpg"},
			{content: "/images/card/6.jpg"}];
		
		var	islider = new iSlider({
			type: 'pic',
		    data: list,
		    dom: document.getElementById("iSlider-wrapper"),
		    isVertical: true,
		    isLooping: true,
		    animateType: 'card',
		    onslidechange: function(idx) {

		    	if (this.isLooping === false) {
			    	if (idx === this.data.length - 1) {
			    		document.getElementById('iSlider-arrow').style.display = 'none';
			    	}
			    	else {
			    		document.getElementById('iSlider-arrow').style.display = 'block';
			    	}
			    }
		    }
		});

		var audio = document.getElementById('autoplay');
		var controller = document.getElementById('musicBtn');
		var controllerHint = document.getElementById('musicBtnTxt');

		document.getElementById('musicBtn').addEventListener('touchstart', function() {

			controllerHint.style.display = '';
			if (audio.paused) {
				audio.play();
				controller.className = 'music-btn on';
				controllerHint.innerHTML = '开始';
			} else {
				audio.pause();
				controller.className = 'music-btn';
				controllerHint.innerHTML = '关闭';
			}

			setTimeout(function() {
				controllerHint.style.display = 'none';
			}, 1000);

		}, false);

	</script>
</body>
</html>
