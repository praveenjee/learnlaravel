if (setREVStartSize !== undefined) setREVStartSize({
    c: '#rev_slider_14_1',
    responsiveLevels: [1240, 1024, 778, 480],
    gridwidth: [1170, 1024, 778, 480],
    gridheight: [600, 768, 960, 720],
    sliderLayout: 'fullwidth'
});

var revapi14,
    tpj;
(function() {
    if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad);
    else onLoad();

    function onLoad() {
        if (tpj === undefined) {
            tpj = jQuery;
            if ("off" == "on") tpj.noConflict();
        }
        if (tpj("#rev_slider_14_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_14_1");
        } else {
            revapi14 = tpj("#rev_slider_14_1").show().revolution({
                sliderType: "standard",
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
                    bullets: {
                        enable: true,
                        hide_onmobile: false,
                        style: "bullet-bar",
                        hide_onleave: false,
                        direction: "horizontal",
                        h_align: "center",
                        v_align: "bottom",
                        h_offset: 0,
                        v_offset: 50,
                        space: 5,
                        tmp: ''
                    }
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1170, 1024, 778, 480],
                gridheight: [600, 768, 960, 720],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                hideThumbsOnMobile: "off",
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
            revapi14.bind("revolution.slide.onloaded", function(e) {
                revapi14.addClass("tiny_bullet_slider");
            });
        }; /* END OF revapi call */

        if (revapi14) revapi14.revSliderSlicey();

    }; /* END OF ON LOAD FUNCTION */
}()); /* END OF WRAPPING FUNCTION */

var htmlDivCss = unescape(".tiny_bullet_slider%20.tp-bullet%3Abefore%20%7B%0A%20%20%20%20content%3A%20%22%20%22%3B%0A%20%20%20%20position%3A%20absolute%3B%0A%20%20%20%20width%3A%20100%25%3B%0A%20%20%20%20height%3A%2025px%3B%0A%20%20%20%20top%3A-12px%3B%0A%20%20%20%20left%3A0px%3B%0A%20%20%20%20background%3A%20transparent%3B%0A%20%20%7D");
var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
if (htmlDiv) {
    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
} else {
    var htmlDiv = document.createElement('div');
    htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
    document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
}

var htmlDivCss = unescape(".bullet-bar.tp-bullets%20%7B%0A%7D%0A.bullet-bar.tp-bullets%3Abefore%20%7B%0A%09content%3A%22%20%22%3B%0A%09position%3Aabsolute%3B%0A%09width%3A100%25%3B%0A%09height%3A100%25%3B%0A%09background%3Atransparent%3B%0A%09padding%3A10px%3B%0A%09margin-left%3A-10px%3Bmargin-top%3A-10px%3B%0A%09box-sizing%3Acontent-box%3B%0A%7D%0A.bullet-bar%20.tp-bullet%20%7B%0A%09width%3A60px%3B%0A%09height%3A3px%3B%0A%09position%3Aabsolute%3B%0A%09background%3A%23aaa%3B%0A%20%20%20%20background%3Argba%28204%2C204%2C204%2C0.5%29%3B%0A%09cursor%3A%20pointer%3B%0A%09box-sizing%3Acontent-box%3B%0A%7D%0A.bullet-bar%20.tp-bullet%3Ahover%2C%0A.bullet-bar%20.tp-bullet.selected%20%7B%0A%09%20background%3Argba%28204%2C204%2C204%2C1%29%3B%0A%7D%0A.bullet-bar%20.tp-bullet-image%20%7B%0A%7D%0A.bullet-bar%20.tp-bullet-title%20%7B%0A%7D%0A%0A");
var htmlDiv = document.getElementById('rs-plugin-settings-inline-css');
if (htmlDiv) {
    htmlDiv.innerHTML = htmlDiv.innerHTML + htmlDivCss;
} else {
    var htmlDiv = document.createElement('div');
    htmlDiv.innerHTML = '<style>' + htmlDivCss + '</style>';
    document.getElementsByTagName('head')[0].appendChild(htmlDiv.childNodes[0]);
}