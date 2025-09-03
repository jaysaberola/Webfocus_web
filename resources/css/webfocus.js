/**
 * Webfocus Landing Page JavaScript
 * Handles Flexslider, Magnific Popup, FAQ toggles, sticky section viewport detection, and go-to-top smooth scrolling.
 * Dependencies: jQuery, Bootstrap, Flexslider, Magnific Popup
 */
jQuery.noConflict();
jQuery(document).ready(function($) {
    // Initialize Flexslider for image slider in sticky section
    $('.fslider').flexslider({
        animation: 'fade',
        pauseOnHover: true,
        slideshowSpeed: 5000,
        directionNav: false,
        controlNav: false
    });

    // Initialize Magnific Popup for lightbox (video and image)
    $('[data-lightbox]').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 300
    });

    // Toggle functionality for FAQ section
    $(document).on('click', '.toggle-header', function() {
        $(this).toggleClass('active').find('.toggle-icon i').toggle();
        $(this).next('.toggle-content').slideToggle();
    });

    // Viewport detection for sticky section content switching
    $('.viewport-detect').each(function() {
        let $this = $(this);
        let target = $this.data('viewport-class-target');
        $(window).scroll(function() {
            let rect = $this[0].getBoundingClientRect();
            if (rect.top < window.innerHeight * 0.6 && rect.bottom > 0) {
                $(target).addClass('active').siblings().removeClass('active');
            }
        });
    });

    // Smooth scroll for go-to-top button
    $('#gotoTop').click(function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 800);
    });
});