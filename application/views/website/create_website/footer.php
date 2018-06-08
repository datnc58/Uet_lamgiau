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
                                                <a onclick="select_footer(<?=$foot->id;?>)" style="cursor: pointer">
                                                    <img src="<?=base_url($foot->url.'image.png')?>" style="width: 100%; height: 150px;" alt=""/>
                                                </a>
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

<div class="modal fade" id="footer" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div style="border-radius: 0px; margin-top: 150px;" class="modal-content">
            <div class="modal-header" style="border-radius: 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body" style="border-radius: 0px;">
                <h4 style="text-transform: uppercase; color: black;">
                    Bạn chọn footer bằng cách <br> click vào Hình ảnh hiển thị trên màn hình !
                </h4>
            </div>
            <div class="modal-footer" style="border-radius: 0px;">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

    $('#footer').modal('show');

    function select_footer(id){
        var check = confirm("Bạn có chắc chắn muốn chọn mẫu footer này?");
        if(check == true){
            $.ajax({
                url: base_url() + 'website/Uet_createwebsite/select_footer',
                type: "POST",
                data: {id: id},
                success: function (res) {
                    if (res == 1) {
                        alert("Bạn đã cập nhật thành công");
                        window.location.href = base_url()+ "/website/Uet_createwebsite/";
                    } else {
                        alert("Bạn đã cập nhật KHÔNG thành công");
                        window.location.href = base_url()+ "/website/Uet_createwebsite/";
                    }
                }
            });
        }else{
            return false;
        }
    }
</script>
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