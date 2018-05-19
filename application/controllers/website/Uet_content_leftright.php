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

    //Sản phẩm theo danh mục
    function Danhmuc_sanpham(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_left_cateproduct');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_sanpham/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_danhmuc_sanpham(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_cateproduct') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/$library/";
        //kiểm tra thư mục có tồn tại chưa
        if(is_dir($pathImage)){
            //thư mục đã tồn tại
        }else{
            //thư mục chưa tồn tại
            mkdir($pathImage);
        }
        if(isset($_POST['hoanthanh'])){
            if($_POST['id_left']){
                $count = count($_POST['id_left']);
                foreach($_POST['id_left'] as $val){
                    $insert = array(
                        'name' => $_POST['name'],
                        'infor' => $_POST['infor'],
                        'status' => 1,
                        'id_left' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    $this->f_websitemodel->Add('uet_left_cateproduct', $insert);
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
            redirect(base_url('website/Uet_content_leftright/Danhmuc_sanpham'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_sanpham/Add_danhmucsanpham', $data);
        $this->LoadFooterWebsite();
    }

    public function editDanhmucSanpham($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_cateproduct",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/Danhmuc_sanpham'));
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_left_cateproduct',$id);
        if(isset($_POST['submit'])) {
            $idWeb = $_POST['idWeb'];
            $url = $data['website']->url;
            if(is_dir($url)){
                // upload php
                if (!empty($_FILES['php'])) {
                    if (file_exists('uet.php'))
                    {
                        unlink('uet.php');
                    }
                    $this->load->library('upload');
                    $config['upload_path'] = $url.'/';
                    $config['allowed_types'] = 'php|jpg|png|css';
                    $config['max_size'] = '*';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $this->upload->initialize($config);
                    if ( ! $this->upload->do_upload('php')) {
                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $datafile = array('upload_data' => $this->upload->data());
                        rename($datafile['upload_data']['full_path'],$datafile['upload_data']['file_path'].'uet.php');
                    }
                }

                // upload css
                if (!empty($_FILES['style'])) {
                    if (file_exists('style.css'))
                    {
                        unlink('style.css');
                    }
                    $this->load->library('upload');
                    $config['upload_path'] = $url.'/';
                    $config['allowed_types'] = 'php|jpg|png|css';
                    $config['max_size'] = '*';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $this->upload->initialize($config);
                    if ( ! $this->upload->do_upload('style')) {

                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $datafile = array('upload_data' => $this->upload->data());
                        rename($datafile['upload_data']['full_path'],$datafile['upload_data']['file_path'].'style.css');
                    }
                }
                // upload image
                if (!empty($_FILES['image'])) {
                    if (file_exists('image.png'))
                    {
                        unlink('image.png');
                    }
                    $this->load->library('upload');
                    $config['upload_path'] = $url.'/';
                    $config['allowed_types'] = 'php|jpg|png|css';
                    $config['max_size'] = '*';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $this->upload->initialize($config);
                    if ( ! $this->upload->do_upload('image')) {

                        $error = array('error' => $this->upload->display_errors());
                    }
                    else {
                        $datafile = array('upload_data' => $this->upload->data());
                        rename($datafile['upload_data']['full_path'],$datafile['upload_data']['file_path'].'image.png');
                    }
                }
            }
            $update = array(
                'name' => $_POST['name'],
                'infor' => $_POST['infor'],

            );
            $this->f_websitemodel->Update('uet_header',$id,$update);
            redirect(base_url('website/Uet_header'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['danhmuc_sanpham']->id_left, 'uet_left_cateproduct');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_sanpham/edit', $data);
        $this->LoadFooterWebsite();
    }
    public function DeleteDanhmucSanpham($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_cateproduct',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/Danhmuc_sanpham'));
        }
    }




}