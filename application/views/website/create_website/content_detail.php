<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block; padding: 30px 0px;">
        <?php
            if(isset($detail) && !empty($detail)){
                foreach($detail as $dl){ ?>
                    <div class="col-md-8 col-md-push-2" style="margin-top: 10px;">
                        <div class="box">
                            <a style="cursor: pointer" onclick="select_contentdetail(<?=$dl->id;?>, <?=$dl->type;?>)">
                                <img src="<?=base_url('assets/library/content/'.$dl->url)?>" style="width: 100%; height: 120px ;" alt=""/>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
        <?php    }
            }
        ?>
    </section>
</div>

<script type="text/javascript">

    function select_contentdetail(id_content, type){
        $('#showPopup').modal('show');
        $.ajax({
            url: base_url() + 'website/Uet_createwebsite/select_contentdetail',
            type: "POST",
            data: {type: type,id_content:id_content},
            success: function (res) {
                $('#select_library').html(res);
            }
        });
    }

</script>

<div class="modal fade bs-example-modal-lg" id="showPopup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="col-md-12">
        <div class="modal-dialog modal-lg" role="document" style="width: 100%; ">
            <div class="modal-content" style="width: 100%;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="display: inline-block; width: 100%;;" id="select_library">

                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
</div>

<style type="text/css">

    #select_library {
        text-align: center;
    }

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

    .box {
        width: 100%;
        background: #1accda;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }

</style>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/multiselect.js"></script>