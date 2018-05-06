<article id="body_home">
    <section class="qts_news">
        <div class="container">
            <div class="row_pc">
                <h2 class="title_slider_box">
                    <span>tin tức nổi bật</span>
                </h2>
                <div class="clearfix"></div>
                <div class="full_news">
                    <div class="row">
                    
                     <?php if (count($news)) {
                    foreach ($news as $key => $new) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-480-12">
                            <div class="box_news">
                                <div class="img_news h_7407">
                                    <a href="<?= base_url('new/'.$new->alias.'.html')?>"><img style="height:150px" src="<?= base_url($new->image)?>" class="w_100" alt="<?= $new->title?>"/></a>
                                </div>
                                <div class="text_news">
                                    <h3 class="name_news">
                                        <a href="<?= base_url('new/'.$new->alias.'.html')?>"><?= $new->title?></a>
                                    </h3>
                                    <ul class="ul_comment">
                                        <li><i class="fa fa-calendar"></i><?= date('d',$new->time)?> Tháng <?= date('m',$new->time)?>, <?= date('Y',$new->time)?></li>
                                        
                                    </ul>

                                    <div class="mota_news">
                                       <?= $new->description?>
                                    </div>
                                    <div class="click_me_news">
                                        <a href="<?= base_url('new/'.$new->alias.'.html')?>">chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                         <?php   }
                } ?>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>




