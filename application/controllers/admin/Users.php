<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct() {
        parent::__construct();
		$this->load->model('usersmodel');
        $this->load->library('pagination');
		 if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
			show_error('Bạn không có quyền truy cập vào chức năng này !!!');
            die();
        }
    }
	protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination pagination-sm'>",
        'full_tag_close'=>"</ul>",
        'num_tag_open'=>'<li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",
        'cur_tag_close'=>"<span class='sr-only'></span></a></li>",
        'next_tag_open'=>"<li>",
        'next_tagl_close'=>"</li>",
        'prev_tag_open'=>"<li>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tagl_close'=>"</li>",
    );
	public function index(){
		$data['headerTitle'] = "Thành viên";
		 
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/users/infomation_user', $data);
        $this->load->view('admin/footer');
	}
    public function listusers(){
		if($this->input->get()){
            $where = array(
                'phone' => $this->input->get('phone')?$this->input->get('phone'):'',
                'name' => $this->input->get('fullname'),
                'email' => $this->input->get('email'),
                'view' => $this->input->get('view'),
				'lever ' => 0
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('uetadmin/users/listusers?phone='
                . $this->input->get('phone')
                . '&name=' . $this->input->get('fullname')
                . '&email=' . $this->input->get('email')
				. '&view=' . $this->input->get('view')
            );
            $config['total_rows']           = $this->usersmodel->count_listuser($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->getListuser($where, $config['per_page'], $this->input->get('per_page'));
		}else{
			$where = array(
			'lever ' => 0
			);
            $config['base_url'] = base_url('uetadmin/users/listusers');
            $config['total_rows'] = $this->usersmodel->count_All('users'); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->get_data('users',$where,array('id' => 'desc'), $config['per_page'],
                $this->uri->segment(4));
        }

		$data['users_all'] = $this->usersmodel->get_data('users',array(),array('id' => 'desc'));
		$auto_fullname = '';
		$auto_email = '';
		$auto_phone = '';
        foreach ($data['users_all'] as $nameget) {
            $subname = $nameget->fullname;
            $subemail = $nameget->email;
            $subphone = $nameget->phone;
            if ($auto_email == null) {
                $auto_email = $subemail;
            } else {
                $auto_email = $auto_email . "," . $subemail;
            }
			if ($auto_fullname == null) {
                $auto_fullname = $subname;
            } else {
                $auto_fullname = $auto_fullname . "," . $subname;
            }
			if ($auto_phone == null) {
                $auto_phone = $subphone;
            } else {
                $auto_phone = $auto_phone . "," . $subphone;
            }
        }
        $data['auto_phone'] = $auto_phone;
        $data['auto_email'] = $auto_email;
        $data['auto_fullname'] = $auto_fullname;
        $data['headerTitle'] = "Thành viên";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/users/list', $data);
        $this->load->view('admin/footer');
    }
	 //Xóa nhieu ban ghi
    public function deletes()
    {
        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_users_once($id);
            }
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_users_once($id){
        if (is_numeric($id)) {
			$this->usersmodel->Delete_where('users',array('id' => $id));
        } else return false;
    }
	// xoa 1 ban ghi
	public function delete($id)
    {
		$this->delete_users_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function smslist(){
        // $this->load->helper('MY_email_helper');
        // $sms = sms_send('jsakdjk', 'jskdjk');
        // die();
        // xoá tin SMS
        if(isset($_POST['xoasms'])){
            $id = $this->input->post('xoasms');
            $arr = array('status'=>$this->usersmodel->Delete('user_sms',$id));
            echo json_encode($arr);
            return null;
        }
        // gửi lại tin
        if(isset($_POST['guisms'])){
            $guisms = $this->input->post('guisms');

            $smsitem = $this->usersmodel->getFirstRowWhere('user_sms',array('smsid'=>$guisms ));
            if(!empty($smsitem)){
                $user = $this->usersmodel->getFirstRowWhere('users',array('id'=>$smsitem->userid ));
                if(!empty($user)){
                    $this->load->helper('email_helper');
                    $sms = sms_send($user->phone, $smsitem->content);
                    // lưu giữ liệu vào bẳng
                    $sms['userid'] = $user->id ;
                    $sms['comment'] = 'gửi lại';
                    $this->usersmodel->Add('user_sms',$sms);
                }else{
                    $sms = array(
                    'result' => 99,
                    'error' => 'Tài Khoản Không Tồn Tại Hoặc Đã Xoá'
                    );
                }
                //$sms = sms_send('0000','SMS test');
            }else{
                $sms = array(
                    'result' => 99,
                    'error' => 'Mã Tin Nhắn Không Đúng'
                    );
            }
            echo json_encode($sms);
            return null;
        }
        // gửi tin mới
        if(isset($_POST['sendsmsid'])){
            // lấy thông tin SMS cũ trả về client
            $guisms = $this->input->post('sendsmsid');
            $smsitem = $this->usersmodel->getFirstRowWhere('user_sms',array('smsid'=>$guisms ));
            if(!empty($smsitem)){
                echo json_encode($smsitem);
            }
            return null;
        }
        if(isset($_POST['sendsms'])){
            $userid = $this->input->post('userid');
            $content = $this->input->post('content');
            $user = $this->usersmodel->getFirstRowWhere('users',array('id'=>$userid ));
                if(!empty($user)){
                    $this->load->helper('email_helper');
                    $sms = sms_send($user->phone, $content);
                    // lưu giữ liệu vào bẳng
                    $sms['userid'] = $user->id ;
                    $sms['comment'] = 'gửi lại';
                    $this->usersmodel->Add('user_sms',$sms);
                }else{
                    $sms = array(
                    'result' => 99,
                    'error' => 'Tài Khoản Không Tồn Tại Hoặc Đã Xoá'
                    );
                }
            echo json_encode($sms);
            return null;
        }
        $config['base_url'] = base_url('uetadmin/users/smslist');
        $config['total_rows'] = $this->usersmodel->count_All('user_sms'); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data = array();
        $data['smslist'] = $this->usersmodel->get_data('user_sms',null,array('id'=>'desc'),$config['per_page'],$this->uri->segment(4));
        //echo "<pre>";var_dump($data);die();
        $data['headerTitle']="Gửi Tin SMS";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/users/users_sms',$data);
        $this->load->view('admin/footer');
    }

//============ hiện thị thong tin thanh vien ========================
	public function popupdata()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id   = $_GET['id'];
            $data['detail'] = $item = $this->usersmodel->getFirstRowWhere('users', array('id' => $id));
			$data['id']='id';
			$this->load->view('admin/modal/view_detail_users',$data);
          //json_encode($rs);
        }
    }
//======= danh sach tài khoản admin =============================================================
public function listuser_admin(){
		if($this->input->get()){
			if($this->session->userdata('adminfull')->lever ==3){
            $where = array(
                'phone' => $this->input->get('phone')?$this->input->get('phone'):'',
                'name' => $this->input->get('fullname'),
                'email' => $this->input->get('email'),
                'view' => $this->input->get('view'),
				'lever =' => 1
            );
			}else{
				$where = array(
					'phone' => $this->input->get('phone')?$this->input->get('phone'):'',
					'name' => $this->input->get('fullname'),
					'email' => $this->input->get('email'),
					'view' => $this->input->get('view'),
					'lever >=' => 1
				);
			}
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('uetadmin/users/listuser_admin?phone='
                . $this->input->get('phone')
                . '&name=' . $this->input->get('fullname')
                . '&email=' . $this->input->get('email')
				. '&view=' . $this->input->get('view')
            );
            $config['total_rows']           = $this->usersmodel->count_listuser($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->getListuser($where, $config['per_page'], $this->input->get('per_page'));
		}else{
			
			if($this->session->userdata('adminfull')->lever ==3){
				$where = array(
					'lever >=' => 1
				);
			}else{
				$where = array(
				'lever =' => 1
				);
			}
			
            $config['base_url'] = base_url('uetadmin/users/listuser_admin');
            $config['total_rows'] = $this->usersmodel->count_All('users'); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->usersmodel->get_data('users',$where,array('id' => 'desc'), $config['per_page'],
                $this->uri->segment(4));
        }

		$data['users_all'] = $this->usersmodel->get_data('users',array(),array('id' => 'desc'));
		$auto_fullname = '';
		$auto_email = '';
		$auto_phone = '';
        foreach ($data['users_all'] as $nameget) {
            $subname = $nameget->fullname;
            $subemail = $nameget->email;
            $subphone = $nameget->phone;
            if ($auto_email == null) {
                $auto_email = $subemail;
            } else {
                $auto_email = $auto_email . "," . $subemail;
            }
			if ($auto_fullname == null) {
                $auto_fullname = $subname;
            } else {
                $auto_fullname = $auto_fullname . "," . $subname;
            }
			if ($auto_phone == null) {
                $auto_phone = $subphone;
            } else {
                $auto_phone = $auto_phone . "," . $subphone;
            }
        }
        $data['auto_phone'] = $auto_phone;
        $data['auto_email'] = $auto_email;
        $data['auto_fullname'] = $auto_fullname;
        $data['headerTitle'] = "Thành viên";
        //$this->load->view('admin/header', $data);
		$this->LoadHeaderAdmin($data);
        $this->load->view('admin/users/list_user_admin', $data);
        $this->load->view('admin/footer');
    }

// them thanh vien quan trị  ===============================
	  public function add_users($id_edit = null)
    {
		//$this->load->model('group_model');
		$this->load->library('filter');
        $this->load->library('hash');
        $data = array();
        if($id_edit!=null){
            $data['edit']=$this->usersmodel->getFirstRowWhere('users',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
//            $data['max_sort']=$data['edit']->sort;
        }
        if(isset($_POST['adduser']))
        {
            $salt = $this->hash->key(8);
            if($this->input->post('active_user') == '1')
            {
                $active_user = 1;
            }
            else
            {
                $active_user = 0;
            }
            $regisdate = mktime(0, 0, 0, date('m'), date('d'), date('Y'));

            $dataAdd = array(
                'username'      =>      trim(strtolower($this->filter->injection_html($this->input->post('username_user')))),
                'use_salt'          =>      $salt,
                'email'         =>      trim(strtolower($this->filter->injection_html($this->input->post('email_user')))),
                'fullname'      =>      trim($this->filter->injection_html($this->input->post('fullname_user'))),
                'sex'           =>      (int)$this->input->post('sex_user'),
                'active'        =>      $active_user,
                'lever'        =>      1,
                'use_regisdate'     =>      $regisdate,
                'use_enddate'       =>      $regisdate,
                'use_key'           =>      $this->hash->create($this->input->post('username_user'), $this->input->post('username_user'), 'sha256md5'),
                'lastest_login' =>      $regisdate,
                'phone'         => $this->input->post('phone'),
            );
            $pass = $this->input->post('password_user');
            $repass = $this->input->post('repassword_user');
            if(!empty($_POST['edit'])){
                if(!empty($pass) && ($pass == $repass)){
                   for ($i=0; $i < 5; $i++) {
                        $pass = md5($pass);
                    }
                    $dataAdd['password'] = $pass;
                }
                $id = $this->usersmodel->Update_where('users',array('id'=>$id_edit),$dataAdd);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            }else{
                //add user
                $this->input->post('password_user');
                for ($i=0; $i < 5; $i++) {
                $pass = md5($pass);
                }
                $dataAdd['password'] = $pass;
                $id=$this->usersmodel->Add('users',$dataAdd);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
            $this->usersmodel->Update_Where('users', array('id' => $id),
                    array('md5_id' => md5($id), 'token' => md5($this->input->post('email_user') . $id),));

            redirect(base_url('uetadmin/users/listuser_admin'));
        }
        $data['headerTitle'] = "Thêm thành viên";
		$this->LoadHeaderAdmin($data);
        $this->load->view('admin/users/add');
        $this->load->view('admin/footer');
    }
}