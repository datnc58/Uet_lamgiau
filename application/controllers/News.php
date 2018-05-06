<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_newsmodel');
        $this->load->library('pagination');
    }
    protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination phantrang'>",
        'full_tag_close'=>"</ul>",
        'first_link' => 'Trang đầu',
        'last_link' => 'Trang cuối',
        'num_links' => 2,
        'num_tag_open'=>'<li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",
        'cur_tag_close'=>"<span class='sr-only'></span></a></li>",
        'next_tag_open'=>"<li>",
        'next_tagl_close'=>"</li>",
        'prev_tag_open'=>"<li>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tagl_close'=>"</li>",
    );
    //News by category
    public function new_bycategory($alias){
        $this->Check_alias($alias);
        $data = array();
        $data['cate_current'] = $current = $this->f_newsmodel->getFirstRowWhere('news_category',array('alias'=>$alias));
        //if(empty($data['cate_current'])){ redirect(base_url('404_override')); }
        $config['base_url'] = base_url('danh-muc-tin/'.$alias.'.html');
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['total_rows'] = $this->f_newsmodel->count_NewbyCate($current->id);
        $config['per_page'] = 16; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $config=array_merge($config,$this->pagination_config);
        $this->pagination->initialize($config);
        $data['list'] = $this->f_newsmodel->getNewsByCategory($current->id,$config['per_page'], $this->input->get('per_page'));
         $data['cate'] = $this->system_model->get_data('news_category',array(
            'lang' => $this->language
        ),array());
        $data['home_left'] = $this->load->widget('home_left');
        $data['doitac'] = $this->load->widget('doitac');
        $seo=array('title'=>@$data['cate_current']->title_seo==''?$data['cate_current']->name:$data['cate_current']->title_seo,
            'description'=>@$data['cate_current']->description_seo,
            'keyword'=>@$data['cate_current']->keyword_seo,
            'image'=>@$data['cate_current']->image,
            'type'=>'article');
        $this->LoadHeader(null,$seo,true);
        $this->load->view('news/news_category',@$data);
        $this->LoadFooter();
    }
    public function detail($alias){
        $this->Check_alias($alias);
        $data['news'] = $new = $this->f_newsmodel->get_data('news',array(
            'alias'=>$alias,
        ),array(),true);

        $data['cate_current'] = $current = $this->f_newsmodel->get_data('news_category',array(
                'id'=>$data['news']->category_id),
            array(),true);
        $data['cate']=$this->f_newsmodel->get_data('news_category',array(
            'lang' => $this->language
        ));
        if(!$this->session->userdata('session_'.$new->id)){
            $this->session->set_userdata('session_'.$new->id,1);
            $view = 1;
        }
        else{
            $view = 0;
        }
        $view = $new->view + $view;
        $this->f_newsmodel->Update_where('news',array('id' => $new->id),array('view' => $view));

        $data['new_same'] = $this->f_newsmodel->getSimilar($data['cate_current']->id,$data['news']->id,10,0);
        $view = 'news/detail';
        $data['home_left'] = $this->load->widget('home_left');
        $data['doitac'] = $this->load->widget('doitac');
        $seo=array('title'=>@$data['news']->title_seo==''?$data['news']->title:$data['news']->title_seo,
            'description'=>@$data['news']->description_seo,
            'keyword'=>@$data['news']->keyword_seo,
            'image'=>@$data['news']->image,
            'type'=>'article');
        $this->LoadHeader(null,$seo,true);
        $this->load->view($view,$data);
        $this->LoadFooter();
    }
    //News by category
}