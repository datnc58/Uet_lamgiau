<?php
#****************************************#
# * @Author: Tran Manh                   #
# * @Email: dangtranmanh051187@gmail.com #
# * @Website: http://qts.com             #
# * @Copyright: 2017 - 2018              #
#****************************************#
?>
<section class="content-header">
    <h1>
        <?=$btn_name;?> danh mục sản phẩm
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('uetadmin/product/categories')?>">Danh sách danh mục sản phẩm</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="row">
		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="" enctype="multipart/form-data">
			<input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">
			<input type="hidden" name="addnews" value="1">
			<input type="hidden" id="catcheck" value="pro">
			<div class="col-md-9" style="font-size: 12px">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="alert alert-dismissible" style="display:none;"></div>
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#home">Thông tin chi tiết</a></li>
							<li class="hidden"><a data-toggle="tab" href="#menu1">Dữ liệu</a></li>
							<li class="hidden"><a data-toggle="tab" href="#menu2">Liên kết</a></li>
							<li><a data-toggle="tab" href="#menu3">Thẻ seo</a></li>
							<li class="pull-right">
								<button type="button" <?php if (isset ($edit)) { ?> onclick="editCatItem()" <?php }else{ ?> onclick="createItem()" <?php } ?> class="btn btn-success btn-xs" name="add_news"><i
									class="fa fa-check"></i> <?= @$btn_name; ?>
								</button>
							</li>
						</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
								<div class="form-group">
									<label class="col-sm-12 form-text">Tên danh mục :</label>
									<div class="col-sm-12">
										<input type="text" oninput="createAlias(this)" class="validate[required] form-control input-sm " name="name"
											   value="<?= @$edit->name; ?>" placeholder=""/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-12 form-text">Alias :</label>
									<div class="col-sm-12" id="error-alias">
										<input type="text" onchange="createAlias(this)" class="form-control input-sm validate[required]" name="alias"
											   value="<?= @$edit->alias; ?>" id="alias" placeholder=""/>
									</div>
								</div> 								<div class="form-group">									<label class="col-sm-12 form-text">										Danh mục cha</label>									<div class="col-sm-12" style="border: 0px solid #ccc;padding: 5px">										<div class=" checklist_cate cat_checklist">											<select class="form-control" name="parent">												<option value="0">Danh mục cha</option>											<?php if (isset($edit->parent_id)) $cate_selected = $edit->parent_id;											else $cate_selected = null;											show_cate($cate, 0, '', @$cate_selected)?>											</select>										</div>									</div>								</div>								<div class="form-group">									<label  class="col-sm-12">Mô tả</label>									<div class="col-sm-12">										<textarea name="description" class="form-control input-sm" placeholder=""											id="ckeditor_description" rows="4"><?=@$edit->description;?></textarea>									</div>								</div>
							</div>
							<div id="menu1" class="tab-pane fade">
								
							</div>
							<div id="menu2" class="tab-pane fade">
								<div class="col-sm-6">
									
								</div>
							</div>
							<div id="menu3" class="tab-pane fade">
								<div class="form-group">
									<label class="col-sm-12 form-text">Title SEO</label>

									<div class="col-sm-12">
										<input type="text" name="title_seo" placeholder=""
											   value="<?= @$edit->title_seo; ?>" class="form-control input-sm"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-12 form-text">Key word SEO</label>
									<div class="col-sm-12">
										<input type="text" name="keyword_seo" placeholder=""
											   value="<?= @$edit->keyword_seo; ?>" class="form-control input-sm"/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-12 form-text">Description SEO:</label>
									<div class="col-sm-12">
										<textarea name="description_seo" placeholder="" rows="5" class="form-control input-sm"><?= @$edit->description_seo; ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-3" style="font-size: 12px">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tùy chọn</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <label class="col-sm-12" style="padding-left: 0px">
                        Hiển thị
                        </label>
                        <div class="col-sm-12 view_checkbox" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">
                            <div class="<?php if($show_home->active ==0){ echo'hidden'; } ?>">
	                           <label class="checkbox-inline col-sm-6" style="margin-left:0px">
	                           <input type="checkbox" value="1" name="home" <?= @$edit->home == 1 ? 'checked' : '' ?>>
	                           <?=@$show_home->name?>
	                            </label>
	                        </div>
	                        <div class="<?php if($show_hot->active ==0){ echo'hidden'; } ?>">
	                           <label class="checkbox-inline col-sm-6" style="margin-left:0px">
	                           <input type="checkbox" value="1" name="hot" <?= @$edit->hot == 1 ? 'checked' : '' ?>>
	                           <?=@$show_hot->name?>
	                            </label>
	                        </div>
	                        <div class="<?php if($show_focus->active ==0){ echo'hidden'; } ?>">
	                           <label class="checkbox-inline col-sm-6" style="margin-left:0px">
	                           <input type="checkbox" value="1" name="focus" <?= @$edit->focus == 1 ? 'checked' : '' ?>>
	                           <?=@$show_focus->name?>
	                            </label>
	                        </div>
	                        <div class="<?php if($show_coupon->active ==0){ echo'hidden'; } ?>">
	                           <label class="checkbox-inline col-sm-6" style="margin-left:0px">
	                           <input type="checkbox" value="1" name="coupon" <?= @$edit->coupon == 1 ? 'checked' : '' ?>>
	                           <?=@$show_coupon->name?>
	                            </label>
	                        </div>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        <div class="form-group">
                            <label class="col-sm-12 ">Hình ảnh đại diện</label>
                            <div class="col-sm-12">
                                <input type="file" name="userfile" id="input_img" onchange="handleFiles()" />
                            </div>
							<div class="clearfix"></div>
							<br>
							<div class="col-sm-12" id="view_img">
								<?php
								if(!empty($edit->image)){ ?>
									<img src="<?=base_url(''.$edit->image)?>" id="image_review" width="100%">
									<label class="col-sm-12 "></label>
									<button  type="button" onclick="delete_image($(this))" data-placement="product_category" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>
								<?php }else{
									echo '<img src="'.base_url('img/noimage.png').'" id="image_review">';
								}
								?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
		</form>
	</div>
</section>
<!-- /.container-fluid -->
<script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
<script src="<?=base_url('assets/js_admin/general_add.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		url= base_url() +'assets/ckfinder/';
		// ckeditor mo ta không full
	});
</script>

