<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cat_news_home_widget extends MY_Widget
{
    // Nhận 2 biến truyền vào
    function index(){
        
		$this->load->model('f_homemodel');
		
		$data['menus_sukien'] = $this->f_homemodel->get_data('menu',array('position'=>'bottom2','parent_id'=>0,'lang' => $this->language),
               array('sort'=>'')
           );
		   
			 foreach ($data['menus_sukien'] as $key => $cat) {
				$data['menus_sukien'][$key]->news = $this->f_homemodel->getNewbyCateID($cat->id_cat,10,0);
			}
		
		//var_dump($data['menus_sukien']);;die;
	    $this->load->view('view',$data);
    }
}