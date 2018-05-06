<!DOCTYPE html>
<html xmlns:fb='http://www.facebook.com/2008/fbml'>
<head>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <title><?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?></title>
    <link rel="shortcut icon" href="<?= base_url(@$this->option->favicon ) ?>"/>
    <meta name='description'
          content='<?= isset($seo['description']) ? $seo['description'] : @$this->option->site_description; ?>'/>
    <meta name='keywords'
          content='<?= isset($seo['keyword']) && $seo['keyword'] != '' ? $seo['keyword'] : $this->option->site_keyword; ?>'/>
    <meta name='robots' content='index,follow'/>
    <meta name='revisit-after' content='1 days'/>
    <meta http-equiv='content-language' content='vi'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="fb:app_id" content="126821687974504" />
    <meta property="fb:admins" content="100006472503973"/>

    <link rel="canonical" href="<?=current_url();?>" />
    <!--    for facebook-->
    <meta property="og:title"
          content="<?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?>"/>
    <meta property="og:site_name" content="<?= @$this->option->site_name; ?>"/>
    <meta property="og:url" content="<?= current_url(); ?>"/>
    <meta property="og:description"
          content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
    <meta property="og:type" content="<?= @$seo['type']; ?>"/>
    <meta property="og:image" content="<?= isset($seo['image']) && @$seo['image'] != '' ? base_url(@$seo['image']) : @$this->option->site_logo ; ?>"/>

    <meta property="og:locale" content="vi_VN"/>

    <!-- for Twitter -->
    <meta name="twitter:card"
          content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
    <meta name="twitter:title"
          content="<?= isset($seo['title']) && $seo['title'] != '' ? $seo['title'] : @$this->option->site_name; ?>"/>
    <meta name="twitter:description"
          content="<?= isset($seo['description']) && $seo['description'] != '' ? $seo['description'] : @$this->option->site_description; ?>"/>
    <meta name="twitter:image"
          content="<?= isset($seo['image']) && $seo['image'] != '' ? base_url($seo['image']) : base_url(@$this->option->site_logo); ?>"/>

    <link href="<?=base_url()?>assets/css/front_end/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/front_end/font-awesome.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/front_end/owl.carousel2.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/front_end/owl.theme2.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/front_end/search.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/front_end/resetDefalt.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/front_end/setmedia.css" rel="stylesheet"/>
    <link href="<?=base_url()?>assets/css/front_end/style00.css" rel="stylesheet"/>



    <script type="text/javascript" src="<?=base_url()?>assets/js/front_end/jquery.2.1.1.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/front_end/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/front_end/menu-2.js"></script>
    <script type="text/javascript" src="<?= base_url()?>/assets/js/jquery.keyframes.min.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url()?>assets/js/front_end/style-img.js"></script> -->
     <script type="text/javascript" src="<?=site_url()?>assets/js/init.js"></script>
    <input type="hidden" value="<?= base_url()?>" id="base_url" name="">
</head>

<body id="homepage">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=126821687974504";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- begin container_header --><!-- end container_header -->


<!-- begin header -->

