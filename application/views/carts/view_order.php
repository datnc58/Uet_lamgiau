    <div class="clearfix-20"></div>
    <div class="banner">
        <div class="banner_cate">
            <div class="container">
                <div class="row_pc">
                    <div class="sub_bn_cate">
                        <h2 class="title_thanhtoan">Giỏ hàng của bạn</h2>
                        <div class="clearfix clearfix-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="checkout-cart-index">
        <div class="container">
            <div class="row">
                <div class="clearfix"></div>
                <?php if(count($items)) : ?>
                <form action="<?=base_url('cart/sendOnpage')?>" method="post" id="send-user-info" class="validate form-horizontal" enctype="multipart/form-data" role="form">
                   <input type="hidden" name="token" value="<?=$form_key;?>" />
                    <div class="col-md-6 col-lg-6 cart_left">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h5><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Thông tin mua hàng</h5>
                            </div>
                            <div class="panel-body">
                                <div class="infor_acount clearfix">
                                    <div class="clearfix"></div>
                                        <div class="123">
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Họ và tên</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="validate[required] form-control input-sm " name="fullname" value="<?=@$user->fullname;?>" placeholder="Nhập họ và tên">
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Số điện thoại</label>
                                                <div class="col-sm-4">
                                                    <input type="number" class="validate[required,custom[phone]] form-control input-sm " name="phone" value="<?=@$user->phone;?>" placeholder="Số điện thoại">
                                                </div>
                                                <div class="col-sm-4 hidden-xs">
                                                    <input type="number"  form-control input-sm " name="phone_other" value="" placeholder="Số khác - tùy chọn">
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Email</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control input-sm "  name="email" value="<?=@$user->email;?>" placeholder="Nhập địa chỉ Email - không bắt buộc">
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group">
                                                <label class="col-sm-3">Địa chỉ</label>
                                                <div class="col-sm-9">
                                                    <textarea rows="2" placeholder="Nhập địa chỉ đầy đủ: số nhà, tên đường" class="validate[required] form-control" name="address" id="address"><?=@$user->address;?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="lastname" class="col-md-3">Tỉnh/Thành phố</label>
                                                <div class="col-md-7">
                                                    <select name="province" id="provice" class="validate[required] form-control">
                                                        <option value="">Chọn Tỉnh / Thành</option>
                                                        <?php
                                                        foreach(@$ships as $t){?>
                                                            <option <?php if($t->id == @$user->province){echo "selected";} ?> value="<?=$t->id;?>"><?=$t->name;?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                            <div class="form-group hidden">
                                                <label class="col-sm-3">Quận/Huyện</label>
                                                <div class="col-sm-5">
                                                    <input type="text" placeholder="Tên quận/huyện/thị xã" class="form-control">
                                                </div>
                                            </div>
                                            <div class="clearfix-5 "></div>
                                            <div class="form-group hidden">
                                                <label class="col-sm-3">Phường/Xã/TT</label>
                                                <div class="col-sm-5">
                                                    <input type="text" placeholder="Tên phường, xã hoặc thị trấn" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group" style="display: none">
                                                <label class="col-md-3">Giới tính</label>
                                                <div class="col-sm-9">
                                                    <div class="row">
                                                        <label class="checkbox-inline" style="text-transform: none">
                                                            <input type="radio" value="122" name="cate_tour[]">
                                                            Nam
                                                        </label>

                                                        <label class="checkbox-inline" style="text-transform: none">
                                                            <input type="radio" value="122" name="cate_tour[]">
                                                            Nữ
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix-5"></div>
                                        </div>
                                </div>
                            </div>
                            <div class="panel-heading ">
                                <h5><i class="fa fa-credit-card"></i>&nbsp;Thông tin địa chỉ nhận hàng khác</h5>
                            </div>
                            <div class="panel-body">
                                <div class="shipping-info-body">
                                        <div class="ship-item ship-note">
                                            <textarea name="address2" rows="2" cols="20" id="ctl00_pageBody_txtOrderNode" class="form-input-note" placeholder="Địa chỉ nhận hàng khác"></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="panel-heading hidden-xs hidden">
                                <h5><i class="fa fa-credit-card"></i>&nbsp;Chọn hình thức thanh toán</h5>
                            </div>
                            <div class="panel-body hidden-xs hidden">
                                <div class="pay-info-body">
                                    <div class="pay-info-text">
                                        <div class="payment">
                                            <input type="radio" data-link="paymentType" id="payment1" name="payment" checked="checked" value="1">
                                            <label for="payment1"><span></span>Giao hàng và thu tiền tại nhà</label>
                                        </div>
                                        <div class="payment">
                                            <input type="radio" data-link="paymentType" id="payment2" name="payment"  value="2">
                                            <label for="payment2"><span></span>Nhận hàng và thanh toán tại Thương mại thủ đô</label>
                                            <div class="more-info-checked">
                                                <div class="box-info-payment panel-body">
                                                    <div class="info-payment-top">Quý khách có thể đến địa chỉ sau để thanh toán và nhận hàng:
                                                        :</div>
                                                    <div class="info-payment-center">
                                                        <div class="info-payment-item">
                                                            Địac chỉ :<?=@$this->option->address;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="payment">

                                            <input type="radio" data-link="paymentType" id="payment3" name="payment" value="3">
                                            <label for="payment3"><span></span>Chuyển khoản qua máy ATM &amp; Ngân hàng</label>
                                            <div class="more-info-checked">
                                                <div class="box-info-payment panel-body">
                                                    <div class="info-payment-top">
                                                        Quý khách có thể lựa chọn chuyển khoản tới 1 trong những ngân hàng sau :
                                                    </div>
                                                    <div class="info-payment-center">
                                                        <ul>
                                                            <li class="info-payment-item">
                                                                <?=@$this->option->shipping;?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-heading">
                                <h5><i class="fa fa-file"></i>&nbsp;Ghi chú</h5>
                            </div>
                            <div class="panel-body">
                                <div class="shipping-info-body">
                                        <div class="ship-item ship-note">
                                            <textarea name="comment" rows="2" cols="20" id="ctl00_pageBody_txtOrderNode" class="form-input-note" placeholder="Ghi chú giao hàng"></textarea>
                                        </div>
                                </div>
                            </div>
                            <div class="checkout-finish checkout-footer">
                                <input type="hidden" value="<?=$form_key?>" name="form_tocken">
                                <button class="checkout-btn checkout-submit" type="submit"><i class="fa fa-shopping-cart"></i>Gửi đơn hàng</button>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <aside id="cart-items" class="sticky col-md-6 col-lg-6 shopping-cart-aside cart_right">
                    <div class="panel panel-default fixgiohang" id="cart-content">
                        <div class="panel-heading"><h5> <i class="fa fa-shopping-cart"></i>&nbsp;Đơn hàng (<?=$this->cart->total_items();?> Sản phẩm)</h5></div>
                        <div class="panel-body giohangfix">
                            <div class="col checkout-cart-list">
                                <div style="display: none!important">
                                    <input type="hidden" name="ctl00$pageBody$hdnQty" id="ctl00_pageBody_hdnQty">
                                    <input type="submit" name="ctl00$pageBody$btnSave" value="" id="ctl00_pageBody_btnSave">
                                </div>
                                <ul class="checkout-cart-title">
                                    <li class="col cart-product-name ">Sản phẩm</li>
                                    <li class="col cart-product-count ">Số lượng</li>
                                    <li class="col cart-product-price ">Đơn giá (đ)</li>
                                    <li class="col cart-product-money ">Thành tiền (đ)</li>
                                </ul>
                                <ul class="group-cart-product-item" id="cart-list">
                                    <?php foreach($items as $item) : ?>
                                        <li class="cart-product-item" data-record-id="<?=$item['rowid']?>">
                                            <ul class="qts_order">
                                                <li class="cart-product-name ">
                                                                            <span class="col cart-product-images">
                                                                                <img src="<?=base_url('upload/img/products/'.$item['pro_dir'].'/thumbnail_2_'.$item['image']);?>">
                                                                            </span>
                                                                            <span class="cart-product-info">
                                                                                <p class="cart-product-title">
                                                                                    <a href="<?=site_url($item['alias'])?>"><?=@$item['name'];?></a></p>

                                                                            </span>
                                                </li>
                                                <li class="cart-product-count "><span class="add-number-cart">
                                                        <span class="ui-spinner ui-widget ui-widget-content ui-corner-all">
                                                            <input type="text" class="txtQty-cart ui-spinner-input" id="qty-<?=$item['rowid']?>" title="Thay đổi số lượng nếu bạn muốn" placeholder="Số lượng" name="qty" data-record="<?=$item['rowid']?>" value="<?=$item['qty']?>" aria-valuemin="0" aria-valuemax="1000" aria-valuenow="4" autocomplete="off" role="spinbutton">
                                                            <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-n" data-bind="<?=$item['rowid']?>" onclick="upQuantity($(this))">▲</span></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-s" data-bind="<?=$item['rowid']?>" onclick="downQuantiy($(this))">▼</span></a></span></span>
                                                </li>
                                                <li class="cart-product-price ">
                                                    <p class="cart-product-price-meta"><?=number_format($item['price']);?></p>
                                                    <?php if($item['price'] > 0 && $item['price_old'] > 0) :?>
                                                        <p class="cart-product-price-old"><?=number_format($item['price_old']);?></p>
                                                        <p class="cart-product-price-sale">Giảm: <?=floor(100-($item['price']/$item['price_old'])*100)?>%</p></li>
                                                    <?php endif;?>
                                                <li class="cart-product-money "><?=number_format($item['subtotal'])?></li>
                                                <li class="cart-product-delete  text-center">
                                                    <a href="javascript:void(0)" onclick="updateCart('<?=$item['rowid']?>',0)" title="Xoá <?=@$item['name'];?> khỏi giỏ hàng?" class="lnk-cart-item-rem" data-record="<?=$item['rowid']?>"><i class="fa fa-trash-o"></i></a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div class="col checkout-footer">
                                <div class="row-item">
                                    <div class="checkout-footer-left col-480-12">
                                        <span class="buy-other"><a href="<?=base_url()?>" target="_parent" class="link-other-choice">Chọn thêm sản phẩm khác</a></span>
                                    </div>
                                    <div class="checkout-footer-right col-480-12 ">
                                        <div class="bill-row">
                                            <div class="text-right col-480-12 ">Tạm tính:</div>
                                            <div class="col text-bill col-480-12">
                                                <?=number_format($this->cart->total());?>  đ
                                            </div>
                                        </div>

                                        <div class="bill-row col-480-12 hidden">
                                            <div class="text-right col-480-12">Phí vận chuyển (tạm tính):</div>
                                        </div>
                                        <div class="bill-row hidden">
                                            <div class="col text-right col-480-12">
                                                <select style="" name="shipping" class="form-control input-sm" id="shipping" onchange="update_shipping(jQuery(this).val())">
                                                    <option value="0">--Chọn khu vực-- </option>
                                                    <?php foreach($ships as $ship) : ?>
                                                        <option value="<?=@$ship->id?>"><?=@$ship->name;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                            <div class="col text-bill col-480-12">
                                                <span id="ship_price">  0 đ</span>
                                            </div>
                                         </div>
                                        <div class="bill-row col-480-12 hidden">
                                            <div class="text-right hidden discount-money">Số tiên được giảm :</div>
                                            <div class="col text-bill price-code">
                                            </div>
                                        </div>
                                        <div class="bill-row code-coupon col-480-12 hidden">
                                            <div id="ctl00_pageBody_pnlCouponCode" class="input-code-coupon">
                                                <input name="coupon_code" type="text" id="coupon_code" class="txt-code-coupon" placeholder="Nhập mã giảm giá">
                                                <div>
                                                    <input type="button" name="check_code" value="Áp dụng" id="check_code" onclick="checkCoupon()" class="btn-code-coupon">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="thongbao"></div>
                                        <div class="bill-row total-order">
                                            <div class="text-right col-480-12">Tổng tiền:</div>
                                            <div class="col text-bill col-480-12">
                                                <span id="total_cart"><?=number_format($this->cart->total());?> đ</span>
                                                <input type="hidden" id="sub_total" value="<?=@$total_cart;?>" name="subtotal"/>
                                                <input type="hidden" name="coupon" id="value_coupone" value="0">
                                                <input type="hidden" name="price_shipping" id="price_shipping" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-item checkout-finish">
                                    <button class="checkout-btn" id="btn-checkout-pop" style="display: none" value="Đặt hàng"><i class="fa fa-shopping-cart"></i>Đặt hàng</button>
                                    <button class="checkout-btn checkout-submit" id="btn-checkout-first" value="Gửi đơn hàng"><i class="fa fa-shopping-cart"></i>Gửi đơn hàng</button>

                                </div>
                            </div>
                        </div>
                    </div>
                </aside>

                </form>
                <?php else :?>
                    <div class="col-md-8 col-lg-8">
                        <div class="no-product">
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                    <div class="icon-circle active animate scale text-center animated"><span class="icon icon-cart-2 small"></span></div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 no-tems-text"><br>
                                    <h3>Giỏ hàng trống</h3>
                                    Không có sản phẩm nào trong giỏ hàng của bạn.<br>
                                    Click <a href="<?=site_url();?>" style="color:red">vào đây</a> để tiếp tục mua hàng.
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </section>

    
<link href="<?=base_url('')?>assets/plugin/themes/0/bundle.min.css" rel="stylesheet">
<link href="<?=base_url('')?>assets/plugin/themes/bundle.min.css" rel="stylesheet">

