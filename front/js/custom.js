$(function() {
   $(".list-group-item").click(function() {
      // remove classes from all
      $(".list-group-item").removeClass("active");
      // add class to the one we clicked
      $(this).addClass("active");
   });
});





 
 


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 500) {
         $(".navbar").addClass("bg-scroll");
    } else {
        $(".navbar").removeClass("bg-scroll");
    }
});


$(document).ready(function() {
 
  // Fakes the loading setting a timeout
    setTimeout(function() {
        $('body').addClass('loaded');
    }, 3500);
 
});

$(function(){
    $('.selectpicker').selectpicker();
});






$(document).ready(function() {
    $('a[href*=#]').bind('click', function(e) {
        e.preventDefault(); // prevent hard jump, the default behavior

        var target = $(this).attr("href"); // Set the target as variable

        // perform animated scrolling by getting top-position of target-element and set it as scroll target
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top
        }, 600, function() {
            location.hash = target; //attach the hash (#jumptarget) to the pageurl
        });

        return false;
    });
});

$(window).scroll(function() {
    var scrollDistance = $(window).scrollTop();

   
    $('.page-section').each(function(i) {
        if ($(this).position().top <= scrollDistance) {
            $('.navigation a.active').removeClass('active');
            $('.navigation a').eq(i).addClass('active');
        }
    });
}).scroll();







 