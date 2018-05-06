<!-- begin container_close_body --></div></div><!-- end container_close_body -->

<!-- begin container_footer --><!-- end container_footer -->









<!-- begin footer -->
<div class="clearfix-10"></div>
<footer id="footer">
    <section class="qts_footer_top">
        <div class="container">
            <div class="">
                <div class="row">
                    <div class="top_footer">

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-480-12">
                            <div class="box_footer">
                                <h2 class="title_footer">
                                    thông tin LIÊN HỆ
                                </h2>
                                <h4 class="name_cty"><a href=""><?= $this->option->site_name;?></a></h4>
                                <p class="bf_map_ft">Địa chỉ: <?= $this->option->address;?></p>
                                <p class="bf_phone_ft">Điện thoại: <a href=""> <?= $this->option->hotline1;?></a></p>
                                <p class="bf_email_ft"> Email: <a href=""><?= $this->option->site_email;?> </a></p>
                                <p></p>
                            </div>
                        </div>
                        <?php if (count($menu_bottom)) : ?>
                            <?php $i = 0;
                            foreach ($menu_bottom as $key_r => $mr) : $i++ ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-480-12">
                                    <div class="box_footer">
                                        <h2 class="title_footer">
                                            <?= @$mr->name; ?>
                                        </h2>
                                        <ul class="ul_box_gooter">
                                            <?php if (count($mr->sub_menu_1)) : ?>
                                            <?php foreach ($mr->sub_menu_1 as $m_sub) : ?>
                                                <li><a href="<?= base_url($m_sub->url); ?>"><?= @$m_sub->name; ?></a></li>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-480-12">
                            <form action="<?= base_url('contact/email');?>" method="get">
                                <div class="box_footer">
                                    <h2 class="title_footer">
                                        đăng ký nhận tin
                                    </h2>
                                    <p class="pd_left_0"> Nhập email của bạn để được nhận các thông
                                        tin mới nhất từ <strong><a href="<?= base_url()?>"><?= base_url()?></a></strong></p>
                                    <div class="input-group divcenter">
                                        <input type="email" name="email" class="input_dk form-control" placeholder="Nhập email...">
                            <span class="input-group-btn">
                                <button class="btn btn-success style_dangky" name="send" type="submit">Đăng ký</button>
                            </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="bottom_footer">
                        <div class="web_click">
                            <a href="<?= base_url()?>"><?= $this->option->domain?></a>
                        </div>



                        <ul class="ul_footer_bottom">

                            <?php if (count($menu_bottom_2)) : ?>
                                <ul class="ul_footer_bottom">
                                    <?php 
                                    foreach ($menu_bottom_2 as $key_r => $mr) :  ?>
                                        <li><a href="<?= base_url($mr->url); ?>"><?= $mr->name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="qts_footer_bot">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full_footer_bot">
                    <div class="left_footer_bot">
                        <?= $this->option->coppy_right;?>
                    </div>
                    <div class="right_footer_bot">
                        <a href="<?= $this->option->face_id;?>" class="fa fa-facebook"></a>
                        <a href="<?= $this->option->link_tt;?>" class="fa fa-twitter"></a>
                        <a href="<?= $this->option->link_instagram;?>" class="fa fa-instagram"></a>
                        <a href="<?= $this->option->link_youtube;?>" class="fa fa-youtube-play"></a>
                        <a href="<?= $this->option->link_linkedin;?>" class="fa fa-linkedin"></a>
                    </div>
                </div>
                </div>
                
            </div>
        </div>
    </section>

    <a href="#top" id="go_top"><i class="fa fa-arrow-up icon_next"></i></a>

</footer>

<!-- end footer -->

 <script>
                        $(function () {
                            $('.owl-dot').hover(function () {
                                $('.slider_main').trigger('to.owl.carousel', [$(this).index(), 500]);
                            }, );
                            $(".slider_main").owlCarousel({
                                items: 1,
                                responsive: {
                                        1200: { item: 1 }, // breakpoint from 1200 up
                                        982: { items: 1 },
                                        768: { items: 1 },
                                        480: { items: 1 },
                                        0: { items: 1, nav: false }
                                    },
                                    slideBy: 1,
                                    loop: true,
                                    rewind: false,
                                    autoplay: true,
                                    autoplayTimeout: 4000,
                                    autoplayHoverPause: true,
                                    smartSpeed: 500, //slide speed smooth

                                    dots: true,
                                    dotsEach: true,
                                    dotsContainer: '#main-custom-dots',
                                    nav: true,
                                    navText: ['‹', '›'],
                                    // navText: ['<img src="img/but-p.png"/>', '<img src="img/but-n.png"/>'],
                                    // navText: ['<i class="fa fa-chevron-left"><i/>', '<i class="fa fa-chevron-right"><i/>'],
                                    // navSpeed: 250, //slide speed when click button

                                    autoWidth: false,
                                    margin: 0,

                                    lazyContent: false,
                                    lazyLoad: false,

                                    // animateIn: ['flipInX', 'flipInY', 'zoomIn', 'slideInDown', 'bounceIn', 'faderIn'],
                                    // animateOut: ['flipOutX', 'flipOutY', 'zoomOut', 'slideOutDown', 'bounceOut', 'faderOut'],
                                    animateIn: '',
                                    animateOut: '',

                                    center: false,
                                    URLhashListener: false,

                                    video: false,
                                    videoHeight: false,
                                    videoWidth: false,
                                });
                        })
                    </script>
                    
                     <script>
            $(() => {
                $('.slider_prod_hot').owlCarousel({
                    items: 5,
                    responsive: {
                        1200: { item: 5 },
                        982: { items: 4 },
                        768: { items: 3 },
                        480: { items: 2 },
                        0: { items: 2, nav: false }
                    },
                    slideBy: 1,
                    loop: true,
                    rewind: true,
                    autoplay: true,
                    autoplayTimeout: 4000,
                    autoplayHoverPause: true,
                    smartSpeed: 500,

                    dots: false,
                    dotsEach: false,
                    nav: true,
                    navText: ['‹', '›'],
                    // navText: ['<img src="img/but-p.png"/>', '<img src="img/but-n.png"/>'],
                    /*navText: ['<i class="fa fa-chevron-left"><i/>', '<i class="fa fa-chevron-right"><i/>'],*/
                    /*navSpeed: 250, */

                    autoWidth: false,
                    margin: 10,
                    stagePadding: 0,

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
            })
        </script>
<!-- begin container_close_footer --><!-- end container_close_footer -->
<script src="<?= base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine-vi.js"
            charset="utf-8"></script>
<script src="<?= base_url()?>assets/plugin/ValidationEngine/js/jquery.validationEngine.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.validate ').validationEngine();
    });
