<h2 class="tit_cate_right"><a href="">Tour mới</a></h2>
<div class="list_his_us">
	<ul>
		<?php foreach($pros as $pro) : ?>
		<li class="clearfix">
			<div class="img-sidebar">
				<a href="<?= base_url($pro->pro_alias.'.html') ?>" title="<?= $pro->pro_name; ?>">
					<img class="w_100"  src="<?=base_url('upload/img/products/'.$pro->pro_dir.'/thumbnail_1_'.@$pro->pro_img)?>" alt="<?= $pro->pro_name; ?>"/>
				</a>
			</div>
			<div class="text-sidebar">
				<a title="<?= $pro->pro_name; ?>" href="<?= base_url($pro->pro_alias.'.html') ?>"><?= $pro->pro_name; ?></a>
				<span>
					<span class="amount mount-n"><?php if(!empty($pro->price_sale)) : ?><?=number_format($pro->price_sale);?> &nbsp;₫<?php else : ?><span class="nb_price_hot" style="color:#444444"><?=lang('contact');?> </span><?php endif;?></span>
				</span>
			</div>
		</li>
		<?php endforeach;?>	
	 </ul>
 </div>