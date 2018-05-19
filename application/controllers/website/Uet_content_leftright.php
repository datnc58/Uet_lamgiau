<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_content_leftright extends MY_Controller
{

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
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/index', $data);
        $this->LoadFooterWebsite();
    }

    public function AddContentLeft($id = null){
        $data = array();
        $seo = array();
        $data['content'] = $this->f_websitemodel->get_data('uet_content');
        $data['leftright'] = $this->f_websitemodel->getItemByID('uet_content_left',$id);
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/AddLeft', $data);
        $this->LoadFooterWebsite();
    }

    function Add_contentleft_ajax(){
        $name = $_POST['name'];
        $id_content = $_POST['id_content'];
        $infor = $_POST['infor'];
        $data = array(
            'name' => $name,
            'infor' => $infor,
            'id_content' => $id_content,
            'status' => 1,
        );
        $id_leftright = $_POST['id_leftright'];
        if($id_leftright){
            $this->f_websitemodel->Update_where('uet_content_left'," id = '".$id_leftright."', $data");
            echo 1;
        }else{
            $this->f_websitemodel->Add('uet_content_left', $data);
            echo 1;
        }
    }
}