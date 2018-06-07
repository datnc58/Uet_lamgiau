<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; display: inline-block; width: 100%">
        <?php
            if(isset($content_mid) && !empty($content_mid)){
                foreach($content_mid as $val){ ?>
                    <div class="col-md-3">
                        <div class="box">
                            <a href="<?=base_url($val->link_module).""?>">
                                <div class="box">
                                    <h4><?=$val->name; ?></h4>
                                </div>
                            </a>
                        </div>
                    </div>
        <?php   }
            }
        ?>
    </section>
</div>
<style type="text/css">
    thead {
        background: #f8f8f8;
        font-weight: bold;
    }

    h4 {
        color: white;
        padding-top: 80px;
        line-height: 25px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
    }

    .box {
        width: 100%;
        background: #1accda;
        height: 200px;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }
</style>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>