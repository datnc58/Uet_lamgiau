<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fillter_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_productmodel');
		
		$data = array();
		
		 $data['khoanggia'] = $this->f_productmodel->get_data('product_khoanggia',array(
            'lang' => $this->language
        ),array('sort'=>'sort'));
		
			//thuong hieu
		$data['brands'] = $this->f_productmodel->get_data('product_brand',array(
				'lang' => $this->language
			),array('sort'=>'sort'));
			
		$data['pfilters'] = $this->f_productmodel->get_data('khoanggia',null,array(
				'to_price' => '',
				 'lang' => $this->language
			));
			
		$data['hangsxs'] = $this->f_productmodel->get_data('product_hangsx',array(
				'lang' => $this->language
			));
			
		$data['mausac'] = $this->f_productmodel->get_data('product_mausac',array(
				'lang' => $this->language
			),array('sort'=>'sort'));
		$data['groups'] = $this->f_productmodel->get_data('group_attribute',array(
            'lang' => $this->language
        ),array('sort'=>''));
		$data['province'] = $this->f_productmodel->get_data('province',array(
        ));
		$this->load->view('view', $data);
    }
}