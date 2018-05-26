<style type="text/css">
    .dataTables_length, .dataTables_info {
        text-align: left;
    }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<section class="content" style="text-align: center">

    <section class="content" style="text-align: center; background: #ffffff;">
        <div style="margin-bottom: 20px;">
            <a href="<?=base_url('website/Uet_content_leftright/AddSanPhamNoiBat');?>" class="btn btn-primary pull-left" style="border-radius: 0px;">Thêm danh mục sản phẩm</a>
        </div>
        <div class="clearfix" style="margin-top: 20px !important;"></div>
        <table id="example1" class="table table-striped table-bordered" style="width:100%; margin-top: 20px !important;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Stt</th>
                            <th>Hình ảnh</th>
                            <th>Url</th>
                            <th>Số thư viện</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($sanpham_noibat)){ foreach ($sanpham_noibat as $spdm) {
                            $i = 0;
                            $i++; ?>
                                <tr>
                                     <td><?= $i; ?></td>
                                    <td><img height="100px" src="<?= base_url($spdm->url). '/image.png'?>"></td>
                                    <td><?= $spdm->name?></td>
                                    <td><?= $spdm->url?></td>
                                    <td><?= $spdm->number ?></td>
                                    <td>
                                        <a href="<?=base_url('website/Uet_content_leftright/')."editSanPhamNoiBat/$spdm->id"?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Sửa</a>
                                        <a href="<?=base_url('website/Uet_content_leftright/')."DeleteSanPhamNoiBat/$spdm->id"?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Xóa</a>
                                    </td>
                                </tr>
                            <?php }
                        }?>

                        
                    </tbody>
                    
                </table>
    </section>
</section>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example1').DataTable();
        $('#example2').DataTable();
    } );
</script>