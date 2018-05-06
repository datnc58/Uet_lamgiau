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
                <form name="frmUser" method="post" action="<?=base_url('uetadmin/user/delete')?>">
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
                                                <a class="menu" href="<?php echo base_url() ?>uetadmin/user/add/<?php echo $userArray->id; ?>" title="<?php echo $this->lang->line('edit_tip'); ?>">
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
                                                    <img src="<?php echo base_url(); ?>assets/img/admin/active.png" <?php if($userLogined != $userArray->id){ ?> onclick="ActionStatus('<?=base_url('uetadmin/user/deactive/'.$userArray->id)?>')" style="cursor:pointer;" <?php } ?> border="0" title="<?php echo $this->lang->line('deactive_tip'); ?>" />
                                                <?php }else{ ?>
                                                    <img src="<?php echo base_url(); ?>assets/img/admin/deactive.png" <?php if($userLogined != $userArray->id){ ?> onclick="ActionStatus('<?=base_url('uetadmin/user/active/'.$userArray->id)?>')" style="cursor:pointer;" <?php } ?> border="0" title="<?php echo $this->lang->line('active_tip'); ?>" />
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
