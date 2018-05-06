<!-- begin sanpham-nb -->
<div class="sc_prod_hot">
    <div class="container">
        <div class="row_pc">
            <h2 class="tit_main"><a href="">SẢN PHẨM BÁN CHẠY</a></h2>
            <div class="clearfix"></div>
            <div class="sc_slider_prod">
                <div class="owl-carousel slider_prod">
                    <?php if (count($pros)) : ?>
                     <?php foreach ($pros as $pro) : ?>
                    <div class="item">
                        <div class="box_prod_hot text-center">
                            <a href="<?=base_url('san-pham/'.$pro->alias.'.html')?>" class="img_prod_hot h_5458"><img class="w_100" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" alt=<?=$pro->name?>""></a>
                            <h3 class="name_prod_hot"><a href="<?=base_url('san-pham/'.$pro->alias.'.html')?>"><?=$pro->name?></a></h3>
                            <div class="code_prod">MSP: AVL.283 + QVL.283</div>
                            <div class="price">
                                <?php if ($pro->price != 0) : ?>
                                <div class="price_old"><?=number_format($pro->price)?> vnđ</div>
                                <?php endif; ?>
                                <?php if ($pro->price_sale != 0) : ?>
                                <div class="price_new"><?=number_format($pro->price_sale)?> vnđ</div>
                                <?php else : ?>
                                    <div class="price_new">Liên hệ</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearix clearfix-30"></div>
<script type="text/javascript">
    $(function () {
        $(".slider_prod").owlCarousel({
            items: 4,
            responsive: {
                        1200: { item: 4, }, // breakpoint from 1200 up
                        982: { items: 3, },
                        768: { items: 2, },
                        480: { items: 2, },
                        0: { items: 1, }
                    },
                    rewind: false,
                    autoplay: true,
                    autoplayTimeout: 2000,
                    autoplayHoverPause: true,
                    smartSpeed: 500, //slide speed smooth

                    dots: true,
                    dotsEach: false,
                    loop: true,
                    nav: true,
                    navText: ['<img src="img/left.png" alt=""/>', '<img src="img/right.png" alt=""/>'],
                    // navSpeed: 250, //slide speed when click button

                    autoWidth: false,
                    margin: 8,

                    lazyContent: false,
                    lazyLoad: false,

                    animateIn: false,
                    animateOut: false,

                    center: false,
                    URLhashListener: false,

                    video: false,
                    videoHeight: false,
                    videoWidth: false,
                });
    });
</script>
<!-- end sanpham-nb -->