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
<input type="hidden" id="id_content" value=""/>
<input type="hidden" id="type" value=""/>
<script type="text/javascript">

    function select_contentdetail(id_content, type){
        $('#showPopup').modal('show');
        $.ajax({
            url: base_url() + 'website/Uet_createwebsite/select_contentdetail',
            type: "POST",
            data: {type: type,id_content:id_content},
            success: function (res) {
                $('#select_library').html(res);
                $('#id_content').val(id_content);
                $('#type').val(type);
            }
        });
    }

    function add_module(location){
        $('#show_moduel').modal('show');
        var id_content = $('#id_content').val();
        var type = $('#type').val();
        $.ajax({
            url: base_url() + 'website/Uet_createwebsite/add_module',
            type: "POST",
            data: {type: type,id_content:id_content,location:location},
            success: function (res) {
                $('#show_selectmodule').html(res);
            }
        });
    }

    function hidden_module(){
        var id_content_child = $('#id_content_child').val();
        var type = $('#type').val();
        $('#show_moduel').modal('hide');
        select_contentdetail(id_content_child, type);
    }

</script>
<!-- phân loại left -right -->
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
<!-- danh sách module -->
<div class="modal fade bs-example-modal-lg" id="show_moduel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="col-md-12">
        <div class="modal-dialog modal-lg" role="document" style="width: 100%; text-align: center ">
            <div class="modal-content" style="width: 80%; margin: 0 auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hidden_module()"></button>
                </div>
                <div class="modal-body" style="display: inline-block; width: 100%;;" id="show_selectmodule">

                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
</div>
<!-- danh sách thư viện -->
<div class="modal fade bs-example-modal-lg" id="show_item" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="col-md-12">
        <div class="modal-dialog modal-lg" role="document" style="width: 100%; text-align: center ">
            <div class="modal-content" style="width: 80%; margin: 0 auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="hidden_module()"></button>
                </div>
                <div class="modal-body" style="display: inline-block; width: 100%;;" id="show_item_list">

                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
</div>



<style type="text/css">
    .button_to {
        padding: 5px 20px;
        width: 100px;;
        display: block;
        margin: 10px auto;
        color: #0000ff;
    }

    #multiselect1 , #multiselect1_to {
        width: 100%;
        height: 500px;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }

    #multiselect1 option {
        width: 100%;
        padding: 15px 10px;
        margin: 15px 0px;;
        background: #1bbada;
        color: white;
        font-weight: bold;
        -webkit-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        cursor: pointer;
    }

    #multiselect1_to option {
        width: 100%;
        padding: 15px 10px;
        background: #1bbada;
        margin: 15px 0px;;
        color: white;
        font-weight: bold;
        -webkit-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
    }
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