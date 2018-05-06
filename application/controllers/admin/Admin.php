<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller

{

    public function __construct()

    {

        parent::__construct();

        // $this->output->cache(20);

        $this->ci =& get_instance();

        $this->load->model('adminmodel');

        $this->load->model('user_model');

        $this->load->library('filter');

        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))

        {

            redirect(base_url().'administ', 'location');

            die();

        }

//        $this->_permission();

    }

    public function lang($lang){

        if($lang!=null){

            $this->ci->session->set_userdata('lang',$lang);

            redirect(base_url('uetadmin'));

        }

    }



    public function admin_change_password()

    {

        $this->load->library('hash');

        $user = $this->user_model->get("id, password, use_salt, lever, active,fullname");

        if ($this->input->post('old_pass')) {

            $old_pass = trim($this->input->post('old_pass'));

            $new_pass = $this->input->post('new_pass');

            $re_pass  = $this->input->post('re_pass');

            $id       = $this->session->userdata('sessionUserAdmin');

            $admin    = $this->adminmodel->getFirstRowWhere('users',$arrayName = array('id' => $id ));



            for ($i = 0; $i < 5; $i++) {

                $old_pass = md5($old_pass);

            }

            if ($old_pass == $admin->password) {

                $mss = '';



                if ($new_pass && $re_pass) {

                    if ($new_pass == $re_pass) {

                        for ($i = 0; $i < 5; $i++) {

                            $new_pass = md5($new_pass);

                        }



                        $arr = array('password' => $new_pass);



                        $this->adminmodel->update('users',$id, $arr);

                        $this->session->set_flashdata("mess", "Đổi mật khẩu thành công!");

                    } else {

                        $this->session->set_flashdata("mess", "Nhập lại mật khẩu mới không chính xác!");

                    }

                } else {

                    $this->session->set_flashdata("mess", "Vui lòng nhập mật khẩu mới!");

                }



            } else {

                $this->session->set_flashdata("mess", "Nhập sai mật khẩu hiện tại!");

            }

        }

        $data = array();

        $data['headerTitle'] = 'Thay đổi mật khẩu';

        $this->LoadHeaderAdmin($data,$data['headerTitle']);

        $this->load->view('admin/users/admin_change_password', @$data);

        $this->load->view('admin/footer');

    }



    // admin logout

    public  function reset_pass($id){

        $this->auth->check();

        $this->Check_module($this->module_name);

        if($id>0){

            $password=_PASSWORD_RESET;

            for($j=0; $j<5; $j++){

                $password=md5($password);

            }

            $this->adminmodel->Update_where('users',array('id'=>$id),array('password'=>$password));

            $this->session->set_flashdata("mess", "Cập nhật thành công!");

            redirect($_SERVER['HTTP_REFERER']);

        }

    }



    public  function delete_acc($id){

        $this->Check_module($this->module_name);

        if($id>0){

            $this->adminmodel->Delete('users',$id);

            $this->adminmodel->Delete_where('user_modules',array('user_id'=>$id));

            $this->session->set_flashdata("mess", "Xóa thành công!");

            redirect($_SERVER['HTTP_REFERER']);

        }

    }



    public function site_option($id=null){



        $config['upload_path'] = './upload/img/logo/';

        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';

        $config['max_size'] = '5000';

        $config['max_width'] = '1500';

        $config['max_height'] = '1200';

        $this->load->library('upload', $config);


        $row=$this->adminmodel->getFirstRowWhere('site_option',array(

            'lang' => $this->language

        ));

        if($this->input->post()){

            $video='';

            if($this->input->post('site_video')){

                $video=explode('=',$this->input->post('site_video'));

            }

            $arr=array(

                'coppy_right'            => $this->input->post('coppy_right'),

                'site_name'           => $this->input->post('site_name'),

                'map_iframe'           => $this->input->post('map_iframe'),

                'link_instagram'        => $this->input->post('link_instagram'),

                'chat'           => $this->input->post('chat'),

                'shipping'            =>$this->input->post('shipping'),

                'site_keyword'        => $this->input->post('site_keyword'),

                'site_title'          => $this->input->post('site_title'),

                'site_title_en'       => $this->input->post('site_title_en'),

                'site_description'    => $this->input->post('site_description'),

                'link_sky' => $this->input->post('link_sky'),

                'link_printer'       => $this->input->post('link_printer'),

                'link_linkedin'      => $this->input->post('link_linkedin'),

                'hotline1'            => $this->input->post('hotline1'),

                'hotline2'            => $this->input->post('hotline2'),

                'hotline3'            => $this->input->post('hotline3'),

                'address'             => $this->input->post('address'),

                'link_tt'             => $this->input->post('link_tt'),

                'slogan'             => $this->input->post('slogan'),

                'site_email'             => $this->input->post('site_email'),

                'site_video'             => @$video[1],

                'site_fanpage'         => $this->input->post('site_fanpage'),

                'site_promo'          => $this->input->post('site_promo'),

                'link_gg'          => $this->input->post('link_gg'),

                'link_youtube'          => $this->input->post('link_youtube'),

                'face_id'               => $this->input->post('face_id'),

                'timeopen'              => $this->input->post('timeopen'),

                'lang'                => $this->language,

                'WM_text'               => $this->input->post('wm_text'),

                'WM_color'               => $this->input->post('wm_color'),

                'WM_size'               => $this->input->post('wm_size'),

                'input_text_1'               => $this->input->post('input_text_1'),

                'domain'               => $this->input->post('domain'),

                'map_footer'               => $this->input->post('map_footer'),

            );

            if($row == null)

            {

                $rs=$this->adminmodel->Add('site_option',$arr);

                $this->session->set_flashdata("mess", "Thêm thành công!");

            }

            else{

                $rs=$this->adminmodel->Update_where('site_option',array('id'=> $row->id,),$arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            }





            if ($_FILES['userfile']['size'] >0) {

                if (!$this->upload->do_upload('userfile')) {

                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {

                    $upload = array('upload_data' => $this->upload->data());

                    $image  = 'upload/img/logo/' . $upload['upload_data']['file_name'];

                    $this->adminmodel->Update_where('site_option', array('id'=>$row->id), array('site_logo'=>$image));

                }

            }

            $weblang=array('vi'=>'vietnamese','en'=>'english',);

            // up logo footer

            if ($_FILES['logo_footer']['size'] >0) {

                if (!$this->upload->do_upload('logo_footer')) {

                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {

                    $upload = array('upload_data' => $this->upload->data());

                    $image  = 'upload/img/logo/' . $upload['upload_data']['file_name'];

                    $this->adminmodel->Update_where('site_option', array('id'=>$row->id), array('site_logo_footer'=>$image));

                }

            }

            // up logo favicon

            if ($_FILES['userfile2']['size'] >0) {

                if (!$this->upload->do_upload('userfile2')) {

                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {

                    $upload = array('upload_data' => $this->upload->data());

                    $image  = 'upload/img/logo/' . $upload['upload_data']['file_name'];

                    $this->adminmodel->Update_where('site_option', array('id'=>$row->id), array('favicon'=>$image));

                }

            }



            redirect($_SERVER['HTTP_REFERER']);

        }

        $data['config_home'] = $this->adminmodel->getFirstRowWhere('site_option',array('lang' => 'config','active'=>0));

        $data['config_text'] = $this->adminmodel->getFirstRowWhere('site_option',array('lang' => 'conf_text','active'=>0));



        $data['row']=$row;

        $data['headerTitle'] = 'Cấu hình hệ thống';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/system/site_option', $data);

        $this->load->view('admin/footer');$this->_Route();

    }

    public function bando_map($id=null){

        $row=$this->adminmodel->getFirstRowWhere('site_option',array(

            'lang' => $this->language

        ));

        if($this->input->post()){

            $arr=array(



                'hdfMap'            => $this->input->post('hdfMap'),

                'map_title'            => $this->input->post('map_title'),

                'map_adrdress'            => $this->input->post('map_adrdress'),

                'map_phone'            => $this->input->post('map_phone'),

                'dia_chi_timkiem'            => $this->input->post('dia_chi_timkiem'),

                'lang'                => $this->language,

            );

            $rs=$this->adminmodel->Update_where('site_option',array('id'=> $row->id,),$arr);

            $_SESSION['mess']='Cập nhật thành công!';

            redirect($_SERVER['HTTP_REFERER']);

        }

        $data['row']=$row;

        $data['headerTitle'] = 'Cấu hình bản đồ web';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/system/bando_map', $data);

        $this->load->view('admin/footer');

    }

    // public function count_comments(){

    // $c=$this->adminmodel->Count('comments',array('review'=>0));

    // echo json_encode($c);

    // }

    // đếm gio hang

    // public function count_order(){

    // $c=$this->adminmodel->Count('order',array('show'=>0));

    // echo json_encode($c);

    // }



    public function users(){



        $data['users'] = $this->adminmodel->get_data('users',array('id >'=>'1'),array('id'=>'esc'));



        $data['headerTitle'] = 'Quản trị viên';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/users/users', @$data);

        $this->load->view('admin/footer');

    }

// phân quyền quản trị

    public function permission($id = null)

    {

        $admin = $this->session->userdata('adminfull');

        $user=$this->adminmodel->get_data('access',array('user_id'=>$id),array(),true);

        if ($this->input->post()) {

            $controller = $this->input->post('controller');

            $action     = $this->input->post('action');

            $access     = array();

            foreach ($controller as $c2) {

                foreach ($action as $a) {

                    $item = explode(';', $a);

                    if ($item[0] == $c2) {

                        $access[$c2][] = $item[1];

                    }

                }

            }

            $str_access = json_encode($access);

            $arr        = array('user_id' => $id, 'access' => $str_access);



            if(!empty($user)){

                $this->adminmodel->Update_where('access',array('user_id'=>$id), $arr);

            }else{

                $this->adminmodel->Add('access', $arr);

            }

            redirect(base_url('admin/users/listuser_admin'));

        }



        $data['u_access'] = (array)json_decode(@$user->access);



        if($id ==1){

            $data['resources'] = $this->adminmodel->get_data('resources',array('parent_id' => 0),array('sort'=>'asc'));

            foreach ($data['resources'] as $key => $cat) {

                $data['resources'][$key]->cat_sub =  $this->adminmodel->get_data('resources',array(

                    'parent_id' => $cat->id

                ),array('sort' => 'asc'));

            }

        }else{

            $data['user'] = $this->adminmodel->get_data('users',array('id'=>$id),array(),true);

            $data['resources'] = $this->adminmodel->get_data('resources',array('parent_id' => 0,'active' => 1),array('sort'=>'asc'));

            foreach ($data['resources'] as $key => $cat) {

                $data['resources'][$key]->cat_sub =  $this->adminmodel->get_data('resources',array(

                    'parent_id' => $cat->id

                ),array('sort' => 'asc'));

            }

        }



        $data['headerTitle'] = 'Phân quyền quản trị';



        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/users/permission', $data);

        $this->load->view('admin/footer');

    }

    public function useractive(){

        $u=$this->adminmodel->get_data('users',array('id'=>$_POST['id']),array(),true);



        if($u->block==1){

            $this->adminmodel->Update_where('users', array('id' => $_POST['id']), array('block'=>0));



        }else if($u->block==0){

            $this->adminmodel->Update_where('users', array('id' => $_POST['id']), array('block'=>1));

        }

        echo 1;

    }

    public function user_delete($id){


        $this->adminmodel->Delete_where('users',array('id'=>$id));

        $this->adminmodel->Delete_where('access',array('user_id'=>$id));

        //            $this->creat_mess('success','<i class="fa fa-exclamation-circle"></i> Thao tác thành công!');

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function user_edit($id){


        $this->user_add($id);

    }

    public function user_add($id = null)

    {

        //die('here');


        $data['btn_name'] = 'Thêm';

        if ($id != null) {

            $edit             = $this->adminmodel->get_data('users', array('id' => $id, 'id !=' => 1), array(), true);

            $data['edit']     = $edit;

            $data['btn_name'] = 'Cập nhật';

        }

        if ($this->input->post()) {

            $pass=$this->input->post('password');

            for($i=0;$i<5;$i++){

                $pass=md5($pass);

            }

            $arr = array(

                'username' => $this->input->post('username'),

                'fullname' => $this->input->post('fullname'),

                'email'    => $this->input->post('email'),

                'password' => $pass,

                //                    'active'   => $this->input->post('active'),

                'block'    => $this->input->post('block'),

                'level'    => '2',

            );

            if ($this->input->post('edit')) { // edit user

                if($this->input->post('password')==''||$this->input->post('password')==0){

                    unset($arr['password']);

                }

                $u = $this->adminmodel->Update_where('users', array('id' => $id), $arr);



            } else { // add user

                $rs = $this->adminmodel->Add('users', $arr);



                $id=$rs;

            }



            redirect(base_url('admin/admin/permission/'.$id));

        }

        $data['headerTitle'] = 'Quản trị viên';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/users/user_add', @$data);

        $this->load->view('admin/footer');

    }

    public function documentation()

    {

        $data['headerTitle'] = 'Hướng dẫn sử dụng';

        $data['cate_all'] = $this->adminmodel->get_data('document',array(

            'lang' => $this->language,

            'parent_id' => 0,

            'active' =>1

        ),array('sort' => 'asc'));

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/documentation/index',$data);

        $this->load->view('admin/footer');

    }

// quan ly module huong dan quan tri

    public function listDoc()

    {

        $data['cate'] = $this->adminmodel->get_data('document',array(

            'lang' => $this->language

        ),array('sort'=>'desc'));

        $data['headerTitle'] = 'Danh mục hướng dẫn';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/documentation/list_cat', $data);

        $this->load->view('admin/footer');

    }



//Add Category document

    public function cat_add_doc($id_edit=null)

    {

        $data['btn_name']='Thêm';

        $data['max_sort']=$max_sort=$this->adminmodel->SelectMax('document','sort')+1;

        if($id_edit!=null){

            $data['edit']=$this->adminmodel->get_data('document',array('id'=>$id_edit),array(),true);

            $data['max_sort']=$max_sort=$data['edit']->sort;

            $data['btn_name']='Cập nhật';

        }

        if(isset($_POST['addnews'])) {

            $arr    = array(

                'name'        => $this->input->post('name'),

                'description' => $this->input->post('description'),

                'parent_id'   => $this->input->post('parent'),

                'lang'        => $this->language,

                'sort'       => $max_sort,

                'active'   => $this->input->post('active')

            );

            if (!empty($_POST['edit'])){

                $id = $this->adminmodel->Update_where('document', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            } else {

                $id = $this->adminmodel->Add('document', $arr);

                $this->session->set_flashdata("mess", "Thêm thành công!");

            }

            if ($id_edit != null) {

                $id = $id_edit;

            } else $id = $id;



            redirect(base_url('uetadmin/admin/listDoc'));

        }

        $data['category'] = $this->adminmodel->get_data('document',array(

            'lang' => $this->language

        ),array('sort'=>'desc'));

        $data['headerTitle'] = "'".$data['btn_name']." danh mục hướng dẫn";

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/documentation/cat_add', $data);

        $this->load->view('admin/footer');

    }

    public function document_edit($id){

        $this->cat_add_doc($id);

    }



    public function deletedocument($id)

    {

        $this->del_catdoc_once($id);

        $this->session->set_flashdata("mess", "Xóa không thành công ! <br />Còn danh mục con");

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function deletes_categorydoc()

    {

        $ids = $this->input->post('checkone');

        foreach($ids as $id)

        {

            $this->del_catdoc_once($id);

        }

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function del_catdoc_once($id){

        $this->adminmodel->Delete_where('document',array('id' => $id));

    }



    // setup cấu hình cho sản phâm

    public function setup_product($id=null){



        $weblang=array('vi'=>'vietnamese','en'=>'english',);

        // $this->option = $this->system_model->getFirstRowWhere('site_option',array(

        //         'lang' => $this->language

        //     ));

        $data['thuoctinh'] = (array)json_decode(@$this->option->config_pro_content);

        //        $data['show_button'] = (array)json_decode(@$this->option->config_show_button);



        $data['show_button'] = $this->adminmodel->get_data('config_checkpro');

        $data['config_home'] = $this->adminmodel->getFirstRowWhere('site_option',array('lang' => 'config','active'=>0));

        $data['config_text'] = $this->adminmodel->getFirstRowWhere('site_option',array('lang' => 'conf_text','active'=>0));

        $data['config_menu'] = $this->adminmodel->get_data('config_menu');

        $data['config_banner'] = $this->adminmodel->get_data('config_banner');

        $data['headerTitle'] = 'Cấu hình sản phẩm';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/system/setup_product', $data);

        $this->load->view('admin/footer');

    }

    // lay du lieu cau hinh thuoc tinh cho san pham

    public function popupdata_attpro()

    {

        $data = array();

        $data['key'] = $key=$this->input->get('key');

        $data['btn_name']='Thêm mới';

        $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(

            'lang' => $this->language

        ));

        if($key!=null){

            $data['item'] = $arr1[$key] = json_decode($data['setup']->config_pro_content);

            $data['btn_name']='Sửa thuộc tính';

        }

        $this->load->view('admin/modal/view_add_attpro',$data);

    }

    public function add_attpro()

    {

        $data['btn_name']='Thêm';



        if (isset($_POST['addnews'])) {

            $arr = array(

                'content'        => $this->input->post('content'),

                'name'   => $this->input->post('name'),

                'type'     => $this->input->post('type'),

                'sort'            => $this->input->post('sort'),

            );

            //

            $mang = array($arr);

            $str_arr = json_encode($mang);

            $arr = array('config_pro_content' => $str_arr);

            $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(

                'lang' => $this->language

            ));



            if($data['setup']->config_pro_content !==''){

                $arr1 = json_decode($data['setup']->config_pro_content);

                $x = json_decode($str_arr);

                $themmang = array_push($arr1,$x[0]);



                $arr = array('config_pro_content' => json_encode($arr1));

            }else{

                $arr = array('config_pro_content' => $str_arr);

            }

            if(!empty($arr)){

                $this->adminmodel->Update_where('site_option',array('lang'=>$this->language), $arr);

            }

            redirect(base_url().'uetadmin/admin/setup_product');

        }

    }

    public function edit_thuoctinh($key)

    {

        $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(

            'lang' => $this->language

        ));

        if($key!=null){

            $arr1 = json_decode($data['setup']->config_pro_content);

            $arr1[$key] = array(

                'content'        => $this->input->post('content'),

                'name'   => $this->input->post('name'),

                'type'     => $this->input->post('type'),

                'sort'            => $this->input->post('sort'),

            );

            $arr = array('config_pro_content' => json_encode($arr1));



            $this->adminmodel->Update_where('site_option',array('lang'=>$this->language), $arr);

            redirect(base_url().'uetadmin/admin/setup_product');

        }



    }

    public function xoa_thuoctinh($key)

    {

        $data['setup'] = $this->option = $this->system_model->getFirstRowWhere('site_option',array(

            'lang' => $this->language

        ));



        if($data['setup']->config_pro_content !==''){

            $array2 = array();

            $arr1 = json_decode($data['setup']->config_pro_content);



            unset($arr1[$key]);

            foreach ($arr1 as $key => $value) {

                array_push($array2,$value);

            }



            $str_arr = json_encode($array2);

            $arr = array('config_pro_content' => $str_arr);

            $this->adminmodel->Update_where('site_option',array('lang'=>$this->language), $arr);

            redirect(base_url().'uetadmin/admin/setup_product');

        }

    }

//hien thi them nút 

    public function popupdata_butshow()

    {

        $data = array();

        $data['id'] = $id=$this->input->get('id');

        $data['btn_name']='Thêm mới nút';



        if($id!=null){

            $data['item']=$this->adminmodel->getFirstRowWhere('config_checkpro',array('id'=>$id));

            $data['btn_name']='Sửa';

        }



        $this->load->view('admin/modal/view_add_showbut',$data);

    }

    // them nut hien thi

    public function add_showbut($id_edit=null)

    {

        $data['btn_name']='Thêm';



        if($id_edit!=null){

            $data['item']=$this->adminmodel->getFirstRowWhere('config_checkpro',array('id'=>$id_edit));

        }

        if (isset($_POST['addnews'])) {

            $this->load->dbforge();

            $arr = array(

                'name'        => $this->input->post('name'),

                'type'     => $this->input->post('type'),

                'field'     => $this->input->post('field'),

                'color'      => $this->input->post('color'),

                'active'    => $this->input->post('active'),

            );

            // them truong vao trong table

            $fields = array(

                $this->input->post('field') => array('type' => 'TEXT')

            );



            if (!empty($_POST['edit'])){

                $id = $this->adminmodel->Update_where('config_checkpro', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            } else {

                $this->dbforge->add_column($this->input->post('type'), $fields);

                $id = $this->adminmodel->Add('config_checkpro', $arr);

                $this->session->set_flashdata("mess", "Thêm mới thành công!");

            }

            redirect(base_url().'uetadmin/admin/setup_product');

        }

    }



// chinh sưa nut

    public function edit_showbut($id)

    {

        $this->add_showbut($id);

    }

// xoa nut button

    public function xoa_showbut($id)

    {

        $data['item']=$this->adminmodel->getFirstRowWhere('config_checkpro',array('id'=>$id));

        // xoa truong du lieu trong table

        $this->load->dbforge();

        $this->dbforge->drop_column($data['item']->type, $data['item']->field);



        $this->adminmodel->Delete_where('config_checkpro',array('id' => $id));

        $this->session->set_flashdata("mess", "Xóa nút thành công!");

        redirect(base_url().'uetadmin/admin/setup_product');



    }

    public function popupdata_banner($id_edit=null)

    {

        $data = array();

        $data['id'] = $id=$this->input->get('id');

        $data['btn_name']='Thêm mới';

        if($id !=null){

            $id_edit = $id;

        }

        if($id_edit!=null){

            $data['item']=$this->adminmodel->getFirstRowWhere('config_banner',array('id'=>$id));

            $data['btn_name']='Sửa';

        }



        if (isset($_POST['addnews'])) {

            $arr = array(

                'name'        => $this->input->post('name'),

                'type'     => $this->input->post('type'),

                'field'     => $this->input->post('field'),

                'active'    => $this->input->post('active'),

            );



            if (!empty($_POST['edit'])){

                $id = $this->adminmodel->Update_where('config_banner', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            } else {

                $id = $this->adminmodel->Add('config_banner', $arr);

                $this->session->set_flashdata("mess", "Thêm mới thành công!");

            }

            redirect(base_url().'uetadmin/admin/setup_product');

        }

        $this->load->view('admin/modal/view_add_banner',$data);

    }

// xoa banner config

    public function xoa_config_banner($id)

    {

        $this->adminmodel->Delete_where('config_banner',array('id' => $id));

        $this->session->set_flashdata("mess", "Xóa config banner thành công!");

        redirect(base_url().'uetadmin/admin/setup_product');



    }

    // tao site_map cho website

    public function sitemap()

    {



        foreach ($this->session->userdata('phanquyen') as $key => $pq) {

            if($pq->resource=='news'){

                $module_news = 1;

            }elseif($pq->resource=='product'){

                $module_pro = 1;

            }elseif($pq->resource=='media'){

                $module_media = 1;

            }elseif($pq->resource=='pages'){

                $module_pages = 1;

            }elseif($pq->resource=='video'){

                $module_video = 1;

            }elseif($pq->resource=='raovat'){

                $module_raovat = 1;

            }

            if($pq->resource=='attribute'){

                foreach ($pq->cat_sub as $key2 => $pq_sub) {

                    if($pq_sub->resource=='listBrand'){

                        $module_brand = 1;

                    }elseif($pq_sub->resource=='listLocale'){

                        $module_xuatxu = 1;

                    }

                }

            }

        }



        $seconds = 60*60*60;

        set_time_limit ($seconds);

        $data = $this->adminmodel->getFields('alias','alias,type');

        $W3C_datetime = 'Y-m-d\Th:i:s';

        $Simple_datetime = 'YYYY-MM-DD';

        $output = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";

        $output .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // list route URL 

        // list Alias 

        if(count($data)){

            foreach ($data as  $item) {

                $time = date($W3C_datetime,time('now'));

                switch ($item->type) {

                    case 'pro':

                        if(isset($module_pro)){

                            $freq = 'daily';

                            $priority = 1;

                            $url = site_url('san-pham/'.$item->alias);

                            //$time = date($W3C_datetime,time('now'));

                        }

                        break;

                    case 'new':

                        if(isset($module_news)){

                            $freq = 'daily';

                            $priority = 0.8;

                            $url = site_url('new/'.$item->alias);

                        }

                        break;

                    case 'cate-pro':

                        if(isset($module_pro)){

                            $freq = 'weekly';

                            $priority = 0.8;

                            $url = site_url('danh-muc/'.$item->alias);

                        }

                        break;

                    case 'cate-new':

                        if(isset($module_news)){

                            $freq = 'weekly';

                            $priority = 0.6;

                            $url = site_url('danh-muc-tin/'.$item->alias);

                        }

                        break;

                    case 'page':

                        if(isset($module_pages)){

                            $freq = 'monthly';

                            $priority = 0.4;

                            $url = site_url('page/'.$item->alias);

                        }

                        break;

                    case 'hangsx':

                        if(isset($module_brand)){

                            $freq = 'monthly';

                            $priority = 0.6;

                            $url = site_url('san-xuat/'.$item->alias);

                        }

                        break;

                    case 'm-cat':

                        if(isset($module_media)){

                            $freq = 'monthly';

                            $priority = 0.6;

                            $url = site_url('media/'.$item->alias);

                        }

                        break;

                    case 'media':

                        if(isset($module_media)){

                            $freq = 'monthly';

                            $priority = 0.6;

                            $url = site_url('media-detail/'.$item->alias);

                        }

                        break;

                    case 'video-cat':

                        if(isset($module_video)){

                            $freq = 'monthly';

                            $priority = 0.6;

                            $url = site_url('video/'.$item->alias);

                        }

                        break;

                    case 'video':

                        if(isset($module_video)){

                            $freq = 'monthly';

                            $priority = 0.6;

                            $url = site_url('video-detail/'.$item->alias);

                        }

                        break;

                    case 'cate-ser':

                        if(isset($module_raovat)){

                            $freq = 'monthly';

                            $priority = 0.6;

                            $url = site_url('rao-vat/'.$item->alias);

                        }

                        break;

                    case 'services':

                        if(isset($module_raovat)){

                            $freq = 'monthly';

                            $priority = 0.6;

                            $url = site_url('tin-rao/'.$item->alias);

                        }

                        break;

                    default:

                        $freq = 'daily';

                        $priority = 1;

                        $url = '';

                        break;

                }

                if(!empty($url)){

                    $output .= '<url>

                      <loc>'.$url.'</loc>

                      <lastmod>'.$time.'  </lastmod>

                      <changefreq>'.$freq.'</changefreq>

                      <priority>'.$priority.'</priority>

                    </url>';

                }

            }

        }



        $output .= "\n".'</urlset>'."\n";

        $xml=simplexml_load_string($output) or die("Error: Không Thể Tạo XML SiteMap");

        if($xml->asXML('sitemap.xml')){

            $this->session->set_flashdata("mess", "SiteMap.xml đã tạo thành công !!!");

            redirect($_SERVER['HTTP_REFERER']);

        }else{

            $this->session->set_flashdata("mess_err", "SiteMap.xml Không Tạo Được - Kiểm Tra Phân Quyền Thư Mục !!!");

            redirect($_SERVER['HTTP_REFERER']);

        };

    }

    // câu hinh wiget

    public function setup_wiget($id=null){





        $data['config_wiget'] = $this->adminmodel->get_data('config_wiget');

        $data['headerTitle'] = 'Cấu hình wiget';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/system/setup_wiget', $data);

        $this->load->view('admin/footer');

    }



    public function popupdata_wiget($id_edit=null)

    {

        $data = array();

        $data['id'] = $id=$this->input->get('id');

        $data['btn_name']='Thêm mới';

        if($id !=null){

            $id_edit = $id;

        }

        if($id_edit!=null){

            $data['item']=$this->adminmodel->getFirstRowWhere('config_wiget',array('id'=>$id));

            $data['btn_name']='Sửa';

        }



        if (isset($_POST['addnews'])) {

            $arr = array(

                'name'        => $this->input->post('name'),

                'type'     => $this->input->post('type'),

                'field'     => $this->input->post('field'),

                'active'    => $this->input->post('active'),

            );



            if (!empty($_POST['edit'])){

                $id = $this->adminmodel->Update_where('config_wiget', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            } else {

                $id = $this->adminmodel->Add('config_wiget', $arr);

                $this->session->set_flashdata("mess", "Thêm mới thành công!");

            }

            redirect(base_url().'uetadmin/admin/setup_wiget');

        }

        $this->load->view('admin/modal/view_add_wiget',$data);

    }

// xoa config wiget

    public function xoa_config_wiget($id)

    {

        $this->adminmodel->Delete_where('config_wiget',array('id' => $id));

        $this->session->set_flashdata("mess", "Xóa config wiget thành công!");

        redirect(base_url().'uetadmin/admin/setup_wiget');



    }

}