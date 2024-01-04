(function ($) {
    $(document).ready(function () {
        // Scroll to Top
        jQuery(".scrolltotop").click(function () {
            jQuery("html").animate({scrollTop: "0px"}, 400);
            return false;
        });

        jQuery(window).scroll(function () {
            var upto = jQuery(window).scrollTop();
            if (upto > 500) {
                jQuery(".scrolltotop").fadeIn();
            } else {
                jQuery(".scrolltotop").fadeOut();
            }
        });

        // code for mini slider
        $(".mini-slider").owlCarousel({
            loop: true,
            margin: 20,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                960: {
                    items: 1,
                },
                1200: {
                    items: 1,
                },
                1920: {
                    items: 1,
                },
            },
        });

        var owl = $(".mini-slider");
        owl.owlCarousel();
        $(".customNextBtn").click(function () {
            owl.trigger("next.owl.carousel");
        });
        $(".customPrevBtn").click(function () {
            owl.trigger("prev.owl.carousel", [300]);
        });

        // code for video slider
        $(".video-slider").owlCarousel({
            loop: true,
            margin: 20,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                960: {
                    items: 1,
                },
                1200: {
                    items: 1,
                },
                1920: {
                    items: 1,
                },
            },
        });

        var owlFour = $(".video-slider");
        owlFour.owlCarousel();
        $(".videoNext").click(function () {
            owlFour.trigger("next.owl.carousel");
        });
        $(".videoPrev").click(function () {
            owlFour.trigger("prev.owl.carousel", [300]);
        });


        $(".video-slider2").owlCarousel({
            loop: false,
            margin: 20,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                960: {
                    items: 1,
                },
                1200: {
                    items: 1,
                },
                1920: {
                    items: 1,
                },
            },
        });

        // responsive block slider
        $(".blog_slider").owlCarousel({
            loop: true,
            margin: 0,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1.2,
                },
                768: {
                    items: 2,
                },
                960: {
                    items: 2,
                },
                1200: {
                    items: 8,
                },
                1920: {
                    items: 8,
                },
            },
        });

        // responsive p4 slider
        $(".p4sliderblg").owlCarousel({
            loop: true,
            margin: 0,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1.2,
                },
                768: {
                    items: 2,
                },
                960: {
                    items: 2,
                },
                1200: {
                    items: 8,
                },
                1920: {
                    items: 8,
                },
            },
        });

        // responsive p4 slider
        $(".p5-slider").owlCarousel({
            loop: false,
            margin: 0,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1,
                },
                768: {
                    items: 1,
                },
                960: {
                    items: 1,
                },
                1200: {
                    items: 1,
                },
                1920: {
                    items: 1,
                },
            },
        });

        var owlfive = $(".p5-slider");
        owlfive.owlCarousel();
        $(".p5s_next").click(function () {
            owlfive.trigger("next.owl.carousel");
        });
        $(".p5s_prev").click(function () {
            owlfive.trigger("prev.owl.carousel", [300]);
        });

        // p6slider code
        $(".p6astro-slider").owlCarousel({
            loop: false,
            margin: 0,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1.3,
                },
                768: {
                    items: 1.3,
                },
                960: {
                    items: 1.3,
                },
                1200: {
                    items: 1.3,
                },
                1920: {
                    items: 1.3,
                },
            },
        });

        // p9slider code
        $(".p9-slider").owlCarousel({
            loop: true,
            margin: 5,
            center: false,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            responsiveClass: true,
            responsiveRefreshRate: true,
            responsive: {
                0: {
                    items: 1.3,
                },
                768: {
                    items: 2.3,
                },
                960: {
                    items: 1.3,
                },
                1200: {
                    items: 1.3,
                },
                1920: {
                    items: 1.3,
                },
            },
        });
    });
})(jQuery);

//code for sticky header
(function ($) {
    $(document).ready(function () {
        jQuery(window).on("scroll", function () {
            if (jQuery(window).scrollTop()) {
                jQuery("header").addClass("sticky-top");
            } else {
                jQuery("header").removeClass("sticky-top");
            }
        });
    });


    $(document).on('change', 'select.change_lang', function (e) {
        var lang = $(this).val();
        var url = (lang == 'en') ? $("base").attr("data-url-en") : $("base").attr("data-url-th");
        window.location.href = url;
    });



    const searchInput = document.querySelector(".search_input input");
    const searchResult = document.querySelector(".search_box");
    if (searchInput) {
        var $base_url = $("base").attr("href");
        var kptimeout = 0;
        searchInput.addEventListener("keyup", (e) => {
            clearTimeout(kptimeout);
            const searchValue = e.target.value;
            //console.log(searchValue);
            if (searchInput.value) {
                kptimeout = setTimeout(function () {
                    load_result_topsearch(searchInput.value);
                }, 300);
            } else {
                $(".search_box").html('');
            }
        });
    }

    function load_result_topsearch(keyword = '') {
        $.ajax({
            url: $base_url + "gen_searchbox",
            type: "post",
            dataType: "html",
            data: {keyword: keyword},
            beforeSend: function (xhr, settings) {
                $(".search_box").html('');
            },
            success: function (data) {
                $(".search_box").html(data);
//                const submitTopSearch3 = document.querySelector(".submitTopSearch3");
//                if (submitTopSearch3) {
//                    submitTopSearch3.addEventListener("click", () => {
//                        $('#frmTopSearch').submit();
//                    });
//                }
            }
        });
    }


    $('.js-form-subscribe-x').on('submit', function (e) {
        e.preventDefault();
        var $base_url = $("base").attr("href");
        $.ajax({
            url: $base_url + 'subscribe',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function () {
                //$('.bottom-respon').removeClass('error success');
                $('#subscribe_email').removeClass('border border-danger form-control is-invalid');
                $('.bottom-respon').html('');
                $('.bottom-respon').removeClass("wow fadeInUp animated");
            },
            success: function (data) {
                $('.bottom-respon').addClass("wow fadeInUp animated");
                if (data.code == 0) {
                    $('.submit_button').hide();
                    $('.bottom-respon').html(data.text).addClass('mt-3');
                    $('#subscribe_email').val('');
                } else {
                    $('#subscribe_email').addClass('border border-danger form-control is-invalid');
                    $('#subscribe_email').focus();
                    $('.bottom-respon').html(data.text);
                }
            }
        });
    });



})(jQuery);
