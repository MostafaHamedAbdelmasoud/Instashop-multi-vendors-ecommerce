(function($){
    "use strict";
    
    // Actived Tabs & Collaspe
    jQuery('.tab-content .tab-pane:first-child').addClass('show active');
	jQuery('.customtabs li:first-child a').addClass('active');
    jQuery('#accordion .card:first-child a').removeClass('collapsed');
    jQuery('#accordion .card:first-child .collapse').addClass('show');
    
    // Add Button Scroll Top
    jQuery(window).scroll(function() { if (jQuery(this).scrollTop() > 400) { jQuery('.scroll-to-top').fadeIn(); } else { jQuery('.scroll-to-top').fadeOut(); } });
    jQuery('body').append('<a href="#" class="scroll-to-top"><i class="fa fa-arrow-up"></i></a>');
    jQuery('.scroll-to-top').on('click', function(e) { e.preventDefault(); jQuery('html, body').animate({scrollTop : 0}, 1000); });
    
//    jQuery('#datetimepicker').datetimepicker();
    
    // Show Password Input
    jQuery('.inputpasswordshow__show').on('click', function(e){
        jQuery('.inputpasswordshow__hide').addClass('active');
        jQuery('.inputpasswordshow__show').removeClass('active');
        jQuery('.inputpasswordshow').attr('type','text');
    });
    jQuery('.inputpasswordshow__hide').on('click', function(e){
        jQuery('.inputpasswordshow__hide').removeClass('active');
        jQuery('.inputpasswordshow__show').addClass('active');
        jQuery('.inputpasswordshow').attr('type','password');
    });
    
    // Change Box Products
    jQuery('.boxmyorders__gridjave').on('click', function(e){
        jQuery('.boxmyorders__box').removeClass('boxmyorders__boxfull');
        jQuery('.boxmyorders__box').addClass('boxmyorders__boxbox');
        jQuery('.boxmyorders__grid').removeClass('boxmyorders__gridw100');
        jQuery('.boxmyorders__grid').addClass('boxmyorders__gridw33');
        jQuery(this).addClass('active');
        jQuery('.boxmyorders__gridjave2').removeClass('active');
    });
    jQuery('.boxmyorders__gridjave2').on('click', function(e){
        jQuery('.boxmyorders__box').addClass('boxmyorders__boxfull');
        jQuery('.boxmyorders__box').removeClass('boxmyorders__boxbox');
        jQuery('.boxmyorders__grid').addClass('boxmyorders__gridw100');
        jQuery('.boxmyorders__grid').removeClass('boxmyorders__gridw33');
         jQuery(this).addClass('active');
        jQuery('.boxmyorders__gridjave').removeClass('active');
    });
    
    // Add Custom Input Number
    jQuery('<div class="quantity-button quantity-up"><i class="fa fa-plus"></i></div><div class="quantity-button quantity-down"><i class="fa fa-minus"></i></div>').insertAfter('.quantity input');
    jQuery('.quantity').each(function() {
      var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');  
      btnUp.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });

      btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          var newVal = oldValue;
        } else {
          var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
      });
    });
    
    // Run Masonry
    var $grid = $('.grid__masonry').masonry({
        itemSelector: '.grid__masonry--item',
//        percentPosition: true,
//        horizontalOrder: true,
        originLeft: false
    });
    $grid.imagesLoaded().progress( function() {
        $grid.masonry('layout');
    });
    
})(jQuery);