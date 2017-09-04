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

	$('.navmobile a').on('click', function (event) {
		$('#toggle').click(); // close the mobile menu when click on links
		
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

		var offsetLinks = $('.button_container').offset().top;

		console.log(offsetLinks);
	

		if ((offsetLinks >= headerOffset && offsetLinks <= acteursOffset) /*|| offsetLinks >= contactOffset*/ ) {
			$('.navfull .categories a').removeClass('black');
			$('.navfull .categories a').addClass('white');
			$('.navfull .categories').removeClass('black-border');
			$('.navfull .categories').addClass('white-border');
			$('.button_container:not(.active) span').css('background-color','#F5F5F5');


		} else if (offsetLinks >= acteursOffset && offsetLinks <= eventsOffset) {
			$('.navfull .categories a').removeClass('white');
			$('.navfull .categories a').addClass('black');
			$('.navfull .categories').removeClass('white-border');
			$('.navfull .categories').addClass('black-border');
			$('.button_container:not(.active) span').css('background-color','#191919');
			

		} else if (offsetLinks >= eventsOffset && offsetLinks <= contactOffset) {
			$('.navfull .categories a').removeClass('black');
			$('.navfull .categories a').addClass('white');
			$('.navfull .categories').removeClass('black-border');
			$('.navfull .categories').addClass('white-border');
			$('.button_container:not(.active) span').css('background-color','#F5F5F5');

		} else if (offsetLinks >= contactOffset) {
			$('.navfull .categories a').removeClass('white');
			$('.navfull .categories a').addClass('black');
			$('.navfull .categories').removeClass('white-border');
			$('.navfull .categories').addClass('black-border');
			$('.button_container:not(.active) span').css('background-color','#191919');

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

