<article class="home-content">
        <!--  begin sanpham-hot -->
        <section class="sc-sanpham-hot">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-list-link clearfix">
                            <!-- Nav tabs -->
                            <h2 class="section-title"><a>Top sản phẩm nổi bật</a></h2>
                        </div>
                        <div class="slider_prod_hot owl-carousel imgRow">
                            
                             <?php foreach ($pros as $pro) : ?>
                            <div class="item">
                                <div class="prod">
                                    <div class="relative img-flip">
                                        <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" title="<?= $pro->name; ?>" class="reRenderImg relative">
                                            <img alt="<?= $pro->name; ?>" src="<?= base_url('upload/img/products/' . $pro->pro_dir . '/' . @$pro->image) ?>" class="wa img-efect">
                                        </a>
                                        
                                       <?php
									   $gia_ban=$pro->price_sale;
									   $gia_goc=$pro->price;
									   if($gia_goc){
									       $giam_gia=(($gia_goc - $gia_ban) / $gia_goc )*100;
									   }
									 ?>
                                        <div class="dp-top-right">
                                            <div class="badge-discount">
                                                Giảm <?=@ceil($giam_gia)?> % 
                                            </div>
                                        </div>
                                      
                                       
                                    </div>
                                    <div class="txt">
                                        <h3><a title="<?= $pro->name; ?>" href="<?= base_url('san-pham/'.$pro->alias.'.html')?>"><?= $pro->name; ?></a></h3>
                                        <div class="price">
                                            <span class="current"><?=number_format($pro->price_sale)?>₫ </span>
                                            <span class="older"><?=number_format($pro->price)?>₫ </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <a href="" class="more-in-top">Xem thêm</a>
                    </div>
                </div>
            </div>
        </section>
       
        <!-- end sanpham-hot -->
        
    </article>
    
    


