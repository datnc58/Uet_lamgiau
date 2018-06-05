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
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
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

    public function footer(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['footer'] = $this->f_websitemodel->get_data('uet_footer');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/footer', $data);
        $this->LoadFooterWebsite();
    }

    public function content(){
        $data = array();
        $seo = array();
        $data['content_detail'] = $this->f_websitemodel->get_data('uet_content_detail');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/content', $data);
        $this->LoadFooterWebsite();
    }

}