<header>
    <!--menu-mobile-->
    <div class="menu_mb butt_mobile visible-xs visible-sm clearfix">
        <button class="nav-toggle">
            <div class="icon-menu">
                <span class="line line-1"></span>
                <span class="line line-2"></span>
                <span class="line line-3"></span>
            </div>
        </button>
        <div class="text-center style_lg_mb">
            <a href="<?= base_url();?>"><img class="img_logo_mb" src="<?= base_url($this->option->site_logo);?>" alt=""/></a>
            <div class="pull-right cart-mb hidden-sm">
                <ul class="ul_right_head">
                    <li>
                        <a href="<?= base_url('gio-hang')?>">
                            <div class="img_right_head img_cart">
                                <img src="<?= base_url()?>img/cart.png" alt=""/>
                                <p><span><?= $count;?></span></p>
                            </div>
                            <div class="text_right_head hidden-xs">
                                Giỏ hàng
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
    <div class="clearfix clearfix-60 visible-sm visible-xs"></div>

    <!-- end-menu_mb -->

    <section class="qts_head_top">
        <div class="container">
            <div class="row_pc">
                <div class="full_head_top">
                    <div class="left_head_top">
                        <p><?= $this->option->timeopen;?></p>
                    </div>
                    <div class="right_head_top hidden-xs">
                    <ul class="ul_head_top">
                        <?php if(count($menu_top_root)) : ?>
                            <?php foreach ($menu_top_root as $key_r => $mr) : ?>
                                <li><a href="<?= base_url($mr->url)?>" title="<?=@$mr->name;?>" class="bf_tag"><?=@$mr->name;?></a></li>
                            <?php endforeach;?>
                        <?php endif;?>

                      
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="qts_head_mid">
        <div class="container">
            <div class="row_pc">
                <div class="row">
                    <div class="col-lg-3 col-md-2 hidden-sm hidden-xs">
                        <div class="logo_pc">
                            <a href="<?= base_url();?>"><img src="<?= base_url($this->option->site_logo);?>" alt=""/></a>
                        </div>
                    </div>
                    <div class="col-lg-543 col-md-6 col-sm-6 col-xs-12">
                        <div class="search_head_mid">
                            <form class="form_search" action="<?= base_url('search')?>">
                                <div class="input-group input_gr">
                                    <input type="text" class="form-control" name="s" placeholder="Tìm kiếm sản phẩm...">
                                        <span class="input-group-btn">
                                        <button class="btn btn-default btn_search" type="submit"><i class="fa fa-search"></i></button>
                                        </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-431 col-md-4 col-sm-6 col-xs-12">
                        <div class="right_head hidden-xs">
                            <ul class="ul_right_head">
                                <li>
                                    <div class="img_right_head img_phone">
                                        <a href="<?= $this->option->hotline1;?>"><img src="<?= base_url();?>img/icon_phone.png" alt=""/></a>
                                    </div>
                                    <div class="text_right_head text_right_head1">
                                        <p><a href="tel:<?= $this->option->hotline1;?>"><strong><?= $this->option->hotline1;?></strong></a></p>
                                      
                                    </div>
                                </li>
                                <li>
                                    <div class="img_right_head img_cart ">
                                        <a href="<?= base_url('gio-hang');?>"> <img src="<?= base_url();?>img/cart.png" alt=""/></a>
                                        <p><span><?= $count; ?></span></p>
                                    </div>
                                    <div class="text_right_head text_right_head2">
                                        <p><a href="<?= base_url('gio-hang');?>"><strong>Giỏ hàng</strong></a></p>
                                        <p class="pd_top"><?= $count; ?> Sản phẩm</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--========menu=============-->
    <section class="qts_head_bot">
        <div class="container">
            <div class="row_pc">
               
                <div class="col-lg-980 col-md-9">
                    <div class="row">
                        <div class="menu_main">
                            <nav class="nav is-fixed" role="navigation">
                                <div class="wrapper wrapper-flush">
                                    <div class="nav-container">
<ul class="nav-menu menu clearfix">
    <li class="menu-item active ">
        <a href="<?= base_url(); ?>" class="menu-link is-active">Trang chủ</a>
    </li>
    <?php if (count($menu_main_root)) {
                                            foreach ($menu_main_root as $key => $root) { ?>
                                                <li class="menu-item has-dropdown">
                                                            <a href="<?= base_url($root->url)?>" class="menu-link "><?= $root->name?></a>
                                                            <?php if (count($root->menu_sub)): ?>
                                                                <ul class="nav-dropdown menu">
                                                                <?php foreach ($root->menu_sub as $key => $menu_sub) { ?>
                                                                     <li class="menu-item  has-dropdown">
                                                                        <a href="<?= base_url($menu_sub->url)?>" class="menu-link"><?= $menu_sub->name?></a>
                                                                    </li>
                                                                <?php } ?>
                                                                </ul>
                                                            <?php endif ?>
                                                        </li>
                                        <?php    }
                                        } ?>
</ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</header>

<!-- end header -->

<div class="clearfix"></div>


<!-- begin container_body --><div class='container'><div class='row'><!-- end container_body -->