</script>
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/owl.carousel2.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/style-img.js"></script>
<style type="text/css">
    .col-lg-4{width: 24% !important;}
.caption {height: 130px;overflow: hidden;}
.caption h4 {white-space: nowrap;font-size: 16px;}
.thumbnail img {width: 100%;}
.ratings {padding-right: 10px;padding-left: 10px;color: #d17581;}
.thumbnail {padding: 0;}
.thumbnail .caption-full {padding: 9px;color: #333;}
.thumbnail .btn{margin: 0px 30% 10px 30%;}
</style>
<script type="text/javascript">
    function flyToElement(flyer, flyingTo) {
        var $func = $(this);
        var divider = 3;
        var flyerClone = $(flyer).clone();
        $(flyerClone).css({position: 'absolute', top: $(flyer).offset().top + "px", left: $(flyer).offset().left + "px", opacity: 1, 'z-index': 1000});
        $('body').append($(flyerClone));
        var gotoX = $(flyingTo).offset().left + ($(flyingTo).width() / 2) - ($(flyer).width()/divider)/2;
        var gotoY = $(flyingTo).offset().top + ($(flyingTo).height() / 2) - ($(flyer).height()/divider)/2;
         
        $(flyerClone).animate({
            opacity: 0.4,
            left: gotoX,
            top: gotoY,
            width: $(flyer).width()/divider,
            height: $(flyer).height()/divider
        }, 700,
        function () {
            $(flyingTo).fadeOut('fast', function () {
                $(flyingTo).fadeIn('fast', function () {
                    $(flyerClone).fadeOut('fast', function () {
                        $(flyerClone).remove();
                    });
                });
            });
        });
    }
    $(document).ready(function(){
        $('.add-to-cart').on('click',function(){
            //Scroll to top if cart icon is hidden on top
            $('html, body').animate({
                'scrollTop' : $(".cart_anchor").position().top
            });
            //Select item image and pass to the function
            var itemImg = $(this).parent().parent().parent().find('.w1').eq(0);
            flyToElement($(itemImg), $('.cart_anchor'));
        });
    });
</script>


<?php if ($this->session->userData('mess')) { ?>
    <div id="show_success_mss" style="position: fixed; top: 150px; right: 20px;z-index: 99999">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <?= $this->session->userData('mess'); ?>
        </div>
        <?php
        $this->session->unset_userdata('mess'); ?>
    </div>
<?php } ?>
<script>
    setTimeout(function () {
        jQuery('#show_success_mss').fadeOut().empty();
    }, 5000);
</script>
<div class="icon_cart_fix img_right_head">
    <a href="<?= base_url('gio-hang')?>">
        <div class="text_right_head icon_cart_fix2">
                            <i class="fa fa-shopping-basket" aria-hidden="true"></i> 
                        </div>
    <span><?= $count?></span>
    </a>
</div>

                            
<script type='text/javascript'>
   
  function play(event) {
    $.keyframe.define([
    {
      name: 'move',
      from: {
        'left': event.clientX+'px',
        'top':  event.clientY+'px',
        'width': '80px',
        'height':'80px',
        'opacity': '1'
      },
      to: {
        'left': '96%',
        'top':'85%',
        'width': '20px',
        'height':'20px',
        'opacity': '0'
      }
    }]);
    $('#'+event.target.attributes[3].value).resetKeyframe(function() {
      $('#'+event.target.attributes[3].value).playKeyframe({
        name: 'move',
        duration: "1s",
        timingFunction: 'ease',
        complete: increment(event.target.attributes[4].value)
      });
    })
  }
 
  // example callback function

  function increment(id) {
    $.ajax({
            type: "POST",
            dataType: "html",
            url: base_url() + '/addCart_now_ajax',
            data: {id:id},
            success:function(res){
                 $(".pd_top").html(res+' sản phẩm');
                 $(".img_right_head span").html(res);
            }
        });
  }
  </script>
  <style type="text/css">
      .img_fly{
        position: fixed;
        opacity: 0;
        width:50px !important;
        height: 50px;
        z-index: 999;

    }
    .icon_cart_fix{
            position: fixed;
            right: 0px;
            bottom: 10%;
            font-size: 15px;
            color: #fff;
            
    }
    .icon_cart_fix i{
        color: #fff;
    }
    .icon_cart_fix2{
        border-radius: 50%;
        background: #6cd367;
        padding: 8px 10px;
    }
    .icon_cart_fix span{
        position: absolute;
        top: -10px;
        right: -5px;
        color: #6cd367;
        background: #fff;
        padding: 1px 3px;
        border-radius: 50%;
    }
  </style>
</body>
</html>
