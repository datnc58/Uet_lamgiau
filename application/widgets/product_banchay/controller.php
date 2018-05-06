<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_banchay_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		//san pham mới	
         $data['pros'] = $this->f_homemodel->get_products(array(
            'product.coupon' => 1,
            'product.lang' => $this->language
        ),12,0);
		//var_dump($data['pros']);die;
	    $this->load->view('view',$data);
    }
}