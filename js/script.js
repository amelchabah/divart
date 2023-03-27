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


    $('#teaserend').click(function () {
        $('#teaser').fadeOut(1000);
        $("#teaser video").prop('muted', true);
    });


    $("#teaser video").prop('muted', true);
    $("#sound").click(function () {
        if ($("#teaser video").prop('muted')) {
            $("#teaser video").prop('muted', false);
            $("#sound").html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" id="sound"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M533.6 32.5C598.5 85.3 640 165.8 640 256s-41.5 170.8-106.4 223.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C557.5 398.2 592 331.2 592 256s-34.5-142.2-88.7-186.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM473.1 107c43.2 35.2 70.9 88.9 70.9 149s-27.7 113.8-70.9 149c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C475.3 341.3 496 301.1 496 256s-20.7-85.3-53.2-111.8c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zm-60.5 74.5C434.1 199.1 448 225.9 448 256s-13.9 56.9-35.4 74.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C393.1 284.4 400 271 400 256s-6.9-28.4-17.7-37.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5zM301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3z"/></svg>');
        } else {
            $("#teaser video").prop('muted', true);
            $("#sound").html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" id="sound"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 64c0-12.6-7.4-24-18.9-29.2s-25-3.1-34.4 5.3L131.8 160H64c-35.3 0-64 28.7-64 64v64c0 35.3 28.7 64 64 64h67.8L266.7 471.9c9.4 8.4 22.9 10.4 34.4 5.3S320 460.6 320 448V64z"/></svg>');
        }
    });

    // if (localStorage.getItem("teaser") !== 'true') {
    //     // sessionStorage.setItem('key', 'value'); pair
    //     localStorage.setItem("teaser", "true");
    //     // Calling the bootstrap modal
    //     $("#teaser").hide();
    //  }


    let vid = document.getElementById("teaservideo");
    vid.onended = function () {
        $('#teaser').fadeOut(1000);
        // $('#teaser').css('display', "none");
    };


     


});
