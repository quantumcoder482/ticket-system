// will be removed in future, use theme.js

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



    $("#get_activity").click(function (e) {
        var _url = $("#_url").val();
        $.post(_url + 'util/activity-ajax/', {



        })
            .done(function (data) {

                setTimeout(function () {

                    $("#activity_loaded").html(data);

                }, 2000);
            });
    });





});