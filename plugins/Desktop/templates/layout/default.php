<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?= $this->Html->meta('icon') ?>

    <title><?= $this->fetch('title') ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;300;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b3d2c8f174.js" crossorigin="anonymous"></script>

    <?= $this->Html->css(
        [
            '../vendor/unify-2.6.2/vendor/bootstrap/bootstrap.min.css',
            '../vendor/unify-2.6.2/vendor/icon-line-pro/style.css',
            '../vendor/unify-2.6.2/vendor/slick-carousel/slick/slick.css',
            '../vendor/unify-2.6.2/vendor/icon-hs/style.css',
            '../vendor/unify-2.6.2/vendor/hamburgers/hamburgers.min.css',
            '../vendor/unify-2.6.2/vendor/hs-megamenu/src/hs.megamenu.css',
            '../vendor/unify-2.6.2/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css',
            '../vendor/unify-2.6.2/vendor/animate.css',
            '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css',
            '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/css/settings.css',
            '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/css/layers.css',
            '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/css/navigation.css',
            '../vendor/unify-2.6.2/vendor/revolution-slider/revolution-addons/typewriter/css/typewriter.css',
            'styles.e-commerce.css',
            '../vendor/unify-2.6.2/css/custom.css',
            'main.css'
        ]
    ); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<main>
    <?= $this->element('header') ?>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
    <?= $this->element('footer') ?>
</main>

<?= $this->Html->script(
    [
        '../vendor/unify-2.6.2/vendor/jquery/jquery.min.js',
        '../vendor/unify-2.6.2/vendor/jquery-migrate/jquery-migrate.min.js',
        '../vendor/unify-2.6.2/vendor/popper.js/popper.min.js',
        '../vendor/unify-2.6.2/vendor/bootstrap/bootstrap.min.js',
        '../vendor/unify-2.6.2/vendor/jquery.countdown.min.js',
        '../vendor/unify-2.6.2/vendor/slick-carousel/slick/slick.js',
        '../vendor/unify-2.6.2/vendor/hs-megamenu/src/hs.megamenu.js',
        '../vendor/unify-2.6.2/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js',
        '../vendor/unify-2.6.2/vendor/appear.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/jquery.themepunch.tools.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/jquery.themepunch.revolution.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution-addons/typewriter/js/revolution.addon.typewriter.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.actions.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.carousel.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.kenburn.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.layeranimation.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.migration.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.navigation.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.parallax.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js',
        '../vendor/unify-2.6.2/vendor/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js',
        '../vendor/unify-2.6.2/js/hs.core.js',
        '../vendor/unify-2.6.2/js/components/hs.header.js',
        '../vendor/unify-2.6.2/js/helpers/hs.hamburgers.js',
        '../vendor/unify-2.6.2/js/components/hs.dropdown.js',
        '../vendor/unify-2.6.2/js/components/hs.scrollbar.js',
        '../vendor/unify-2.6.2/js/components/hs.countdown.js',
        '../vendor/unify-2.6.2/js/components/hs.carousel.js',
        '../vendor/unify-2.6.2/js/components/hs.go-to.js',
        '../vendor/unify-2.6.2/js/components/hs.count-qty.js',
        '../vendor/unify-2.6.2/js/custom.js',
    ]
) ?>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

        $('#carouselCus1').slick('setOption', 'responsive', [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }], true);
    });

    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });

    // initialization of HSDropdown component
    $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
        afterOpen: function () {
            $(this).find('input[type="search"]').focus();
        }
    });

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');

    // initialization of countdowns
    var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
        yearsElSelector: '.js-cd-years',
        monthElSelector: '.js-cd-month',
        daysElSelector: '.js-cd-days',
        hoursElSelector: '.js-cd-hours',
        minutesElSelector: '.js-cd-minutes',
        secondsElSelector: '.js-cd-seconds'
    });

    // initialization of quantity counter
    $.HSCore.components.HSCountQty.init('.js-quantity');

    $(window).on('load', function () {
        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));
    });

    // initialization of revolution slider
    var tpj = jQuery;

    var revapi1014;
    tpj(document).ready(function () {
        if (tpj("#rev_slider_1014_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1014_1");
        } else {
            revapi1014 = tpj("#rev_slider_1014_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style: "uranus",
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 768,
                        hide_onleave: false,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        }
                    }
                },
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    disable_onmobile: "on"
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [868, 768, 960, 600],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "#js-header",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false
                }
            });
        }

        RsTypewriterAddOn(tpj, revapi1014);
    });
</script>
</body>

</html>