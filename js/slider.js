$('.owl-carousel').owlCarousel({
    loop: true,
    autoplay: {
        delay: 4000,
    },
    margin: 10,
    nav: false,
    dots: false,
    responsive: {
        0: {
            items: 1
        },
        800: {
            nav: true,
            items: 2
        },
        1100: {
            items: 3,
            nav: true
        }
    }
})

for (let i = 0; i < 7; i++) {
    $(`.item${i}`).click(function () {
        $(`.popup${i}`).fadeIn(900);
        $(`.popup${i}`).css('display', 'flex');
        e.preventDefault();
    });

    $(`.popup${i} h5`).click(function () {
        $(`.popup${i}`).fadeOut(900);
        e.preventDefault();
    });
};
