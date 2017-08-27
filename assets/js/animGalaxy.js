$(document).ready(function() {
	var animTime = 2.6;
	var paths;
	var targetsAnim;
	var circles;
	var animStage;
	var animCount = 0;
	var tweenFloat;
	var tweenCircle;
  
	targetsAnim = $('#circles > g');
	circles = $('#circles > g').find('circle');
	paths = $('#paths path');
	$('#circles').attr('data-animStage', 1);
  
	// identify circles and paths//
	$(paths).each(function(j) {
	  $(this).attr('id', 'Path' + ($(paths).length - j));
  
	});
  
	getDistances();
	floatElements($(targetsAnim));
	runEngine();
  
	$(targetsAnim).click(function() {
	  tweenCircle.play();
	  tweenFloat.kill();
  
  
	});
  
  
  
	function getDistances() {
  
	  $(circles).each(function(i) {
		var closestDistance = 0;
		var closestPathIndex = null;
		var closestPathId = null;
  
		//get the distances//
		var coordCircle = new Point($(circles[i]).attr('cx'), $(circles[i]).attr('cy'));
  
		$(targetsAnim[i]).attr('data-target-width', ($(targetsAnim[i])[0]).getBoundingClientRect().width);
  
  
		$(paths).each(function(j) {
  
		  var coordPath1 = new Point($(paths)[j].getPointAtLength(i).x, $(paths)[j].getPointAtLength(i).y);
  
		  var distance = Math.round(getDistance(coordCircle, coordPath1));
  
		  if ((closestDistance === 0) || (distance < closestDistance)) {
  
			closestDistance = distance;
  
			closestPathIndex = j;
  
			closestPathId = $(paths[j]).attr('id');
  
			$(targetsAnim[i]).attr('data-path', $(targetsAnim).length - closestPathIndex);
  
			$(targetsAnim[i]).attr('id', 'target' + ($(paths).length - closestPathIndex));
  
			$(targetsAnim[i]).attr('data-target', ($(paths).length - closestPathIndex));
  
			$(targetsAnim[i]).find('circle').attr('id', 'circle' + ($(paths).length - closestPathIndex));
  
		  }
  
		});
  
	  });
  
	}
  
	function runEngine() {
	  floatElements($(targetsAnim));
	  tweenFloat.play();
	  var pathTarget;
	  var target;
	  var nextTarget;
  
	  tweenCircle = new TimelineMax({
		paused:true,
		repeat:0,
		onComplete:resetAnim,
  
	  });
  
  
  
	  tweenCircle.add('go');
  
	  runTweens();
  
	  //********** circle and scale animation *************//
	  //****************************************//
	  //********** set the variables *************//
	  //****************************************//
  
	  function resetAnim() {
  
		tweenCircle.kill();
  
		var newAnimstage = parseInt($('#circles').attr('data-animStage')) + 1;
  
		$(targetsAnim).each(function() {
  
		  var currentPath = parseInt($(this).attr('data-path'));
  
		  if (currentPath == $(targetsAnim).length) {
			$(this).attr('data-path', 1);
			//$(this).attr('id',  '#target'+ 1);//
  
		  } else {
			$(this).attr('data-path', currentPath + 1);
			//$(this).attr('id',  '#target' + (parseInt($(this).attr('data-target')) + 1));//
  
		  }
  
		});
	  runEngine();
  
  
	  }
	  //********** circle and scale animation *************//
	  //****************************************//
	  function runTweens(){
		$(targetsAnim).each(function(){
  
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
	  },'go')
  
	  .to(target, animTime, {
		bezier: {
		  values: path,
		  type: "cubic"
		},
		ease: Linear.easeNone,
		repeat: 0
	  },'go')
  
	  .to(target, animTime, {
		scale: scale,
		transformOrigin: "50% 50%"
	  }, 'go');
  
	});
  }
  
  
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
  
	}*/
  pauseFloat();resumeFloat();
	function pauseFloat() {
	  $('span').click(function(){
	tweenFloat.pause();
  });
  
  
	}
  
	function resumeFloat() {
	  $('div').click(function(){
  
	tweenCircle.play();
	});
	}
  
	function floatElements(targets) {
	  var speed = 2.5;
	  var my = 13;
  
	  var target;
	  var i;
	  var v = 0;
  
	  function getRandomArbitrary(min, max) {
		return Math.random() * (max - min) + min;
	  }
  
	  tweenFloat = new TimelineMax({paused:true});
  
	  $(targets).each(
		function(i) {
		  tweenFloat.to($(this), speed, {
			y: "+="+my+"",
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
  