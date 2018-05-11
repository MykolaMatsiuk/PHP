$(document).ready(function() {
 
  var owl = $('.owl-carousel');

  owl.owlCarousel({
    items: 1,
    afterAction: zoom
  });
  // $('.owl-dot').css('background-image', 'url("./../images/0pfISspe6keQGJBhv6oYGrozOsdusSYffD8cvtCL.jpeg")');
  let dotcount = 1;
     
  $('.owl-dot').each(function() {
    $( this ).addClass('dotnumber' + dotcount);
    $( this ).attr('data-info', dotcount);
    dotcount=dotcount+1;
  });
  
   // 2) ASSIGN EACH 'SLIDE' A NUMBER
  let slidecount = 1;

  $('.owl-item').not('.cloned').each(function() {
    $( this ).addClass( 'slidenumber' + slidecount);
    slidecount=slidecount+1;
  });
  
  // SYNC THE SLIDE NUMBER IMG TO ITS DOT COUNTERPART (E.G SLIDE 1 IMG TO DOT 1 BACKGROUND-IMAGE)
  $('.owl-dot').each(function() {
  
    let grab = $(this).data('info');

    let slidegrab = $('.slidenumber'+ grab +' img').attr('src');

    $(this).css("background-image", "url("+slidegrab+")")
           .css("background-size", "100%")
           .css("background-repeat", "no-repeat")
           .css("margin", "5px")
           .css("width", "60px")
           .css("height", "40px");

  });

  $('.owl-item').each(function() {
    let src = $(this).find('img').attr('src');
    $(this).append('<img class="zoom" src="'+src+'" />');
  });
  
  $('.zoom').css('display', 'none');

  zoom();

  function zoom() {

    $('.owl-item').mouseenter(function(){
      
        $(this).mousemove(function(event){
          
            var offset = $(this).offset();
            var left = event.pageX - offset.left;
            var top = event.pageY - offset.top;
          
            $(this).find('.zoom').css({
              width: '200%',
              opacity: 1,
              display: 'block',
              position: 'absolute',
              left: -left,
              top: -top
            })
        });
    });

    $('.owl-item').mouseleave(function(){                     
       $(this).find('.zoom').css({
         width: '100%',
         opacity: 0,
         left: 0,
         top: 0
       })                               
    });
    
  }

});
