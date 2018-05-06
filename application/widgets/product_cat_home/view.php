<article class="home-content">
       
        <!-- begin sanpham-home -->
        <section class="sc-sanpham-home">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <?php if(count($cate_home)):
                        foreach($cate_home as $cate):?>
                    
                        <div class="main-block">
                            <div class="prod-list-link clearfix">
                                <!-- Nav tabs -->
                               
                                <h2 class="section-title"><a href="<?= base_url('danh-muc/'.$cate->alias.'.html')?>"><img alt="<?= $cate->name?>" src="<?= base_url()?>img/icon_product_home_1.png"> <?= $cate->name?></a></h2>
                                <ul class="home-tabs ajax-tabs" role="tablist">
                                   <?php if(count($cate->cate_sub)):
                                    foreach($cate->cate_sub as $cate_sub):?>
                                    
                                    <li class="active">
                                       <a title="<?= $cate_sub->name?>" href="<?= base_url('danh-muc/'.$cate_sub->alias.'.html')?>" ><?= $cate_sub->name?></a>
                                    </li>
                                      <?php endforeach;endif;?>     
                                      
                                    
                                </ul>
                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content home-tabs-content">
                                <div  class="tab-pane active imgRow" id="tab1">
                                    <div class="m-50">
                                    
                                    
                                    
                                    <?php  if(count($cate->pro)):
                                            $count=0;    foreach($cate->pro as $pro):  $count++;?>
                                        <div class="col-lg-200 col-md-3 col-sm-4 col-xs-6 p50">
                                            <div class="home-prod">
                                                <div class="relative">
                                                    <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="reRenderImg relative">
                                                       
                                                        <img src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_2_'.@$pro->image)?>" alt="<?= $pro->name ?>" class="w1">
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
                                         <?php  endforeach;endif;?>  
                                         
                                        
                                       
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="more">
                                        <a href="<?= base_url('danh-muc/'.$cate->alias.'.html')?>">Xem thêm</a>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                         <?php endforeach;endif;?>
                        
                        
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- end sanpham-home -->
       
    </article>