<?php
/* LIBRARY - SCRIPTS THEME */

function ncm_script_header()
{
    global $ncm_blog_is_grid;

    ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(document).ready(function () {
                $("*[data-toggle=tooltip]").tooltip({placement: "bottom"});

                $("input[name=s]").click(function () {
                    $(this).select();
                });

                <?php
                if($ncm_blog_is_grid) : ?>
                $(".post-grid").on("mouseleave", function (e) {
                    $(this).find(".post-overlay").dequeue().animate({
                        top: "0"
                    }, 600);
                });
                $(".post-grid .post-overlay").on("mouseenter", function (e) {
                    $(this).dequeue().animate({
                        top: "100%"
                    }, 600);
                });

                var footer_widgets = $("#wrapperSidebars .widget");
                footer_widgets.each(function (index, val) {
                    $(this).addClass("span4");
                    if (index % 3 == 0) {
                        $(this).addClass("first-row-widget");
                    }
                });
                <?php endif; ?>
                var regex = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/g;
                // /(iPad|iPhone|iPod)/g

                var isMobile = (navigator.userAgent.match(regex) ? true : false);
                if (isMobile) {
                    $(".ncm-product-grid").addClass("mobile-compatible").removeClass("hoverable-product");
                }
            });
        })(jQuery);
    </script>
<?php }

function ncm_script_faq()
{ ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(document).ready(function () {
                $("#faq-accordion").accordion({
                    heightStyle: "content",
                    active: false,
                    collapsible: true,
                    beforeActivate: function (event, ui) {
                        if (ui.newHeader[0]) {
                            var currHeader = ui.newHeader;
                            var currContent = currHeader.next('.ui-accordion-content');
                        }
                        else {
                            var currHeader = ui.oldHeader;
                            var currContent = currHeader.next('.ui-accordion-content');
                        }

                        var isPanelSelected = currHeader.attr('aria-selected') == 'true';
                        currHeader.toggleClass('ui-corner-all', isPanelSelected).toggleClass('accordion-header-active ui-state-active ui-corner-top', !isPanelSelected).attr('aria-selected', ((!isPanelSelected).toString()));
                        currHeader.children('.ui-icon').toggleClass('ui-icon-triangle-1-e', isPanelSelected).toggleClass('ui-icon-triangle-1-s', !isPanelSelected);
                        currContent.toggleClass('accordion-content-active', !isPanelSelected);

                        if (isPanelSelected) {
                            currContent.slideUp();
                        } else {
                            currContent.slideDown();
                        }

                        return false;
                    }
                });
                $("#faq-accordion h3").click(function () {
                    if (!$(this).hasClass("ui-state-active")) {
                        $(this).removeClass("patternBorderColorWithoutHover patternBGColor");
                        $(this).next("div").removeClass("patternBorderColorWithoutHover");
                    }
                    else {
                        $(this).addClass("patternBorderColorWithoutHover patternBGColor");
                        $(this).next("div").addClass("patternBorderColorWithoutHover");
                    }
                });
            });
        })(jQuery);
    </script>
<?php }

function ncm_script_contact()
{
    global $ncm_options_shop;
    $latitude = $ncm_options_shop["shop_latitude"];
    $longitude = $ncm_options_shop["shop_longitude"];

    ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(document).ready(function () {
                var coords = new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>);
                var mapOptions = {
                    zoom: <?php echo $ncm_options_shop["shop_map_zoom"]; ?>,
                    minZoom: <?php echo $ncm_options_shop["shop_map_zoom_min"]; ?>,
                    maxZoom: <?php echo $ncm_options_shop["shop_map_zoom_max"]; ?>,
                    center: coords,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("map"), mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(<?php echo $latitude; ?>, <?php echo $longitude; ?>),
                    title: "<?php echo __("Location", NCM_I18N_DOMAIN); ?>",
                    map: map
                });
            });
        })(jQuery);
    </script>
<?php }

