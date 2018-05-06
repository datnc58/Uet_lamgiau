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
        Thêm tài khoản
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('uetadmin/users/index')?>">Danh sách tài khoản</a></li>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a onclick="history.back()" style="cursor: pointer" title="Quay lại trang trước" ><i class="fa fa-reply"></i></a>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="row">
		<form class="validate form-horizontal" role="form" id="form-bk" name="frmAddUser" method="POST" action=""
            enctype="multipart/form-data">
			<input type="hidden" name="edit" id="id_edit" value="<?= @$edit->id; ?>">
			<div class="col-md-12" style="font-size: 12px">
                <div class="panel panel-default">
					<div class="alert alert-dismissible" style="display:none;"></div>
                    <div class="panel-heading">
                        <h3 class="panel-title pull-left">Tổng quan</h3>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-success btn-xs" name="adduser"><i
                                class="fa fa-check"></i> Thêm tài khoản
                            </button>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label  class="col-sm-2 text-right">Tên tài khoản</label>
                            <div class="col-sm-6">
								<input type="text" value="<?=@$edit->username?>" name="username_user" id="username_user" maxlength="35" class="form-control input-sm validate[required,minSize[3]]" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 text-right">Mật khẩu</label>
                            <div class="col-sm-6">
                               <input type="password" value="" name="password_user" id="password_user" maxlength="35" class="form-control input-sm validate[minSize[6]]"  />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2  text-right">Nhập lại mật khẩu:</label>
                            <div class="col-sm-6">
                                <input type="password" value="" name="repassword_user" id="repassword_user" maxlength="35" class="form-control input-sm validate[,minSize[6],equals[password_user])"  />
                            </div>
                        </div>
						<div class="form-group">
							<label class="col-sm-2 text-right">Họ và tên</label>
							<div class="col-sm-6">
								<input type="text" value="<?=@$edit->fullname?>" name="fullname_user" id="fullname_user" maxlength="50" class="form-control input-sm"  />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 text-right">Email</label>
							<div class="col-sm-6">
								<input type="text" value="<?=@$edit->email?>" name="email_user" id="email_user" maxlength="50" class="form-control input-sm"  />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 text-right">Điện thoại</label>
							<div class="col-sm-6">
								<input type="text" value="<?=@$edit->phone?>" name="phone" id="phone" maxlength="35" class="form-control input-sm validate[required,minSize[8]]" />
							</div>
						</div>	
                        <div class="form-group">
							<label class="col-sm-2 text-right">Giới tính</label>
							<div class="col-sm-2">
								<select name="sex_user" id="sex_user" class="form-control select-sm">
                                    <option value="1" <?php if(@$edit->use_sex == '1'){echo 'selected="selected"';} ?>>Nam</option>
                                    <option value="0" <?php if(@$edit->sex_user == '0'){echo 'selected="selected"';} ?>>Nữ</option>
                                </select>
							</div>
						</div>	  		
						<div class="form-group">
							<label class="col-sm-2 text-right">Trang thái</label>
							<div class="col-sm-2">
								<input type="checkbox" name="active_user" id="active_user" value="1" <?php if(@$edit->use_status == '1'){echo 'checked="checked"';} ?> />
							</div>
						</div>	
                    </div>
                </div>
            </div>
		</form>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(".validate").validationEngine();
    });
</script>