<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pages extends MY_Controller
    {

        function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
        }
		public function page_content($alias){
			$data = array();
			$data['page']=$this->system_model->get_data('staticpage',array(
				'alias'=>$alias,
				'lang' => $this->language
			),array(),true);
            $data['home_left'] = $this->load->widget('home_left');
            $data['doitac'] = $this->load->widget('doitac');
             $seo=array('title'=>@$data['page']->title_seo==''?$data['page']->name:$data['page']->title_seo,
            'description'=>@$data['page']->description_seo,
            'keyword'=>@$data['page']->keyword_seo,
            'image'=>@$data['page']->image,
            'type'=>'page');
			$this->LoadHeader(null,$seo,true);
			$this->load->view('page/view_page',$data);
			$this->LoadFooter();
		}
    }