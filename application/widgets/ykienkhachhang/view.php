<?php if(count($ykcustomer)) : ?>
<div class="clearix clearfix-30"></div>
    <div class="feedback">
        <h2 class="tit_fb"><span>cảm nhận khách hàng</span></h2>
        <div class="box_feedback_left">
            <section class="sc_slider_feedback">
                <div class="owl-carousel slider_feedback">

                     <?php foreach($ykcustomer as $cat) : ?>
                    <div class="item">
                        <div class="box_feedback text-center">
                            <a href="<?=base_url($cat->alias.'.html')?>"><img src="<?=base_url($cat->image)?>" alt="<?=@$cat->name;?>"></a>
                            <div class="sub_feedback">
                            <?= strip_tags(LimitString(@$cat->description,'200','...'),'<p>');?>
                            </div>

                            <div class="name"><?=@$cat->name;?></div>
                            <div class="job"><?=@$cat->title;?> </div>
                            <div class="clearix clearfix-20"></div>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div>
            </section>
        </div>
    </div><?php endif;?>