<div class="clearfix"></div>
<?php if(count($doitacs)) : ?>
<section class="qts_content_home">
    <h2 class="title_home"><a href="javascript:(0)">Khách hàng - đối tác</a></h2>
    <div class="owl-carousel slider_doitac">
    	<?php foreach($doitacs as $doitac) :  ?>
		<div class="item">
			<a href="<?=base_url(@$doitac->alias)?>" title=<?=@$doitac->title;?>"><img class="w_100" src="<?=base_url(@$doitac->image)?>" alt="<?=@$doitac->title;?>"/></a>
		</div>
		 <?php endforeach;?>
    </div>
</section>
<?php endif;?>
<script type="text/javascript">
    $(function() {
            $(".slider_doitac").owlCarousel({
                items: 6,
                responsive: {
                    1200: { item: 6  }, // breakpoint from 1200 up
                    982: { items: 5 },
                    768: { items: 4 },
                    480: { items: 2 },
                    0: { items: 1 }
                },

                rewind: false,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                smartSpeed: 500, //slide speed smooth

                dots: false,
                dotsEach: false,
                loop: false,
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