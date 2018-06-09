<div class="col-md-8 col-md-push-2">
    <?php
    if(isset($listRight) && !empty($listRight)){
        foreach($listRight as $li){
            if($li->location == 'mid'){ ?>
                <div class="list" onclick="select_library_item(<?=$li->id;?>,<?=$li->id_module;?>)" style="background: <?php if(isset($li->id_library) && !empty($li->id_library)){ echo "#217dda !important";} ?>" >
                    <a><?=$li->name;?></a>
                </div>
            <?php   }
        }
    }else{ ?>
        <a  onclick="add_module('mid')">
            <div class="mid">
                <h4>CONTENT - FULL</h4>
            </div>
        </a>
    <?php } ?>
</div>
<script type="text/javascript">

    function select_library_item(id_content_module_detail, id_module){
        $('#show_item').modal('show');
        $.ajax({
            url: base_url() + 'website/Uet_createwebsite/select_library_item',
            type: "POST",
            data: {id_content_module_detail: id_content_module_detail,id_module: id_module},
            success: function (res) {
                $('#show_item_list').html(res);
            }
        });
    }

</script>
<style type="text/css">
    .list {
        padding: 20px 0px;
        background: #18da9a;
        margin: 10px 0px;
        -webkit-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        cursor: pointer;
    }

    .list a {
        color: white;
        font-weight: bold;
        font-size: 20px;;
    }

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
        height: 350px;
        -webkit-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        -moz-box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
        box-shadow: 2px 2px 6px 0px rgba(77,74,77,1);
    }
</style>