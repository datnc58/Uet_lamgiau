<script src="<?=base_url()?>assets/js/front_end/silde_new/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/silde_new/jquery.easing.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/front_end/silde_new/jquery.easy-ticker.js"></script>


<h2 class="tit_right_box"><a href="">Tin tức nổi bật</a></h2>

<div class="vticker" style="margin-bottom:50px;">
    <ul class="list_news_right">
        
         <?php foreach($news as $n) : ?>
                               
                                <li>
                                    <div class="box_news_right">
                                        <div class="img_news_right">
                                            <a  title="<?= ($n->title); ?>" href="<?= base_url($n->alias.'.html') ?>" class=""><img class="w_100" src="<?= base_url($n->image) ?>" style="height:50px;" alt="<?= ($n->title); ?>"/></a>
                                        </div>
                                        <h3 class="name_news_right"><a title="<?= ($n->title); ?>" href="<?= base_url($n->alias.'.html') ?>" class=""><?= ($n->title); ?></a></h3>
                                    </div>
                                </li>
                                <?php endforeach;?>
                                
                                
                                
        
    </ul>
</div>



<style type="text/css">

    .tit_right_box {
        font-size: 18px;
        background: #462e1f;
        font-weight: bold;
        color: #ffda54;
        text-transform: uppercase;
        border-bottom: 4px solid #ffda54;
        overflow: hidden;
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        margin-bottom: 0px;
        margin-top: 0px;
    }
    .tit_right_box a {
        color: #ffda54;
    }
    .list_news_right {
        background: #fff;
        overflow: hidden;
        padding: 12px 20px 10px 14px;
        width: 100%;
    }
    .list_news_right li {
        border-bottom: 1px dotted #2c2b2b;
        overflow: hidden;
        padding-bottom: 12px;
    }
    .box_news_right {
        padding: 0 20px 0 10px;
    }
    .img_news_right {
        display: inline-block;
        width: 85px;
        margin-right: 10px;
        float: left;
    }
    .img_news_right {
        height: 50px;
    }
    .w_100 {
        width: 100%;
    }
    .name_news_right {
        font-size: 12px;
        color: #000;
        margin-top: 0px;
        margin-bottom: 0px;
        padding-top: 10px;
    }
    .name_news_right a {
        color: #000;
        line-height: 18px;
    }
    .name_news_right a:hover {
        color: #ffda54;
    }
    .vticker{
        width: 100% !important;
    }

</style>

<script type="text/javascript">
    $(document).ready(function(){

        var dd = $('.vticker').easyTicker({
            direction: 'up',
            easing: 'easeInOutBack',
            speed: 'slow',
            interval: 2000,
            height: 'auto',
            visible: 5,
            mousePause: 0,
            controls: {
                up: '.up',
                down: '.down',
                toggle: '.toggle',
                stopText: 'Stop !!!'
            }
        }).data('easyTicker');

        cc = 1;
        $('.aa').click(function(){
            $('.vticker ul').append('<li>' + cc + ' Triangles can be made easily using CSS also without any images. This trick requires only div tags and some</li>');
            cc++;
        });

        $('.vis').click(function(){
            dd.options['visible'] = 3;

        });

        $('.visall').click(function(){
            dd.stop();
            dd.options['visible'] = 0 ;
            dd.start();
        });

    });
</script>



                 
                            
                            
                            

                     