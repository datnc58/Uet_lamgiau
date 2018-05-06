<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_header extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('website/f_headermodel');
    }

    //index
    public function index()
    {
        $data = array();
        $seo = array();

        // get list data hearder
        $data['headers'] = $this->f_headermodel->getListHeader();
        // foreach ($data['headers'] as $val) {
        //     $filename = $val->url . '/image.png';
        //     $handle = fopen($filename, "rb");
        //     $contents = fread($handle, filesize($filename));
        //     fclose($handle);
        //     header("content-type: image/jpeg");
        //     echo $contents;die;
        // }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/header/index', $data);
        $this->LoadFooterWebsite();
    }
}