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
        <div style="pull-left">
            <a href="<?=base_url('website/Uet_header/Add_header');?>" class="btn btn-primary pull-left" style="border-radius: 0px;">Thêm header</a>
        </div>
        <div class="clearfix"></div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" style="margin-top: 20px; margin-bottom: 20px;">
            <li role="presentation" class="active"><a style="border-radius: 0px; font-weight: bold; color: #8f8f8f;" href="#basic_website" aria-controls="basic_website" role="tab" data-toggle="tab">Header website phổ thông</a></li>
            <li role="presentation"><a style="border-radius: 0px; font-weight: bold; color: #8f8f8f;" href="#advance_website" aria-controls="advance_website" role="tab" data-toggle="tab">Header website thương mại điện tử</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="basic_website" >
                <table id="example1" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Stt</th>
                            <th>Images</th>
                            <th>Tên Header</th>
                            <th>Url</th>
                            <th>Number</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($headers)){ foreach ($headers as $header) {
                            $i = 0;
                            if ($header->code === 'basic_website') { $i++; ?>
                                <tr>
                                     <td><?= $i; ?></td>
                                    <td><img height="100px" src="<?= base_url($header->url). '/image.png'?>"></td>
                                    <td><?= $header->name?></td>
                                    <td><?= $header->url?></td>
                                    <td><?= $header->number ?></td>
                                    <td><a href=""></a></td>
                                </tr>
                            <?php } }
                        }?>

                        
                    </tbody>
                    
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="advance_website">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>STT</th>
                            <th>Tên Header</th>
                            <th>Url</th>
                            <th>Number</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>


                        <?php if(isset($headers)){ foreach ($headers as $header) {
                            $i = 0;
                            if ($header->code === 'advance_website') { $i++; ?>
                                <tr>
                                    <td><input type="checkbox" name=""></td>
                                    <td><?= $i; ?></td>
                                    <td><?= $header->name?></td>
                                    <td><?= $header->url?></td>
                                    <td><?= $header->number?></td>
                                    <td><a href="#"></a></td>
                                </tr>

                            <?php } }
                        }?>
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
        $('#example1').DataTable();
        $('#example2').DataTable();
    } );
</script>