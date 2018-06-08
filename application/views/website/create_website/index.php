<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; width: 100%; display: inline-block; padding: 30px 0px;">

        <div class="col-md-8 col-md-push-2">
            <a href="<?=base_url('website/Uet_createwebsite/header')?>">
                <div class="mid" style="height: 150px !important;">
                    <h4 style="padding-top: 60px">Header</h4>
                </div>
            </a>
            <a id="content" onclick="select_content(<?=$website[0]->header;?>,<?=$website[0]->footer;?>)">
                <div class="mid" style="height: 500px !important;">
                    <h4 style="padding-top: 220px">Content</h4>
                </div>
            </a>
            <a href="<?=base_url('website/Uet_createwebsite/footer')?>">
                <div class="mid" style="height: 150px !important;">
                    <h4 style="padding-top: 60px">Footer</h4>
                </div>
            </a>
        </div>
    </section>
</div>

<script type="text/javascript">
    function select_content(header, footer){
        if(header == '0'){
            alert("Bạn cần thao tác chọn Header cho website trước !");
            return false;
        }else{
            if(footer == '0'){
                alert("Bạn cần thao tác chọn Footer cho website trước !");
                return false;
            }else{
                window.location.href = '<?=base_url('website/Uet_createwebsite/content')?>';
            }
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