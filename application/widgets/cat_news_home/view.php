<?php $stt=0; foreach($menus_sukien as $cate) : $stt++; ?>
 <div class="clearfix-25"></div>
<div class="box-news">
	<h2 class="title-home">
		<?= $cate->name; ?>
		<a href="<?= base_url($cate->url) ?>" class="pull-right view-next">Xem tiếp ...</a>
	</h2>
	<?php if(isset($cate->news)): ?>
	<div class="prod-category">
		<div class="row-10 row">
			<?php foreach($cate->news as $n) : ?>
			 <div class="col-md-6 col-sm-12 col-xs-12 pdd-10">
				 <div class="box-news">
					 <div class="row">
						 <div class="col-md-3 col-sm-3 col-xs-3 col-480">
							 <a href="<?= base_url($n->alias.'.html') ?>" title="<?= ($n->title); ?>"><img class="w_100" src="<?= base_url($n->image) ?>" alt="<?= ($n->title); ?>"/></a>
						 </div>
						 <div class="col-md-9 col-sm-9 col-xs-9 col-480">
							<div class="dcs-news">
								<h3 class="name-news">
									<a href="<?= base_url($n->alias.'.html') ?>" title="<?= ($n->title); ?>"><?= ($n->title); ?></a>
								</h3>
								<?= LimitString($n->description, 320, '...'); ?>
							</div>
						 </div>
					 </div>
				 </div>
			 </div>
			<?php endforeach;?>
		</div>
	</div>
	<?php  endif; ?>
</div>
<?php endforeach;?>