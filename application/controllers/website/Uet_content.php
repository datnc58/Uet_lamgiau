<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_content extends MY_Controller
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
        $data['loai_content'] = $this->f_websitemodel->get_data('uet_content');
        $data['loai_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $data['loai_mid'] = $this->f_websitemodel->get_data('uet_content_mid');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/index', $data);
        $this->LoadFooterWebsite();
    }

    public function AddContent($id = null){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['content'] = $this->f_websitemodel->getItemByID('uet_content',$id);
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/AddContent', $data);
        $this->LoadFooterWebsite();
    }

    public function Uet_content_add(){
        $data = array();
        $seo = array();
        $data['loai_content'] = $this->f_websitemodel->get_data('uet_content');
        $data['loai_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $data['loai_mid'] = $this->f_websitemodel->get_data('uet_content_mid');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/index_add', $data);
        $this->LoadFooterWebsite();
    }

    function Add_content_ajax(){
        $name = $_POST['name'];
        $id_website = $_POST['id_website'];
        $infor = $_POST['infor'];
        $data = array(
            'name' => $name,
            'infor' => $infor,
            'id_webste' => $id_website,
            'status' => 1,
        );
        $id_content = $_POST['id_content'];
        if($id_content){
            $this->f_websitemodel->Update_where('uet_content'," id = '".$id_content."', $data");
            echo 1;
        }else{
            $this->f_websitemodel->Add('uet_content',$data );
            echo 1;
        }
    }

    public function addContentTop($id = ''){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['content'] = $this->f_websitemodel->getItemByID('uet_content_top',$id);
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/AddContentTop', $data);
        $this->LoadFooterWebsite();
    }

}