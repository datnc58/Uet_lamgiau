<!-- Content Header (Page header) -->
<section class="content-header">
</section>
<!-- Main content -->
<section class="content" style="text-align: center">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block">
        <div class="col-md-8 col-md-push-2">
            <div class="form_home" style="width: 100%; display: inline-block; -webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75); padding: 20px 0px;">
                <form class="validate form-horizontal" role="form" id="form-bk" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" value="<?= $website->id ?>" name ="idWeb">
                <div class="form-group" style="width: 100%">
                    <div class="col-md-4">
                        <label for="" style="margin-top: 7px;" class="pull-right">Tên header</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="<?= $website->name ?>" id="name" name="name" style="width: 100%; border-radius: 0px"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="width: 100%; margin-top: 20px;">
                    <div class="col-md-4">
                        <label for="" style="margin-top: 7px;" class="pull-right">Thông tin header</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" value="<?= $website->infor ?>" id="infor" name="infor" style="width: 100%; border-radius: 0px"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="width: 100%; margin-top: 20px;">
                    <div class="col-md-4">
                        <label for="" style="margin-top: 7px;" class="pull-right">Loại website</label>
                    </div>
                    <div class="col-md-8">
                        <?= $typeWebsite->name?>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="width: 100%; margin-top: 20px;">
                    <div class="col-md-4">
                        <label for="" style="margin-top: 7px;" class="pull-right">Đính kèm PHP</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="php" name="php" style="width: 100%; border-radius: 0px"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="width: 100%; margin-top: 20px;">
                    <div class="col-md-4">
                        <label for="" style="margin-top: 7px;" class="pull-right">Đính kèm hình ảnh</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="image" name="image"  style="width: 100%; border-radius: 0px"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="width: 100%; margin-top: 20px;">
                    <div class="col-md-4">
                        <label for="" style="margin-top: 7px;" class="pull-right">Đính kèm style</label>
                    </div>
                    <div class="col-md-8">
                        <input type="file" class="form-control" id="style" name="style" style="width: 100%; border-radius: 0px"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group" style="width: 100%; margin-top: 20px;">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-8">
                        <input type="submit" name="submit" id="hoanthanh" class="btn btn-success pull-right" style="border-radius: 0px;" value="Hoàn Thành"/>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </section>
</section>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>