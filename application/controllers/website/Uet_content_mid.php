<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_content_mid extends MY_Controller
{

    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('website/f_websitemodel');
    }

    //index
    public function index2($id=NULL)
    {
        $data = array();
        $seo = array();
        $data['id_mid'] = $id;
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

    //Thư viện giới thiệu
    function Library_gioithieu($id_mid = NULL){
        $data = array();
        $seo = array();
        $data['id_mid'] = $id_mid;
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/gioithieu/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_library_gioithieu($id_mid = NULL){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_introduce') ;
        $library = $number->number + 1;
        $pathImage = "library/content/mid/gioithieu/$library/";
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
                        'id_mid' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    $this->f_websitemodel->Add('uet_mid_introduce', $insert);
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
            redirect(base_url('website/Uet_content_mid/Library_gioithieu')."/$id_mid");
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/gioithieu/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editLibraryGioithieu($id=null, $id_mid = NULL){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_introduce",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Library_gioithieu')."/$id_mid");
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_introduce',$id);
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
            $this->f_websitemodel->Update('uet_mid_introduce',$id,$update);
            redirect(base_url('website/Uet_content_mid/Library_gioithieu')."/$id_mid");
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_introduce');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/gioithieu/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteLibraryGioithieu($id=null, $id_mid = NULL){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_introduce',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/Library_gioithieu')."/$id_mid");
        }
    }

    //thư viện đối tác
    function Library_doitac($id_mid = NULL){
        $data = array();
        $seo = array();
        $data['id_mid'] = $id_mid;
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_partner', array('id'=> $id_mid));
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/doitac/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_library_doitac($id_mid = NULL){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_partner') ;
        $library = $number->number + 1;
        $pathImage = "library/content/mid/doitac/$library/";
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
                        'id_mid' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    $this->f_websitemodel->Add('uet_mid_partner', $insert);
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
            redirect(base_url('website/Uet_content_mid/Library_doitac')."/$id_mid");
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/doitac/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editLibraryDoitac($id=null, $id_mid = NULL){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_partner",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Library_doitac')."/$id_mid");
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_partner',$id);
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
            $this->f_websitemodel->Update('uet_mid_partner',$id,$update);
            redirect(base_url('website/Uet_content_mid/Library_doitac')."/$id_mid");
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_partner');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/doitac/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteLibraryDoitac($id=null, $id_mid = NULL){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_partner',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/Library_doitac')."/$id_mid");
        }
    }

    //thư viện ý kiến khách hàng
    function Ykien_khachhang($id_mid = NULL){
        $data = array();
        $seo = array();
        $data['id_mid'] = $id_mid;
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_customer', array('id'=> $id_mid));
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/ykien_khachhang/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_ykien_khachhang($id_mid = NULL){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_customer') ;
        $library = $number->number + 1;
        $pathImage = "library/content/mid/ykien_khachhang/$library/";
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
                        'id_mid' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    $this->f_websitemodel->Add('uet_mid_customer', $insert);
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
            redirect(base_url('website/Uet_content_mid/Ykien_khachhang')."/$id_mid");
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/ykien_khachhang/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editYkienKhachhang($id=null, $id_mid = NULL){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_customer",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Ykien_khachhang')."/$id_mid");
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_customer',$id);
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
            $this->f_websitemodel->Update('uet_mid_customer',$id,$update);
            redirect(base_url('website/Uet_content_mid/Ykien_khachhang')."/$id_mid");
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_customer');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/ykien_khachhang/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteYkienKhachhang($id=null, $id_mid = NULL){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_customer',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/ykien_khachhang')."/$id_mid");
        }
    }
    // sản phẩm theo danh mục
    function Product_category($id_mid = NULL){
        $data = array();
        $seo = array();
        $data['id_mid'] = $id_mid;
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_productcate', array('id_mid'=> $id_mid));
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_category/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_Product_category ($id_mid = NULL) {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_customer') ;
        $library = $number->number + 1;
        $pathImage = "library/content/mid/product_category/$library/";
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
                        'id_mid' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    var_dump($insert);die;
                    $this->f_websitemodel->Add('uet_mid_productcate', $insert);
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
            redirect(base_url('website/Uet_content_mid/Product_category')."/$id_mid");
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_category/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_Product_category($id=null, $id_mid = NULL){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_productcate",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Product_category')."/$id_mid");
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_productcate',$id);
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
            $this->f_websitemodel->Update('uet_mid_productcate',$id,$update);
            redirect(base_url('website/Uet_content_mid/product_category')."/$id_mid");
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_productcate');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/Product_category/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_Product_category($id=null, $id_mid = NULL){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_productcate',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/product_category')."/$id_mid");
        }
    }

    // tin tức theo danh mục
    function News_category($id_mid = NULL){
        $data = array();
        $seo = array();
        $data['id_mid'] = $id_mid;
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_newstcate', array('id_mid'=> $id_mid));
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_category/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_News_category ($id_mid = NULL) {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_newstcate') ;
        $library = $number->number + 1;
        $pathImage = "library/content/mid/news_category/$library/";
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
                        'id_mid' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    var_dump($insert);die;
                    $this->f_websitemodel->Add('uet_mid_newstcate', $insert);
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
            redirect(base_url('website/Uet_content_mid/News_category')."/$id_mid");
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_category/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_News_category($id=null, $id_mid = NULL){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_newstcate",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/News_category')."/$id_mid");
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_newstcate',$id);
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
            $this->f_websitemodel->Update('uet_mid_newstcate',$id,$update);
            redirect(base_url('website/Uet_content_mid/News_category')."/$id_mid");
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_newstcate');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/news_category/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_News_category($id=null, $id_mid = NULL){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_newstcate',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/News_category')."/$id_mid");
        }
    }
    // Sản phẩm nổi bật
    function Product_hot($id_mid = NULL){
        $data = array();
        $seo = array();
        $data['id_mid'] = $id_mid;
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_producthot', array('id_mid'=> $id_mid));
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_hot/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_Product_hot ($id_mid = NULL) {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_producthot') ;
        $library = $number->number + 1;
        $pathImage = "library/content/mid/product_hot/$library/";
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
                        'id_mid' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    var_dump($insert);die;
                    $this->f_websitemodel->Add('uet_mid_producthot', $insert);
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
            redirect(base_url('website/Uet_content_mid/Product_hot')."/$id_mid");
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_hot/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_Product_hot($id=null, $id_mid = NULL){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_producthot",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Product_hot')."/$id_mid");
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_producthot',$id);
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
            $this->f_websitemodel->Update('uet_mid_producthot',$id,$update);
            redirect(base_url('website/Uet_content_mid/Product_hot')."/$id_mid");
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_producthot');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/product_hot/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_Product_hot($id=null, $id_mid = NULL){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_producthot',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/Product_hot')."/$id_mid");
        }
    }
    // tin tức nổi bật
    function News_hot($id_mid = NULL){
        $data = array();
        $seo = array();
        $data['id_mid'] = $id_mid;
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_newshot', array('id_mid'=> $id_mid));
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_hot/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_News_hot ($id_mid = NULL) {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid', array('id'=> $id_mid));

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_newshot') ;
        $library = $number->number + 1;
        $pathImage = "library/content/mid/news_hot/$library/";
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
                        'id_mid' => $val,
                        'number' => $library,
                        'url' => $pathImage,
                    );
                    var_dump($insert);die;
                    $this->f_websitemodel->Add('uet_mid_newshot', $insert);
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
            redirect(base_url('website/Uet_content_mid/News_category')."/$id_mid");
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_hot/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_News_hot($id=null, $id_mid = NULL){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_newshot",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/News_hot')."/$id_mid");
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_newshot',$id);
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
            $this->f_websitemodel->Update('uet_mid_newshot',$id,$update);
            redirect(base_url('website/Uet_content_mid/News_hot')."/$id_mid");
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_newshot');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/news_hot/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_News_hot($id=null, $id_mid = NULL){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_newshot',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/News_hot')."/$id_mid");
        }
    }
}