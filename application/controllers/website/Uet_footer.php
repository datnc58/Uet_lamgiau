<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_footer extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    //index
    public function index()
    {
        $data = array();
        $seo = array();

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/footer/index', $data);
        $this->LoadFooterWebsite();
    }
}