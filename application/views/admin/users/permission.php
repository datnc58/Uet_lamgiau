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

       Phân quyền thành viên

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('uetadmin/admin/permission')?>">Danh sách module</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="box">

		<form method="post" action="" class="validate form-horizontal " id="form_add" role="form"

			  enctype="multipart/form-data">

			<input type="hidden" name="edit" value="<?= @$edit->id; ?>">

			<div id="panel-tablesorter" class="panel panel-default">

				<div class="panel-heading bg-white">

				   

					<!-- /panel-actions -->

					<h3 class="panel-title">Phân quyền</h3>

				</div>

				<!-- /panel-heading -->

				<div class="panel-body">

					<table id="example" class="table table-bordered table-striped">

						<thead>

							<tr>

								<th width="15%">Tên thành viên</th>

								<th width="15%">Email</th>

								<th width="7%" class="no-sort">Điện thoại</th>

								<th width="9%" class="no-sort">Ngày Đăng ký</th>

								<th width="9%" class="no-sort text-center">Đăng nhập</th>

							</tr>

						</thead>

						<tbody>
							<?php if($this->session->userdata('sessionGroupAdmin')>=3){?>
							<tr>

								<td class="todo-list">Quản trị cấp cao</td>

								<td>kythuatqts@gmail.com</td>

								<td>0977160509</td>

								<td class="text-center">01/07/2017

								</td>

								<td class="text-center">
									01/07/2017
								</td>

							</tr>
							<?php }else{ ?>
							<tr>

								<td class="todo-list"><?= @$user->fullname; ?></td>

								<td><?= @$user->email ?></td>

								<td><?= @$user->phone ?></td>

								<td class="text-center"><?= date('Y-m-d',@$user->use_regisdate);?>

								</td>

								<td class="text-center">

								   <?= date('Y-m-d',@$user->lastest_login);?>

								</td>

							</tr>
							<?php } ?>
						</tbody>

					</table>

					<?php

					function check_permission($perm, $access_controller = null, $access_action = null)

					{

						if ($access_action == null) {

							foreach ($perm as $k => $v) {

								if ($k == $access_controller) {

									echo 'checked';

								}

							}

						}

						if ($access_action != null) {

							foreach ($perm as $k => $v) {

								if(!empty($v)){

									foreach ($v as $k2 => $v2) {

										if ($k == $access_controller && $v2 == $access_action) {

											echo 'checked';

										}

									}

								}



							}

						}



					}



					?>

					<br>

					<div class="all_perm btn btn-xs btn-primary" data-value="all_perm">Chọn tất cả

						<input type="checkbox" id="all_perm" style="display: none;">

					</div>

					<div class="clearfix"></div>

					<br>

					<div class="row ">



						<?php

						$i=1;

						foreach ($resources as $k => $v) {
								$j=$i++;
								?>

								<div class="col-md-3 col-sm-4 col-xs-12 resource">
									<div style="width: 100%; padding: 2px 10px; background: #ddd">
										<div class="nice-checkbox text-primary">
											<input type="checkbox" name="controller[]"
												   class="selecctall" data-items="<?=$v->id;?>"
												   value="<?= $v->resource; ?>" id="<?=$v->id;?>"
												<?php check_permission($u_access, $v->resource); ?>>
											<label for="<?=$v->id;?>"><span class="text-inverse"><?= $v->name; ?></span></label>
										</div>
									</div>
									<div style="border: 1px #ddd solid; padding: 10px;" class="actionbox">

										<?php foreach ($v->cat_sub as $k2 => $v2) {
												?>

												<div style="padding-left: 25px">
													<div class="nice-checkbox text-primary">
														<input type="checkbox" name="action[]"
															   class="<?=$v->id;?> check" id="<?=$v2->id;?>" data-value='<?=$v->id;?>'
															   value="<?= $v->resource . ';' . $v2->resource; ?>"

															<?php check_permission($u_access, $v->resource, $v2->resource); ?>

															>

														<label for="<?=$v2->id;?>"><span class="text-inverse"><?= $v2->name; ?></span></label>

													</div>

												</div>

												<?php

												unset($v->cat_sub[$k2]);
										}?>

									</div>

								</div>



								<?php



								unset($resources[$k]);

								if($j%4==0&&$j!=12) echo '<div class="clearfix"></div>';

						}?>

                     </div>

					<div class="clearfix"></div>

					<div class="form-group" style="padding-top: 30px">

						<div class="col-sm-12 text-center">

							<button type="submit" name="submit" class="btn btn-primary btn-sm">Cập nhật</button>

							<button type="reset" class="btn btn-default btn-sm">Hủy</button>

						</div>

					</div>

				</div>

				<!--/panel-body-->

			</div>

			<!--/panel-tablesorter-->

		</form>

        <!-- /.row -->

    </div>

    <!-- /.container-fluid -->

</section>

<script src="<?= base_url('assets/plugin/slimscroll/jquery.slimscroll.min.js')?>"></script>

<script>



        $('.actionbox').slimScroll({

            height: 150,

            size: '3px'

        });



    $(document).ready(function() {



        $('.selecctall').click(function(event) {  //on click

            var cl=$(this).attr('data-items');

            if(this.checked) { // check select status



                $('.'+cl).each(function() { //loop through each checkbox

                    this.checked = true;  //select all checkboxes with class "checkbox1"

                });

            }else{

                $('.'+cl).each(function() { //loop through each checkbox

                    this.checked = false; //deselect all checkboxes with class "checkbox1"

                });

            }

        });



        $('.all_perm').click(function(event) {  //on click



            if($(this).hasClass('checked1')){

                $(this).removeClass('checked1');

                $('input[type=checkbox]').each(function() { //loop through each checkbox

                    this.checked = false;  //select all checkboxes with class "checkbox1"

                });

            }else{

                $(this).addClass('checked1');

                $('input[type=checkbox]').each(function() { //loop through each checkbox

                    this.checked = true; //deselect all checkboxes with class "checkbox1"

                });

            }





        });

    });

</script>

<style>



    .resource label{

        cursor: pointer;

    }

    .text-primary{color: #666}

    .resource{margin-bottom: 15px}

    .nice-checkbox>label:before {

        font-size: 14px !important;

    }

    .nice-checkbox {

        padding-top: 0px !important;

        min-height: 10px;

    }

    .nice-checkbox>[type=checkbox]:not(:checked)+label, .nice-checkbox>[type=checkbox]:checked+label {

        font-size: 12px;

    }

</style>