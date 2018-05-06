<div class="container">
    <div class="row_pc">
        <ul class="breadcrumb back_link">
            <li><a href="<?=base_url();?>" title="Trang chủ">Trang chủ</a></li>
            <li><a href="javascript:void(0)">Login</a></li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">

    <div class="row" />
        <div class="page_notify">
            <div class="box_login">
                <div class="hd_log">Đăng nhập</div>
                <div class="content_log">
                    <form id="loginform" class="form-horizontal" role="form"  method="post">
                        <div class="form_log1">
                            <span class="txt_log1">
                                * Số Điện Thoại 
                            </span>
                            <input type="text" name="username" id="username" placeholder="Nhập số điện thoại của bạn" class="validate[required] form-control input_log1">
                        </div>
                        <div class="clearfix"></div>

                        <div class="form_log1">
                            <span class="txt_log1">
                                * Mật khẩu
                            </span>
                            <input type="password" placeholder="Nhập mật khẩu" name="pass" id="pass" class="validate[required] form-control input_log1">
                        </div>

                        <div class="clearfix clearfix-10"></div>
                        <!-- <div class="check_lttdn">
                            <label><input type="radio" name="optradio">Lưu thông tin đăng nhập</label>
                        </div> -->
                        <div class="pull-right"><a href="<?=base_url('quen-mat-khau')?>" class="qmk_log">Quên mật khẩu?</a></div>

                        <div class="clearfix"></div>
                        <div class="text-center">
                        <input type="button" name="submit" id="btn_login" class="butt_login" style="cursor: pointer;" value="Đăng Nhập">
                        <!-- <div id="btn_login" class="butt_login" style="cursor: pointer;" >Đăng nhập</div></div> -->
                        <div class="clearfix"></div>

                        <!--<div class="text-center or_log">Hoặc</div>
                        <div class="text-center"><a href="" class="butt_logfb"><i class="fa fa-facebook"></i>Đăng nhập bằng facebook</a></div>
                        <div class="text-center"><a href="" class="butt_loggg"><i class="fa fa-google-plus"></i>Đăng nhập bằng Google</a></div>
                        <div class="clearfix"></div>
                        -->
                        <div class="pull-left"><a href="<?=base_url('register')?>" class="butt_dctk">Bạn chưa có tài khoản?</a></div>
                        <div class="pull-right pull_but_dkn"><a href="<?=base_url('register')?>" class="but_dkn">Đăng ký ngay</a></div>
                    </form><!-- End_Form -->

                </div>
            </div>
            <div class="clearfix clearfix-10"></div>
        </div>
    </div>
</div>
