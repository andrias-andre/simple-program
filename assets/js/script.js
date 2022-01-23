// some scripts

// jquery ready start
$(document).ready(function() {
	// jQuery code


    /* ///////////////////////////////////////

    THESE FOLLOWING SCRIPTS ONLY FOR BASIC USAGE, 
    For sliders, interactions and other

    */ ///////////////////////////////////////
    

    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.back-to-top').fadeIn('slow');
      } else {
        $('.back-to-top').fadeOut('slow');
      }
    });
    

    $('.back-to-top').click(function() {
      $('html, body').animate({
        scrollTop: 0
      }, 1500, 'easeInOutExpo');
      return false;
    });


    


    $('#shop-now').on('click', function (e) {
      e.preventDefault()
    
      $('html, body').animate(
        {
          scrollTop: $($(this).attr('href')).offset().top-150,
        },
        500,
        'linear'
      )
    })
    


	//////////////////////// Prevent closing from click inside dropdown
    $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
    });


    $('.js-check :radio').change(function () {
        var check_attr_name = $(this).attr('name');
        if ($(this).is(':checked')) {
            $('input[name='+ check_attr_name +']').closest('.js-check').removeClass('active');
            $(this).closest('.js-check').addClass('active');
           // item.find('.radio').find('span').text('Add');

        } else {
            item.removeClass('active');
            // item.find('.radio').find('span').text('Unselect');
        }
    });


    $('.js-check :checkbox').change(function () {
        var check_attr_name = $(this).attr('name');
        if ($(this).is(':checked')) {
            $(this).closest('.js-check').addClass('active');
           // item.find('.radio').find('span').text('Add');
        } else {
            $(this).closest('.js-check').removeClass('active');
            // item.find('.radio').find('span').text('Unselect');
        }
    });



	//////////////////////// Bootstrap tooltip
	if($('[data-toggle="tooltip"]').length>0) {  // check if element exists
		$('[data-toggle="tooltip"]').tooltip()
	} // end if


    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });




 
  //$('#thumb-detail-photo').imageZoom({zoom : 200});
/*
  $('#thumb-detail-photo')
  .wrap('<span style="display:inline-block;cursor:zoom-in"></span>')
  .css('display', 'block')
  .parent()
  .zoom({ on:'grab'});
*/

$("#order-by-view").change(function() {
  window.location.href = $(this).val();
});


AOS.init();

    
}); 
// jquery end


function imgError(image) {
    image.onerror = "";
    image.src     = BASE_URL+"assets/icon/image-not-available-public.png";
    return true;
}

function changeImage(addr,number){


    new Splide( '#secondary-slider', {
      fixedWidth  : 100,
      height      : 70,
      gap         : 10,
      cover       : true,
      isNavigation: true,
      padding     : 50,
      pagination  : false,
      focus       : 'center',
      start       : number,
      breakpoints : {
        '600': {
          fixedWidth: 70,
          height    : 50,
        }
      },
    } ).mount();
   

    //document.getElementById(id).src = url;
    $(document).ready(function() {

      $(".splide__slide").removeClass("is-active");
      
      $('#href'+number).parent().addClass('is-active');
      
      $('#thumb-detail-photo').trigger('zoom.destroy'); 
      $("#thumb-detail-photo").attr("src",addr);
      $("#closeZoom").removeClass("d-block").addClass("d-none");
      $("#zoomIn").removeClass("d-none").addClass("d-block");

    });
}


function imageZoom(){

  $(document).ready(function() {

    
    $('#thumb-detail-photo')
    .wrap('<span style="display:inline-block;cursor:zoom-in"></span>')
    .css('display', 'block')
    .parent()
    .zoom();

    $("#zoomIn").removeClass("d-block").addClass("d-none");
    $("#closeZoom").removeClass("d-none").addClass("d-block");

  }); 

}


function closeZoom(){

  $(document).ready(function() {

    $('#thumb-detail-photo').trigger('zoom.destroy'); 
    $("#closeZoom").removeClass("d-block").addClass("d-none");
    $("#zoomIn").removeClass("d-none").addClass("d-block");

  }); 

}

