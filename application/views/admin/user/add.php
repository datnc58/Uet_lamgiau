<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?=base_url('uetadmin')?>">Admin</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> <a href="<?=base_url('uetadmin/user/index')?>" >Danh sách thành viên</a>
                    </li>
                    <?php if (isset ($error)) { ?>
                        <li class="">
                            <span style="color: red"> <?= $error; ?></span>
                        </li>
                    <?php } ?>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="body collapse in" id="div1">
                    <form class="validate" name="frmAddUser" method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="edit" value="<?=@$edit->id;?>">
                        
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Số Điện Thoại :</label>
                            <div class="col-md-5">
                                <input type="text" value="<?=@$edit->phone?>" name="phone" id="phone" maxlength="35" class="form-control input-sm validate[required,minSize[8]]" />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Tên Khách :</label>
                            <div class="col-md-5">
                                <input type="text" value="<?=@$edit->username?>" name="username_user" id="username_user" maxlength="35" class="form-control input-sm validate[required,minSize[3]]" />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Mật khẩu :</label>
                            <div class="col-md-5">
                                <input type="password" value="" name="password_user" id="password_user" maxlength="35" class="form-control input-sm validate[minSize[6]]"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Nhập lại mật khẩu :</label>
                            <div class="col-md-5">
                                <input type="password" value="" name="repassword_user" id="repassword_user" maxlength="35" class="form-control input-sm validate[,minSize[6],equals[password_user])"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Email :</label>
                            <div class="col-md-5">
                                <input type="text" value="<?=@$edit->email?>" name="email_user" id="email_user" maxlength="50" class="form-control input-sm"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Họ tên :</label>
                            <div class="col-md-5">
                                <input type="text" value="<?=@$edit->fullname?>" name="fullname_user" id="fullname_user" maxlength="50" class="form-control input-sm"  />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Giới tính :</label>
                            <div class="col-md-2">
                                <select name="sex_user" id="sex_user" class="form-control select-sm">
                                    <option value="1" <?php if(@$edit->use_sex == '1'){echo 'selected="selected"';} ?>>Nam</option>
                                    <option value="0" <?php if(@$edit->sex_user == '0'){echo 'selected="selected"';} ?>>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Nhóm :</label>
                            <div class="col-md-2">
                                <select name="role_user" id="role_user" class="form-control input-sm">
                                    <?php foreach($group as $groupArray){ ?>
                                        <?php if($groupArray->gro_id == 4){ ?>
                                            <option value="<?php echo $groupArray->gro_id; ?>" <?php if(@$edit->use_group == $groupArray->gro_id){echo 'selected="selected"';} ?> style="font-weight:bold; color:#F00;"><?php echo $groupArray->gro_name; ?></option>
                                        <?php }elseif($groupArray->gro_id == 3){ ?>
                                            <option value="<?php echo $groupArray->gro_id; ?>" <?php if(@$edit->use_group == $groupArray->gro_id){echo 'selected="selected"';} ?> style="font-weight:bold; color:#009900;"><?php echo $groupArray->gro_name; ?></option>
                                        <?php }elseif($groupArray->gro_id == 2){ ?>
                                            <option value="<?php echo $groupArray->gro_id; ?>" <?php if(@$edit->use_group == $groupArray->gro_id){echo 'selected="selected"';} ?> style="font-weight:bold; color:#06F;"><?php echo $groupArray->gro_name; ?></option>
                                        <?php }else{ ?>
                                            <option value="<?php echo $groupArray->gro_id; ?>" <?php if(@$edit->use_group == $groupArray->gro_id){echo 'selected="selected"';} ?>><?php echo $groupArray->gro_name; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <label class="col-md-2 text-right">Trạng thái :</label>
                            <div class="col-md-5">
                                <input type="checkbox" name="active_user" id="active_user" value="1" <?php if(@$edit->use_status == '1'){echo 'checked="checked"';} ?> />
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="col-md-offset-2 col-md-1">
                                <button type="submit" class="btn btn-success btn-xs pull-right" name="adduser">
                                    <i class="fa fa-check"></i>Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".validate").validationEngine();
    });
</script>