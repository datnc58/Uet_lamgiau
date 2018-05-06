<div class="sidebar"> 
    <div class="content_right">
        <h2 class="title">
                                <span>Hỗ trợ trực tuyến</span>
                            </h2>
    <div class="content-online-support clearfix">
        

        <div class="hotline-sp">
            <a href="" title=""><?= $this->option->hotline1;?></a>
        </div>
    </div>
    <ul class="box-online-support">
        <?php if (count($supports)) {
        foreach ($supports as $key => $support) { ?>
        <li>
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-2">
                    <a href="" title=""><img class="" src="<?= base_url('img/zalo.png')?>" alt=""/></a>
                    <div class="clearfix-10"></div>
                    <a href="" title=""><img class="" src="<?= base_url('img/skype.png')?>" alt=""/></a>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-10">
                    <div class="name-sp">
                        <?= $support->name;?>
                    </div>
                    <div class="phone-number">
                        <a href="tel:0166.7272.072" title=""><?= $support->phone;?></a>
                    </div>
                    <div class="mail-sp">
                        <?= $support->email;?>
                    </div>
                </div>
            </div>
        </li>
        <?php    }
        } ?>

    </ul>
</div>
</div>
