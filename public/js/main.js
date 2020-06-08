$(document).ready(function(){


    //This is some jquery to make the app responsive(the embedded videos)
    if($(window).width() > 381 && $(window).width() < 768){
 $("iframe").css("width", "350px");
 $("iframe").css("height", "250px");
 $(".videoScreen").css("padding-left", "0px");
    } 
    //This is for the embedded videos as well and 
    //.intrumentStyle is for the about page where we have
    //the font awesome icons..
    if($(window).width() <= 380){
        $("iframe").css("width", "275px");
 $("iframe").css("height", "150px");
 $(".videoScreen").css("padding-left", "12px");
 $(".instrumentStyle").css('padding-left', '15px');

    }
    //This is for the embedded videos as well
    if($(window).width() >= 770 && $(window).width() <= 1025){
        $("iframe").css("width", "550px");
 $("iframe").css("height", "300px");
 $(".videoScreen").css("padding-left", "50px");

    }
    //This is for the font awesome icons on the about page
    if($(window).width() > 400 && $(window).width() < 768){
        $(".instrumentStyle").css('padding-left', '15px');

    }
    //This is for the font awesome icons on the about page
    if($(window).width() >= 768 && $(window).width() < 770){
        $(".instrumentStyle").css('padding-left', '15px');

    }


//This is the fancy intro...
$("#thePill").delay('slow').fadeIn();
});