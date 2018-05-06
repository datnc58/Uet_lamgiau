<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slide_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){

		$data = array();
        $data['slide_home'] = $this->system_model->get_data('images',array(
            'type' => 'slide',
        ),array('id' => 'desc'),null);
		//var_dump($data['slide_home']);die;
        $this->load->view('view',$data);
    }
    
}