function ncm_script_menu()
{
    global $ncm_options_general;

    ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(document).ready(function () {
                if (/Mobi/.test(navigator.userAgent)) {
                    $("#wrapperMenu ul li .sub-menu").each(function () {
                        $(this).parents(".menu-item").addClass("fix-mobile");
                        $(this).prev().addClass("fix-mobile");
                    });

                    $("#wrapperMenu ul .sub-menu").addClass("fix-mobile");
                    $("#wrapperMenu .menu-item").addClass("fix-mobile");
                    $("#wrapperMenu .menu-item a").addClass("fix-mobile");
                }

                <?php if(isset($ncm_options_general["fixed_menu_on_scroll"]) && $ncm_options_general["fixed_menu_on_scroll"] == 1) : ?>
                $("#wrapperMenu").sticky({
                    topSpacing: <?php echo (is_user_logged_in() ? '$("#wpadminbar").height()' : 0); ?>
                });
                <?php endif; ?>

                $("a#btn-collapse").click(function () {
                    var nav = $("div.nav-collapse");

                    if ($(nav).hasClass("in")) {
                        $(nav).addClass("out");
                    }
                    else if ($(nav).hasClass("out")) {
                        $(nav).removeClass("out");
                    }
                });
            });
        })(jQuery);
    </script>
<?php }

function ncm_script_slides_box_front()
{ ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(document).ready(function () {
                applyCarousel("#slider-recent .ncm-products", "left", 5000, "#slider-recent .prev", "#slider-recent .next");
                applyCarousel("#slider-best-sellers .ncm-products", "right", 8000, "#slider-best-sellers .prev", "#slider-best-sellers .next");

                var html_body = $("html, body");
                $("#slider-recent a.slider-caption").click(function () {
                    $(html_body).animate({
                        scrollTop: $("#slider-recent").offset().top
                    }, 2000);

                    html_body.bind("scroll mousedown DOMMouseScroll mousewheel keyup", function (e) {
                        if (e.which > 0 || e.type === "mousedown" || e.type === "mousewheel") {
                            html_body.stop().unbind("scroll mousedown DOMMouseScroll mousewheel keyup");
                        }
                    });
                });

                $("#slider-best-sellers a.slider-caption").click(function () {
                    $(html_body).animate({
                        scrollTop: $("#slider-best-sellers").offset().top
                    }, 2000);

                    html_body.bind("scroll mousedown DOMMouseScroll mousewheel keyup", function (e) {
                        if (e.which > 0 || e.type === "mousedown" || e.type === "mousewheel") {
                            html_body.stop().unbind("scroll mousedown DOMMouseScroll mousewheel keyup");
                        }
                    });
                });
            });

            function applyCarousel(slider, direction, slideTime, prevSelector, nextSelector) {
                $(slider).carouFredSel({
                    width: "100%",
                    align: "left",
                    direction: direction,
                    auto: slideTime,
                    circular: true,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    padding: [10, 0],
                    prev: prevSelector,
                    next: nextSelector,
                    items: {
                        max: 4,
                        height: "variable",
                        width: "243px"
                    },
                    scroll: {
                        items: 1,
                        easing: "linear",
                        duration: 300,
                        pauseOnHover: true
                    }
                });
            }
        })(jQuery);
    </script>
<?php }

