<div class="head_mid hidden-xs">
   <ul class="head_ul_mid">
    <?php if(count($menu_root)) : ?>
        <?php foreach ($menu_root as $key_r => $mr) : ?>
            <li>
                <a href="<?= base_url($mr->url)?>">
                    <div class="img_mid_head_center">
                       <img src="<?= base_url($mr->image)?>" alt=""/>
                    </div>
                    <div class="text_img_mid_head_center">
                       <?=@$mr->name;?>
                    </div>
                </a>
            </li>
        <?php endforeach;?>
    <?php endif;?>
   </ul>
</div>