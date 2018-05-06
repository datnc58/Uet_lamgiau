<article class="home-content">
     
     <!-- begin banner -->
     <section class="sc-banner">
        <div class="container">
            <div class="row m-50">
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs p50">
                    <div class="danhmuc">
                        <h2 class="tit-dm"><div class="tit-icon"><span></span></div>  Danh mục sản phẩm</h2>
                        <ul class="as-menu">
                            
                           <?php if (count($cate_all)) { 

                                foreach ($cate_all as $key => $all) { ?> 
                            <li class="dropdown">
                                <a title="<?= $all->name?>" href="<?= base_url('danh-muc/'.$all->alias.'.html')?>"><img alt="<?= $all->name?>" src="<?=base_url('img/i-con.png');?>"><?= $all->name?></a>
                                <ul class="dropdown-content">
                                   
                                   <?php if (count($all->cat_sub)) {

                                        foreach ($all->cat_sub as $key => $cat_sub) { ?>
                                        
                                    <li class="dropdown">
                                        <a href="<?= base_url('danh-muc/'.$cat_sub->alias.'.html')?>"><img alt="<?= $cat_sub->name?>" src="<?= base_url()?>img/i-dm-child.png"><?= $cat_sub->name?></a>
                                        
                                    </li>
                                    <?php   } } ?>
                                    
                                    
                                </ul>
                            </li>
                              <?php    }

                            } ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p50 ">
                    <div class="slider_main owl-carousel">
                        <?php foreach($slides as $slide) {?>
                        <div class="item">
                            <a href="<?=@$slide->url;?>"><img src="<?=base_url(@$slide->image);?>"></a>
                        </div>
                        <?php } ?>
                        
                    </div>
                    <div class="bannerBottom">
                        <div class="clb10"> </div>
                        <div class="row m-50">
                        <?php foreach($qc_left as $n) {?>
                            <div class="col-md-6 col-sm-6 col-xs-12 p50">
                                
                                <div class="image imageHover">
                                    <a href="<?=@$n->url;?>"><img src="<?=base_url(@$n->image);?>" alt="" class="w1"></a>
                                </div>
                               
                            </div>
                             <?php } ?>
                           
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- end banner -->
    
</article>




