<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_content_mid extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('website/f_websitemodel');
    }

    //index
    public function index()
    {
        $data = array();
        $seo = array();
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/index', $data);
        $this->LoadFooterWebsite();
    }

    public function AddContentMid($id = null){
        $data = array();
        $seo = array();
        $data['content'] = $this->f_websitemodel->get_data('uet_content');
        $data['mid'] = $this->f_websitemodel->getItemByID('uet_content_mid',$id);
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/AddMid', $data);
        $this->LoadFooterWebsite();
    }

    function Add_contentmid_ajax(){
        $name = $_POST['name'];
        $id_content = $_POST['id_content'];
        $infor = $_POST['infor'];
        $data = array(
            'name' => $name,
            'infor' => $infor,
            'id_content' => $id_content,
            'status' => 1,
        );
        $id_mid = $_POST['id_mid'];
        if($id_mid){
            $this->f_websitemodel->Update_where('uet_content_mid'," id = '".$id_mid."', $data");
            echo 1;
        }else{
            $this->f_websitemodel->Add('uet_content_mid', $data);
            echo 1;
        }
    }

}