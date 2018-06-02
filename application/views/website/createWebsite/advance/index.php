<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">
    <ul class="menu_link">
        <li><a href="<?=base_url('website/Uet_createwebsite/').$current_page.'/'.$id_web?>">Bước 1: chọn loại</a></li>
    </ul>
</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block; padding: 30px 0px;">
        <div class="col-md-6">
            <a href="<?=base_url('website/Uet_createwebsite/select_header/').$id_web?>">
                <div class="mid" style="text-align: center">
                    <img src="<?=base_url('assets/library/advance/index1.png');?>" style="width: 60%; margin: 0 auto;" alt=""/>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="<?=base_url('website/Uet_createwebsite/select_header/').$id_web?>">
                <div class="mid" style="text-align: center">
                    <img src="<?=base_url('assets/library/advance/index2.png');?>" style="width: 60%; margin: 0 auto;" alt=""/>
                </div>
            </a>
        </div>
    </section>
</div>
<style type="text/css">
    thead {
        background: #f8f8f8;
        font-weight: bold;
    }

    thead {
        background: #f8f8f8;
        font-weight: bold;
    }

    h4 {
        color: white;
        padding-top: 120px;
        line-height: 25px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
    }

    .left-right {
        width: 100%;
        background: #cccccc;
        height: 500px;
        -webkit-box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
    }

    .mid:hover {
        width: 100%;
        background: #eaeaea;
        height: auto;
        -webkit-box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
    }

</style>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>