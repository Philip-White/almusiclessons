$(document).ready(function(){


    //This is some jquery to make the app responsive
    if($(window).width() > 381 && $(window).width() < 768){
 $("iframe").css("width", "350px");
 $("iframe").css("height", "250px");
 $(".videoScreen").css("padding-left", "0px");
    }  
    if($(window).width() <= 380){
        $("iframe").css("width", "275px");
 $("iframe").css("height", "150px");
 $(".videoScreen").css("padding-left", "12px");

    }
    if($(window).width() >= 768 && $(window).width() <= 1025){
        $("iframe").css("width", "550px");
 $("iframe").css("height", "300px");
 $(".videoScreen").css("padding-left", "50px");

    }


//This is the fancy intro...
$("#thePill").delay('slow').fadeIn();
});