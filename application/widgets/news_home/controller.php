<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        $data['cate_news'] = $this->system_model->getFirstRowWhere('news_category',array(
            'lang' => $this->language,
            'home' => 1,
        )); 
        $data['news'] = $this->system_model->getNewsByCategory($data['cate_news']->id,array(
                    //'home' => 1,
            'news.lang' => $this->language,
            'news.home' => 1,
        ),4,0);
        $data['cate_news_2'] = $this->system_model->get_data('news_category',array(
            'lang' => $this->language,
            'home' => 1,
        ));

        
        if (count($data['cate_news_2'])) {
            foreach ($data['cate_news_2']  as $key => $cate_news) {
               $data['cate_news_2'][$key]->news = $this->system_model->getNewsByCategory($cate_news->id,array(
                    //'home' => 1,
                'news.lang' => $this->language,
                'news.home' => 1,
            ),4,0);
           }
           
           //var_dump($data['cate_news']);die;
       }

        //du an noi bat
       $data['news_hot'] = $this->system_model->get_data('news',array(
        'lang' => $this->language,
        'hot' => 1,
    ));


       $this->load->view('view',$data);
   }
}