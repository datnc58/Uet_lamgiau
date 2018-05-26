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
        $pathImage = "library/content/left/danhmuc_sanpham/$library/";
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

    //danh mục tin tức
    function Danhmuc_tintuc(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_left_catenews');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_tintuc/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_danhmuc_tintuc(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_catenews') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/danhmuc_tintuc/$library/";
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
                    $this->f_websitemodel->Add('uet_left_catenews', $insert);
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
        $this->load->view('website/content/left_right/danhmuc_tintuc/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editDanhmucTintuc($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_catenews",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/Danhmuc_tintuc'));
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_left_catenews',$id);
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
            $this->f_websitemodel->Update('uet_left_catenews',$id,$update);
            redirect(base_url('website/Uet_content_leftright/Danhmuc_tintuc'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['danhmuc_sanpham']->id_left, 'uet_left_catenews');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_tintuc/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteDanhmucTintuc($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_catenews',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/Danhmuc_tintuc'));
        }
    }

    //danh mục hình ảnh
    function Danhmuc_hinhanh(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_left_catenews');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_hinhanh/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_danhmuc_hinhanh(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_media') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/danhmuc_hinhanh/$library/";
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
                    $this->f_websitemodel->Add('uet_left_media', $insert);
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
            redirect(base_url('website/Uet_content_leftright/Danhmuc_hinhanh'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_hinhanh/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editDanhmucHinhanh($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_media",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/Danhmuc_hinhanh'));
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_left_media',$id);
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
            $this->f_websitemodel->Update('uet_left_media',$id,$update);
            redirect(base_url('website/Uet_content_leftright/Danhmuc_hinhanh'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['danhmuc_sanpham']->id_left, 'uet_left_catenews');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/danhmuc_tintuc/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteDanhmucHinhanh($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_media',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/Danhmuc_hinhanh'));
        }
    }

    //banner quảng cáo

    function Banner_quangcao(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_left_advertise');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/banner_quangcao/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_banner_quangcao(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_advertise') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/banner_quangcao/$library/";
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
                    $this->f_websitemodel->Add('uet_left_advertise', $insert);
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
            redirect(base_url('website/Uet_content_leftright/Banner_quangcao'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/banner_quangcao/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editBannerQuangcao($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_advertise",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/Banner_quangcao'));
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_left_advertise',$id);
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
            $this->f_websitemodel->Update('uet_left_advertise',$id,$update);
            redirect(base_url('website/Uet_content_leftright/Banner_quangcao'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['danhmuc_sanpham']->id_left, 'uet_left_advertise');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/banner_quangcao/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteBannerQuangcao($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_advertise',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/Banner_quangcao'));
        }
    }
    // Sản Phẩm Nổi Bật
    function SanPhamNoiBat(){
        $data = array();
        $seo = array();
        $data['sanpham_noibat'] = $this->f_websitemodel->get_data('uet_left_hotproduct');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/sanpham_noibat/index', $data);
        $this->LoadFooterWebsite();
    }

    function AddSanPhamNoiBat(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_hotproduct') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/sanpham_noibat/$library/";
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
                    $this->f_websitemodel->Add('uet_left_hotproduct', $insert);
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
            redirect(base_url('website/Uet_content_leftright/SanPhamNoiBat'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/sanpham_noibat/Add_sanphamnoibat', $data);
        $this->LoadFooterWebsite();
    }

    public function editSanPhamNoiBat($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_hotproduct",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/SanPhamNoiBat'));
        }
        $data['sanpham_noibat'] = $this->f_websitemodel->getItemByID('uet_left_hotproduct',$id);
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
            $this->f_websitemodel->Update('uet_left_hotproduct',$id,$update);
            redirect(base_url('website/Uet_content_leftright/SanPhamNoiBat'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['sanpham_noibat']->id_left, 'uet_left_hotproduct');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/sanpham_noibat/edit', $data);
        $this->LoadFooterWebsite();
    }
    public function DeleteSanPhamNoiBat($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_hotproduct',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/SanPhamNoiBat'));
        }
    }
    /*
     * Tin Tức Nổi Bật
     */
    function TinTucNoiBat(){
        $data = array();
        $seo = array();
        $data['tintuc_noibat'] = $this->f_websitemodel->get_data('uet_left_hotnews');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/tintuc_noibat/index', $data);
        $this->LoadFooterWebsite();
    }

    function AddTinTucNoiBat(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_hotnews') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/tintuc_noibat/$library/";
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
                    $this->f_websitemodel->Add('uet_left_hotnews', $insert);
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
            redirect(base_url('website/Uet_content_leftright/TinTucNoiBat'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/tintuc_noibat/Add_tintucnoibat', $data);
        $this->LoadFooterWebsite();
    }

    public function editTinTucNoiBat($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_hotnews",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/TinTucNoiBat'));
        }
        $data['tintuc_noibat'] = $this->f_websitemodel->getItemByID('uet_left_hotnews',$id);
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
            $this->f_websitemodel->Update('uet_left_hotnews',$id,$update);
            redirect(base_url('website/Uet_content_leftright/TinTucNoiBat'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['tintuc_noibat']->id_left, 'uet_left_hotnews');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/tintuc_noibat/edit', $data);
        $this->LoadFooterWebsite();
    }
    public function DeleteTinTucNoiBat($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_hotnews',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/TinTucNoiBat'));
        }
    }
    /*
     * Hỗ Trỡ Khách Hàng
     */
    function HoTroKhachHang(){
        $data = array();
        $seo = array();
        $data['hotro_khachhang'] = $this->f_websitemodel->get_data('uet_left_support');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/hotro_khachhang/index', $data);
        $this->LoadFooterWebsite();
    }

    function AddHoTroKhachHang(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_support') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/hotro_khachhang/$library/";
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
                    $this->f_websitemodel->Add('uet_left_support', $insert);
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
            redirect(base_url('website/Uet_content_leftright/HoTroKhachHang'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/hotro_khachhang/Add_hotrokhachhang', $data);
        $this->LoadFooterWebsite();
    }

    public function editHoTroKhachHang($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_support",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/HoTroKhachHang'));
        }
        $data['hotro_khachhang'] = $this->f_websitemodel->getItemByID('uet_left_support',$id);
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
            $this->f_websitemodel->Update('uet_left_support',$id,$update);
            redirect(base_url('website/Uet_content_leftright/HoTroKhachHang'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['hotro_khachhang']->id_left, 'uet_left_support');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/hotro_khachhang/edit', $data);
        $this->LoadFooterWebsite();
    }
    public function DeleteHoTroKhachHang($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_support',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/HoTroKhachHang'));
        }
    }
    /*
       * Thống Kê Truy Cập
       */
    function ThongKeTruyCap(){
        $data = array();
        $seo = array();
        $data['thongke_truycap'] = $this->f_websitemodel->get_data('uet_left_counter');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/thongke_truycap/index', $data);
        $this->LoadFooterWebsite();
    }

    function AddthongkeTruyCap(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_left');
        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_left_counter') ;
        $library = $number->number + 1;
        $pathImage = "library/content/left/thongke_truycap/$library/";
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
                    $this->f_websitemodel->Add('uet_left_counter', $insert);
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
            redirect(base_url('website/Uet_content_leftright/ThongKeTruyCap'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/left_right/thongke_truycap/Add_thongketruycap', $data);
        $this->LoadFooterWebsite();
    }

    public function editThongKeTruyCap($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_left_counter",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_leftright/ThongKeTruyCap'));
        }
        $data['thongke_truycap'] = $this->f_websitemodel->getItemByID('uet_left_counter',$id);
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
            $this->f_websitemodel->Update('uet_left_counter',$id,$update);
            redirect(base_url('website/Uet_content_leftright/ThongKeTruyCap'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_LEFTRIGHT($data['thongke_truycap']->id_left, 'uet_left_counter');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/left_right/thongke_truycap/edit', $data);
        $this->LoadFooterWebsite();
    }
    public function DeleteThongKeTruyCap($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_left_counter',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_leftright/ThongKeTruyCap'));
        }
    }
}