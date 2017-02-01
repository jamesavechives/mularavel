/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* HOME MENU SLIDER */
jQuery(document).ready(function () {


    jQuery(document).on('click', '#show_content_box', function () {
        jQuery('#content_box').show();

    });
    jQuery(document).on('click', '#close_popup', function () {
        jQuery('#content_box').hide();
        jQuery('#target_box').hide();
    });
    jQuery(document).on('click', '#show_target_box', function () {
        jQuery('#target_box').show();

    });

    // Next Slide
    jQuery(".app-menu").hammer().on('swipeleft', function () {

        current_class = jQuery(this).attr('class');
        slide_page = current_class.match(/app\-slide\-(\d*)/)[1];
        // slide_page = current_class.substr(current_class.lastIndexOf("-") + 1);

        // Next Slide
        next_slide = parseInt(slide_page) + 1;

        if (jQuery(".app-slide-" + next_slide).length > 0) {

            jQuery(this).hide().removeClass("slide-show").addClass("slide-hide");
            jQuery(".app-slide-" + next_slide).addClass("slide-show");

        }
    })

    // Previous Slide
    jQuery(".app-menu").hammer().on('swiperight', function () {

        current_class = jQuery(this).attr('class');
        slide_page = current_class.match(/app\-slide\-(\d*)/)[1];
        // slide_page = current_class.substr(current_class.lastIndexOf("-") + 1);

        // Next Slide
        previous_slide = parseInt(slide_page) - 1;

        if (jQuery(".app-slide-" + previous_slide).length > 0) {

            jQuery(this).hide().removeClass("slide-show").addClass("slide-hide");
            jQuery(".app-slide-" + previous_slide).removeClass("slide-hide").addClass("slide-show");

        }
    })

    // CLose Modal
    jQuery(document).on("click", ".modal-container", function (e) {
        e.preventDefault();
        jQuery(".modal").fadeOut();
    })

    // Click to trigger file input
    jQuery(document).on('click', '.btn-upload-file, .upload-media-overlay', function (e) {
        jQuery(this).siblings('.hidden-upload').trigger('click');
    });

    // Click slide menu
    jQuery(document).on('click', '.menu-icon', function (e) {
        jQuery(this).hide();
        jQuery('.app-settings-menu').css('transform', 'translateX(210px)');
        jQuery('.app-settings-menu-overlay').fadeIn();
    });

    jQuery(document).on('click', '.app-settings-menu-overlay', function () {
        jQuery('.app-settings-menu').css('transform', 'translateX(-210px)');
        jQuery('.app-settings-menu-overlay').fadeOut();
        jQuery('.menu-icon').show();
    });

    jQuery(".app-settings-menu").hammer().on('swipeleft', function () {
        jQuery('.app-settings-menu').css('transform', 'translateX(-210px)');
        jQuery('.app-settings-menu-overlay').fadeOut();
        jQuery('.menu-icon').show();
    });

    // Customizing Login page
    if (jQuery(".login-submit").length > 0) {
        jQuery(".login-submit .button-primary").addClass('btn-success btn btn-100');
    }

});


/* 
 *  BACK END SETTING BLANK 
 */

function show_page_for_backend(page_url, callback = null) {
    jQuery('#innerpage_content').show();
    jQuery("#innerpage_content").load(siteData.site_url + '/' + page_url, function (response, status, xhr) {
        if (callback)
            eval(callback + "()");
    });
}

// Add active class to clicked menu link
jQuery(document).on('click', '.app-settings-menu a', function (e) {
    if (!jQuery(this).hasClass("active")) {
        jQuery('.app-settings-menu a.active').removeClass('active');
        jQuery(this).addClass("active");
    }
});



function show_home() {
    jQuery('#show_content').hide();
    //jQuery("#show_content").html("");
    jQuery('#home-page').show();
}


function show_confirm_dialog(title, message) {
    var defer = jQuery.Deferred();
    jQuery('<div></div>')
            .html(message)
            .dialog({
                autoOpen: true,
                modal: true,
                title: title,
                buttons: {
                    "Yes": function () {
                        defer.resolve("yes");
                        jQuery(this).dialog("close");
                    },
                    "No": function () {
                        defer.resolve("no");
                        jQuery(this).dialog("close");
                    }
                },
                close: function () {
                    //$(this).remove();
                    jQuery(this).dialog('destroy').remove()
                }
            });
    return defer.promise();
}
;
function show_success_error_msg(msg_type, message) {
    jQuery('#popup-msg').show(function () {
        setTimeout(function () {
            jQuery('#msg_type').removeAttr('class');
            jQuery('#popup-msg').fadeOut('slow');
        }, 1000)
    });
    jQuery('#msg_type').addClass(msg_type);
    jQuery('#msg_type').html(message);
}
jQuery(document).on('click', '.popup-close', function () {
    jQuery('#popup-msg').fadeOut();
    jQuery('#msg_type').removeAttr('class');
});

function update_clock( )
{
    var currentTime = new Date( );
    var currentHours = currentTime.getHours( );
    var currentMinutes = currentTime.getMinutes( );
    var currentSeconds = currentTime.getSeconds( );

    // Pad the minutes and seconds with leading zeros, if required
    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

    // Choose either "AM" or "PM" as appropriate
    var timeOfDay = (currentHours < 12) ? "AM" : "PM";

    // Convert the hours component to 12-hour format if needed
    currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

    // Convert an hours component of "0" to "12"
    currentHours = (currentHours == 0) ? 12 : currentHours;

    currentHours = (currentHours < 10 ? "0" : "") + currentHours;
    // Compose the string for display
    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;

    jQuery("#clock").html(currentTimeString);
}

jQuery(document).ready(function ()
{
    setInterval('update_clock()', 1000);

});
