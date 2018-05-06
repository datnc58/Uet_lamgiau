<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_left_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
		$data = array();
        /*begin content*/$data['danhmuc']=$this->load->widget('danhmuc');$data['support']=$this->load->widget('support');$data['counter']=$this->load->widget('counter');$data['fanpage']=$this->load->widget('fanpage');/*end content*/
		$this->load->view('common/left', $data);
    }
}