function ncm_script_slides_box_stack()
{
    global $ncm_options_shop;

    $recommended = $ncm_options_shop["enable_slides_recommended"];
    $specialOffers = $ncm_options_shop["enable_slides_special_offers"];
    $bestSellers = $ncm_options_shop["enable_slides_best_sellers"];

    $useRecommended = (ncm_isset_and_not_empty($recommended) && $recommended == 1);
    $useSpecialOffers = (ncm_isset_and_not_empty($specialOffers) && $specialOffers == 1);
    $useBestSellers = (ncm_isset_and_not_empty($bestSellers) && $bestSellers == 1);
    ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            var recommended = $("#slider-recommended.carousel");
            var recommended_link = $("#slidesBox #recommended");
            var recommended_products = $("#slider-recommended .ncm-products");
            var recommended_arrows = $("#arrows-slider-recommended");

            var special_offers = $("#slider-special-offers.carousel");
            var special_offers_link = jQuery("#slidesBox #special-offers");
            var special_offers_products = jQuery("#slider-special-offers .ncm-products");
            var special_offers_arrows = jQuery("#arrows-slider-special-offers");

            var best_sellers = jQuery("#slider-best-sellers.carousel");
            var best_sellers_link = jQuery("#slidesBox #best-sellers");
            var best_sellers_products = jQuery("#slider-best-sellers .ncm-products");
            var best_sellers_arrows = jQuery("#arrows-slider-best-sellers");

            $(document).ready(function () {
                var isLessThanIE9 = !document.addEventListener;

                var ua = navigator.userAgent.toLowerCase();
                var isSafari = (ua.indexOf('safari') != -1 && ua.indexOf('chrome') == -1);

                $("#slidesBox a").click(function () {
                    $("#slidesBox a").each(function (i) {
                        $(this).removeClass("patternTextColorActive");
                    });

                    $(this).addClass("patternTextColorActive");

                    var html_body = $("html, body");
                    $(html_body).animate({
                        scrollTop: $("#slidesBox").offset().top
                    }, 2000);

                    html_body.bind("scroll mousedown DOMMouseScroll mousewheel keyup", function (e) {
                        if (e.which > 0 || e.type === "mousedown" || e.type === "mousewheel") {
                            html_body.stop().unbind("scroll mousedown DOMMouseScroll mousewheel keyup");
                        }
                    });
                });

                <?php if($useRecommended) : ?>
                showRecommended(true);
                applyCarousel(recommended_products, recommended_arrows);
                showRecommended(false);
                <?php endif; ?>

                <?php if($useSpecialOffers) : ?>
                showSpecialOffers(true);
                applyCarousel(special_offers_products, special_offers_arrows);
                showSpecialOffers(false);
                <?php endif; ?>

                <?php if($useBestSellers) : ?>
                showBestSellers(true);
                applyCarousel(best_sellers_products, best_sellers_arrows);
                showBestSellers(false);
                <?php endif; ?>

                <?php if($useRecommended) : ?>
                $(recommended_link).addClass("patternTextColorActive");
                showRecommended(true);
                <?php elseif(!$useRecommended && $useSpecialOffers) : ?>
                $(special_offers_link).addClass("patternTextColorActive");
                showSpecialOffers(true);
                <?php elseif(!$useRecommended && !$useSpecialOffers && $useBestSellers) : ?>
                $(best_sellers_link).addClass("patternTextColorActive");
                showBestSellers(true);
                <?php endif; ?>

                <?php if($useRecommended) : ?>
                $(recommended_link).click(function () {
                    showRecommended(true);
                    if (isLessThanIE9 || isSafari) {
                        applyCarousel(recommended_products, recommended_arrows);
                    }

                    <?php if($useSpecialOffers) : ?>
                    showSpecialOffers(false);
                    <?php endif; ?>

                    <?php if($useBestSellers) : ?>
                    showBestSellers(false);
                    <?php endif; ?>
                });
                <?php endif; ?>

                <?php if($useSpecialOffers) : ?>
                $(special_offers_link).click(function () {
                    <?php if($useRecommended) : ?>
                    showRecommended(false);
                    <?php endif; ?>

                    showSpecialOffers(true);
                    if (isLessThanIE9 || isSafari) {
                        applyCarousel(special_offers_products, special_offers_arrows);
                    }

                    <?php if($useBestSellers) : ?>
                    showBestSellers(false);
                    <?php endif; ?>
                });
                <?php endif; ?>

                <?php if($useBestSellers) : ?>
                $(best_sellers_link).click(function () {
                    <?php if($useRecommended) : ?>
                    showRecommended(false);
                    <?php endif; ?>

                    <?php if($useSpecialOffers) : ?>
                    showSpecialOffers(false);
                    <?php endif; ?>

                    showBestSellers(true);
                    if (isLessThanIE9 || isSafari) {
                        applyCarousel(best_sellers_products, best_sellers_arrows);
                    }
                });
                <?php endif; ?>
            });

            function applyCarousel(slider, arrows) {
                $(slider).carouFredSel({
                    width: "100%",
                    align: "left",
                    direction: "left",
                    auto: 5000,
                    circular: true,
                    swipe: {
                        onMouse: true,
                        onTouch: true
                    },
                    padding: [10, 0],
                    prev: jQuery(arrows).children(".prev"),
                    next: jQuery(arrows).children(".next"),
                    items: {
                        max: 4,
                        height: "variable",
                        width: "243px"
                    },
                    scroll: {
                        items: 1,
                        easing: "linear",
                        duration: 300,
                        pauseOnHover: true
                    }
                });
            }

            function showRecommended(s) {
                $(recommended).css("display", s === true ? "block" : "none");
                $(recommended_arrows).css("display", s === true ? "block" : "none");
            }

            function showSpecialOffers(s) {
                $(special_offers).css("display", s === true ? "block" : "none");
                $(special_offers_arrows).css("display", s === true ? "block" : "none");
            }

            function showBestSellers(s) {
                $(best_sellers).css("display", s === true ? "block" : "none");
                $(best_sellers_arrows).css("display", s === true ? "block" : "none");
            }
        })(jQuery);
    </script>
