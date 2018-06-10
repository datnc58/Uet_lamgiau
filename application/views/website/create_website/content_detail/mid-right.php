<div class="col-md-9 col-sm-9 col-xs-8">
    <?php
    if(isset($listMid) && !empty($listMid)){
        foreach($listMid as $li){
            if($li->location == 'mid'){ ?>
                <div class="list" onclick="select_library_item(<?=$li->id;?>,<?=$li->id_module;?>)" >
                    <a><?=$li->name;?></a>
                </div>
            <?php   }
        }
    }else{ ?>
        <a  onclick="add_module('mid')">
            <div class="mid">
                <h4>LEFT</h4>
            </div>
        </a>
    <?php } ?>
</div>
<div class="col-md-3 col-sm-3 col-xs-4">
    <?php
    if(isset($listRight) && !empty($listRight)){
        foreach($listRight as $li){
            if($li->location == 'right'){ ?>
                <div class="list" onclick="select_library_item(<?=$li->id;?>,<?=$li->id_module;?>)" >
                    <a><?=$li->name;?></a>
                </div>
            <?php   }
        }
    }else{ ?>
        <a  onclick="add_module('right')">
            <div class="mid">
                <h4>RIGHT</h4>
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
    thead {
        background: #f8f8f8;
        font-weight: bold;
    }

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