<link rel="stylesheet" href="<?=site_url()?>assets/css/front_end/jQuery.verticalCarousel.css">
<script src="<?=site_url()?>assets/js/front_end/jQuery.verticalCarousel.js"></script>                     
<div class="box_right_cate">
    <h2 class="tit_right"><a href="<?= base_url('san-pham-ban-chay') ?>"><?=lang('100banchay');?></a></h2>
		<div class="clearfix clearfix-28"></div>
		<div class="verticalCarousel">

			<div class="verticalCarouselHeader">
				<a href="#" class="vc_goDown"><img src="<?= base_url('assets/css/img/butt_D.png')?>" alt=""/></a>
				<a href="#" class="vc_goUp"><img src="<?= base_url('assets/css/img/butt_up.png')?>" alt=""/></a>
			</div>
			<ul class="verticalCarouselGroup vc_list">
				<?php foreach($pros as $pro) : ?>
				<li class="clearfix">
					<div class="box_prod_hot_right">
						<a class="img_prod_page_hot" href="<?= base_url($pro->pro_alias.'.html') ?>" title="<?= $pro->pro_name; ?>">
							<img class="w_100"  src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->pro_img)?>" alt="<?= $pro->pro_name; ?>"/>
						</a>
						<div class="clearfix"></div>
						<div class="sub_prod_page_home">
							<h3 class="name_prod_page_home">
								<a title="<?= $pro->pro_name; ?>" href="<?= base_url($pro->pro_alias.'.html') ?>"><?= $pro->pro_name; ?></a>
							</h3>
							<div class="clearfix"></div>
							<div class="author_prod_page_home"><?= $pro->caption_1; ?></div>
							<div class="clearfix"></div>
							<div class="price_prod_page_home">
								<span class="price_new">
								<?php if(!empty($pro->price_sale)) : ?>
								<?=number_format($pro->price_sale);?>  ₫ 
								<?php else : ?><?=lang('contact');?>
								<?php endif;?>
								</span><br>
								<?php if($pro->price > 0 && $pro->price_sale > 0) :?>
								<del class="price_old"><?=number_format($pro->price);?> ₫</del>
								<?php endif;?>
							</div>
							<?php if($pro->price > 0 && $pro->price_sale > 0) :?>
								<div class="sale">-<?=floor(100-($pro->price_sale/$pro->price)*100)?>%</div>
							<?php endif;?>
						</div>
					</div>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
		<div class="clearfix clearfix-28"></div>
	</div>

	<script>
		$(".verticalCarousel").verticalCarousel({
			currentItem: 1,
			showItems: 2
		});
	</script>