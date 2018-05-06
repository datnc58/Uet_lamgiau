<meta charset="utf-8"/>
<!-- Content Header (Page header) -->
<section class="content-header">

</section>
<!-- Main content -->
<div class="col-md-12">
    <section class="content" style="text-align: center; background: #ffffff;">
        <div style="pull-left">
            <a href="<?=base_url('website/Uet_website/Add_website');?>" class="btn btn-primary pull-left" style="border-radius: 0px;">Thêm loại website</a>
        </div>
        <div class="clearfix"></div>
        <table class="table table-bordered" style="margin-top: 20px;">
            <thead>
            <tr>
                <td align="center">STT</td>
                <td align="center">Tên loại website</td>
                <td align="center">Mã code</td>
                <td align="center">Thông tin</td>
                <td align="center">Trạng thái</td>
                <td align="center" colspan="2">Chức năng</td>
            </tr>
            </thead>
            <tbody>
                <?php
                    $stt = 0;
                    if(isset($website) && !empty($website)){
                        foreach($website as $web){ $stt ++; ?>
                            <tr>
                                <td align="center"><?=$stt;?></td>
                                <td align="center"><?=$web->name;?></td>
                                <td align="center"><?=$web->code;?></td>
                                <td align="center"><?=$web->infor;?></td>
                                <td align="center"><?php if($web->status == 1){ echo '<span onclick="Update_hoatdong_website(1, '.$web->id.')" class="btn btn-xs btn-success">Đang hoạt đông</span>';}else{
                                        echo '<span onclick="Update_hoatdong_website(2, '.$web->id.')" class="btn btn-xs btn-success">Ngừng hoạt đông</span>';
                                    };?></td>
                                <td align="center">
                                    <button style="padding: 3px 5px;"><a href="<?=base_url('website/Uet_website/Add_website/'.$web->id);?>"><i class="fa fa-edit"></i></a></button>
                                </td>
                                <td align="center">
                                    <button onclick="remove_website(<?=$web->id;?>)" style="padding: 3px 5px;"><i class="fa fa-remove"></i></button>
                                </td>
                            </tr>
                <?php   }
                    }
                ?>
            </tbody>
        </table>
    </section>
</div>
<script type="text/javascript">
    function Update_hoatdong_website(status, id){
        if(status == 1){
            var check = confirm("Bạn có muốn ngừng hoạt động loại website này? ");
            if(check == true){
                $.ajax({
                    url:base_url() + 'Website/Uet_website/Update_status_website',
                    type:"POST",
                    data:{status:status, id:id},
                    success:function(res){
                        if(res == 1){
                            alert("Bạn đã cập nhật thành công");
                        }else{
                            alert("Bạn đã cập nhật KHÔNG thành công");
                        }
                    }
                });
            }else{
                return false;
            }
        }else if(status == 2){
            var check2 = confirm("Bạn có muốn kích hoạt hoạt động loại website này? ");
            if(check2 == true){
                $.ajax({
                    url:base_url() + 'Website/Uet_website/Update_status_website',
                    type:"POST",
                    data:{status:status, id:id},
                    success:function(res){
                        if(res == 1){
                            alert("Bạn đã cập nhật thành công");
                        }else{
                            alert("Bạn đã cập nhật KHÔNG thành công");
                        }
                    }
                });
            }else{
                return false;
            }
        }
    }

    function remove_website(id){
        var check2 = confirm("Bạn có muốn xóa website này không? ");
        if(check2 == true){
            $.ajax({
                url:base_url() + 'Website/Uet_website/remove_website',
                type:"POST",
                data:{id:id},
                success:function(res){
                    if(res == 1){
                        alert("Bạn đã xóa thành công");
                    }else{
                        alert("Bạn đã xóa KHÔNG thành công");
                    }
                }
            });
        }else{
            return false;
        }
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