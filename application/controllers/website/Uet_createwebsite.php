<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_createwebsite extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('website/f_websitemodel');
    }

    //index
    public function index()
    {
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/index', $data);
        $this->LoadFooterWebsite();
    }

    public function websiteAdvance($id){
        $data = array();
        $seo = array();
        $data['current_page'] = 'websiteAdvance';
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/advance/index', $data);
        $this->LoadFooterWebsite();
    }

    public function websiteBasic($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['current_page'] = 'websiteBasic';
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/basic/index', $data);
        $this->LoadFooterWebsite();
    }

    public function select_header($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/select_header', $data);
        $this->LoadFooterWebsite();
    }

    public function header($id){
        $data = array();
        $seo = array();
        $data['header'] = $this->f_websitemodel->get_data('uet_header', array(
            'id_website' => $id
        ));
        $data['id_web'] = $id;
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/header', $data);
        $this->LoadFooterWebsite();
    }


    public function select_content_top($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/select_content', $data);
        $this->LoadFooterWebsite();
    }

    public function content_top($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/content_top', $data);
        $this->LoadFooterWebsite();
    }

    public function left_content_top($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/left_content_top', $data);
        $this->LoadFooterWebsite();
    }

    public function mid_content_top($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/mid_content_top', $data);
        $this->LoadFooterWebsite();
    }

    //content_bottom

    public function select_content_bottom($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/select_content_bottom', $data);
        $this->LoadFooterWebsite();
    }

    public function content_bottom($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/content_bottom', $data);
        $this->LoadFooterWebsite();
    }

    public function left_content_bottom($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/left_content_bottom', $data);
        $this->LoadFooterWebsite();
    }

    public function mid_content_bottom($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/mid_content_bottom', $data);
        $this->LoadFooterWebsite();
    }


    //footer

    public function select_footer($id){
        $data = array();
        $seo = array();
        $data['id_web'] = $id;

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/select_footer', $data);
        $this->LoadFooterWebsite();
    }

    public function footer($id){
        $data = array();
        $seo = array();
        $data['footer'] = $this->f_websitemodel->get_data('uet_footer', array(
            'id_website' => $id
        ));
        $data['id_web'] = $id;
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/footer', $data);
        $this->LoadFooterWebsite();
    }



}