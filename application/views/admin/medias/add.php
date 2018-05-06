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

        <?=$btn_name;?> media

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('uetadmin/media/categories')?>">Danh mục media</a></li>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="row">

		<form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="" enctype="multipart/form-data">

			<input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">

			<input type="hidden" name="addnews" value="1">

			<input type="hidden" id="catcheck" value="media">

			<div class="col-md-9" style="font-size: 12px">

				<div class="panel panel-default">

					<div class="alert alert-dismissible" style="display:none;"></div>

                    <div class="panel-heading">

                        <h3 class="panel-title pull-left">Tổng quan</h3>

                        <div class="pull-right">

							<button type="button" <?php if (isset ($edit)) { ?> onclick="editItem()" <?php }else{ ?> onclick="createItem()" <?php } ?> class="btn btn-success btn-xs" name="add_news"><i

								class="fa fa-check"></i> <?= @$btn_name; ?>

							</button>

                        </div>

                        <div class="clearfix"></div>

                    </div>

					<div class="panel-body">

						<div class="tab-content">

							<div id="home" class="tab-pane fade in active">

								<div class="form-group">

									<label class="col-sm-12 form-text">Tên media :</label>

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

								</div>

								<div class="form-group">

									<label class="col-sm-12 form-text" for="exampleInputFile">Chọn thêm ảnh media</label>

									<div class="col-sm-12">

										<input type="file" accept="image/*" id="exampleInputFile" multiple name="images[]">

										<p class="help-block">Ảnh media cần rõ nét.</p>

									</div>

									<div class="img-responsive col-sm-12">



									<?php if(count(@$listimg) > 0) :?>

                                    <?php foreach (@$listimg as $img) {  ?>

                                       <div class="col-sm-3" id="<?= $img->id ?>" >

                                           <img src="<?= base_url().$img->image ?>" class="img-thumbnail" style="max-width:120px;height:100px; ">

                                            <span data-id="<?= $img->id ?>" data-placement="media_images" onclick="removeimg($(this))" class="btn btn-default"> <i class="fa fa-trash-o" aria-hidden="true"></i></span>

											<label  class="col-sm-12">tên ảnh</label>

											<input type="text" data-id="<?= $img->id ?>" data-view="name" data-placement="media_images" class="form-control input-sm " oninput="update_value($(this))" name="name_image"

											   value="<?= @$img->name; ?>" placeholder=""/>

									   </div>

									 <?php } ?>

									<?php endif; ?>

									</div>

								</div>

								<div class="form-group">

									<label  class="col-sm-12">Mô tả</label>

									<div class="col-sm-12">

										<textarea name="description" class="form-control input-sm" placeholder=""

											id="ckeditor_description" rows="4"><?=@$edit->description;?></textarea>

									</div>

								</div>

								<div class="form-group">

									<label class="col-sm-12">Nội dung:</label>

									<div class="col-sm-12">

										<textarea name="content" class="form-control input-sm" id="ckeditor_content"><?=@$edit->content;?></textarea>

									</div>

								</div>

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

                        </div>

                        <div class="clearfix"></div>

                        <br>

						<div class="form-group">

							<label class="col-sm-12">

							Trạng thái

							</label>

							<div class="col-sm-6">

								<select name="active" class="form-control">

									<option <?php if(@$edit->active==1){echo "selected";} ?><?php if (isset ($edit)) { }else{ echo'selected'; } ?> value="1">Bật</option>

									<option <?php if (isset ($edit)) { ?> <?php if(@$edit->active==0){echo "selected";} }?> value="0">Tắt</option>

								</select>

							</div>

						</div>

						<div class="form-group">

							<label class="col-sm-12">Danh mục:</label>

							<div class="col-sm-12">

								<div class=" checklist_cate cat_checklist" style="border: 1px solid #ccc; padding: 5px" >

									<?php if (isset($cate_selected)) $cate_selected = $cate_selected;

										else $cate_selected = null;

								view_cate_checklist_firt($cate, 0, '', @$cate_selected)?>

								<span id="result"></span>

								</div>

							</div>

						</div>

						<div class="form-group">

							<label  class="col-lg-4 control-label">Thứ tự:</label>

							<div class="col-lg-5">

								<input type="number" name="sort" class="form-control input-sm" value="<?=$max_sort;?>" />

							</div>

						</div>

                        <div class="form-group">

                            <label class="col-sm-12 ">Hình ảnh</label>

                            <div class="col-sm-12">

                                <input type="file" name="userfile" id="input_img" onchange="handleFiles()" />

                            </div>

							<div class="clearfix"></div>

							<br>

							<div class="col-sm-12" id="view_img">

								 <?php

								if(file_exists(@$edit->image)){ ?>

									<img src="<?=base_url($edit->image)?>" id="image_review" width="100%">

									<label class="col-sm-12 "></label>

									<button  type="button" onclick="delete_image($(this))" data-placement="product_category" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>

								<?php }else{

									echo '<img src="'.base_url('img/noimage.png').'" id="noimage_review">';

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

		CKEDITOR.replace( 'ckeditor_content', {

			height:150,

			// Configure your file manager integration. This example uses CKFinder 3 for PHP.

            filebrowserBrowseUrl: url+'ckfinder.html',

            filebrowserImageBrowseUrl: url+'ckfinder.html?type=Images',

            filebrowserUploadUrl: url+'core/connector/php/connector.php?command=QuickUpload&type=Files',

            filebrowserImageUploadUrl: url+'core/connector/php/connector.php?command=QuickUpload&type=Images'

		} );

	}); 

</script>

<script type="text/javascript">

	// check chi lay 1 gia tri trong listbox

	$(document).ready(function(){

		$('.chk').on('change', function() {

		   $('.chk').not(this).prop('checked', false);

		   $('#result').html($(this).data( "id" ));

		   if($(this).is(":checked"))

			$('#result').html($(this).data( "id" ));

		   else

			$('#result').html('Empty...!');

		});

	});

</script>



