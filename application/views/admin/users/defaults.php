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
       Danh sách thành viên
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('uetadmin/users/listAll')?>">Danh sách thành viên</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="box">
        <div class="box-header">
            <a href="<?= base_url('uetadmin/users/add')?>" class="hidden btn btn-success btn-sm">
            <i class="fa fa-plus"></i> Thêm mới
            </a>
            <a onclick="ActionDelete('formbk')" class="btn btn-danger btn-sm">
            <i class="fa fa-times"></i> Xóa
            </a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<div class="col-sm-12" >
				<input type="hidden" id="autocomplete1" value="<?= $auto_fullname?>">
				<input type="hidden" id="autocomplete2" value="<?= $auto_email?>">
				<input type="hidden" id="autocomplete3" value="<?= $auto_phone?>">
				<form action="" method="get">
					<div class="form-group row">
						<div class="col-sm-2">
							<input name="fullname" type="search" id="getautocomplete1" value="<?=$this->input->get('fullname');?>"
								   placeholder="tên thành viên ..."
								   class="form-control input-sm">
						</div>
						<div class="col-sm-3">
							<input name="email" type="search" id="getautocomplete2" value="<?=$this->input->get('email');?>"
								   placeholder="email..."
								   class="form-control input-sm">
						</div>
						<div class="col-sm-3">
							<input name="phone" type="search" id="getautocomplete3" value="<?=$this->input->get('phone');?>"
								   placeholder="Số điện thoại..."
								   class="form-control input-sm">
						</div>
						<div class="col-sm-2">
							<select name="view" class="input-sm form-control" >
								<option value="">trạng thái</option>
								<option class="" value="1" <?=$this->input->get('view')=='active'?'selected':'';?> >kích hoạt</option>
							</select>
						</div>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-sm btn-default">
								<i class="fa fa-search"></i>  Tìm kiếm
							</button>
						</div>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
			<form name="formbk" method="post" action="<?=base_url('uetadmin/users/deletes')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
							<th width="2%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>
							<th width="2%" class="no-sort">STT</th>
							<th width="7%" class="no-sort">Ảnh</th>
							<th width="15%">Tên thành viên</th>
							<th width="15%">Email</th>
							<th width="7%" class="no-sort">Điện thoại</th>
							<th width="5%" class="no-sort">active</th>
							<th width="9%" class="no-sort">Ngày Đăng ký</th>
							<th width="9%" class="no-sort text-center">Đăng nhập</th>
							<th width="5%" class="no-sort text-center">Action</th>
                        </tr>
                    </thead>
					<tbody>
						 <?php if (isset($list)) {
                            $stt=1;
                            foreach ($list as $v) {
                                ?>
						<tr>
							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>
							<td><?= $stt++; ?></td>
							<td><?php if(!empty($v->avatar)) { ?>
									<img src="<?= base_url('upload/img/avatar/'.$v->avt_dir.'/'.@$v->avatar) ?>" style="height: 35px">
								<?php } else echo "No image" ?>
							</td>
							<td class="todo-list"><?= @$v->fullname ?>
							</td>
							<td><?= @$v->email ?></td>
							<td><?= @$v->phone ?></td>
							<td class="text-center">
								<label class="view_color view_active" data-value="<?=$v->id;?>" data-placement="users" data-view="active">
									<input type="checkbox" <?=$v->active==1?'checked':''?> data-toggle="toggle"  id="toggle" data-size="mini"
										   data-on="Yes" data-off="No">
								</label>
							</td>
							<td class="text-center"><?= date('Y-m-d',$v->use_regisdate);?>
							</td>
							<td class="text-center">
                               <?= date('Y-m-d H:i',$v->lastest_login);?>
                            </td>
							<td class="text-center">
								<div onclick="getModal_user(<?=$v->id;?>)" class="btn btn-xs btn-default" data-toggle="modal" title="Xem thông tin thành viên">
                                <i class="fa fa-eye" style=""></i></div>
								<a class="btn btn-xs btn-danger"
								   href="<?= base_url('uetadmin/users/delete/' . $v->id) ?>" title="Xóa"
								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-times"></i> </a>

							</td>
						</tr>
						<?php }  } ?>
					</tbody>
				</table>
				<?php
				echo $this->pagination->create_links(); // tạo link phân trang
				?>				
			</form>	      
		</div>
	</div>
