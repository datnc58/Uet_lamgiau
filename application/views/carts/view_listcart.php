<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    <!-- Modal content-->
        <div class="modal-content fixgiohang">
            <div class="panel panel-default giohangfix" id="cart-content">
                <div class="panel-heading">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h5> <i class="fa fa-shopping-cart"></i>&nbsp;Đơn hàng (<?=$count;?> Sản phẩm)</h5>
                </div>
                <div class="panel-body " id="cart-content">
                    <div class="col checkout-cart-list ">
                        <div style="display: none!important">
                            <input type="hidden" name="ctl00$pageBody$hdnQty" id="ctl00_pageBody_hdnQty">
                            <input type="submit" name="ctl00$pageBody$btnSave" value="" id="ctl00_pageBody_btnSave">
                        </div>
                        <ul class="checkout-cart-title">
                            <li class="col cart-product-name">Sản phẩm</li>
                            <li class="col cart-product-count">Số lượng</li>
                            <li class="col cart-product-price">Đơn giá (đ)</li>
                            <li class="col cart-product-money">Thành tiền (đ)</li>
                        </ul>
                        <ul class="group-cart-product-item">
                            <?php foreach($items as $item) : ?>
                            <li class="cart-product-item" data-record-id="<?=$item['rowid']?>">
                                <ul>
                                    <li class="cart-product-name ">
                                        <span class="col cart-product-images">
                                        <img src="<?=base_url('upload/img/products/'.$item['pro_dir'].'/thumbnail_2_'.$item['image']);?>">
                                        </span>
                                        <span class="cart-product-info">
                                            <p class="cart-product-title">
                                                <a href="<?=site_url($item['alias'])?>"><?=@$item['name'];?></a>
                                            </p>
                                        </span>
                                    </li>
                                    <li class="cart-product-count "><span class="add-number-cart">
                                        <span class="ui-spinner ui-widget ui-widget-content ui-corner-all">
                                        <input type="text" class="txtQty-cart ui-spinner-input" id="qty-<?=$item['rowid']?>" title="Thay đổi số lượng nếu bạn muốn" placeholder="Số lượng" name="qty" data-record="<?=$item['rowid']?>" value="<?=$item['qty']?>" aria-valuemin="0" aria-valuemax="1000" aria-valuenow="4" autocomplete="off" role="spinbutton">
                                        <a class="ui-spinner-button ui-spinner-up ui-corner-tr" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-n" data-bind="<?=$item['rowid']?>" onclick="upQuantityP($(this))">▲</span></a><a class="ui-spinner-button ui-spinner-down ui-corner-br" tabindex="-1"><span class="ui-icon ui-icon-triangle-1-s" data-bind="<?=$item['rowid']?>" onclick="downQuantiyP($(this))">▼</span></a></span></span>
                                    </li>
                                    <li class="cart-product-price ">
                                        <p class="cart-product-price-meta"><?=number_format($item['price']);?></p>
                                        <?php if($item['price'] > 0 && $item['price_old'] > 0) :?>
                                        <p class="cart-product-price-old"><?=number_format($item['price_old']);?></p>
                                        <p class="cart-product-price-sale">Giảm: <?=floor(100-($item['price']/$item['price_old'])*100)?>%</p>
                                    </li>
                                    <?php endif;?>
                                    <li class="cart-product-money "><?=number_format($item['subtotal'])?></li>
                                    <li class="cart-product-delete  text-center">
                                        <a href="javascript:void(0)" onclick="updateCartP('<?=$item['rowid']?>',0)" title="Xoá Bồn massage chân Beurer FB-50 khỏi giỏ hàng?" class="lnk-cart-item-rem" data-record="<?=$item['rowid']?>"><i class="fa fa-trash-o"></i></a>
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
                                <div class="bill-row hidden">
                                    <div class="text-right">Phí vận chuyển (tạm tính):</div>
                                    <div class="col text-bill">
                                        Miễn phí
                                        <input type="hidden" name="ctl00$pageBody$hdnShipFee" id="ctl00_pageBody_hdnShipFee" value="0">
                                    </div>
                                </div>
                                <div class="bill-row">
                                    <div class="text-right hidden discount-money col-480-12">Số tiên được giảm :</div>
                                    <div class="col text-bill price-code">
                                    </div>
                                </div>
                                <div class="bill-row total-order col-480-12">
                                    <div class="text-right col-480-12">Tổng tiền:</div>
                                    <div class="col text-bill col-480-12">
                                        <span id="total_cart"><?=number_format($this->cart->total());?> đ</span>
                                        <input type="hidden" name="ctl00$pageBody$hdnTotal" id="ctl00_pageBody_hdnTotal" value="-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-item checkout-finish text-center">
                            <a class="checkout-btn" href="<?=base_url('shipping')?>" id="btn-checkout-pop"><i class="fa fa-shopping-cart"></i>Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="<?=base_url('')?>assets/plugin/themes/0/bundle.min.css" rel="stylesheet">
<link href="<?=base_url('')?>assets/plugin/themes/bundle.min.css" rel="stylesheet">
<style>
.modal-backdrop.fade.in {
    display: none !important;
}
</style>