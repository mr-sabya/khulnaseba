$('#menu_btn').click(function (e) {
    e.preventDefault();
    // $('.main-menu').addClass('show');
    // $('#menu-overlay').addClass('show');
    $('#sidebar').toggleClass('d-none');
    $('#content-area').toggleClass('ms-0');
});

$('#menu-overlay').click(function (e) {
    e.preventDefault();
    $('.main-menu').removeClass('show');
    $('#menu-overlay').removeClass('show');
});

$('#hero').slick({
    infinite: true,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
    appendDots: '.slider-dots',
});



$('.testimonial-slider').slick({
    infinite: true,
    dots: true,
    arrows: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    appendDots: '.testionial-dots',
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 780,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});