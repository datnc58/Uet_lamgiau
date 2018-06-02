<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">
    <ul class="menu_link">
        <li><a href="<?=base_url('website/Uet_createwebsite')?>">Bước 1: chọn loại</a></li>
        <li><a href="<?=base_url('website/Uet_createwebsite/select_header/').$id_web; ?>">Bước 2: chọn header</a></li>
        <li><a href="<?=base_url('website/Uet_createwebsite/select_footer/').$id_web; ?>">Bước 3: chọn footer</a></li>
        <li><a href="<?=base_url('website/Uet_createwebsite/select_content_top/').$id_web; ?>">Bước 4: chọn content - top</a></li>
    </ul>
</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block; padding: 30px 0px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-4 col-xs-push-1">
                    <select name="from[]" id="multiselect1" class="form-control" size="8" multiple="multiple">
                        <option value="1">Item 1</option>
                        <option value="2">Item 5</option>
                        <option value="2">Item 2</option>
                        <option value="2">Item 4</option>
                        <option value="3">Item 3</option>
                    </select>
                </div>

                <div class="col-xs-2 col-xs-push-1" style="text-align: center; padding-top: 140px;">
                    <button type="button" id="multiselect1_rightAll" class="button_to"><i class="glyphicon glyphicon-forward"></i></button>
                    <button type="button" id="multiselect1_rightSelected" class="button_to"><i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="multiselect1_leftSelected" class="button_to"><i class="glyphicon glyphicon-chevron-left"></i></button>
                    <button type="button" id="multiselect1_leftAll" class="button_to"><i class="glyphicon glyphicon-backward"></i></button>
                </div>

                <div class="col-xs-4 col-xs-push-1">
                    <select name="to[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple"></select>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#multiselect1').multiselect();
        $('#multiselect2').multiselect();
    });
</script>
<style type="text/css">

    #multiselect1 , #multiselect1_to {
        width: 100%;
        height: 500px;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }

    #multiselect1 option {
        width: 100%;
        padding: 12px 10px;
        margin: 3px 0px;;
        -webkit-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
    }

    #multiselect1_to option {
        width: 100%;
        padding: 12px 10px;
        margin: 3px 0px;;
        -webkit-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
    }
    .button_to {
        padding: 5px 20px;
        width: 100px;;
        display: block;
        margin: 10px auto;
        color: #0000ff;
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
        padding-top: 120px;
        line-height: 25px;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 20px;
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
        height: 300px;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }

</style>

<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/multiselect.js"></script>