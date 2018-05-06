<div class="content_right">
    <div class="cleafix-20"></div>
    <div class="title">
        thống kê truy cập
    </div>
    <div class="cover_connect">

        <div class="clearfix-15 clearfix"></div>
        <div class="text_connect">
            <div><span><img src="http://hangxachtaychoban.com/assets/css/img/icon8.png" alt=""> Hôm nay</span><?php echo @$this->visits_today; ?></div>
            <div><span><img src="http://hangxachtaychoban.com/assets/css/img/icon10.png" alt=""> Hôm qua</span><?php echo @$this->visits_yesterday ?></div>
            <div><span><img src="http://hangxachtaychoban.com/assets/css/img/icon8.png" alt=""> Trong tuần</span><?php echo @$this->visits_last_week; ?></div>
            <div><span><img src="http://hangxachtaychoban.com/assets/css/img/icon9.png" alt=""> Tổng lượt truy cập</span><?php echo @$this->visits_total; ?></div>

        </div>
        <div class="clearfix-10 clearfix"></div>
        <div class="text-center">
            <p>Số người đang online: <?=@online();?></p>
            <p><img src="http://hangxachtaychoban.com/assets/css/img/icon11.png" alt=""><span>Online Counter</span></p>
        </div>
    </div>
</div>