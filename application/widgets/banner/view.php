<!-- begin banner -->
<?php if(count($slides)) : ?>
<div class="clearfix"></div>
    <section class="sc_slider_banner">
        <!-- begin container_slide --><!-- end container_slide -->
                <div class="owl-carousel slider_banner">
                    <?php foreach($slides as $slide) {?>
                    <div class="item">
                        <div class="img_banner">
                            <a href="<?=@$slide->url;?>"><img src="<?=base_url(@$slide->image);?>" class="w_100" alt=""/></a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
        <!-- begin close_container_slide --><!-- end close_container_slide -->
</section>
<?php endif;?>
<script type="text/javascript">
    $(function() {
            $(".slider_banner").owlCarousel({

                items: 1,
                responsive: {
                    1200: { item: 1  }, // breakpoint from 1200 up
                    982: { items: 1 },
                    768: { items: 1 },
                    480: { items: 1 },
                    0: { items: 1 }
                },

                rewind: false,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                smartSpeed: 500, //slide speed smooth

                dots: false,
                dotsEach: false,
                loop: true,
                nav: false,
                navText: ['<i class="fa fa-angle-left icon_slider"></i>', '<i class="fa fa-angle-right icon_slider"></i>'],
                // navSpeed: 250, //slide speed when click button

                autoWidth: false,
                margin: 0,

                lazyContent: false,
                lazyLoad: false,

                animateIn: false,
                animateOut: false,

                center: false,
                URLhashListener: false,

                video: false,
                videoHeight: false,
                videoWidth: false
            });
        });
</script>
<div class="clearfix-40"></div>
<!-- end banner -->