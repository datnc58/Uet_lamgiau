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
                            <h2 class="section-title"><a href="<?= base_url('danh-muc-tin/'.$cate_current->alias.'.html')?>"><img alt="<?= $news->title?>" src="<?= base_url()?>img/icon_product_home_1.png"><?= $cate_current->name?></a> </a></h2>
                           
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content home-tabs-content">
                            <div class="tab-pane active imgRow" id="tab1">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="qts_noidung">
                                        <h3  style="margin-bottom:10px;"><?= $news->title?></h3>
                                        <div style="font-size:14px; line-height:23px; margin-bottom:10px;"><strong><em><?= $news->description?></em></strong></div>	
                                        
                                        <?= $news->content?>
                                        </div>
                                        
                                        
                                        <div class="clearfix"></div>
                                       
                                       
                                       <div class="clearfix-30"></div>
                    <h2 class="news_similar_tit">Bài viết liên quan</h2>
                    <div class="news_similar">
                        <ul>
                            <?php if (count($new_same)) : ?>
                            <?php foreach ($new_same as $item) : ?>
                                <li><a href="<?=base_url('new/'.$item->alias.'.html')?>"><?=$item->title?></a></li>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </ul>
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


