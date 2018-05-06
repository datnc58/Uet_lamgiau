<div class="clearfix"></div>
<section class="qts_news">
        
               <h2 class="title_home"><?= $cate_news->name; ?></h2>
             <div class="full_news">
                   
                        <?php foreach ($news as $n) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-480-12">
                            <div class="box_news">
                                <div class="img_news h_7407">
                                    <a href="<?= base_url('new/' . $n->alias . '.html') ?>" title="<?= $n->title ?>">
                                        <img src="<?= base_url($n->image) ?>" class="w_100" alt="<?= $n->title ?>"/>
                                    </a>
                                </div>
                                <div class="text_news">
                                    <h3 class="name_news">
                                        <a href="<?= base_url('new/' . $n->alias . '.html') ?>"><?= $n->title ?></a>
                                    </h3>
                                    <ul class="ul_comment">
                                        <li><i class="fa fa-calendar"></i><?= date('d/m/Y',$n->time)?></li>
                                        
                                    </ul>
                                    <div class="mota_news">
                                        <?= $n->description ?>
                                    </div>
                                    <div class="click_me_news">
                                        <a href="<?= base_url('new/' . $n->alias . '.html') ?>">chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                   
                </div>
            
    </section>