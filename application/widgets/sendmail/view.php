<div class="clearix clearfix-30"></div>
<div class="dangky">
    <h2 class="tit_dk"><span>Đăng kí nhận email</span></h2>
    <div class="box_mail">
        <div class="txt_mail">
            Hãy đăng ký email của bạn cho chúng tôi để nhận nhiều thông tin và sự kiện từ chúng tôi
        </div>
        <form class="validate input_dknkm" action="<?= base_url('contact/add_email')?>" method="post">
            <input type="text" name="email" class="validate[required,custom[email]] form-control" placeholder="Nhập email..">
            <button class="btn btn-warning" type="submit"><?=lang('register');?></button>
        </form>
    </div>
</div>