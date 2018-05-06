<!-- begin slider-sanpham-home -->
<section class="tab_slide_home">

    <ul>
        <li class="active">
            <a data-toggle="tab" href="#0" aria-expanded="true"><img src="img/icon15.png" alt="">Sảm phẩm mới</a>
        </li>
        <li class="">
            <a data-toggle="tab" href="#1" aria-expanded="false"><img src="img/icon15.png" alt="">Sản phẩm bán chạy</a>
        </li>
        <li class="hidden-xs">
            <a data-toggle="tab" href="#2" aria-expanded="false"><img src="img/icon15.png" alt="">Sản phẩm Hot</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="0" class="tab-pane fade active in active">
            <div class="slider_spbc owl-carousel">
                <?php foreach ($pros as $pro) : ?>
                    <div class="item">
                        <div class="full_box_spbc">
                            <div class="img_spbc h_7773">
                                <a href="<?= base_url($pro->alias . '.html') ?>" >
                                    <img src="<?= base_url('upload/img/products/' . $pro->pro_dir . '/' . @$pro->image) ?>" class="w_100" alt="" />
                                </a>
                                <?php  
                                        if ($pro->price != 0) {
                                           $phamtram= (( $pro->price - $pro->price_sale ) / $pro->price) * 100; 
                                            echo '<span class="sale">'.round($phamtram,1).'%'.'</span>';
                                        
                                        } 
                                ?> 
                            
                            </div>
                            <div class="text_spbc">
                                <h3 class="name_spbc">
                                    <a href="<?= base_url($pro->alias . '.html') ?>"><?= $pro->name;?></a>
                                </h3>
                                <ul class="ul_spbc">
                                    <li class="number_1"><?= $pro->price; ?>đ</li>
                                    <li class="number_2"><?= $pro->price_sale; ?>đ</li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                <?php endforeach; ?>
            </div>
        </div>
        
        <div id="1" class="tab-pane fade">
            <div class="slider_spbc owl-carousel">
                <?php  if (count($pros_banchay)):?>
                 <?php  foreach  ($pros_banchay as $pro_1) : ?>
                    <div class="item">
                        <div class="full_box_spbc">
                            <div class="img_spbc h_7773">
                                <a href="<?= base_url($pro_1->alias . '.html') ?>" >
                                    <img src="<?= base_url('upload/img/products/' . $pro->pro_dir . '/' . @$pro_1->image) ?>" class="w_100" alt="" />
                                </a>
                                <?php  
                                        if ($pro_1->price != 0) {
                                           $phamtram= (( $pro_1->price - $pro_1->price_sale ) / $pro_1->price) * 100; 
                                            echo '<span class="sale">'.round($phamtram,1).'%'.'</span>';
                                        
                                        } 
                                ?> 
                            
                            </div>
                            <div class="text_spbc">
                                <h3 class="name_spbc">
                                    <a href="<?= base_url($pro->alias . '.html') ?>"><?= $pro_1->name;?></a>
                                </h3>
                                <ul class="ul_spbc">
                                    <li class="number_1"><?= $pro_1->price; ?>đ</li>
                                    <li class="number_2"><?= $pro_1->price_sale; ?>đ</li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                <?php endforeach; ?>
            <?php  endif ?>
            </div>
        </div>

        <div id="2" class="tab-pane fade">
            <div class="slider_spbc owl-carousel">
                 <?php foreach ($pros_hot as $pro) : ?>
                    <div class="item">
                        <div class="full_box_spbc">
                            <div class="img_spbc h_7773">
                                <a href="<?= base_url($pro->alias . '.html') ?>" >
                                    <img src="<?= base_url('upload/img/products/' . $pro->pro_dir . '/' . @$pro->image) ?>" class="w_100" alt="" />
                                </a>
                                <?php  
                                        if ($pro->price != 0) {
                                           $phamtram= (( $pro->price - $pro->price_sale ) / $pro->price) * 100; 
                                            echo '<span class="sale">'.round($phamtram,1).'%'.'</span>';
                                        
                                        } 
                                ?> 
                            
                            </div>
                            <div class="text_spbc">
                                <h3 class="name_spbc">
                                    <a href="<?= base_url($pro->alias . '.html') ?>"><?= $pro->name;?></a>
                                </h3>
                                <ul class="ul_spbc">
                                    <li class="number_1"><?= $pro->price; ?>đ</li>
                                    <li class="number_2"><?= $pro->price_sale; ?>đ</li>
                                </ul>
                            </div>
                        </div>
                    </div> 
                <?php endforeach; ?>
            </div>
        </div>

    </div>
    
</section>
<script src="<?=base_url()?>assets/js/front_end/owl.carousel2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/front_end/owl.carousel2.css">
<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/css/front_end/owl.theme2.css">
<script>
    $(function () {
        $(".slider_spbc").owlCarousel({

            items: 5,
            responsive: {
                    1200: { item: 5 }, // breakpoint from 1200 up
                    982: { items: 4 },
                    768: { items: 3 },
                    480: { items: 2 },
                    0: { items: 1 }
                },
                loop: true,
                rewind: false,
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: false,
                smartSpeed: 1500, //slide speed smooth

                dots: false,
                dotsEach: false,
                nav: true,
                navText: [''],
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
    })
</script>
<!-- end slider-sanpham-home -->