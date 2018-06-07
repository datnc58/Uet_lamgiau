<meta charset="utf-8"/>

<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff; display: inline-block; width: 100%;">
        <div class="col-md-8">
            <div class="row">
                <form class="navbar-form" action="" method="post" style="width: 100%" >
                    <input type="hidden" id="id_mid" value="<?php if(isset($mid->id)){ echo $mid->id; } ?>"/>
                    <div class="form-group" style="width:100%;">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px" class="pull-right">Tên content mid</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" value="<?php if(isset($mid->name)){ echo $mid->name; }?>" name="name" id="name" style="width: 100%; border-radius: 0px"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="width:100%; margin-top: 20px">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px" class="pull-right">Loại content</label>
                        </div>
                        <div class="col-md-8">
                            <select name="id_content" class="form-control"  style="width: 100%; border-radius: 0px" id="id_content">
                                <option value="">Chọn content</option>
                                <?php foreach($content as $con){ ?>
                                    <option value="<?=$con->id;?>"><?=$con->name;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group" style="width:100%;  margin-top: 20px">
                        <div class="col-md-4">
                            <label for="" style="margin-top: 7px" class="pull-right">Thông tin left-right</label>
                        </div>
                        <div class="col-md-8">
                            <textarea name="infor" class="form-control" style="width: 100%" id="infor" cols="30" rows="10"><?php if(isset($mid->infor)){ echo $mid->infor; }?></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <button class="btn btn-primary pull-right " onclick="Add_contentmid_ajax();" style="border-radius: 0px; margin-top: 20px;">Thêm mới</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function Add_contentmid_ajax() {
        var name = $('#name').val();
        var infor = $('#infor').val();
        var id_content = $('#id_content').val();
        var id_mid = $('#id_mid').val();
        $.ajax({
            url: base_url() + 'website/Uet_content_mid/Add_contentmid_ajax',
            type: "POST",
            data: {name: name, infor: infor, id_content: id_content, id_mid: id_mid},
            success: function (res) {
                if (res == 1) {
                    alert("Bạn đã cập nhật thành công");
                    window.location.href = base_url()+ "/website/Uet_content_mid/";
                } else {
                    alert("Bạn đã cập nhật KHÔNG thành công");
                    window.location.href = base_url()+ "/website/Uet_content_mid/";
                }
            }
        });
    }
</script>
<style type="text/css">
    thead {
        background: #f8f8f8;
        font-weight: bold;
    }
</style>
<!-- /.content -->
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/exporting.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/highcharts.js"></script>
<script type= 'text/javascript' src="<?php echo base_url(); ?>assets/js/thongketruycap/jquery.tsv-0.96.min.js"></script>