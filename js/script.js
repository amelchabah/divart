$(document).ready(function () {
    $(".menu-link").click(function (event) {
        event.preventDefault();
        $(".menu-overlay").toggleClass("open");
        $(".menu").toggleClass("open");
    });

    $('.one .categorie').click(function () {
        $(".menu-overlay").toggleClass("open");
        $(".menu").toggleClass("open");

    });
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (scroll > 700) {
            $(".scroll .navbar").css("background-color", "white");
            $(".scroll .navbar").css("color", "black");
            $('.scroll .navbar .logo img').attr('src', './assets/logo.svg');
        }
        else {
            $(".scroll .navbar").css("background-color", "transparent");
            $(".scroll .navbar").css("color", "white");
            $('.scroll .navbar .logo img').attr('src', './assets/logoblanc.svg');
        }
    });

    $("#teaser video").prop('muted', true);
    $("#sound").click(function () {
        if ($("#teaser video").prop('muted')) {
            $("#teaser video").removeAttr('muted');
        } else if($("#teaser video").prop('muted', false)){
            $("#teaser video").prop('muted', true);
        }
    });
    

    $('#teaserend').click(function () {
        $('#teaser').fadeOut(1000);
    });

});


// Get the video
var video = document.getElementById("myVideo");

// Get the button
var btn = document.getElementById("myBtn");

// Pause and play the video, and change the button text
function myFunction() {
    if (video.paused) {
        video.play();
        btn.innerHTML = "Pause";
    } else {
        video.pause();
        btn.innerHTML = "Play";
    }
}


var aud = document.getElementById("teaservideo");
aud.onended = function() {
    $('#teaser').fadeOut(1000);
};