</section>
<link href="<?=base_url('assets/css_admin/back_end/bootstrap-toggle.min.css')?>" rel="stylesheet">
<script src="<?=base_url('assets/js_admin/bootstrap-toggle.min.js')?>"></script>
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script>
	$(document).ready(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
<link href="<?= base_url('assets/css_admin/back_end/css_autocomplete.css')?>" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?= base_url('assets/js_admin/jquery.autocomplete.min.js') ?>"></script>
<script type="text/javascript">
   $(function(){
         // cài đặt autocomplete với ô code
        var codefor  = $('#autocomplete1').val() ;
        var codefor = codefor.split(",");
        $('#getautocomplete1').autocomplete({
           lookup: codefor,
        });
		
		var namefor  = $('#autocomplete2').val() ;
		var namefor = namefor.split(",");
		$('#getautocomplete2').autocomplete({
           lookup: namefor,
        });
   }); 
</script>
<style>
.todo-list .tools {
	position: relative;
	width: 100%;
    float: right;
    color: #dd4b39;
	z-index:-1;
}
.todo-list:hover .tools {
    z-index:100;
    width: 100%;
	top:3px;
    text-align: right;
}
.todo-list:hover .tools a{padding-right:10px;}
</style>

<div id="page-wrapper" xmlns="http://www.w3.org/1999/html">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row breadcrumb">
            <div class="col-lg-6">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i><a href="index.html">Admin</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Danh sách thành viên
                    </li>
                    <?php if (isset ($error)) { ?>
                        <li class="">
                            <span style="color: red"> <?= $error; ?></span>
                        </li>
                    <?php } ?>
                </ol>
            </div>
            <div class="col-lg-6 text-right">
                <a href="<?=base_url()?>uetadmin/user/add" class="btn btn-success btn-xs">
                    <i class="fa fa-plus"></i> Thêm mới
                </a>
                <a onclick="ActionDelete('frmUser')" class="btn btn-danger btn-xs">
                    <i class="fa fa-times"></i> Xóa
                </a>
            </div>
            <div class="clearfix">
        </div>
        <div>
                <div class="body collapse in" id="div1">
                <table width="100%" border="0" align="center" class="main" cellpadding="0" cellspacing="0">

                <tr>
                    <td height="5"></td>
                </tr>
                <form name="frmUser" method="post" action="<?=base_url('uetadmin/users/delete')?>">
                    <tr>
                        <td>
                            <!--BEGIN: Content-->
                            <div class="table-responsive">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="active">
                                            <td width="25" class="title_list">#</td>
                                            <td width="20" class="title_list">
                                                <input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'frmUser',0)" />
                                            </td>
                                            <td class="title_list">
                                                Số Điện Thoại
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>phone&by=asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>phone&by=desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            </td>
                                            <td class="title_list">
                                                Họ tên
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>fullname&by=asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>fullname&by=desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            </td>
                                            <td class="title_list">
                                                Email
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>email&by=asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>email&by=desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            </td>
                                            <td width="90" class="title_list">
                                                Nhóm
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>group&by=asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>group&by=desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            </td>
                                            <td width="10%" class="title_list">
                                                Trạng thái
                                            </td>
                                            <td width="12%" class="title_list">
                                                Ngày đăng ký
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>regisdate&by=asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>regisdate&by=desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            </td>
                                            <td width="12%" class="title_list">
                                                Ngày hết hạn
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_asc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>enddate&by=asc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                                <img src="<?php echo base_url(); ?>assets/img/admin/sort_desc.gif" onclick="ActionSort('<?php echo $sortUrl; ?>enddate&by=desc<?php echo $pageSort; ?>')" style="cursor:pointer;" border="0" />
                                            </td>
                                        </tr>
                                    </thead>
                                    <!---->
                                    <?php $idDiv = 1; ?>
                                    <?php foreach($user as $userArray){ ?>

                                        <tr style="background:#<?php if($idDiv % 2 == 0){echo 'F7F7F7';}else{echo 'FFF';} ?>;" id="DivRow_<?php echo $idDiv; ?>">
                                            <td class="detail_list" style="text-align:center;"><b><?php echo $sTT++; ?></b></td>
                                            <td class="detail_list" style="text-align:center;">
                                                <input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $userArray->id; ?>" <?php if($userLogined == $userArray->id){echo 'disabled="disabled"';} ?> onclick="DoCheckOne('frmUser')" />
                                            </td>
                                            <td class="detail_list">
                                                <a class="menu" href="<?php echo base_url() ?>uetadmin/users/add/<?php echo $userArray->id; ?>" title="<?php echo $this->lang->line('edit_tip'); ?>">
                                                    <?php echo $userArray->phone; ?>
                                                </a>
                                            </td>
                                            <td class="detail_list">
                                                <?php echo $userArray->fullname; ?>
                                               
                                            </td>
                                            <td class="detail_list">
                                                <a class="menu" href="mailto:<?php echo $userArray->email; ?>">
                                                    <?php echo $userArray->email; ?>
                                                </a>
                                            </td>
                                            <td class="detail_list" style="text-align:center;">
                                                <?php if($userArray->use_group == 4){ ?>
                                                <span style="color:#F00; font-weight:bold;">
                                                <?php }elseif($userArray->use_group == 3){ ?>
                                                    <span style="color:#009900; font-weight:bold;">
                                                <?php }elseif($userArray->use_group == 2){ ?>
                                                        <span style="color:#06F; font-weight:bold;">
                                                <?php }else{ ?>
                                                            <span style="font-weight:normal;">
                                                <?php } ?>
                                                <?php echo $userArray->gro_name; ?>
                                                </span>
                                            </td>
                                            <td class="detail_list" style="text-align:center;">
                                                <?php if($userArray->use_status == 1){ ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/admin/active.png" <?php if($userLogined != $userArray->id){ ?> onclick="ActionStatus('<?=base_url('uetadmin/users/deactive/'.$userArray->id)?>')" style="cursor:pointer;" <?php } ?> border="0" title="<?php echo $this->lang->line('deactive_tip'); ?>" />
                                                <?php }else{ ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/admin/deactive.png" <?php if($userLogined != $userArray->id){ ?> onclick="ActionStatus('<?=base_url('uetadmin/users/active/'.$userArray->id)?>')" style="cursor:pointer;" <?php } ?> border="0" title="<?php echo $this->lang->line('active_tip'); ?>" />
                                                <?php } ?>
                                            </td>
                                            <td class="detail_list" style="text-align:center;"><b><?php echo date('d-m-Y', $userArray->use_regisdate); ?></b></td>
                                            <td class="detail_list" style="text-align:center;"><b><?php if($userArray->use_enddate == $userArray->use_regisdate){echo $this->lang->line('not_set_defaults');}else{echo date('d-m-Y', $userArray->use_enddate);} ?></b></td>
                                        </tr>
                                        <?php $idDiv++; ?>
                                    <?php } ?>
                                    <!---->
                                    <tr>
                                        <td id="show_page" colspan="9"><?php echo $linkPage; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <!--END Content-->
                        </td>
                    </tr>
                </form>
                </table>
                <!--END Main-->
                </td>
                <td width="10" class="right_main" valign="top"></td>
                <td width="2"></td>
                </tr>
                <tr>
                    <td width="2" height="11"></td>
                    <td width="10" height="11" class="corner_lb_main" valign="top"></td>
                    <td height="11" class="middle_bottom_main"></td>
                    <td width="10" height="11" class="corner_rb_main" valign="top"></td>
                    <td width="2" height="11"></td>
                </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
