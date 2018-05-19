<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<section class="content" style="text-align: center">
    <section class="content" style="text-align: center; background: #ffffff;">
        <div style="pull-left">
            <a href="<?=base_url('website/Uet_footer/Add_footer');?>" class="btn btn-primary pull-left" style="border-radius: 0px;">Thêm footer</a>
        </div>
        <div class="clearfix"></div>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active">
                <table id="footers" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Stt</th>
                            <th>Images</th>
                            <th>Tên Footer</th>
                            <th>Url</th>
                            <th>Mô tả</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($footers as $footer) {
                            $i = 0; ?>
                            <tr>
                                <td><input type="checkbox" name=""></td>
                                <td><?= $i; ?></td>
                                <td><img height="100px" src="<?= base_url($footer->url). '/image.png'?>"></td>
                                <td><?= $footer->name?></td>
                                <td><?= $footer->url?></td>
                                <td><?= $footer->infor ?></td>
                                <td><a href=""></a></td>
                            </tr>
                            <?php $i++; } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>

    </section>
</section>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#footers').DataTable();
    } );
</script>