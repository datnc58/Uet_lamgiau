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
        $data['content_mid'] = $this->f_websitemodel->get_data('uet_content_mid_module');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/index', $data);
        $this->LoadFooterWebsite();
    }

    public  function Uet_content_mid_add(){
        $data = array();
        $seo = array();
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/index_add', $data);
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

    public function AddContentModuleMid($id = null){
        $data = array();
        $seo = array();
        $data['content'] = $this->f_websitemodel->get_data('uet_content_mid');
        $data['mid'] = $this->f_websitemodel->getItemByID('uet_content_mid',$id);
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/AddModuleMid', $data);
        $this->LoadFooterWebsite();
    }

    function Add_contentmodulemid_ajax(){
        $name = $_POST['name'];
        $link_moduel = $_POST['link_module'];
        $description = $_POST['description'];
        $id_mid = $_POST['id_mid'];
        $id_module = $_POST['id_module'];
        $data = array(
            'name' => $name,
            'link_module' => $link_moduel,
            'description' => $description,
            'id_mid' => $id_mid,
        );
        if($id_module){
            $this->f_websitemodel->Update_where('uet_content_mid_module'," id = '".$id_module."', $data");
            echo 1;
        }else{
            $this->f_websitemodel->Add('uet_content_mid_module', $data);
            echo 1;
        }
    }


    //Thư viện giới thiệu
    function Library_gioithieu(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_introduce');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/gioithieu/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_library_gioithieu(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid');

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
                        'widgets' => $_POST['widgets'],
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
            redirect(base_url('website/Uet_content_mid/Add_library_gioithieu'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/gioithieu/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editLibraryGioithieu($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_introduce",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Library_gioithieu')."");
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
                'widgets' => $_POST['widgets'],
            );
            $this->f_websitemodel->Update('uet_mid_introduce',$id,$update);
            redirect(base_url('website/Uet_content_mid/Add_library_gioithieu'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_introduce');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/gioithieu/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteLibraryGioithieu($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_introduce',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/Library_gioithieu')."");
        }
    }

    //thư viện đối tác
    function Library_doitac(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_partner');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/doitac/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_library_doitac(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid');

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
                        'widgets' => $_POST['widgets'],
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
            redirect(base_url('website/Uet_content_mid/Add_library_doitac'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/doitac/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editLibraryDoitac($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_partner",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Library_doitac')."");
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
                'widgets' => $_POST['widgets'],
            );
            $this->f_websitemodel->Update('uet_mid_partner',$id,$update);
            redirect(base_url('website/Uet_content_mid/Add_library_doitac'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_partner');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/doitac/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteLibraryDoitac($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_partner',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/Library_doitac'));
        }
    }

    //thư viện ý kiến khách hàng
    function Ykien_khachhang(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_customer');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/ykien_khachhang/index', $data);
        $this->LoadFooterWebsite();
    }

    function Add_ykien_khachhang(){
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid');

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
                        'widgets' => $_POST['widgets'],
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
            redirect(base_url('website/Uet_content_mid/Add_ykien_khachhang'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/ykien_khachhang/Add', $data);
        $this->LoadFooterWebsite();
    }

    public function editYkienKhachhang($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_customer",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Ykien_khachhang'));
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
                'widgets' => $_POST['widgets'],
            );
            $this->f_websitemodel->Update('uet_mid_customer',$id,$update);
            redirect(base_url('website/Uet_content_mid/Add_ykien_khachhang'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_customer');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/ykien_khachhang/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function DeleteYkienKhachhang($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_customer',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/ykien_khachhang'));
        }
    }
    // sản phẩm theo danh mục
    function Product_category(){

        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_productcate');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_category/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_Product_category () {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid');

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
                        'widgets' => $_POST['widgets'],
                    );
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
            redirect(base_url('website/Uet_content_mid/Add_Product_category'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_category/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_Product_category($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_productcate",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Product_category'));
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
                'widgets' => $_POST['widgets'],
            );
            $this->f_websitemodel->Update('uet_mid_productcate',$id,$update);
            redirect(base_url('website/Uet_content_mid/Add_Product_category'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_productcate');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/Product_category/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_Product_category($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_productcate',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/product_category'));
        }
    }

    // tin tức theo danh mục
    function News_category(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_newscate');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_category/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_News_category () {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid');

        $seo = array();
        $number = $this->f_websitemodel->select_maxlibrary('uet_mid_newscate') ;
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
                        'widgets' => $_POST['widgets'],
                    );
                    $this->f_websitemodel->Add('uet_mid_newscate', $insert);
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
            redirect(base_url('website/Uet_content_mid/Add_News_category'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_category/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_News_category($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_newscate",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/News_category'));
        }
        $data['danhmuc_sanpham'] = $this->f_websitemodel->getItemByID('uet_mid_newscate',$id);
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
                'widgets' => $_POST['widgets'],
            );
            $this->f_websitemodel->Update('uet_mid_newscate',$id,$update);
            redirect(base_url('website/Uet_content_mid/Add_News_category'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_newscate');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/news_category/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_News_category($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_newstcate',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/News_category'));
        }
    }
    // Sản phẩm nổi bật
    function Product_hot(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_producthot');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_hot/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_Product_hot () {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid');

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
                        'widgets' => $_POST['widgets'],
                    );
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
            redirect(base_url('website/Uet_content_mid/Add_Product_hot'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/product_hot/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_Product_hot($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_producthot",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/Product_hot'));
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
                'widgets' => $_POST['widgets'],
            );
            $this->f_websitemodel->Update('uet_mid_producthot',$id,$update);
            redirect(base_url('website/Uet_content_mid/Add_Product_hot'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_producthot');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/product_hot/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_Product_hot($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_producthot',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/Product_hot'));
        }
    }
    // tin tức nổi bật
    function News_hot(){
        $data = array();
        $seo = array();
        $data['danhmuc_sanpham'] = $this->f_websitemodel->get_data('uet_mid_newshot');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_hot/index', $data);
        $this->LoadFooterWebsite();
    }
    public function Add_News_hot () {
        $data['select_left'] = $this->f_websitemodel->get_data('uet_content_mid');

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
                        'widgets' => $_POST['widgets'],
                    );
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
            redirect(base_url('website/Uet_content_mid/Add_News_hot'));
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/content/mid/news_hot/Add', $data);
        $this->LoadFooterWebsite();
    }
    public function edit_News_hot($id=null){
        $data = array();
        $seo = array();
        $checkRecode = $this->f_websitemodel->getDataById("uet_mid_newshot",$id);
        if($checkRecode == 0){
            redirect(base_url('website/Uet_content_mid/News_hot'));
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
                'widgets' => $_POST['widgets'],
            );
            $this->f_websitemodel->Update('uet_mid_newshot',$id,$update);
            redirect(base_url('website/Uet_content_mid/Add_News_hot'));
        }

        $data['typeLeft'] = $this->f_websitemodel->getTypeWebsiteById_MID($data['danhmuc_sanpham']->id_mid, 'uet_mid_newshot');
        $this->LoadHeaderWebsite($data, $seo, true);
        $this->load->view('website/content/mid/news_hot/edit', $data);
        $this->LoadFooterWebsite();
    }

    public function Delete_News_hot($id=null){
        $deletaData = $this->f_websitemodel->Delete_where('uet_mid_newshot',"id =$id ");
        if(count($deletaData)>0){
            redirect(base_url('website/Uet_content_mid/News_hot'));
        }
    }
}