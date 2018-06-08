<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_createwebsite extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('website/f_websitemodel');
    }

    //index
    public function index(){
        $data = array();
        $seo = array();
        //lấy toàn bộ các site để kiểm tra
        $websiteall = $this->f_websitemodel->get_data('uet_createwebsite', array('process' => 1));

        if(isset($websiteall) && !empty($websiteall)){
            $data['website'] = $websiteall;
        }else{
            $data_insert = array(
                'create' => time(),
                'update' => time(),
                'process' => 1,
            );
            $this->f_websitemodel->Add('uet_createwebsite',$data_insert);
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/index', $data);
        $this->LoadFooterWebsite();
    }

    public function header(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['header'] = $this->f_websitemodel->get_data('uet_header');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/header', $data);
        $this->LoadFooterWebsite();
    }

    public function select_header(){
        $id = $_POST['id'];
        $data = array(
            'header' => $id
        );
        $this->f_websitemodel->Update_where('uet_createwebsite',array('process' => 1), $data);
        echo 1;
    }

    public function footer(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['footer'] = $this->f_websitemodel->get_data('uet_footer');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/footer', $data);
        $this->LoadFooterWebsite();
    }

    public function select_footer(){
        $id = $_POST['id'];
        $data = array(
            'footer' => $id
        );
        $this->f_websitemodel->Update_where('uet_createwebsite',array('process' => 1), $data);
        echo 1;
    }

    public function content(){
        $data = array();
        $seo = array();
        //lấy id website đang sinh

        $web = $this->f_websitemodel->getFirstRowWhere('uet_createwebsite', array('process' => 1));

        if($this->input->post('hoanthanh')){
            $content_detail = $this->input->post('content_detail');
            foreach($content_detail as $detail){
                $data_insert = array(
                    'id_content_detail' => $detail,
                    'id_website' => $web->id,
                );
                $this->f_websitemodel->Add('uet_createwebsite_content', $data_insert);
            }

            redirect('website/Uet_createwebsite/content_detail');
        }
        $data['content_detail'] = $this->f_websitemodel->get_data('uet_content_detail');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/content', $data);
        $this->LoadFooterWebsite();
    }

    public function content_detail(){
        $data = array();
        $seo = array();
        $web = $this->f_websitemodel->getFirstRowWhere('uet_createwebsite', array('process' => 1));
        $data['detail'] = $this->f_websitemodel->getContentWebsite($web->id);

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/content_detail', $data);
        $this->LoadFooterWebsite();
    }

    public function select_contentdetail(){
        $type = $_POST['type'];
        $id_content = $_POST['id_content'];
        if($type == 1){
            $this->load->view('website/create_website/content_detail/full.php');
        }else if($type == 2){
            $this->load->view('website/create_website/content_detail/left-mid.php');
        }else if($type == 3){
            $this->load->view('website/create_website/content_detail/left-mid-right.php');
        }else if($type == 4){
            $this->load->view('website/create_website/content_detail/mid-right.php');
        }
    }

}