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
    
});