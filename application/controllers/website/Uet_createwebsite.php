<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Uet_createwebsite extends MY_Controller{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('website/f_websitemodel');
    }

    //index
    public function index(){
        $data = array();
        $seo = array();
        //lấy toàn bộ các site để kiểm tra
        $websiteall = $this->f_websitemodel->get_data('uet_createwebsite', array('process' => 1));

        if(isset($websiteall) && !empty($websiteall)){
            $data['website'] = $websiteall;
        }else{
            $data_insert = array(
                'create' => time(),
                'update' => time(),
                'process' => 1,
            );
            $this->f_websitemodel->Add('uet_createwebsite',$data_insert);
        }

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/index', $data);
        $this->LoadFooterWebsite();
    }

    public function header(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['header'] = $this->f_websitemodel->get_data('uet_header');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/header', $data);
        $this->LoadFooterWebsite();
    }

    public function select_header(){
        $id = $_POST['id'];
        $data = array(
            'header' => $id
        );
        $this->f_websitemodel->Update_where('uet_createwebsite',array('process' => 1), $data);
        echo 1;
    }

    public function footer(){
        $data = array();
        $seo = array();
        $data['website'] = $this->f_websitemodel->get_data('uet_website');
        $data['footer'] = $this->f_websitemodel->get_data('uet_footer');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/footer', $data);
        $this->LoadFooterWebsite();
    }

    public function select_footer(){
        $id = $_POST['id'];
        $data = array(
            'footer' => $id
        );
        $this->f_websitemodel->Update_where('uet_createwebsite',array('process' => 1), $data);
        echo 1;
    }

    public function content(){
        $data = array();
        $seo = array();
        //lấy id website đang sinh

        $web = $this->f_websitemodel->getFirstRowWhere('uet_createwebsite', array('process' => 1));

        if($this->input->post('hoanthanh')){
            $content_detail = $this->input->post('content_detail');
            foreach($content_detail as $detail){
                $data_insert = array(
                    'id_content_detail' => $detail,
                    'id_website' => $web->id,
                );
                $this->f_websitemodel->Add('uet_createwebsite_content', $data_insert);
            }

            redirect('website/Uet_createwebsite/content_detail');
        }
        $data['content_detail'] = $this->f_websitemodel->get_data('uet_content_detail');
        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/content', $data);
        $this->LoadFooterWebsite();
    }

    //bước vào chức năng content detail
    public function content_detail(){
        $data = array();
        $seo = array();
        $web = $this->f_websitemodel->getFirstRowWhere('uet_createwebsite', array('process' => 1));
        $data['detail'] = $this->f_websitemodel->getContentWebsite($web->id);

        $this->LoadHeaderWebsite(null, $seo, true);
        $this->load->view('website/create_website/content_detail', $data);
        $this->LoadFooterWebsite();
    }

    //hiển thị ra cấu hình content đang setup
    public function select_contentdetail(){
        $type = $_POST['type'];
        $id_content = $_POST['id_content'];
        $data['id_content'] = $id_content;

        if($type == 1){
            $data['listRight'] = $this->f_websitemodel->getListModuleMid($id_content, 'mid');
            $this->load->view('website/create_website/content_detail/full.php',$data);
        }else if($type == 2){
            $data['listLeft'] = $this->f_websitemodel->getListModuleLeft($id_content,'left');
            $data['listRight'] = $this->f_websitemodel->getListModuleMid($id_content, 'mid');
            $this->load->view('website/create_website/content_detail/left-mid.php',$data);
        }else if($type == 3){
            $data['listLeft'] = $this->f_websitemodel->getListModuleLeft($id_content,'left');
            $data['listMid'] = $this->f_websitemodel->getListModuleMid($id_content, 'mid');
            $data['listRight'] = $this->f_websitemodel->getListModuleLeft($id_content, 'right');
            $this->load->view('website/create_website/content_detail/left-mid-right.php',$data);
        }else if($type == 4){
            $data['listMid'] = $this->f_websitemodel->getListModuleMid($id_content, 'mid');
            $data['listRight'] = $this->f_websitemodel->getListModuleMid($id_content, 'right');
            $this->load->view('website/create_website/content_detail/mid-right.php',$data);
        }
    }

    //hiển thị danh sách tất cả các module được chọn
    public function add_module(){
        $type = $_POST['type'];
        $id_content = $_POST['id_content'];
        $location = $_POST['location'];
        $data = array(
            'id_content_child' => $id_content,
            'location' => $location,
            'type' => $type,
        );
        if($location == 'left'){
            $table1 = 'uet_content_left_module';
        }else if($location == 'mid'){
            $table1 = 'uet_content_mid_module';
        }else if($location == 'right'){
            $table1 = 'uet_content_left_module';
        }
        if($type == 1){
            $data['content_detail'] = $this->f_websitemodel->get_data($table1);
            $this->load->view('website/create_website/show_module/library.php',$data);
        }else if($type == 2){
            $data['content_detail'] = $this->f_websitemodel->get_data($table1);
            $this->load->view('website/create_website/show_module/library.php',$data);
        }else if($type == 3) {
            $data['content_detail'] = $this->f_websitemodel->get_data($table1);
            $this->load->view('website/create_website/show_module/library.php',$data);
        }else if($type == 4) {
            $data['content_detail'] = $this->f_websitemodel->get_data($table1);
            $this->load->view('website/create_website/show_module/library.php',$data);
        }
    }

    //thực hiện thêm module trong content
    public function insert_library(){
        $insert = $_POST['multiselect1'];
        foreach($insert as $val){
            $data_insert = array(
                'id_module' => $val,
                'id_content_child' => $_POST['id_content_child'],
                'location' => $_POST['location'],
            );
            $this->f_websitemodel->Add('uet_createwebsite_content_module_detail',$data_insert);
        }
    }

    //lấy tất cả item trong thư viện
    public function select_library_item(){
        $id_content_module_detail = $_POST['id_content_module_detail'];
        $id_module = $_POST['id_module'];


        $check = $this->f_websitemodel->getFirstRowWhere('uet_createwebsite_content_module_detail', array('id' => $id_content_module_detail));
        if($check->location == 'mid'){
            $table = 'uet_content_mid_module';
        }else if($check->location == 'left'){
            $table = 'uet_content_left_module';
        }else if($check->location == 'right'){
            $table = 'uet_content_left_module';
        }
        $tableLibrary = $this->f_websitemodel->getFirstRowWhere($table, array('id' => $check->id_module));

        $data['listItem'] = $this->f_websitemodel->get_data($tableLibrary->table);
        $data['id_content_module_detail'] = $id_content_module_detail;
        $data['id_module'] = $id_module;
        $this->load->view('website/create_website/show_item/item.php',$data);
    }

    //function sinh web
    public function copyCodeWidget(){
        $id_library = $_POST['id_library'];
        $id_content_module_detail = $_POST['id_content_module_detail'];
        $id_module = $_POST['id_module'];
        $check = $this->f_websitemodel->getFirstRowWhere('uet_createwebsite_content_module_detail', array('id' => $id_module));
        //thực hiện update csdl
        if(isset($check->id_library) && !empty($check->id_library)){
            //thực hiệp update
            $data = array(
                'id_library' => $id_library
            );
            $this->f_websitemodel->Update_where('uet_createwebsite_content_module_detail',array('id' => $id_content_module_detail), $data);
        }
        //thực hiệp copy code vào widget
    }

}