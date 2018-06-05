<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block; padding: 30px 0px;">
        <div class="col-md-12">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <?php
                    if(isset($website) && !empty($website)){
                        $stt = 0;
                        foreach($website as $web){
                            $stt++;
                            ?>
                            <li role="presentation" class="<?php if($stt == 1){ echo 'active'; } ?> "><a style="border-radius: 0px; font-weight: bold; color: #8f8f8f;" href="#header_<?=$web->id;?>" aria-controls="#header_<?=$web->id;?>" role="tab" data-toggle="tab"><?=$web->name;?></a></li>
                <?php   }
                    }
                ?>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <?php
                if(isset($website) && !empty($website)){
                    $stt = 0;
                        foreach($website as $web){
                        $stt++;
                ?>
                <div role="tabpanel" class="tab-pane <?php if($stt == 1){ echo 'active';} ?>" id="header_<?=$web->id?>">
                    <table class="table">
                        <?php
                            if(isset($footer) && !empty($footer)){
                                foreach($footer as $foot){
                                    if($foot->id_website == $web->id){ ?>
                                        <tr>
                                            <td style="width: 90%">
                                                <img src="<?=base_url($foot->url.'image.png')?>" style="width: 100%; height: 150px;" alt=""/>
                                            </td>
                                            <td style="width: 10%">
                                                <input type="radio" name="header" style="width: 30px; height: 30px; margin-top: 60px;"/>
                                            </td>
                                        </tr>
                        <?php       }
                                }
                            }
                        ?>

                    </table>
                </div>
                <?php   }
                }
                ?>
            </div>
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
        line-height: 25px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
    }

    .mid:hover {
        background: #1bbada;
    }

    .left-right {
        width: 100%;
        background: #1accda;
        height: 500px;
        -webkit-box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 28px 0px rgba(77,74,77,1);
    }

    .mid {
        width: 100%;
        background: #1accda;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }

</style>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>