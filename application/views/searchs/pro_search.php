<article class="home-content">
    <!-- begin sanpham-home -->
    <section class="sc-sanpham-home">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                   
                   
                    <div class="main-block">
                        <div class="prod-list-link clearfix">
                            <!-- Nav tabs -->
                            <div class="home-tab-mb btn btn-default hidden-lg hidden-md hidden-sm flr">
                                <i class="fa fa-list"></i>
                            </div>
                            <h2 class="section-title"><a ><img alt="Sản phẩm" src="<?= base_url()?>img/icon_product_home_1.png"> Kết quả tìm kiếm</a></h2>
                           
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content home-tabs-content">
                            <div class="tab-pane active imgRow" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="m-50">
                                           <?php if (count($lists)) {  $count=0; foreach ($lists as $key => $pro) { $count++ ?>
                                            
                                            
                                            <div class="col-lg-200 col-md-3 col-sm-4 col-xs-6 p50">
                                            <div class="home-prod">
                                                <div class="relative">
                                                    <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="reRenderImg relative">
                                                       
                                                        <img src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" alt="<?= $pro->name ?>" class="w1">
                                                        <img id="id_image<?=$pro->id?>" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_3_'.@$pro->image)?>" class=" img_fly" >
                                                    </a>
                                                    <div class="dp-spread">
                                                        <div class="dp-bot-center">
                                                            <a href="javascript:void(0)" class="add-cart" onclick="play(event)" data-id="id_image<?=$pro->id?>" data-value="<?=$pro->id?>"><img src="<?= base_url()?>img/cart_w.png"  alt="Thêm vào giỏ" title="Thêm vào giỏ" > Thêm vào giỏ</a>
                                                            
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
                                                            
                                                       
     
                                                    <div class="dp-top-<?php if($count%2 == 0){ echo'right'; }else{ echo'left'; } ?>">
                                                         -<?=@ceil($giam_gia)?>%
                                                    </div>
                                                    
                                                    
                                                    
                                                </div>
                                                <div class="txt">
                                                    <h3><a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>"><?= $pro->name ?></a></h3>
                                                    <div class="price">
                                                        <span class="current"><?=number_format($pro->price_sale)?>₫  </span>
                                                        <span class="older"><?=number_format($pro->price)?>₫</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            <!-- view nhanh -->
                                            
                                            <?php }}?> 
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="more">
                                            
                                            <?php echo $this->pagination->create_links();?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>

  
</article>