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
	
	function Add_header(){
        $data['select_website'] = $this->f_websitemodel->get_data('uet_website');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_header') ;
        $library = $number->number + 1;
        $pathImage = "library/header/$library/";
        //kiểm tra thư mục có tồn tại chưa
        if(is_dir($pathImage)){
            //thư mục đã tồn tại
        }else{
            //thư mục chưa tồn tại
            mkdir($pathImage);
        }
        if(isset($_POST['hoanthanh'])){
            if($_POST['id_website']){
                $count = count($_POST['id_website']);
                foreach($_POST['id_website'] as $val){
                    $insert = array(
                        'name' => $_POST['name'],
                        'infor' => $_POST['infor'],
                        'status' => 1,
                        'id_website' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    $this->f_websitemodel->Add('uet_header', $insert);
                }
                //thực hiện import file
                $this->load->library('upload');
                $config['upload_path'] = $pathImage.'/';
                $config['allowed_types'] = 'php|jpg|png|css';
                $config['max_size'] = '*';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $this->upload->initialize($config);
                //tải file php
                if ( ! $this->upload->do_upload('php')) {
                    $error = array('error' => $this->upload->display_errors());
                }
                else {
                    $datafile = array('upload_data' => $this->upload->data());
                    rename($datafile['upload_data']['full_path'],$datafile['upload_data']['file_path'].'uet.php');
                }
                //tải file css
                if ( ! $this->upload->do_upload('style')) {
                    $error = array('error' => $this->upload->display_errors());
                }
                else {
                    $datafile = array('upload_data' => $this->upload->data());
                    rename($datafile['upload_data']['full_path'],$datafile['upload_data']['file_path'].'style.css');
                }
                //tải file image
                if ( ! $this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                }
                else {
                    $datafile = array('upload_data' => $this->upload->data());
                    rename($datafile['upload_data']['full_path'],$datafile['upload_data']['file_path'].'image.png');
                }
            }
            redirect(base_url('website/Uet_header'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/header/Add_header', $data);
        $this->LoadFooterWebsite();
    }
	
}