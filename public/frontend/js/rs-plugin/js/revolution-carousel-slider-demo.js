if (setREVStartSize !== undefined) setREVStartSize({
    c: '#rev_slider_2_1',
    responsiveLevels: [1240, 1024, 778, 480],
    gridwidth: [1170, 1024, 778, 480],
    gridheight: [600, 600, 500, 400],
    sliderLayout: 'fullwidth'
});

var revapi2,
    tpj;
(function() {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_2_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_2_1");
        } else {
            revapi2 = tpj("#rev_slider_2_1").show().revolution({
                sliderType: "carousel",
                jsFileLocation: "js/rs-plugin/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    arrows: {
                        style: "erinyen",
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 600,
                        hide_onleave: true,
                        hide_delay: 200,
                        hide_delay_mobile: 1200,
                        tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div>    <div class="tp-arr-img-over"></div>	<span class="tp-arr-titleholder">{{title}}</span> </div>',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 30,
                            v_offset: 0
                        }
                    }
                },
                carousel: {
                    horizontal_align: "center",
                    vertical_align: "center",
                    fadeout: "off",
                    maxVisibleItems: 3,
                    infinity: "on",
                    space: 1,
                    stretch: "off",
                    showLayersAllTime: "off",
                    easing: "Power3.easeInOut",
                    speed: "800"
                },
                viewPort: {
                    enable: true,
                    outof: "pause",
                    visible_area: "80%",
                    presize: false
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1170, 1024, 778, 480],
                gridheight: [600, 600, 500, 400],
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    speedbg: 0,
                    speedls: 0,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 47, 48, 49, 50, 51, 55],
                },
                shadow: 5,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "on",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }; /* END OF revapi call */

    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */

var htmlDivCss = unescape(".erinyen.tparrows%20%7B%0A%20%20cursor%3Apointer%3B%0A%20%20background%3Argba%280%2C0%2C0%2C0.5%29%3B%0A%20%20min-width%3A70px%3B%0A%20%20min-height%3A70px%3B%0A%20%20position%3Aabsolute%3B%0A%20%20display%3Ablock%3B%0A%20%20z-index%3A100%3B%0A%20%20border-radius%3A50%25%3B%20%20%20%0A%7D%0A%0A.erinyen.tparrows%3Abefore%20%7B%0A%20%20font-family%3A%20%22revicons%22%3B%0A%20%20font-size%3A20px%3B%0A%20%20color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%20%20display%3Ablock%3B%0A%20%20line-height%3A70px%3B%0A%20%20text-align%3A%20center%3B%20%20%20%20%0A%20%20z-index%3A2%3B%0A%20%20position%3Arelative%3B%0A%7D%0A.erinyen.tparrows.tp-leftarrow%3Abefore%20%7B%0A%20%20content%3A%20%22%5Ce824%22%3B%0A%7D%0A.erinyen.tparrows.tp-rightarrow%3Abefore%20%7B%0A%20%20content%3A%20%22%5Ce825%22%3B%0A%7D%0A%0A.erinyen%20.tp-title-wrap%20%7B%20%0A%20%20position%3Aabsolute%3B%0A%20%20z-index%3A1%3B%0A%20%20display%3Ainline-block%3B%0A%20%20background%3Argba%280%2C0%2C0%2C0.5%29%3B%0A%20%20min-height%3A70px%3B%0A%20%20line-height%3A70px%3B%0A%20%20top%3A0px%3B%0A%20%20margin-left%3A0px%3B%0A%20%20border-radius%3A35px%3B%0A%20%20overflow%3Ahidden%3B%20%0A%20%20transition%3A%20opacity%200.3s%3B%0A%20%20-webkit-transition%3Aopacity%200.3s%3B%0A%20%20-moz-transition%3Aopacity%200.3s%3B%0A%20%20-webkit-transform%3A%20scale%280%29%3B%0A%20%20-moz-transform%3A%20scale%280%29%3B%0A%20%20transform%3A%20scale%280%29%3B%20%20%0A%20%20visibility%3Ahidden%3B%0A%20%20opacity%3A0%3B%0A%7D%0A%0A.erinyen.tparrows%3Ahover%20.tp-title-wrap%7B%0A%20%20-webkit-transform%3A%20scale%281%29%3B%0A%20%20-moz-transform%3A%20scale%281%29%3B%0A%20%20transform%3A%20scale%281%29%3B%0A%20%20opacity%3A1%3B%0A%20%20visibility%3Avisible%3B%0A%7D%0A%20%20%20%20%20%20%20%20%0A%20.erinyen.tp-rightarrow%20.tp-title-wrap%20%7B%20%0A%20%20%20right%3A0px%3B%0A%20%20%20margin-right%3A0px%3Bmargin-left%3A0px%3B%0A%20%20%20-webkit-transform-origin%3A100%25%2050%25%3B%0A%20%20border-radius%3A35px%3B%0A%20%20padding-right%3A20px%3B%0A%20%20padding-left%3A10px%3B%0A%20%7D%0A%0A%0A.erinyen.tp-leftarrow%20.tp-title-wrap%20%7B%20%0A%20%20%20padding-left%3A20px%3B%0A%20%20padding-right%3A10px%3B%0A%7D%0A%0A.erinyen%20.tp-arr-titleholder%20%7B%0A%20%20letter-spacing%3A%203px%3B%0A%20%20%20position%3Arelative%3B%0A%20%20-webkit-transition%3A%20-webkit-transform%200.3s%3B%0A%20%20transition%3A%20transform%200.3s%3B%0A%20%20transform%3Atranslatex%28200px%29%3B%20%20%0A%20%20text-transform%3Auppercase%3B%0A%20%20color%3Argb%28255%2C%20255%2C%20255%29%3B%0A%20%20font-weight%3A600%3B%0A%20%20font-size%3A13px%3B%0A%20%20line-height%3A70px%3B%0A%20%20white-space%3Anowrap%3B%0A%20%20padding%3A0px%2020px%3B%0A%20%20margin-left%3A11px%3B%0A%20%20opacity%3A0%3B%20%20%0A%7D%0A%0A.erinyen%20.tp-arr-imgholder%20%7B%0A%20%20width%3A100%25%3B%0A%20%20height%3A100%25%3B%0A%20%20position%3Aabsolute%3B%0A%20%20top%3A0px%3B%0A%20%20left%3A0px%3B%0A%20%20background-position%3Acenter%20center%3B%0A%20%20background-size%3Acover%3B%0A%20%20%20%20%7D%0A%20.erinyen%20.tp-arr-img-over%20%7B%0A%20%20%20width%3A100%25%3B%0A%20%20height%3A100%25%3B%0A%20%20position%3Aabsolute%3B%0A%20%20top%3A0px%3B%0A%20%20left%3A0px%3B%0A%20%20%20background%3Argba%280%2C0%2C0%2C0.51%29%3B%0A%20%7D%0A.erinyen.tp-rightarrow%20.tp-arr-titleholder%20%7B%0A%20%20%20transform%3Atranslatex%28-200px%29%3B%20%0A%20%20%20margin-left%3A0px%3B%20margin-right%3A11px%3B%0A%20%20%20%20%20%20%7D%0A%0A.erinyen.tparrows%3Ahover%20.tp-arr-titleholder%20%7B%0A%20%20%20transform%3Atranslatex%280px%29%3B%0A%20%20%20-webkit-transform%3Atranslatex%280px%29%3B%0A%20%20transition-delay%3A%200.1s%3B%0A%20%20opacity%3A1%3B%0A%7D%0A");
var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
if (htmlDiv) {
    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
} else {
    var htmlDiv = document.createElement('div');
    htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
    document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
}