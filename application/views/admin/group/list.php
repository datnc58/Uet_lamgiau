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
       Danh sách module
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('uetadmin/group/listGroup')?>">Danh sách module</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="box">
        <div class="box-header">
            <a href="javascript:void(0);" onclick="getModal_module()" class="btn btn-success btn-sm">
            <i class="fa fa-plus"></i> Thêm mới
            </a> 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
			<form name="formbk" method="post" action="<?=base_url('uetadmin/group/deletes')?>">
                <table id="example" class="table table-bordered table-striped">
					<thead>
                        <tr>
							<th width="2%" class="no-sort">STT</th>
							<th width="15%">Tên module</th>
							<th width="20%">link</th>
							<th width="4%" class="no-sort text-center">icon</th>
							<th width="3%" class="no-sort text-center">Sắp xếp</th>
							<th width="3%" class="no-sort text-center">active</th>
							<th width="5%" class="no-sort text-center">Action</th>
                        </tr>
                    </thead>
					<tbody>
						<?php
							view_module_cate_table($cate,0,'');
						?>
					</tbody>
				</table>
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