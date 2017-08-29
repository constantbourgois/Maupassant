$(document).ready(function () {
	// *************scroll smooth*******************************//
	$('.navmobile a, .navfull a,.logomobile').on('click', function (event) {
		var target = $($(this).attr('href'));
		if (target.length) {

			event.preventDefault();

			var newScroll = target.position().top;

			$('html,body').animate({

				scrollTop: newScroll

			}, 1000);
		}
	});


	// *************change menu link color and border*******************************//
	var headerOffset = (Math.floor(($('header').offset()).top));
	var acteursOffset = Math.floor(($('#Acteurs').offset()).top);
	var eventsOffset = Math.floor(($('#Events').offset()).top);
	var contactOffset = Math.floor(($('#Contact').offset()).top);

    var menuLinks = $(".navfull .categories a");
    
    $('.navfull').show();
    $('.navmobile').hide();

	$(window).scroll(function () {
        if(window.scrollY === 0){
            $('.navfull').show();
            $('.navmobile').hide();
           
        }
        else{
            $('.navfull').hide();
            $('.navmobile').show();
           
        }

		var offsetLinks = menuLinks.offset().top;

		if ((offsetLinks >= headerOffset && offsetLinks <= acteursOffset) /*|| offsetLinks >= contactOffset*/ ) {
			$('.navfull .categories a').removeClass('black');
			$('.navfull .categories a').addClass('white');
			$('.navfull .categories').removeClass('black-border');
			$('.navfull .categories').addClass('white-border');

		} else if (offsetLinks >= acteursOffset && offsetLinks <= eventsOffset) {
			$('.navfull .categories a').removeClass('white');
			$('.navfull .categories a').addClass('black');
			$('.navfull .categories').removeClass('white-border');
			$('.navfull .categories').addClass('black-border');

		} else if (offsetLinks >= eventsOffset && offsetLinks <= contactOffset) {
			$('.navfull .categories a').removeClass('black');
			$('.navfull .categories a').addClass('white');
			$('.navfull .categories').removeClass('black-border');
			$('.navfull .categories').addClass('white-border');

		} else if (offsetLinks >= contactOffset) {
			$('.navfull .categories a').removeClass('white');
			$('.navfull .categories a').addClass('black');
			$('.navfull .categories').removeClass('white-border');
			$('.navfull .categories').addClass('black-border');

		};
		if (window.scrollY >= headerOffset && window.scrollY < acteursOffset) {
			$('.navfull .categories a').removeClass('sectionactive');
			menuLinks[0].classList.add('sectionactive');
		}

		if (window.scrollY >= acteursOffset && window.scrollY < eventsOffset) {
			$('.navfull .categories a').removeClass('sectionactive');
			menuLinks[1].classList.add('sectionactive');
		}

		if (window.scrollY >= eventsOffset && window.scrollY < contactOffset) {
			$('.navfull .categories a').removeClass('sectionactive');
			menuLinks[2].classList.add('sectionactive');
		}
		if (window.scrollY >= contactOffset) {
			$('.navfull .categories a').removeClass('sectionactive');
			menuLinks[3].classList.add('sectionactive');
		}

	})


})

