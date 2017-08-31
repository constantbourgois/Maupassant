$(document).ready(function () {
	var animTime = 2.6;
	var animTimeS = animTime * 1000;
	var paths;
	var targetsAnim;
	var circles;
	var animStage;
	var animMoving = false;
	var animCount = 0;
	var tweenFloat;
	var tweenCircle;
	var tweenScale;
	var animRounds;
	var dataFeatherlight;



	targetsAnim = $('#circles > g');
	circles = $('#circles > g').find('circle');
	circles.addClass('mainCircle');
	paths = $('#paths path');
	$('#circles').attr('data-animStage', 1);

	// identify circles and paths//
	$(paths).each(function (j) {
		$(this).attr('id', 'Path' + ($(paths).length - j));

	});

	getDistances();
	floatElements();
	animHover();


	//start floating //
	tweenFloat.play();



	$(targetsAnim).click(function (event) {
		event.preventDefault();

		animMoving = true;

		tweenFloat.kill();

		//bind event to button to restart floating on lightbox closes

		if (animCount === 0) {
			dataFeatherlight = $(this).attr('data-featherlight');

			switch ($(this).attr('data-path')) {
				case '6':
					animRounds = 1;
					animTime = 1.5;

					break;

				case '5':
					animRounds = 2;
					animTime = 2;

					break;

				case '4':
					animRounds = 3;

					break;

				case '3':
					animRounds = 1;

					break;

				case '2':
					animRounds = 2;
					animTime = 2;

					break;

				case '1':
					animRounds = 3;
					animTime = 1.5;

					break;

			}
		}

		runEngine();


	});

	function animHover() {



		$(targetsAnim).each(function (index, element) {

			tweenScale = new TimelineMax({
				paused: true
			});

			tweenScale.to(element, 0.2, {
				scale: "+=0.1",
				opacity: 1,
				transformOrigin: "50% 50%"
			})
			element.animation = tweenScale;
		})

		//toggle play and reverse of each .feature element's timeline on hover 
		$(targetsAnim).hover(over, out);

		function over() {
			if (animMoving === false)
				this.animation.play();
		}

		function out() {
			if (animMoving === false)
				this.animation.reverse();
		}







		/*var r = parseInt($(circles[i]).attr('r'));

			console.log($(this));

			$(this).clone().appendTo(targetsAnim[i]);
			$(this).clone().appendTo(targetsAnim[i]);

			var c = $(targetsAnim[i]).find('circle');

			$(c).each(function (j) {
				if (j === 0) {
					return;
				}

				$(this).attr('class', '');
				$(this).addClass('plain');
				$(this).attr('id', '');
				$(this).attr('r', r + 20);
				$(this).attr('fill', 'none');
				$(this).attr('stroke', 'white');
				if (j === 1) {
					$(this).removeClass('plain');
					$(this).addClass('dashed');
					$(this).attr('stroke-dasharray', '.5,5');
					$(this).attr('stroke', 'black');
				}

			});



		});

		TweenMax.to('.plain', 1, {
			delay: 0,
			drawSVG: '0%',
			strokeDashoffset: 3,
			ease: Expo.easeInOut
		});

		$(targetsAnim).mouseenter(function () {
			$('.plain').attr('stroke', 'black');
			console.log('enter', this);
			var t = $(this).find('.plain');
			TweenMax.to(t, 1, {
				delay: 0,
				drawSVG: '100%',
				strokeDashoffset: 3,
				ease: Expo.easeInOut
			});
		});

		$(targetsAnim).mouseout(function () {
			var t = $(this).find('.plain');
			console.log('leave', this);
			TweenMax.to(t, 1, {
				delay: 0,
				drawSVG: '0%',
				strokeDashoffset: 3,
				ease: Expo.easeInOut
			});*/



	}

	function getDistances() {

		$(circles).each(function (i) {
			var closestDistance = 0;
			var closestPathIndex = null;
			var closestPathId = null;

			//get the distances//
			var coordCircle = new Point($(circles[i]).attr('cx'), $(circles[i]).attr('cy'));

			$(targetsAnim[i]).attr('data-target-width', ($(targetsAnim[i])[0]).getBoundingClientRect().width);


			$(paths).each(function (j) {

				var coordPath1 = new Point($(paths)[j].getPointAtLength(i).x, $(paths)[j].getPointAtLength(i).y);

				var distance = Math.round(getDistance(coordCircle, coordPath1));

				if ((closestDistance === 0) || (distance < closestDistance)) {

					closestDistance = distance;

					closestPathIndex = j;

					closestPathId = $(paths[j]).attr('id');

					$(targetsAnim[i]).attr('data-path', $(targetsAnim).length - closestPathIndex);

					$(targetsAnim[i]).attr('id', 'target' + ($(paths).length - closestPathIndex));

					$(targetsAnim[i]).attr('data-target', ($(paths).length - closestPathIndex));

					$(targetsAnim[i]).find('.mainCircle').attr('id', 'circle' + ($(paths).length - closestPathIndex));

				}

			});

		});

	}

	function resetAnim() {

		tweenCircle.kill();
		tweenScale.kill();

		var newAnimstage = parseInt($('#circles').attr('data-animStage')) + 1;

		$(targetsAnim).each(function () {

			var currentPath = parseInt($(this).attr('data-path'));

			if (currentPath == $(targetsAnim).length) {
				$(this).attr('data-path', 1);
				//$(this).attr('id',  '#target'+ 1);//

			} else {
				$(this).attr('data-path', currentPath + 1);
				//$(this).attr('id',  '#target' + (parseInt($(this).attr('data-target')) + 1));//

			}

		});

		animCount++;

		if (animCount == animRounds) {

			$.featherlight(dataFeatherlight, {
				afterContent: function (event) {
					//to restart float//
					$('.featherlight-close-icon').on("click", function () {
						console.log("az");
						floatElements();
						tweenFloat.play();

					});
				}
			});

			animCount = 0;

			animMoving = false;

			animHover();

			return;

		}

		$('#target1').click();


	}

	function runEngine() {
		//********** circle and scale animation *************//
		//****************************************//

		var pathTarget;
		var target;
		var nextTarget;

		tweenCircle = new TimelineMax({
			paused: true,
			repeat: 0,
			onComplete: resetAnim,

		});

		tweenCircle.add('go');

		$(targetsAnim).each(function () {

			pathTarget = ('#Path' + $(this).attr('data-path'));
			target = document.getElementById($(this).attr('id'));
			if (parseInt($(this).attr('data-target')) == $(targetsAnim).length) {
				nextTarget = document.getElementById('target1');
			} else {
				nextTarget = document.getElementById(('target' + (parseInt($(this).attr('data-target')) + 1)));
			}

			var circleR = $(target).attr('data-target-width');
			var nextCircleR = nextTarget.getBoundingClientRect().width;

			var path = MorphSVGPlugin.pathDataToBezier(pathTarget, {
				align: target
			});

			var scale = (parseInt(nextCircleR) / parseInt(circleR));

			//********** set the tweens *************//
			//****************************************//

			tweenCircle.set(target, {
					xPercent: -50,
					yPercent: -50
				}, 'go')

				.to(target, animTime, {
					bezier: {
						values: path,
						type: "cubic"
					},
					ease: Linear.easeNone,
					repeat: 0
				}, 'go')

				.to(target, animTime, {
					scale: scale,
					transformOrigin: "50% 50%"
				}, 'go');

		});

		tweenCircle.play();




	}

	/*function runEngine(pathTarget, target, nextTarget) {
  
	  var scale;
	  var circleR = $(target).attr('data-target-width');
	  var nextCircleR = nextTarget.getBoundingClientRect().width;
  
	  var path = MorphSVGPlugin.pathDataToBezier(pathTarget, {
		align: target
	  });
  
	  scale = (parseInt(nextCircleR) / parseInt(circleR));
  
	  TweenMax.set(target, {
		xPercent: -50,
		yPercent: -50
	  });
  
	  var tl = new TimelineMax({
		onComplete: resetA
	  });
  
	  tl.to(target, animTime, {
		bezier: {
		  values: path,
		  type: "cubic"
		},
		ease: Linear.easeNone,
		repeat: 0
	  });
  
	  tl.to(target, animTime, {
		scale: scale,
		transformOrigin: "50% 50%"
	  }, "=-" + animTime + "");
  
	  function resetA() {
		animCount = animCount + 1;
		if (animCount == $(targetsAnim).length) {
		  animCount = 0;
		  resetAnim();
		}
	  }
  
	  function runScale() {
  
	  }
  
	}
	pauseFloat();
	resumeFloat();

	function pauseFloat() {
		$('span').click(function () {
			tweenFloat.pause();
		});


	}

	function resumeFloat() {
		$('div').click(function () {

			tweenCircle.play();
		});
	}*/

	function floatElements() {

		//*float*//
		var speed = 2.5;
		var targets = $(targetsAnim);
		var my = 13;

		var target;
		var i;
		var v = 0;

		function getRandomArbitrary(min, max) {
			return Math.random() * (max - min) + min;
		}

		tweenFloat = new TimelineMax({
			paused: true
		});

		$(targets).each(
			function (i) {
				tweenFloat.to($(this), speed, {
					y: "+=" + my + "",
					repeat: -1,
					yoyo: true,
					ease: Power1.easeInOut,
				}, v);
				var v2 = 1 / (getRandomArbitrary(1, 3));
				v = v + v2;

			});
	}




	function Point(x, y) {
		return {
			"X": x,
			"Y": y
		};
	}

	function getDistance(point1, point2) {
		var xs = 0;
		var ys = 0;

		xs = point2.X - point1.X;
		xs = xs * xs;

		ys = point2.Y - point1.Y;
		ys = ys * ys;

		return Math.sqrt(xs + ys);
	}


});

