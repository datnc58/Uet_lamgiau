<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Công ty QTS - Hệ thống quản trị website </title>


    <link href="<?=base_url()?>assets/login/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/login/css/font-awesome.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/login/css/style00.css" rel="stylesheet"/>

    <script type="text/javascript" src="<?=base_url()?>assets/login/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/login/js/bootstrap.min.js"></script>

</head>
<body>

<article id="body_login">

    <form action="" method="post">
        <section class="loginBox posR ovh">
            <header class="txtC ovh txtB">
                <a href="#" class="logo dpib ovh" tabindex="-1">
                    <img src="<?=base_url()?>assets/login/img/logo.png" alt="">
                </a>
            </header>
            <section class="loginFr ovh vi-VN" style="width: 100%">
                <h3>Đăng nhập</h3>
                <div class="validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
                <div class="mb15 posR">
                    <label>Tên đăng nhập</label>
                    <input data-val="true" data-val-required="Nhập tên đăng nhập!" id="email" name="username" tabindex="1" type="text" value="">
                </div>
                <div class="posR mb15">
                    <label>Mật khẩu</label>
                    <input data-val="true" data-val-required="Nhập mật khẩu!" id="pass" name="pass" tabindex="2" type="password" value="">
                </div>
                <aside class="ovh remb">
                    <label class="txtN mb0 quickaction_chk">
                        <input checked="checked" data-val="true" data-val-required="The Ghi nhớ field is required." id="RememberMe" name="RememberMe" tabindex="4" type="checkbox" value="true">
                        <input name="RememberMe" type="hidden" value="false">
                        <span></span>
                        Duy trì đăng nhập
                    </label>
                </aside>

                <section class="lgBtn">
                    <span class="loginBtn">
                        <i class="fa fa-list-alt"></i>
                        <input tabindex="5" name="quan-ly" type="submit" value="Đăng nhập">
                    </span>
                    <span class="loginBtn loginBtnSale">
                       
                       
                    </span>
                </section>
            </section>

            <div class="other" style="color:#fff; font-size:15px;">
                <strong><i class="fa fa-phone-square"></i> Hỗ trợ: (024) 3785 8656 - 0975 195 112</strong> <br>
              
                <a href="">Quên mật khẩu</a>
            </div>
           

        </section>
    </form>
</article>

</body>
</html>
