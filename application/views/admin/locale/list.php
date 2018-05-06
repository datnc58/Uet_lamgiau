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

       Danh sách xuất xứ

        <small></small>

    </h1>

    <ol class="breadcrumb">

        <li><a href="<?= base_url('uetadmin')?>"><i class="fa fa-dashboard"></i> Trang chủ</a></li>

        <li class="active"><a href="<?= base_url('uetadmin/attribute/listLocale')?>">Danh sách xuất xứ</a></li>

        <li > <a onclick="history.back()" style="cursor: pointer"><i class="fa fa-reply"></i></a></li>

    </ol>

</section>

<section class="content">

    <!-- Page Heading -->

    <div class="box">

        <div class="box-header">

            <a href="<?= base_url('uetadmin/attribute/addlocale')?>" class="btn btn-success btn-sm">

            <i class="fa fa-plus"></i> Thêm mới

            </a>

            <a onclick="ActionDelete('formbk')" class="btn btn-danger btn-sm">

            <i class="fa fa-times"></i> Xóa

            </a>

        </div>

        <!-- /.box-header -->

        <div class="box-body">

			<div class="col-sm-12 hidden">

				<div class="form-group row">

					<div class="col-sm-4" data-column="3">

						<input type="search" id="col3_filter" placeholder="Tiêu đề ..." class="column_filter form-control input-sm">

					</div>

					<div class="col-sm-4" data-column="4">

						<input type="search" id="col4_filter" placeholder="Tên danh mục ..." class="column_filter form-control input-sm">

					</div>

					<div class="col-sm-4" data-column="5">

						<input type="search" id="col4_filter" placeholder="Vị trí ..." class="column_filter form-control input-sm">

					</div>

					<div class="clearfix"></div>

				</div>

			</div>

			<form name="formbk" method="post" action="<?=base_url('uetadmin/attribute/deletes_locale_category')?>">

                <table id="example" class="table table-bordered table-striped">

					<thead>

                        <tr>

                            <th width="1%" class="no-sort"><input type="checkbox" name="checkall" id="checkall" value="0" onclick="DoCheck(this.checked,'formbk',0)" /></th>

                            <th width="3%" class="no-sort text-center">Sắp xếp</th>

							<th width="">Tên</th>

							<th width="7%" class="no-sort">Ảnh</th>

                            <th width="7%" class="no-sort text-center">Action</th>

							

                        </tr>

                    </thead>

					 <tbody>

					 <?php if (isset($list)) {

						$stt = 1;

						foreach ($list as $v) {

							?>

						<tr>

							<td><input type="checkbox" name="checkone[]" id="checkone" value="<?php echo $v->id; ?>" ></td>

							<td><input type="number" onchange="update_sort($(this))" value="<?= @$v->sort ?>"

								data-placement='locale'	   data-item='<?= @$v->id; ?>' style="width: 55px"></td>

							<td><?= @$v->name ?></td>

							<td>

								 <?php if(file_exists($v->image)){?>

                                <img src="<?= base_url().@$v->image?>" style="max-width: 100px; max-height: 80px">

                                <?php }else{?>

                                <img src="<?= base_url('img/noimage.png')?>" style="max-width: 80px; max-height: 55px">

                                <?php } ?>

							</td>

							<td class="text-center">

								<a class="btn btn-xs btn-default"

								   href="<?= base_url('uetadmin/attribute/editlocale/' . $v->id) ?>"><i

										class="fa fa-pencil"></i> </a>

								<a class="btn btn-xs btn-danger"

								   href="<?= base_url('uetadmin/attribute/deletelocalecategory/' . $v->id) ?>" title="Xóa"

								   onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i

										class="fa fa-times"></i> </a>

							</td>

						</tr>

						<?php

						} } ?>

					 </tbody>

				</table>

			</form>	      

		</div>

	</div>

</section>

<style>

    .view_color{width: 10px; height: 10px;margin-top: 5px;cursor: pointer; float: left;margin-right: 5px }

</style>

<script>

	$(document).ready(function() {

		$('#example').DataTable( {

			"columnDefs": [ {

					"targets": 'no-sort',

					"orderable": false,

					  } ],

			//"order": [[ 2, "desc" ]],

			"initComplete": function () {

				this.api().columns().every( function () {

					var column = this;

					var select = $('<select><option value=""></option></select>')

						.appendTo( $(column.footer()).empty() )

						.on( 'change', function () {

							var val = $.fn.dataTable.util.escapeRegex(

								$(this).val()

							);

	 

							column

								.search( val ? '^'+val+'$' : '', true, false )

								.draw();

						} );

	 

					column.data().unique().sort().each( function ( d, j ) {

						select.append( '<option value="'+d+'">'+d+'</option>' )

					} );

				} );

			}

		} );

	} );

</script>

<!-- DataTables -->

<link rel="stylesheet" href="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.css')?>">

<script src="<?=base_url('assets/js_admin/general_list.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/jquery.dataTables.min.js')?>"></script>

<script src="<?= base_url('assets/css_admin/back_end/plugins/datatables/dataTables.bootstrap.min.js')?>"></script>