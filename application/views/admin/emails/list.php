<section class="content-header">
    <h1>
       Danh sách email
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>
        <li class="active"><a href="<?= base_url('uetadmin/emails/emails')?>"> Danh sách email</a></li>
        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>
    </ol>
</section>
<section class="content">
    <!-- Page Heading -->
    <div class="box">
		<form name="formbk" class="form-horizontal" role="form" id="mail_list" method="POST" action="<?=base_url('uetadmin/email/mail_coupon')?>" enctype="multipart/form-data">
        <div class="box-header">
			<button type="submit" name="btn" class="btn btn-success btn-sm" style="margin-bottom: 10px"><i class="fa fa-plus"></i> Gửi mail</button>
        </div>
		<!-- /.box-header -->
        <div class="box-body">
			<table id="example" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th width="1%" class="no-sort"><input type="checkbox" name="check_all" /></th>
						<th width="3%" class="text-center">STT</th>
						<th width="2%" class="no-sort">Email</th>
						<th>Ngày đăng ký</th>
						<th width="5%" class="no-sort text-center">Action</th>
					</tr>
				</thead>
				 <tbody>
				 <?php if (isset($list)) {
					$stt = 1;
					foreach ($list as $v) {
						?>
					<tr>
						<td>
						<input name="email[]" type="checkbox" class="idRow" value="<?=@$v->email;?>">
						</td>
						<td><?= $stt++; ?></td>
						<td><?= @$v->email ?></td>
						<td><?= date('d-m-Y',@$v->time); ?></td>
						<td class="text-center">
							<a class="btn btn-xs btn-danger"
							   href="<?= base_url('uetadmin/email/delete/' . $v->id) ?>" title="Xóa"
							   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i
									class="fa fa-times"></i> </a>

						</td>
					</tr>
					<?php
					} } ?>
				 </tbody>
			</table>
		</div>
		</form>
	</div>
</section>
<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			"columnDefs": [ {
					"targets": 'no-sort',
					"orderable": false,
					  } ],
			"order": [[ 1, "desc" ]],
			"iDisplayLength": 15
		} );
		// tim kiem theo ten
	} );
</script>
<!-- DataTables -->
<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">
<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>
<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>
<style>
.no-hidden select{display:none;}
table.dataTable thead th, table.dataTable thead td, table.dataTable tfoot th, table.dataTable tfoot td{padding:5px;}
</style>
			
<script type="text/javascript">
	$(document).on('click change','input[name="check_all"]',function() {
		var checkboxes = $('.idRow');
		if($(this).is(':checked')) {
			checkboxes.each(function(){
				this.checked = true;
			});
		} else {
			checkboxes.each(function(){
				this.checked = false;
			});
		}
	});
</script>