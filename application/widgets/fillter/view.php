<link rel="stylesheet" type="text/css" media="all" href="<?=base_url()?>assets/css/front_end/advanced_search.css">
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/advanced_search1.js"></script>
<div id="timkiemnangcao" class="hidden-xs">
	<div id="timkiemnangcao2" class="hidden-xs hidden-sm">
		<a name="khuyenmai" data-dropdown="#dropdown-3" href="#" class="butt_search_a" ><?=lang('search_nangcao');?></a>
	</div>
	<div id="dropdown-3" class="dropdown dropdown-tip" style="display: none; left: 1036px; top: 162px;">
		<ul class="dropdown-menuz">
			<form id="searchform" action="<?=base_url('tim-kiem')?>" method="get">
				<div id="diemxuatphat7" style="height:30px">
					<button class="myButton"  type="submit"><?=lang('search');?></button>
				</div>
				<div class="filter-name clearfix"></div>
				<li>
					<h3><?=lang('diadanh');?></h3>
					<div class="scrolldiadanh">
						<input class="form-control form_s_dd" name="key">
					</div>
				</li>
				<li>
					<h3><?=lang('province');?></h3>
					<div class="scrolltinhthanh">
						<?php foreach($province as $provin) : ?>
						<label><input class="tinhthanh" name="tinhthanh" type="radio" checked="checked" value="<?=@$provin->id;?>"><?=@$provin->name;?></label>
						<?php endforeach;?>
					</div>
				</li>
				<li>
					<h3><?=lang('vung');?></h3>
					<div class="scrolltinhthanh">
						 <?php foreach($khoanggia as $vungmien) : ?>
						<label><input class="vungmien" name="vungmien" type="radio" value="<?=@$vungmien->id;?>"  checked="checked" ><?=@$vungmien->name;?></label>
						 <?php endforeach;?>
					</div>
				</li>
				<li id="filtermanu">
					<h3><?=lang('loaihinh');?></h3>
					<div class="scrolldiemden">
						 <?php foreach($brands as $loaidulich) : ?>
						<label><input class="loaihinh" name="loaihinh" type="radio" value="<?=@$loaidulich->id;?>" checked="checked" ><?=@$loaidulich->name;?></label>
						<?php endforeach;?>
					</div>
				</li>
				<li id="filtermanu">
					<h3><?=lang('time');?></h3>
					<div class="scrollthoigian">
						<?php foreach($mausac as $color) : ?>
						<label><input class="chonthoigian" name="time" type="radio" checked="checked" value="<?=@$color->id;?>"><?=@$color->name;?></label>
						<?php endforeach;?>
					</div>
				</li>
				<li id="filtermanu">
					<h3><?=lang('phuongtien');?></h3>
					 <?php foreach($groups as $group) : ?>
					<label><input class="chonphuongtien" name="phuongtien" type="radio" checked="checked" value="<?=@$group->id;?>"><?=@$group->name;?></label>
					<?php endforeach;?>
				</li>
				<li id="filtermanu">
					<h3><?=lang('hotel');?></h3>
					<label><input class="chonkhachsan" name="khachsan" type="radio" value="1" checked="checked" >1 <?=lang('star');?></label>
					<label><input class="chonkhachsan" name="khachsan" type="radio" value="2">2 <?=lang('star');?></label>
					<label><input class="chonkhachsan" name="khachsan" type="radio" value="3">3 <?=lang('star');?></label>
					<label><input class="chonkhachsan" name="khachsan" type="radio" value="4">4 <?=lang('star');?></label>
					<label><input class="chonkhachsan" name="khachsan" type="radio" value="5">5 <?=lang('star');?></label>
				</li>
			</form>
		</ul>
	</div>
</div>
<script src="<?=base_url()?>assets/js/front_end/advanced_search2.js"></script> 