<?php }

function ncm_script_testimonials()
{ ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(document).ready(function () {
                var testmonialSlider = $("#testimonial-slider.flexslider");
                testmonialSlider.flexslider({
                    animation: "fade",
                    directionNav: false,
                    controlNav: false,
                    animationLoop: true,
                    animationSpeed: 300,
                    slideshowSpeed: 5000,
                    start: function (slider) {
                        $(slider).mouseover(function () {
                            slider.manualPause = false;
                            slider.play();
                        });

                        $(slider).mouseout(function () {
                            slider.manualPause = true;
                            slider.pause();
                        });
                    }
                });
                $("#testmonial-next").click(function () {
                    testmonialSlider.flexslider("next");
                });
                $("#testmonial-prev").click(function () {
                    testmonialSlider.flexslider("prev");
                });
            });
        })(jQuery);
    </script>
<?php }

function ncm_script_single_product_reviews()
{ ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $(".ncm-rating").hide().before(
                '<p class="ncm-stars">'
                + '<span>'
                + '<a class="star-1" href="#">1</a>'
                + '<a class="star-2" href="#">2</a>'
                + '<a class="star-3" href="#">3</a>'
                + '<a class="star-4" href="#">4</a>'
                + '<a class="star-5" href="#">5</a>'
                + '</span>'
                + '</p>'
            );

            $('body')
                .on('click', '#respond .ncm-wrapper-rating p.ncm-stars a', function () {
                    var $star = $(this);
                    var $rating = $(this).closest('.ncm-wrapper-rating').find('.ncm-rating');

                    $rating.val($star.text());
                    $star.siblings('a').removeClass('active');
                    $star.addClass('active');

                    return false;
                })
        })(jQuery);
    </script>
<?php }

function ncm_script_footer()
{ ?>
    <script type="text/javascript">
        (function ($) {
            "use strict";

            $.scrollUp({
                scrollName: "scrollUp",
                topDistance: 400,
                topSpeed: 300,
                animation: "fade",
                animationInSpeed: 200,
                animationOutSpeed: 200,
                scrollText: "<div class='well withOpacityTransitionEffect patternBGColor patternBorderColorWithoutHover'><img src='<?php echo get_template_directory_uri(); ?>/images/scroll-up.png' /></div>",
                scrollTitle: "<?php echo __("Scroll up", NCM_I18N_DOMAIN); ?>",
                activeOverlay: false
            });
        })(jQuery);
    </script>
<?php }

?>