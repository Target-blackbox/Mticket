jQuery(window).on('load', function() {
  jQuery('#status').fadeOut();
  jQuery('#preloader').delay(350).fadeOut('slow');
  jQuery('body').delay(350).css({'overflow':'visible'});
})


// sticky header
jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('.is-sticky-on').addClass('sticky-head');
  }
  else {
    jQuery('.is-sticky-on').removeClass('sticky-head');
  }
});

// product section js
jQuery(document).ready(function($) {
    // Function to retrieve cart count from local storage
    function getCartCount() {
        var count = localStorage.getItem('cartCount');
        return count ? parseInt(count) : 0;
    }

    // Function to update cart count in local storage and display it
    function updateCartCount(count) {
        $('.cart-count').text(count);
        localStorage.setItem('cartCount', count);
    }

    // Update cart count on page load
    updateCartCount(getCartCount());

    // Add to cart button click event
    $('.add_to_cart_button').on('click', function(event) {
        event.preventDefault(); // Prevent default form submission

        // Hide all "View Cart" buttons
        $('.view-cart-button').hide();

        // Show "View Cart" button associated with clicked product
        $(this).closest('.box-content').find('.view-cart-button').show();

        // Increment cart count
        var cartCount = getCartCount();
        updateCartCount(cartCount + 1);
    });

    // View Cart button click event
    $('.view-cart-button').on('click', function(event) {
        // Navigate to the cart page
        window.location.href = $(this).attr('href');
    });
});

// toggle nav
jQuery(function($){
  $( '.toggle-nav button' ).click( function(e){
    $( 'body' ).toggleClass( 'show-main-menu' );
    var element = $( '.sidenav' );
    classic_tour_booking_trapFocus( element );
  });

  $( '.close-button' ).click( function(e){
    $( '.toggle-nav button' ).click();
    $( '.toggle-nav button' ).focus();
  });
  $( document ).on( 'keyup',function(evt) {
    if ( $( 'body' ).hasClass( 'show-main-menu' ) && evt.keyCode == 27 ) {
      $( '.toggle-nav button' ).click();
      $( '.toggle-nav button' ).focus();
    }
  });
});

function classic_tour_booking_trapFocus( element, namespace ) {
  var classic_tour_booking_focusableEls = element.find( 'a, button' );
  var classic_tour_booking_firstFocusableEl = classic_tour_booking_focusableEls[0];
  var classic_tour_booking_lastFocusableEl = classic_tour_booking_focusableEls[classic_tour_booking_focusableEls.length - 1];
  var KEYCODE_TAB = 9;

  classic_tour_booking_firstFocusableEl.focus();

  element.keydown( function(e) {
    var isTabPressed = ( e.key === 'Tab' || e.keyCode === KEYCODE_TAB );

    if ( !isTabPressed ) { 
      return;
    }

    if ( e.shiftKey ) /* shift + tab */ {
      if ( document.activeElement === classic_tour_booking_firstFocusableEl ) {
        classic_tour_booking_lastFocusableEl.focus();
        e.preventDefault();
      }
    } else /* tab */ {
      if ( document.activeElement === classic_tour_booking_lastFocusableEl ) {
        classic_tour_booking_firstFocusableEl.focus();
        e.preventDefault();
      }
    }
  });
}

// slider js
jQuery(document).ready(function() { 
  jQuery('#catsliderarea .owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    nav:true,
    dots:false,
    smartSpeed:250,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      1000:{
        items:1
      }
    }
  })
});

// service js
jQuery(document).ready(function() { 
  jQuery('#blog .owl-carousel').owlCarousel({
    loop:true,
    margin:25,
    autoplay:true,
    nav:true,
    dots:false,
    smartSpeed:250,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:2
      },
      1000:{
        items:3
      }
    }
  })
});

// slider last word js
jQuery(document).ready(function() {
  jQuery('.ftr-4-box h5').each(function(index, element) {
    var heading = jQuery(element);
    var word_array, last_word, first_part;

    word_array = heading.html().split(/\s+/); // split on spaces
    last_word = word_array.pop();             // pop the last word
    first_part = word_array.join(' ');        // rejoin the first words together

    heading.html([first_part, ' <span>', last_word, '</span>'].join(''));
  });
});


/* ===============================================
  SCROLL TOP
============================================= */

jQuery(document).ready(function () {
  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > 0) {
      jQuery('#button').fadeIn();
    } else {
      jQuery('#button').fadeOut();
    }
  });
  jQuery('#button').click(function () {
    jQuery("html, body").animate({
      scrollTop: 0
    }, 600);
    return false;
  });

  classic_tour_booking_search_focus();
  });

// search
function classic_tour_booking_search_focus() {

  /* First and last elements in the menu */
  var classic_tour_booking_search_firstTab = jQuery('.serach_inner input[type="search"]');
  var classic_tour_booking_search_lastTab  = jQuery('button.search-close'); /* Cancel button will always be last */

  jQuery(".search-open").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').addClass("search-focus");
    classic_tour_booking_search_firstTab.focus();
  });

  jQuery("button.search-close").click(function(e){
    e.preventDefault();
    e.stopPropagation();
    jQuery('body').removeClass("search-focus");
    jQuery(".search-open").focus();
  });

  /* Redirect last tab to first input */
  classic_tour_booking_search_lastTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && !e.shiftKey)) {
      e.preventDefault();
      classic_tour_booking_search_firstTab.focus();
    }
  });

  /* Redirect first shift+tab to last input*/
  classic_tour_booking_search_firstTab.on('keydown', function (e) {
    if (jQuery('body').hasClass('search-focus'))
    if ((e.which === 9 && e.shiftKey)) {
      e.preventDefault();
      classic_tour_booking_search_lastTab.focus();
    }
  });

  /* Allow escape key to close menu */
  jQuery('.serach_inner').on('keyup', function(e){
    if (jQuery('body').hasClass('search-focus'))
    if (e.keyCode === 27 ) {
      jQuery('body').removeClass('search-focus');
      classic_tour_booking_search_lastTab.focus();
    };
  });
}
