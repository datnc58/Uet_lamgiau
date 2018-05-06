<section class="qts_content_home clearfix">
    <div class="clearfix-20"></div>
                        <h2 class="title"><a href="javascript:(0)">Sản phẩm khuyến mãi</a></h2>
                        <div class="clearfix"></div>
                        <div class="list_prod_home clearfix">
                            <div class="row_17 row_xs_5">
                            <?php if(count($pros)):
                            foreach ($pros as $key => $pro):?>
                            <!-- begin tem pro home -->
                                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
                                    <div class="row_mg_2 row_xs_10">
                                        <!-- begin sub temp pro -->
                                        <div class="box_prod_home">
                                            <a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>" class="img_prod_home h_8889"><img class="w_100" src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->image)?>" alt=""/></a>
                                            <div class="clearfix"></div>
                                            <div class="sub_prod_home">
                                                <h3 class="name_prod_home"><a href="<?= base_url('san-pham/'.$pro->alias.'.html')?>"><?= $pro->name?></a></h3>
                                            </div>
                                        </div>
                                        <!-- end sub temp pro -->
                                    </div>
                                </div>
                            <!-- end tem pro home -->
                            <?php endforeach; endif; ?>
                        </div>
                        </div>
                    </section>