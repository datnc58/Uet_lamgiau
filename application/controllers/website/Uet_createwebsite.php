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

    public function websiteAdvance(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/advance/index', $data);
        $this->LoadFooterWebsite();
    }

    public function websiteBasic(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/basic/index', $data);
        $this->LoadFooterWebsite();
    }

    public function select_header(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/select_header', $data);
        $this->LoadFooterWebsite();
    }

    public function select_content(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/select_content', $data);
        $this->LoadFooterWebsite();
    }

    public function select_footer(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/createWebsite/select_footer', $data);
        $this->LoadFooterWebsite();
    }



}