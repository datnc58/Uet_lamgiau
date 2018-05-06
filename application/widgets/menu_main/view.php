<nav class="nav is-fixed" role="navigation">
   <div class="wrapper wrapper-flush">
      <div class="nav-container">
         <ul class="nav-menu menu clearfix">
            <?php if(count($menu_root)) : ?>
            <?php foreach ($menu_root as $key_r => $mr) : ?>
            <li class="menu-item <?php if(!empty($mr->menu_sub)): ?> has-dropdown<?php endif;?>">
               <a href="<?=base_url($mr->url);?>" class="menu-link ">
               <?=@$mr->name;?>
               </a>
               <?php if(!empty($mr->menu_sub)): ?>
               <ul class="nav-dropdown menu">
                  <?php $i=0; foreach($mr->menu_sub as $menu_sub) : $i++; ?>
                  <li class="menu-item">
                     <a href="<?=base_url($menu_sub->url);?>"><?=@$menu_sub->name;?></a>
                  </li>
                  <?php endforeach;?>
               </ul>
               <?php endif;?>
            </li>
            <?php endforeach;?>
            <?php endif;?>
         </ul>
      </div>
   </div>
</nav>