<div id="page-wrapper">
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="<?= base_url('uetadmin')?>">Admin</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Danh sách tin tức
                    </li>
                </ol>
            </div>
            <div class="col-md-12">
                <div class="text-left">
                    <a href="<?= base_url('uetadmin/add-shipping')?>">
                        <button class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Thêm</button></a>
                </div>
                <div class="">
                    <table class="table table-hover table-bordered">
                        <tr class="active">
                            <th>ID</th>
                            <th>Tên vận chuyển</th>
                            <th>Giá</th>
                            <th>Vị trí</th>
                            <th width="15%" class="text-center">Action</th>
                        </tr>
                        <?php if(isset($shipping)){
                            foreach($shipping as $v){?>

                                <tr>
                                    <td><?= @$v->id?></td>
                                    <td><?= @$v->name?></td>
                                    <td><?= @$v->price?></td>
                                    <td width="7%"><input type="number" data-item="<?= @$v->id;?>" style='width: 45px; padding: 2px;border:1px solid #ddd' min="1" onchange="updateOrder($(this))" id="item-sort" value="<?= $v->sort;?>"/></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/cats/addShipping/'.$v->id)?>">
                                            <button class="btn btn-xs btn-primary">Sửa</button>
                                        </a>
                                        <a href="<?= base_url('admin/cats/deleteShipping/'.$v->id)?>"
                                           onclick="return confirm('Bạn có chắc chắn muốn xóa ?')">
                                            <button class="btn btn-xs btn-danger">Xóa</button>
                                        </a>

                                    </td>
                                </tr>
                            <?php }
                        } ?>
                    </table>
                </div>
                <div class="pagination">
                    <?php
                    echo $this->pagination->create_links(); // tạo link phân trang
                    ?>
                </div>
            </div>
        </div>
        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->


        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>
<script type="text/javascript">
    function updateOrder(s){
        var baseurl = $("#baseurl").val();
        var form_data = {
            id: s.attr('data-item'),sort:s.val()
        };
        $.ajax({
            url: baseurl+"admin/cats/change_sort",
            type: 'POST',
            dataType: 'json',
            data: form_data,
            success: function (rs) {

            }
        });
    }
</script>