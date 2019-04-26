$(document).ready(function () {



    var navbar_minimalize = $('.navbar-minimalize');

    $('#side-menu').metisMenu();

    navbar_minimalize.click(function () {
        $("body").toggleClass("mini-navbar");
        SmoothlyMenu();
    });

    function fix_height() {
        var heightWithoutNavbar = $("body > #wrapper").height() - 61;
        $(".sidebard-panel").css("min-height", heightWithoutNavbar + "px");
    }
    fix_height();


    $(window).bind("load resize click scroll", function() {
        if(!$("body").hasClass('body-small')) {
            fix_height();
        }
    });

    $("[data-toggle=popover]")
        .popover();

    // Menu

    navbar_minimalize.on('click', function() {
        $('.navbar-header i').toggleClass('fa-indent');
    });



    $('#r_fold_sidebar').change(function() {


        if($(this).prop('checked')){

            $.post( base_url+'settings/update_option/', { opt: "mininav", val: "1" })
                .done(function( data ) {
                    location.reload();
                });

        }
        else{
            $.post( base_url+'settings/update_option/', { opt: "mininav", val: "0" })
                .done(function( data ) {
                    location.reload();
                });
        }
    });


    var $ib_admin_notes = $("#ib_admin_notes");

    autosize($ib_admin_notes);



    var $ib_admin_notes_save = $("#ib_admin_notes_save");

    $ib_admin_notes_save.on('click', function(e) {
        e.preventDefault();

        $ib_admin_notes_save.prop('disabled', true);

        $.post( base_url + "settings/update_admin_note/", { notes: $ib_admin_notes.val() })
            .done(function( data ) {

                $ib_admin_notes_save.prop('disabled', false);

                toastr.success(data);

            });

    });


});


$(function() {
    $(window).bind("load resize", function() {
        if ($(this).width() < 769) {
            $('body').addClass('body-small')
        } else {
            $('body').removeClass('body-small')
        }
    })
});


function SmoothlyMenu() {
    if (!$('body').hasClass('mini-navbar') || $('body').hasClass('body-small')) {
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 100);
    } else if ($('body').hasClass('fixed-sidebar')){
        $('#side-menu').hide();
        setTimeout(
            function () {
                $('#side-menu').fadeIn(500);
            }, 300);
    } else {
        $('#side-menu').removeAttr('style');
    }
}

var $loader = $('#preloader');

if(config_animate == "Yes"){
    $(window).load(function() {
        "use strict";
        setTimeout(function() {
            $('.loader-overlay').addClass('loaded');
            $('body > section').animate({
                opacity: 1
            }, 400);
        }, 500);
    });
}




$(document).ready(function () {

    $('.right-sidebar-toggle').click(function () {
        $('#right-sidebar').toggleClass('sidebar-open');
    });

    $('.sidebar-container').slimScroll({
        height: '100%',
        railOpacity: 0.4,
        wheelStep: 10
    });

    $("#get_activity").click(function (e) {
        var _url = $("#_url").val();
        $.post(_url + 'util/activity-ajax/', {



        })
            .done(function (data) {
                $("#activity_loaded").html(data);
            });
    });


    $("#set_language").click(function (e) {


        $.post(base_url + 'dashboard/lan/', {


        })
            .done(function (data) {
                $("#show_available_lan").html(data);
            });
    });





});