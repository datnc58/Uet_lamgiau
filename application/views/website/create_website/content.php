<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block; padding: 30px 0px;">
        <div class="col-md-12">
            <div class="row">
                <div class="col-xs-5 ">
                    <select name="from[]" id="multiselect1" class="form-control" size="8" multiple="multiple">
                        <?php
                            if(isset($content_detail) && !empty($content_detail)){
                                foreach($content_detail as $content){ ?>
                                    <option value="<?=$content->id; ?>" style="background-image:url(<?=base_url('assets/library/content/'.$content->url)?>); background-size: 100% 100%"></option>
                        <?php   }
                            }
                        ?>
                    </select>
                </div>

                <div class="col-xs-2" style="text-align: center; padding-top: 240px;">
                    <button type="button" id="multiselect1_rightSelected" class="button_to"><i class="glyphicon glyphicon-chevron-right"></i></button>
                    <button type="button" id="multiselect1_leftSelected" class="button_to"><i class="glyphicon glyphicon-chevron-left"></i></button>
                </div>

                <div class="col-xs-5 ">
                    <select name="to[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple"></select>
                </div>
            </div>
        </div>
    </section>
</div>
<!--
    B1: Chọn cấu hình các content
    B2: Chọn loại thư viện cho các content nhỏ -> phân biệt bằng thuộc tính left - mid - right -> lưu vào bảng
    B3: Chọn thư viện hiển thị ra ngoài cho website

-->



<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#multiselect1').multiselect();
        $('#multiselect2').multiselect();
    });
</script>
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
        height: 700px;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }

    #multiselect1 option {
        width: 100%;
        padding: 12px 10px;
        margin: 15px 0px;;
        height: 80px;
        -webkit-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        cursor: pointer;
    }

    #multiselect1_to option {
        width: 100%;
        padding: 12px 10px;
        margin: 15px 0px;;
        height: 80px;
        -webkit-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
        box-shadow: 1px 1px 8px 0px rgba(77,74,77,1);
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

    .mid {
        width: 100%;
        background: #1accda;
        -webkit-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 8px 0px rgba(77,74,77,1);
    }

</style>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/multiselect.js"></script>