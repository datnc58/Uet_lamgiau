    <div class="clearfix"></div>
    <div class="banner">
        <div class="banner_cate">
            <div class="container">
                <div class="row_pc">
                    <div class="sub_bn_cate">
                        <div class="tit_bn_cate pull-left"><h1>Giỏ hàng của bạn</h1></div>
                        <div class="back_link pull-right">
                            <ul>
                                <li><a href="<?=base_url()?>"><?=lang('home');?></a></li>
                                <li><a href="">Giỏ hàng của bạn</a></li>

                            </ul>
                        </div>
                        <div class="clearfix clearfix-5"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearix clearfix-30"></div>
    <section class="checkout-cart-index">
        <div class="container">
            <div class="row">
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <div class="empty-modal">
                        <div class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a href="<?=base_url();?>" target="_parent" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></a>
                                        <h4 class="modal-title"><b>Chưa có sản phẩm nào trong giỏ hàng của bạn.</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <section class="no-product">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-4">
                                                    <div class="icon-circle active animate scale text-center animated"><span class="fa fa-shopping-cart" style="font-size: 36px;margin-top:25px;"></span></div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 no-tems-text"><br>
                                                    <h3>Giỏ hàng trống</h3>
                                                    Không có sản phẩm nào trong giỏ hàng của bạn.<br>
                                                </div>
                                            </div></section>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="<?=base_url()?>" target="_parent" class="btn btn-primary link-other-choice" id="btn-continue">Tiếp tục mua sắm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>


<style>
    .empty-modal .modal {
        position: relative;
        z-index: 1;
        display: block;
    }
</style>