<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="<?=base_url('uetadmin')?>">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-table"></i> Tin Nhắn SMS
                    </li>
                </ol>
            </div>
            <div class="col-md-12">

                <div class="clear"></div>

                <div class="table-responsive">

                    <table class="table table-hover table-bordered">
                        <tr class="active">
                            <th>ID</th>
                            <th>số điện thoại</th>
                            <th>Mã Số Tin</th>
                            <th>Nội Dung Tin</th>
                            <th>Trạng Thái</th>
                            <th>Count</th>
                            <th>Nỗi </th>
                            <th>Thời Gian Gửi</th>
                            <th>Xoá</th>
                            <th>Gửi Lại</th>
                            <th>Tin Mới</th>
                            
                        </tr>
                        <?php if(!empty($smslist)) : 
                        foreach ($smslist as $key => $sms) {
                        ?>
                        <tr>   
                            <td><?= $key ?></td>
                            <td>
                                <a href="" data-id="<?= @$sms->id ?>"> <?= @$sms->phone?></a>
                            </td>
                            <td>
                                <?= @$sms->smsid ?>
                            </td>
                            <td>
                                <?= @$sms->content ?>
                            </td>
                            <td>
                                <?=(@$sms->result == 100)?'Đã Gửi':'Nỗi Gửi Tin' ?>
                            </td>
                            <td>
                                <?=@$sms->count ?>
                            </td>
                            <td>
                                <?= @$sms->error ?>
                            </td>
                            <td>
                                <?=date_format(date_create($sms->create_at),'H:i:s d-m-Y ') ?>
                            </td>
                            <td>
                                <button type="button" onclick="xoasms(this)" data-idsms="<?= $sms->id?>" class="btn btn-danger">Xoá</button>
                            </td>
                            <td>
                                <button type="button" onclick="guisms(this)" data-idsms="<?= $sms->smsid?>" class="btn btn-default">Gửi Lại</button>
                            </td>
                            <td>
                                <button type="button" onclick="sendsms(this)" class="btn btn-info" data-idsms="<?= $sms->smsid?>" >Tin Mới</button>
                            </td>
                        </tr>
                            <?php } ?>
                        
                        <?php endif; ?>
                    </table>

                </div>
                <div class="pagination">
                    <?php
                    echo $this->pagination->create_links(); // tạo link phân trang
                    ?>
                </div>
            </div>
        </div>
        <!-- Trigger the modal with a button -->


            <!-- Modal -->
            <div id="smssend" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Gửi Lại Tin Nhắn SMS Cho Khách Hàng</h4>
                  </div>
                  <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <td style="width: 40%">Số Điện Thoại</td>
                                <td>
                                    <p class="text-justify text-info" id="phonesms" data-userid=""></p>
                                </td>

                            </tr>
                            <tr>
                                <td>Nội Dung Cũ</td>
                                <td>
                                    <p class="text-justify text-primary" id="contentsms"></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="input-group">
                        <span class="input-group-addon">Nội Dung Tin Nhắn</span>
                        <input type="text" name="smscontent" class="form-control" placeholder="Nhập Nội Dung Tin" id="smscontent">
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" id="newsms">Gửi Tin</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>

        <link href="<?=base_url('assets/css/bootstrap-toggle.min.css')?>" rel="stylesheet">
        <script src="<?=base_url('assets/js/bootstrap-toggle.min.js')?>"></script>

    </div>
    <!-- /.container-fluid -->
    <script type="text/javascript">
        function xoasms(item) {
            var idsms = $(item).data("idsms");
            $.ajax({
                url: "<?=  base_url('uetadmin/users/smslist')?>",
                type: 'POST',
                dataType: 'json',
                data: {xoasms: idsms},
                success:function (result) {
                    console.log(result)
                    if(result.status == null){
                        location.reload();
                    }else{
                        alert('Có Nỗi Khi Xoá SMS Thử Lại Sau');
                    }
                }
            }) 
        }

        function guisms(item) {
            var idsms = $(item).data("idsms");
            $.ajax({
                url: "<?=  base_url('uetadmin/users/smslist')?>",
                type: 'POST',
                dataType: 'json',
                data: {guisms: idsms},
                success:function (result) {
                    console.log(result)
                    if(result.result == 100){
                        location.reload();
                    }else{
                        alert('Có Nỗi Khi Gửi SMS '+ result.error);
                    }
                }
            }) 
        }



        function sendsms(item) {
            var idsms = $(item).data("idsms");
            //$("#smssend").modal('show');
            $.ajax({
                url: "<?=  base_url('uetadmin/users/smslist')?>",
                type: 'POST',
                dataType: 'json',
                data: {sendsmsid: idsms},
                success:function (result) {
                    //console.log(result);
                    $('#phonesms').html(result.phone);
                    $('#phonesms').data('userid',result.userid)
                    $('#contentsms').html(result.content);
                    $("#smssend").modal('show');
                }
            })
            
        }

        $('#newsms').click(function(event) {
           var content 	= $('#smscontent').val();
           var userid 	= $('#phonesms').data('userid');
           $.ajax({
           	url: "<?=  base_url('uetadmin/users/smslist')?>",
           	type: 'POST',
           	dataType: 'json',
           	data: {content: content, userid : userid , sendsms:'submit'},
           	success:function (result) {
           		if(result.result == 100){
                    location.reload();
                }else{
                    alert('Có Nỗi Khi Gửi SMS '+ result.error);
                }
           	}
           })
           
        });

        $('#smssend').on('hidden.bs.modal', function () {
            // reset medal
            $('#phonesms').html('');
            $('#contentsms').html('');
            $('#phonesms').data('userid','');
            $('#smscontent').val('');
        })
    </script>
</div>
