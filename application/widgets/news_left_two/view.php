<div class="full_box_sp_news">
      <div class="content_right">
        <?php if (count($cate_news)): ?>
            <h2 class="title">
                <span><?= $cate_news->name?></span>
            </h2>
            <div class="box_sp_news">
                <ul class="product_list_widget">
                    <?php if (count($news)) {
                        foreach ($news as $key => $new) { ?>
                            <li>
                                <a href="<?= base_url('new/'.$new->alias.'.html')?>">
                                    <img src="<?= base_url($new->image)?>">
                                    <span class="product-title"> <?= $new->title?></span>
                                </a>
                            </li>
                        <?php   }
                    } ?>
                </ul>
            </div>
        <?php endif ?>
        
    </div> 
</div>