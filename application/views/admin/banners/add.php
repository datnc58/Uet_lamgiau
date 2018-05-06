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

        <?=$btn_name;?> Banner

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('uetadmin/imageupload/banners')?>"><?=$btn_name;?> banner</a></li>

        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="row">

        <form class="validate form-horizontal" role="form" id="form-bk" method="POST" action=""

            enctype="multipart/form-data">

            <input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">

			<input type="hidden" name="addnews" value="1">

            <div class="col-md-9" style="font-size: 12px">

                <div class="panel panel-default">

					<div class="alert alert-dismissible" style="display:none;"></div>

                    <div class="panel-heading">

                        <h3 class="panel-title pull-left">Tổng quan</h3>

                        <div class="pull-right">

                            <button type="submit" class="btn btn-success btn-xs" name="add_news"><i

                                class="fa fa-check"></i> <?= @$btn_name; ?>

                            </button>

                        </div>

                        <div class="clearfix"></div>

                    </div>

                    <div class="panel-body">

                        <div class="form-group">

                            <label  class="col-sm-12">Tiêu Đề</label>

                            <div class="col-sm-12">

                                <input type="text" class="form-control input-sm validate[required]" name="title"

                                    value="<?=@$edit->title;?>" placeholder=""/>

                            </div>

                        </div>

						<div class="form-group">

							<label  class="col-sm-12">Vị trí:</label>

                            <div class="col-sm-5">

                                <select name="type" class="form-control input-sm">

                                   <?php

                                    foreach($type as $k=>$v){?>

                                        <option value="<?=$v->field;?>" <?php if($v->field == @$edit->type){echo "selected";}?>>

                                            <?=$v->name;?>

                                        </option>

                                    <?php }

                                    ?>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label  class="col-sm-12">Danh mục SP:</label>

                            <div class="col-sm-5">

                                <select name="cate" class="form-control input-sm" onchange="getURL(this)">

                                    <option value="0">Lựa chọn</option>

                                    <?php show_cate($procate,0,'',@$edit->cate);?>

                                </select>

                            </div>

                        </div>

                        <div class="form-group">

                            <label class="col-sm-12">Url:</label>

                            <div class="col-sm-5">

                                <input type="text" class="form-control input-sm" value="<?=@$edit->url;?>" name="url" placeholder="..." id="urllink" />

                            </div>

                        </div>

                        <div class="form-group">

                            <label  class="col-sm-12">Mô tả</label>

                            <div class="col-sm-12">

                                <textarea name="content" class="form-control" placeholder=""

                                          id="ckeditor_description" rows="8"><?= @$edit->content;?></textarea>

                            </div>

                        </div>

                        <div class="text-right" style="padding-bottom: 15px">

                            <button type="submit" class="btn btn-success btn-xs" name="add_news"><i

                                class="fa fa-check"></i> <?= @$btn_name; ?>

                            </button>

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

                       Target:

                        </label>

                        <div class="col-sm-12 view_checkbox" style="  border: 1px solid #ccc; padding-left: 0px; padding: 10px">

                            <label class="checkbox-inline">

								<input type="radio"  name="target" value="_self"

										<?php if(@$edit->target=='_self'||@$edit->target==0||!isset($edit))echo 'checked=""'; else echo '';?>/>

                            Mặc định

                            </label>

                            <label class="checkbox-inline" >

								<input type="radio"  name="target" value="_blank"

										<?=@$edit->target=='_blank'?'checked':'';?>/>

									Tab mới

                            </label>

                        </div>

                        <div class="clearfix"></div>

                        <br>

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

									<button  type="button" onclick="delete_image($(this))" data-placement="images" class="btn btn-success btn-xs"><i class="fa fa-times"></i> Xóa ảnh</button>

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