<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<section class="content" style="text-align: center">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block">
        <div class="col-md-10 col-md-push-1">
            <div class="form_home" style="width: 100%; display: inline-block; -webkit-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
-moz-box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75);
box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.75); padding: 20px 0px;">
                <form action="" method="POST" enctype="multipart/form-data" class="navbar-form" style="width: 100%; ">
                    <div class="form-group" style="width: 100%">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px;" class="pull-right">Tên thư viện giới thiệu</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="name" name="name" style="width: 100%; border-radius: 0px"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="width: 100%; margin-top: 20px;">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px;" class="pull-right">Thông tin thư viện giới thiệu</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="infor" name="infor" style="width: 100%; border-radius: 0px"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="width: 100%; margin-top: 20px;">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px;" class="pull-right">Loại mid</label>
                        </div>
                        <div class="col-md-8">
                            <?php if(isset($select_left) && !empty($select_left)){
                                foreach($select_left as $val){ ?>
                                    <div class="col-md-6">
                                        <label for=""><?=$val->name; ?> </label> <input type="checkbox" value="<?=$val->id; ?>" name="id_left[]" style="width: 20px; height: 20px;"/>
                                    </div>
                                <?php  }
                            } ?>
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
                            <input type="submit" id="hoanthanh" name="hoanthanh" class="btn btn-success pull-right" style="border-radius: 0px;" value="Hoàn thành" />
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