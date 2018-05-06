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
                            <h2 class="section-title"><a href="<?= base_url('danh-muc-tin/'.$cate_current->alias.'.html')?>"><img alt="<?= $cate_current->name?>" src="<?= base_url()?>img/icon_product_home_1.png"> <?= $cate_current->name?></a></h2>
                           
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content home-tabs-content">
                            <div class="tab-pane active imgRow" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        
                                        <ul class="list_page_news">
                                <?php if (count($list)) {
                                    foreach ($list as $key => $new) { ?>
                                       <li>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-3 col-xs-3 col-560">
                                                    <div class="img-news-page image imageHover">
                                                        <a href="<?= base_url('new/'.$new->alias.'.html')?>" title="" class="h_57"><img class="w_100" src="<?= base_url($new->image)?>" alt=""/></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-sm-8 col-xs-8 col-560">
                                                    <div class="dcs-new-page">
                                                        <h3 class="name-new-page">
                                                            <a href="<?= base_url('new/'.$new->alias.'.html')?>" title=""><?= $new->title?></a>
                                                        </h3>
                                                        <div class="desc_news"><?= $new->description?></div>
                                                        <div class="view-news-page">
                                                            <span class="date-time pull-left">Đăng bài: <?= date('d',$new->time)?> Tháng <?= date('m',$new->time)?>, <?= date('Y',$new->time)?></span>
                                                            <a href="<?= base_url('new/'.$new->alias.'.html')?>" title="" class="btn btn-view-page pull-right">Xem thêm <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>  
                                <?php    }
                                } ?>
                                    
                                </ul>
                                        
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