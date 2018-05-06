
$( window ).load(function() {
    render_size();
    var url = window.location.href;
    $('.menu-item  a[href="' + url + '"]').parent().addClass('active');
});

$( window ).resize(function() {
    render_size();
});



function render_size(){

    var h_9507 = $('.h_9507 img').width();
    $('.h_9507 img').height( 0.9507 * parseInt(h_9507));

    var h_75 = $('.h_75 img').width();
    $('.h_75 img').height( 0.75 * parseInt(h_75));

    var cate_left = $('.cate_right').height();
    $('.cate_left').height( parseInt(cate_left));

}


