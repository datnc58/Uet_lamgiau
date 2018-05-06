function render_size(){

    var h_7065 = $('.h_7065 img').width();
    $('.h_7065 img').height( 0.7065 * parseInt(h_7065));

    var h_1 = $('.h_1 img').width();
    $('.h_1 img').height( 1 * parseInt(h_1));

    var h_63 = $('.h_63 img').width();
    $('.h_63 img').height( 0.63 * parseInt(h_63));

}

/*global $*/
/*browser:true*/
/*global window*/

function Render_img() {
    'use strict';
    if ($('.imgRow').length) {
        $(".reRenderImg img").css('height', 'auto');
        $(".imgRow").each(function() {
            var thisRow,
                imgs,
                w,
                h,
                ratio;

            thisRow = $(this);
            imgs = thisRow.find(".reRenderImg img");

            w = imgs.width();
            h = imgs.height();
            ratio = h / w;

            imgs.height(Math.ceil(ratio * parseInt(w)));
        });
    }
}

var t;

function debounce_render() {
    clearTimeout(t);
    t = setTimeout(Render_img, 100);
}

$(function() {
    render_size();
    debounce_render();

    var url = window.location.href;
    // $('.menu-item  a').parent().removeClass('active');
    $('.menu-item  a[href="' + url + '"]').parent().addClass('active');
});

$(window).resize(function() {
    render_size();
    debounce_render();
});

