 

<!--news nổi bật  -->

<h2 class="title_dv">
    <span>tin tức nổi bật</span>
</h2>
<div class="row row_45">
    <?php foreach ($news as $n) : ?>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pd_45">
        <div class="box_news">
            <div class="row_4">
                <div class="col-lg-545 col-md-6 col-sm-12 col-xs-12">
                    <div class="row_11">
                        <div class="img_news h_625">
                            <a href="<?= base_url('new/' . $n->alias . '.html') ?>" title="<?= $n->title ?>">
                                <img src="<?= base_url($n->image) ?>" class="w_100" alt="<?= $n->title ?>"/>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-754 col-md-6 col-sm-12 col-xs-12">
                    <div class="row_11">
                        <div class="text_news">
                            <h3 class="name_text_news">
                                <a href="<?= base_url('new/' . $n->alias . '.html') ?>"><?= $n->title ?></a>
                            </h3>
                            <div class="dsc_news_focus">
                                <?= LimitString($n->description, 290, '...'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- end  news nổi bật  -->
