<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_footer extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('website/f_footermodel');
    }

    //index
    public function index()
    {
        $data = array();
        $seo = array();

        // get list data footer
        $data['footers'] = $this->f_footermodel->getListFooter();

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/footer/index', $data);
        $this->LoadFooterWebsite();
    }
}