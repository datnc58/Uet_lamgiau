<div class="col_img_pro_left">
    <?php if (count($cate_all)): ?>
                    <div class="content_right">
                        <h2 class="title"><?= $cate_all->name?></h2>
                    </div>
                    <div class="box_left clearfix">
                        <?php if (count($cate_all->cate_sub)): ?>
                            <?php foreach ($cate_all->cate_sub as $key => $value): ?>
                                <div class="item_box_img clearfix">
                                    <div class="img "><a href="<?= base_url("media/".$value->alias.'.html') ?>" title="" class="">
                                        <img class="w_100" title="" alt="" src="<?= base_url($value->image)?>">
                                    </a></div>
                                    <p class="name_img text-center"><a href="<?= base_url("media/".$value->alias.'.html') ?>" class="" title=""><?= $value->name?></a></p>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                        
                    </div>
                    <?php endif ?>
                </div>