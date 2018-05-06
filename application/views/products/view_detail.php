
<div class="clearfix"></div>
    <!-- begin left_content --><div class="col-md-12 col-sm-12">
                
                   
                  
        <!-- begin sc_detail -->
        <section class="sc_detail">
           
                <div class="detail">
                    <div class="row_pc">
                        <div class="col-md-6">
                            <div class="slider_detail">
                                <input type="hidden" id="__VIEWxSTATE" />
                                <script src="<?=base_url()?>assets/js/front_end/modernizr.custom.js" type="text/javascript"></script>
                                <link href="<?=base_url()?>assets/css/front_end/glasscase.minf195.css" rel="stylesheet" />
                                <ul id='girlstop1' class='gc-start'>
                                    <li><img src="<?= base_url('upload/img/products/' . $item->pro_dir . '/thumbnail_2_' . @$item->image) ?>" alt='<?= $item->name ?>' /></li>
                                    
                                    <?php if (count($p_images)) {
            foreach ($p_images as $key => $p_image) {
              ?>
              <li><img src="<?= base_url($p_image->image) ?>" alt='<?= $item->name ?>'/></li>
              <?php
            }
          } ?>
          
                                </ul>
                                <script src="<?=base_url()?>assets/js/front_end/jquery.glasscase.minf195.js"></script>
                                <script type="text/javascript">
                                    $(function () {
                                        $("#girlstop1").glassCase({
                                            'widthDisplay': 1200,
                                            'heightDisplay': 800,
                                            'nrThumbsPerRow': 4,
                                            'isSlowZoom': false,
                                            'isSlowLens': true,
                                            'capZType': 'in',
                                            'thumbsPosition': 'bottom',
                                            'isHoverShowThumbs': true,
                                            'colorIcons': '#000',
                                            'colorActiveThumb': '#189ed0',
                                            'mouseEnterDisplayCB': function () { $('.pInstructions').text('Click to open expanded view'); },
                                            'mouseLeaveDisplayCB': function () { $('.pInstructions').text('Roll over image to zoom in'); }
                                        });
                                    });
                                </script>
                                <div class="clb10"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product-detail-box">
                                <h1 class="product-title"><?= $item->name ?></h1>
                                <div class="status">
                                    <span class="brand"><i class="fa fa-gg"></i><b>Danh mục:</b> <a href="<?= base_url('danh-muc/' . $cate_current->alias . '.html') ?>"><?= $cate_current->name ?></a></span>
                                    <span class="tag"><i class="fa fa-tags"></i> <b>Mã: </b> <?= $item->code ?></span>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-sm-7 col-xs-7 left_box">
                                        <div class="price">
                                            <div class="label-price">
                                                <span class="label-of">Giá bán:</span>
                                                <span class="current"><?php if($item->price_sale >0) {?>
           							<?=number_format($item->price_sale)?>₫
           							<?php }else{?>
           										Liên hệ
           								<?php }?> </span>
                                            </div>
                                            <div class="label-price">
                                                <span class="label-of">Giá thị trường:</span>
                                                <span class="old"><?=number_format($item->price)?>₫</span>
                                            </div>
                                            
                                             <?php
                                                            $gia_ban=$item->price_sale;
                                                            $gia_goc=$item->price;
                                                            if($gia_goc){
                                                             $giam_gia=(($gia_goc - $gia_ban) / $gia_goc )*100;
                                                            }
                                                            ?>
                                                            
                                                            
                                            <div class="label-price">
                                                <span class="label-of">Tiết kiệm:</span>
                                                <span class="save">
                                                    <span class="percent">-<?=@ceil($giam_gia)?>%</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="short-desc">
                                            <?php if (isset($thuoctinh)) {
											$stt=0;
											foreach ($thuoctinh as $key=>$v) { $stt++;
											  if($v->type=='text'){
												?> 
												<p><span><?=@$v->name?></span>:  <?=@$v->content;?></p>
												<?php }  } }?>
                                                
                                                <br />
                                                <?= LimitString($item->description,220, '...'); ?>
                                        </div>
                                        <form action="<?=base_url('addCart_now')?>" method="get">
                                            
                                             
             								<input type="hidden" name="id" id="" value="<?=$item->id?>">
             
                                            <div class="quantity-selector detail-info-entry">
                                                <div class="entry sub"><i class="fa fa-minus"></i></div>
                                                <input class=" number" name="quantity" id="quantity"  value="1" min="1" max="100">
                                                <div class="entry add"><i class="fa fa-plus"></i></div>
                                            </div>
                                            <script>
                                                $(document).on('click', '.quantity-selector .entry', function () {
                                                    var _qty = parseInt($('.quantity-selector .number').val());
                                                    if ($(this).hasClass('sub')) {
                                                        if (_qty > 1) {
                                                            $('.quantity-selector .number').val(--_qty);
                                                        }
                                                    } else {
                                                        $('.quantity-selector .number').val(++_qty);
                                                    }
                                                })
                                            </script>
                                            <button href="javascript:void(0)" class="btn-addcart ">
                                                <div>Thêm vào giỏ</div>
                                                Xem hàng không thích có thể trả lại
                                            </button>
                                        </form>
                                        
                                        
                                       
           
           
                                    </div>
                                    <div class="col-sm-5 col-xs-5 right_box text-left">
                                        <div class="pd_policy">
                                            <div class="serv">
                                                <div class="icon">
                                                    <img src="<?=base_url()?>img/product_policy_1.png">
                                                </div>
                                                <div class="txt">
                                                    <div class="tit">GIAO HÀNG</div>
                                                    <span>
                                                        Miễn phí giao hàng nội thành
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="serv">
                                                <div class="icon">
                                                    <img src="<?=base_url()?>img/product_policy_2.png">
                                                </div>
                                                <div class="txt">
                                                    <div class="tit">SẢN PHẨM</div>
                                                    <span>
                                                        Cam kết chính hãng 100% Phát hiện hàng giả đền 200%
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="serv">
                                                <div class="icon">
                                                    <img src="<?=base_url()?>img/product_policy_3.png">
                                                </div>
                                                <div class="txt">
                                                    <div class="tit">ĐỔI TRẢ</div>
                                                    <span>
                                                        Đổi mới trong vong 30 ngày
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="serv">
                                                <div class="icon">
                                                    <img src="<?=base_url()?>img/product_policy_4.png">
                                                </div>
                                                <div class="txt">
                                                    <div class="tit">HỖ TRỢ</div>
                                                    <span>
                                                        Hotline: <?= $this->option->hotline1;?>
                                                        <br> Thứ 2 - 7: 08:00 - 19:00
                                                        <br> Chủ nhật: 09:00 - 17:00
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="prod-infomation">
                    <div role="tabpanel">
                        <!-- Nav tabs -->
                        
                    
                        <ul class="detail-tabs" role="tablist">
                         <?php if (isset($thuoctinh)) {
   $stt=0;
   foreach ($thuoctinh as $key=>$v) { $stt++;
     if($v->type=='textarea'){
       ?>
       
                            <li role="presentation" class="<?php if($stt==1){ echo'active'; } ?>">
                                <a href="#tab<?=$stt?>" aria-controls="tab<?=$stt?>" role="tab" data-toggle="tab"><?=@$v->name?></a>
                            </li>
                             <?php }  } }?>
                             
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content detail-tab-content">
                         <?php if (isset($thuoctinh)) {
   $stt=0;
   foreach ($thuoctinh as $key=>$v) { $stt++;
     if($v->type=='textarea'){
       ?>
                            <div role="tabpanel" class="tab-pane fade <?php if($stt==1){ echo' in active'; } ?>" id="tab<?=$stt?>">
                               <?=@$v->content;?>
                            </div>
                              <?php }  } }?>
                        </div>
                    </div>
                    <!--  begin sanpham-hot -->
                    <section class="sc-sanpham-lq">
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="title-list-link clearfix">
                                        <!-- Nav tabs -->
                                        <h2 class="section-title"><a>Sản phẩm cùng loại</a></h2>
                                    </div>
                                    <?php if(count($list_item)):
           foreach($list_item as $pro):?>
           <img id="id_image<?=$pro->pro_id?>" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_3_'.@$pro->image)?>" class=" img_fly" >
           <?php endforeach;endif;?>   
                                    <div class="slider_prod_lq owl-carousel imgRow">
                                    
                                    
                                  <?php if(count($list_item)):
           foreach($list_item as $pro):?>
                                    
                                        <div class="item">
                                            <div class="prod">
                                                <div class="relative overlay img-flip">
                                                    <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="reRenderImg relative">
                                                        <img src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" alt="<?= $pro->name ?>" class="wa img-efect">
                                                        
                                                         
                                                         
                                                    </a>
                                                    
                                                    <div class="dp-spread">
                                                        <div class="icon-wrap">
                                                            <a href="javascript:void(0)" onclick="play(event)" class="add-cart" data-id="id_image<?=$pro->pro_id?>" data-value="<?=$pro->pro_id?>"><img src="<?= base_url()?>img/cart_w.png" alt="Thêm vào giỏ" title="Thêm vào giỏ" data-id="id_image<?=$pro->pro_id?>" data-value="<?=$pro->pro_id?>"></a>
                                                            
                                                            <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="view_product"><img src="<?= base_url()?>img/eye_w.png" alt="Xem chi tiết" title="Xem chi tiết"></a>
                                                        </div>
                                                    </div>
                                                    
                                                    <?php
									   $gia_ban=$pro->price_sale;
									   $gia_goc=$pro->price;
									   if($gia_goc){
									       $giam_gia=(($gia_goc - $gia_ban) / $gia_goc )*100;
									   }
									 ?>
                                     
                                     
                                                    <div class="dp-top-left">
                                                        <div class="badge-discount">
                                                            -<?=@ceil($giam_gia)?>%
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="txt">
                                                    <h3><a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>"><?= $pro->name ?></a></h3>
                                                    <div class="price">
                                                        <span class="current"><?=number_format($pro->price_sale)?>₫ </span>
                                                        <span class="older"><?=number_format($pro->price)?>₫ </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                     <?php endforeach;endif;?>   
                                        
                                        
                                        
                                    </div>
                                   
                                </div>
                            </div>
                        
                    </section>
                    <script>
                        $(() => {
                            $('.slider_prod_lq').owlCarousel({
                                items: 5,
                                responsive: {
                                    1200: { item: 5 },
                                    982: { items: 5 },
                                    768: { items: 4 },
                                    480: { items: 3 },
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
                                margin: 15,
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
                    <!-- end sanpham-hot -->
                </div>
            
        </section>
        <!-- end sc_detail -->
    
                   
                   
            </div><!-- end right_content -->
<div class="clearfix"></div>