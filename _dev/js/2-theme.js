jQuery(document).ready(function(){
    
    // TARGET CACHING ELEMENTS VARIABLES
    var $            = jQuery,
        hamburgerBtn = jQuery('.menu-btn'),
            closeBtn = jQuery('.close-menu'),
          sidebarNav = jQuery('#sidebar-navigation'),
                   s = $("body.home .header-main"),
                 pos = s.position(); 

    $('.btn-menu').click(function(event){
        event.preventDefault();
        $('.sidebar-nav').addClass('open');
    }); 

    $('.sidebar-nav-close').click(function(event){
        event.preventDefault();
        $('.sidebar-nav').removeClass('open');
    }); 

    $('.btn-search').click(function(event){
        event.preventDefault();
        $('.site-search').toggle();

    }); 

    //mobile navigation
    hamburgerBtn.click(function(event){
        event.preventDefault();
        sidebarNav.addClass('open');
    }); 

    closeBtn.click(function(event){
        event.preventDefault();
        var obj=$(this).closest(sidebarNav);
        obj.removeClass('open');
    });     
              
    $(window).scroll(function() {
        var windowpos = $(window).scrollTop();
        if (windowpos >= 500) {
            s.addClass("bg");
        } else {
            s.removeClass("bg"); 
        }
    });

     //basic page scroll     
    $(".scroll").click(function(event){
          // Figure out element to scroll to
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          // Does a scroll target exist?
          if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
              scrollTop: target.offset().top - 350
            }, 1000);
          }
    });


    function resizeNav() {
    // Set the nav height to fill the window
    $("#nav-fullscreen").css({"height": window.innerHeight});

    // Set the circle radius to the length of the window diagonal,
    // this way we're only making the circle as big as it needs to be.
    var radius = Math.sqrt(Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2));
    var diameter = radius * 2;
    $("#nav-overlay").width(diameter);
    $("#nav-overlay").height(diameter);
    $("#nav-overlay").css({"margin-top": -radius, "margin-left": -radius});
}

// Set up click and window resize callbacks, then init the nav.

    $("#nav-toggle").click(function() {

        $("#nav-toggle, #nav-overlay, #nav-fullscreen").toggleClass("open");

          var el = $(this);
          if (el.text() == el.data("text-swap")) {
            el.text(el.data("text-original"));
          } else {
            el.data("text-original", el.text());
            el.text(el.data("text-swap"));
          }


    });

    $(window).resize(resizeNav);

    resizeNav();
    


    
});


