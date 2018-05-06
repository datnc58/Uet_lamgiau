<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_left_two_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        $data['cate_news'] = $this->system_model->getFirstRowWhere('news_category',array(
            'lang' => $this->language,
            'button_view_right' => 1,
        ));
        if (count($data['cate_news'])) {
            $data['news'] = $this->system_model->getNewsByCategory($data['cate_news']->id,array(
            //'home' => 1,
            'news.lang' => $this->language,
            'news.home' => 1,
            ),5,0);
        }
	    $this->load->view('view',$data);
    }
}