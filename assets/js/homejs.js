
$(document).ready(function(){
    // *************change menu link color and border*******************************//
    var headerOffset = (Math.floor(($('header').offset()).top));
    var acteursOffset = Math.floor(($('#Acteurs').offset()).top);
    var eventsOffset = Math.floor(($('#Events').offset()).top);
    var contactOffset = Math.floor(($('#Contact').offset()).top);

    var menuLinks = $(".navfull .categories");
    
    $(window).scroll(function(){
       
        var offsetLinks = menuLinks.offset().top;
       
        if ((offsetLinks >= headerOffset && offsetLinks <= acteursOffset) /*|| offsetLinks >= contactOffset*/ ) {
            $('.navfull .categories a').removeClass('black');
            $('.navfull .categories a').addClass('white');
            $('.navfull .categories').removeClass('black-border');
            $('.navfull .categories').addClass('white-border');
        }
        else if (offsetLinks >= acteursOffset && offsetLinks <= eventsOffset ) {
            $('.navfull .categories a').removeClass('white');
            $('.navfull .categories a').addClass('black');
            $('.navfull .categories').removeClass('white-border');
            $('.navfull .categories').addClass('black-border');
        }
        else if (offsetLinks >= eventsOffset && offsetLinks <= contactOffset) {
            $('.navfull .categories a').removeClass('black');
            $('.navfull .categories a').addClass('white');
            $('.navfull .categories').removeClass('black-border');
            $('.navfull .categories').addClass('white-border');
        }
        else if (offsetLinks >= contactOffset) {
            $('.navfull .categories a').removeClass('white');
            $('.navfull .categories a').addClass('black');
            $('.navfull .categories').removeClass('white-border');
            $('.navfull .categories').addClass('black-border');
        }
        
    })
    
    
})
