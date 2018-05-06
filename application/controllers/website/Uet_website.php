<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_website extends MY_Controller{

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
        $this->load->view('website/website/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_website($id = null){
        $data = array(
            'id_website' => $id
        );
        $seo = array();
        $data['website'] = $this->f_websitemodel->getItemByID('uet_website',$id);
//        echo "<pre>";
//        var_dump($data['website']);
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/website/Add_website', $data);
        $this->LoadFooterWebsite();
    }

    function Add_website_ajax(){
        $data = array(
            'name' => $_POST['name'],
            'code' => $_POST['code'],
            'infor' => $_POST['infor'],
            'status' => 1,
        );
        if($_POST['id_website']){
            $this->f_websitemodel->Update_where('uet_website', " id = '".$_POST['id_website']."'",$data );
        }else{
            $this->f_websitemodel->Add('uet_website',$data);
        }
        echo 1;
    }

    function Update_status_website(){
        $data_update = array(
            'status' => $_POST['status']
        );
        $this->f_websitemodel->Update_where('uet_website', " id = '".$_POST['id']."'" ,$data_update);
        echo 1;
    }

    function remove_website(){
        $id = $_POST['id'];
        $this->f_websitemodel->Delete('uet_website',$id);
        echo 1;
    }

}