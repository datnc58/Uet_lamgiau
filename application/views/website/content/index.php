<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->

<div class="col-md-12">

    <!-- Nav tabs -->
    <div class="col-md-12">
        <ul class="nav nav-tabs" role="tablist">
            <?php
                if(isset($loai_content)){
                    $i = 1;
                    foreach($loai_content as $content){ ?>
                        <li role="presentation" <?php if($i ==1 ){?> class="active" <?php } ?> ><a href="#vanduong_<?=$content->id;?>" aria-controls="home" role="tab" data-toggle="tab"><?=$content->name; ?></a></li>
            <?php   $i++; }
                }
            ?>
        </ul>
    </div>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php
        if(isset($loai_content)){
            $i = 1;
                foreach($loai_content as $content){ ?>
        <div role="tabpanel" class="tab-pane <?php if($i ==1 ){?> active <?php } ?>" id="vanduong_<?=$content->id;?>">
            <div class="col-md-12">
                <section class="content" style="text-align: center; background: #ffffff; display: inline-block; width: 100%">
                    <?php
//                    echo "<pre>";
//                    var_dump($loai_left);
                    if(isset($loai_left)){
                        foreach($loai_left as $left){
                            if($left->id_content == $content->id ){ ?>
                                <div class="col-md-4">
                                    <a href="<?=base_url('website/Uet_content_leftright')?>">
                                        <div class="left-right">
                                            <h4>Danh sách thư viện<br> LEFT -RIGHT</h4>
                                        </div>
                                    </a>
                                </div>
                    <?php    }else{
                                echo '';
                            }
                        }
                    } ?>
                    <?php

                    if(isset($loai_mid)){
                        foreach($loai_mid as $mid){
                            if($mid->id_content == $content->id ){ ?>
                                <div class="col-md-8">
                                    <a href="<?=base_url('website/Uet_content_mid/index2')."/$mid->id"?>">
                                        <div class="mid">
                                            <h4>Danh sách thư viện <BR>
                                                CONTENT</h4>
                                        </div>
                                    </a>
                                </div>
                            <?php }else{ ?>

                            <?php }
                        }
                    }
                    ?>

                </section>
            </div>
        </div>
                    <?php   $i++; }
        }
        ?>

    </div>

</div>

<style type="text/css">
    thead {
        background: #f8f8f8;
        font-weight: bold;
    }

    h4 {
        color: white;
        padding-top: 200px;
        line-height: 25px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
    }

    .left-right {
        width: 100%;
        background: #1accda;;
        height: 500px;
        -webkit-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
    }

    .mid {
        width: 100%;
        background: #1accda;
        height: 500px;
        -webkit-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
    }
</style>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>