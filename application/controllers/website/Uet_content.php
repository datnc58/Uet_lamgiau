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

    public function AddContentDetail($id = null){
        $data = array();
        $seo = array();

        // xử lý thêm dữ liệu
        if($this->input->post('themmoi')){

            $pathImage = 'assets/library/content/';
            //thực hiện import file
            $this->load->library('upload');
            $config['upload_path'] = $pathImage.'/';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = '*';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';
            $this->upload->initialize($config);
            //tải file php
            if ( ! $this->upload->do_upload('url')) {
                $error = array('error' => $this->upload->display_errors());
            }
            else {
                $datafile = array('upload_data' => $this->upload->data());
                $data['url'] = $datafile['upload_data']['file_name'];
            }

            if($this->input->post('type') == 1){
                $data = array(
                    'div_full_start' => $this->input->post('div_full_start'),
                    'div_full_end' => $this->input->post('div_full_end'),
                );
            }else if($this->input->post('type') == 2){
                $data = array(
                    'div_left_start' => $this->input->post('div_left_start1'),
                    'div_left_end' => $this->input->post('div_left_end1'),
                    'div_mid_start' => $this->input->post('div_mid_start1'),
                    'div_mid_end' => $this->input->post('div_mid_end1'),
                );
            }else if($this->input->post('type') == 3){
                $data = array(
                    'div_left_start' => $this->input->post('div_left_start2'),
                    'div_left_end' => $this->input->post('div_left_end2'),
                    'div_mid_start' => $this->input->post('div_mid_start2'),
                    'div_mid_end' => $this->input->post('div_mid_end2'),
                    'div_right_start' => $this->input->post('div_right_start2'),
                    'div_right_end' => $this->input->post('div_right_end2'),
                );
            }else if($this->input->post('type') == 4){
                $data = array(
                    'div_mid_start' => $this->input->post('div_mid_start3'),
                    'div_mid_end' => $this->input->post('div_mid_end3'),
                    'div_right_start' => $this->input->post('div_right_start3'),
                    'div_right_end' => $this->input->post('div_right_end3'),
                );
            }

            $data['name'] = $this->input->post('name');
            $data['type'] = $this->input->post('type');
            $data['id_content'] = $this->input->post('id_content');


            $this->f_websitemodel->Add('uet_content_detail',$data);
            redirect('website/Uet_content/AddContentDetail');
        }


        $data['content'] = $this->f_websitemodel->get_data('uet_content');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/AddContentDetail', $data);
        $this->LoadFooterWebsite();
    }


}