<!-- begin spnoibat -->
<section class="sc-spnoibat">
    <h2 class="title-hot-prod"><a href="">Sản phảm nổi bật</a></h2>
    <div class="slide_hot_prod owl-carousel">
        <div class="item">
            <a href="">
                <img src="img/sp11.png">
                <h3>Bếp từ đôi Hồng ngoại</h3>
            </a>
            <a href="" class="more">Chi tiết</a>
        </div>
    </div>
</section>
<script>
    $(function(){
        $('.slide_hot_prod').owlCarousel({
            items: 4,
            responsive: {
                1200: { item: 4 }, /*// breakpoint from 1200 up*/
                982: { items: 3 },
                768: { items: 2 },
                480: { items: 2 },
                0: { items: 1, nav: false }
            },
            loop: true,
            rewind: false,
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            smartSpeed: 500, /*//slide speed smooth*/
            dots: true,
            dotsEach: true,
            /*dotsContainer: '#main-custom-dots',*/
            nav: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            /*navSpeed: 250, //slide speed when click button*/
            autoWidth: false,
            margin: 22,
            stagePadding: 3,
            lazyContent: false,
            lazyLoad: false,
            animateIn: false,
            animateOut: false,
            center: false,
            URLhashListener: false,
            video: false,
            videoHeight: false,
            videoWidth: false,
            URLhashListener: true
        })
    })
</script>
<!-- end spnoibat -->