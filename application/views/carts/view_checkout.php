<div class="clearfix-20"></div>
<div class="block-content clearfix">
                            <div class="col-md-9 col-sm-8 col-xs-12">
                                <div class="thong-tin-gio-hang">
                                    <h2 class="title_thanhtoan">GIỎ HÀNG CỦA BẠN</h2>
                                    <div class="table-responsive">
                                        <form id="form-cart" name="form-cart" action="<?=site_url('cap-nhat-gio-hang')?>" method="post">
                                        <table class="table table-bordered hidden-xs table-hover orderinfo-table  itemInfo-table">
                                            <thead>
                                            <tr class="active">
                                                <th class="th-title" width="50%">Sản phẩm</th>
                                                <th class="th-title text-center" width="10%">Số lượng</th>
                                                <th class="th-title text-center" width="10%">Đơn giá</th>
                                                <th class="th-title text-center" width="10%">Thành tiền</th>
                                                <th class="th-title text-center" width="5%">Xóa</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if(count($items)) : $total=0; ?>
                                                <?php /*echo "<pre>";print_r($items);die; */?>
                                                <?php foreach($items as $item) : $total += $item['price'] * $item['qty']; ?>
                                                <tr style="padding: 10px 2px;height: 31px; margin-bottom: 10px !important; ">
                                                <td class="">
                                                <span>
                                                    <a href="<?=base_url('san-pham/'.$item['alias'].'-'.$item['id'])?>"><img style=" margin-right:10px;width: 20%; float: left;" class="" src="<?=base_url('upload/img/products/'.$item['pro_dir'].'/thumbnail_2_'.$item['image']);?>" alt="<?=@$item['name'];?>"></a>
                                                    
                                                </span>
                                                    <input type="hidden" value="418" id="rowid" name="rowid" autocomplete="off">
                                                    <div class="name_pro_cart" ><?=@$item['name'];?></div>
                                                </td>
                                                <td style="padding-top: 4%;">
                                                    <div class="pro-qty">
                                                        <input name="qty[]" onchange="Update_cart('<?=@$item['rowid'];?>',$(this))" id="quantity" value="<?=@$item['qty'];?>" size="4" title="Qty" class="form-control" maxlength="12">
                                                    </div>
                                    
                                                </td>
                                                <td style="padding-top: 4%;" class="text-center"><span id="pitem_<?=$item['rowid'];?>"><?=number_format($item['price'])?></span><?=lang('price_locale');?></td>
                                                <td style="padding-top: 4%;" class="text-center">
                                                    <span id="item_total418" style="color: #ea2227;"><span id="subtotal_<?=$item['rowid'];?>"><?=number_format($item['subtotal'])?></span><?=lang('price_locale');?></span>
                                                </td>
                                                <td style="padding-top: 4%;" class="text-center">
                                                    <a style="background-color: rgba(237, 27, 36, 0.43);
    border-color: rgba(237, 27, 38, 0.01);" title="xóa sản phẩm khỏi giỏ hàng" href="<?=base_url('cart/deleteone?id='.$item['rowid'])?>" class="btn btn-danger btn-xs">
                                                    <i class="fa fa-times" style="font-size: 10px"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                            <?php endforeach; endif;?>               
                                        </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-12">
                            <div class="fix-margin-right thong-tin-don-hang" style="padding-top: 10px;">
                                <h2 class="title_thanhtoan">THÔNG TIN ĐƠN HÀNG</h2>
                                <?php if (count($items)){ ?>
                                <div class="clearfix-30"></div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <strong style="font-size: 13px;">Tổng số tiền:</strong>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <strong class="pull-right total-sub" style="font-size: 13px; color: #ea2227;"><span id="total"><?=number_format($total)?></span><?=lang('price_locale');?></strong>
                                </div>
                                <hr>
                                    <div class="button_send">
                                        <!--<div class="clearfix-20"></div>-->
                                        <!--<button type="submit" name="update_cart_action" value="update_qty" title="Update Cart" class="button-3d-blue w_100">Cập nhật</button>-->
                                        <div class="clearfix-20"></div>
                                        <a  href="<?=site_url('shipping')?>" id="btn-login" class="btn btn-blue w_100" style="padding-left: 30px;padding-right: 30px;display: inline-block;">Tiến
                                            hành đặt
                                            hàng</a>

                                        <div class="clearfix-20"></div>
                                        <a href="<?=base_url()?>" class="cart_width w_100 btn  button-3d-green" >Chọn
                                            thêm sản
                                            phẩm khác</a>

                                    </div>
                                <script>
                                        jQuery('#quantity').keyup(function(e) {
                                            var enterKey = 13;
                                            if (e.which == enterKey){
                                                jQuery('#form-cart').submit();
                                            }
                                        });
                                </script>
                                <?php }else{ ?>
                                    <div class="button_send">
                                        <div class="clearfix-20"></div>
                                        <a href="<?=base_url()?>" class="cart_width w_100 btn  button-3d-green" >Chọn sản phẩm vào giỏ hàng</a>

                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="clearfix"></div>
</div>

<script type="text/javascript">
    function Update_cart(id,obj){
        var quantity = $(obj).val();
        var url = '<?=base_url();?>';
        $.ajax({
            url: url + 'update_ajax',
            data:{qty:quantity,id:id},
            dataType: "JSON",
            type: "POST",
            success : function(res){
                $('#total').html(number_format(res.total));
                var subTotal = parseInt(getsubTotal(id));
                var newTotal = subTotal * quantity;
                $('#subtotal_'+id).text(number_format(newTotal));
            }
        });
    }



</script>