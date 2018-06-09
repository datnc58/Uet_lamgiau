<?php
    if(isset($listItem) && !empty($listItem)){
        foreach($listItem as $item){ ?>
            <img src="<?=base_url($item->url);?>image.png" onclick="copyCodeWidget(<?=$item->id;?>)" style="margin: 20px 20px;" alt=""/>
<?php   }
    }
?>
<input type="hidden" value="<?=$id_content_module_detail;?>" id="id_content_module_detail"/>
<input type="hidden" value="<?=$id_module;?>" id="id_module"/>

<script type="text/javascript">
    function copyCodeWidget(id_library){
        var id_content_module_detail = $('#id_content_module_detail').val();
        var id_module = $('#id_module').val();
        var check = confirm("Bạn có chắc chắn muộn chọn thư viện này?");
        if(check == 'true'){
            $.ajax({
                url: base_url() + 'website/Uet_createwebsite/copyCodeWidget',
                type: "POST",
                data: {id_library: id_library,id_content_module_detail: id_content_module_detail,id_module: id_module},
                success: function (res) {
                    $('#show_item').modal('hide');
                }
            });
        }else{
            return false;
        }
    }
</script>