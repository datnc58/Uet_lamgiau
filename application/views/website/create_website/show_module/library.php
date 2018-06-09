<form action="" method="post" class="navbar-form" style="width: 100%">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-5 ">
                <select name="from[]" id="multiselect1" class="form-control" size="8" multiple="multiple">
                    <?php
                    if(isset($content_detail) && !empty($content_detail)){
                        foreach($content_detail as $content){ ?>
                            <option value="<?=$content->id; ?>" style=""><?=$content->name;?></option>
                        <?php   }
                    }
                    ?>
                </select>
            </div>

            <div class="col-xs-2" style="text-align: center; padding-top: 100px;">
                <input type="button" onclick="hidden_module()" name="hoanthanh" class="btn btn-primary" style="border-radius: 0px;" value="Đóng tab"/>
                <div class="clearfix" style="margin-top: 100px;"></div>
                <button type="button" onclick="insert_library()" id="multiselect1_rightSelected" class="button_to"><i class="glyphicon glyphicon-chevron-right"></i></button>
            </div>

            <div class="col-xs-5 ">
                <select name="content_detail[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple"></select>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 hidden" style="margin-top: 40px;">
            <input type="button" onclick="" name="hoanthanh" class="btn btn-primary" style="border-radius: 0px;" value="Đóng tab"/>
        </div>
    </div>
</form>
<input type="hidden" value="<?=$id_content_child;?>" id="id_content_child"/>
<input type="hidden" value="<?=$location;?>" id="location"/>
<input type="hidden" value="<?=$type;?>" id="type"/>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#multiselect1').multiselect();
        $('#multiselect2').multiselect();
    });

    function insert_library(){
        var multiselect1 = $('#multiselect1').val();
        var id_content_child = $('#id_content_child').val();
        var location = $('#location').val();
        $.ajax({
            url: base_url() + 'website/Uet_createwebsite/insert_library',
            type: "POST",
            data: {multiselect1: multiselect1,id_content_child: id_content_child,location: location},
            success: function (res) {

            }
        });
    }



</script>