$( document ).ready(function() {

    "use strict";
    
    // show first content by default
    $('#tabs-nav li:first-child').addClass('active');
    $('.content').hide();
    $('.content:first').show();

    // click function
    $('#tabs-nav li').click(function(){
        $('#tabs-nav li').removeClass('active');
        $(this).addClass('active');
        $('.content').hide();
        
        var activeTab = $(this).find('a').attr('href');
        $(activeTab).fadeIn();
        return false;    
    });
});