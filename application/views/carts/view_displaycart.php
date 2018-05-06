 <div class="panel-heading fixgiohang">
 <a href="<?=base_url();?>" target="_parent" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
 <h5> <i class="fa fa-shopping-cart"></i>&nbsp;Đơn hàng (<?=$this->cart->total_items();?> Sản phẩm)</h5></div>
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
                                    <li class="col cart-product-money">Thành tiền (đ)</li>
                                </ul>
                                <ul class="group-cart-product-item" id="cart-list">
                                    <?php foreach($items as $item) : ?>
                                        <li class="cart-product-item" data-record-id="<?=$item['rowid']?>">
                                            <ul>
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
                                    <div class="checkout-footer-right col-480-12">
                                        <div class="bill-row">
                                            <div class="text-right col-480-12">Tạm tính:</div>
                                            <div class="col text-bill col-480-12">
                                                <?=number_format($this->cart->total());?>  đ
                                                <input type="hidden" name="ctl00$pageBody$hdnSubTotal" id="ctl00_pageBody_hdnSubTotal" value="13926000">
                                            </div>
                                        </div>

                                        <div class="bill-row">
                                            <div class="text-right col-480-12">Phí vận chuyển (tạm tính):</div>
                                        </div>
                                        <div class="bill-row">
                                            <div class="col text-right col-480-12">
                                                <select style="" name="shipping" class="form-control input-sm" id="shipping" onchange="update_shipping(jQuery(this).val())">
                                                    <option value="0">--Chọn khu vực-- </option>
                                                  
                                                </select>
                                            </div>
                                            <div class="col text-bill col-480-12">
                                                <span id="ship_price">  0 đ</span>
                                            </div>
                                         </div>
                                        <div class="bill-row col-480-12">
                                            <div class="text-right hidden discount-money">Số tiên được giảm :</div>
                                            <div class="col text-bill price-code">
                                            </div>
                                        </div>
                                        <div class="bill-row code-coupon col-480-12">
                                            <div id="ctl00_pageBody_pnlCouponCode" class="input-code-coupon">
                                                <input type="hidden" name="coupon" id="remove-coupone" value="0">
                                                <input name="coupon_code" type="text" id="coupon_code" class="txt-code-coupon" placeholder="Nhập mã giảm giá">
                                                <div>
                                                    <input type="button" name="check_code" value="Áp dụng" id="check_code" onclick="checkCoupon()" class="btn-code-coupon">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="thongbao"></div>
                                        <div id="thongbao_shipping"></div>
                                        <div class="bill-row total-order">
                                            <div class="text-right col-480-12">Tổng tiền:</div>
                                            <div class="col text-bill col-480-12">
                                                <span id="total_cart"><?=number_format($this->cart->total());?> đ</span>
                                                <input hidden="" id="sub_total" value="<?=@$this->cart->total()?>" name="subtotal"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row-item checkout-finish col-480-12 text-center">
                                    <button class="checkout-btn" id="btn-checkout-pop" style="display: none" value="Đặt hàng"><i class="fa fa-shopping-cart"></i>Đặt hàng</button>
                                    <button class="checkout-btn checkout-submit" id="btn-checkout-first" value="Gửi đơn hàng"><i class="fa fa-shopping-cart"></i>Gửi đơn hàng</button>

                                </div>
                            </div>
                        </div>