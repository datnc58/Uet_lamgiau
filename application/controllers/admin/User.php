<?php
class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('group_model');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'administ', 'location');
            die();
        }
        $this->load->library('filter');
        $this->load->library('hash');
    }
    public function index()
    {
        if(!$this->check->is_allowed($this->session->userdata('sessionPermissionAdmin'), 'user_view'))
        {
            show_error('Bạn không có quyền truy cập chức năng này');
            die();
        }
        $data['userLogined'] = $this->session->userdata('sessionUserAdmin');
        #Define url for $getVar
        $action = array('search', 'keyword', 'filter', 'key', 'sort', 'by', 'page', 'status', 'id');
        $getVar = $this->uri->uri_to_assoc(3, $action);
        #BEGIN: Search & Filter
        $where = '';
        $sort = '';
        $by = '';
        $sortUrl = '';
        $pageSort = '';
        $pageUrl = '';
        $keyword = '';
        #If search
        if($getVar['search'] != FALSE && trim($getVar['search']) != '' && $getVar['keyword'] != FALSE && trim($getVar['keyword']) != '')
        {
            $keyword = $getVar['keyword'];
            switch(strtolower($getVar['search']))
            {
                case 'username':
                    $sortUrl .= '/search/username/keyword/'.$getVar['keyword'];
                    $pageUrl .= '/search/username/keyword/'.$getVar['keyword'];
                    $where .= "username LIKE '%".$this->filter->injection($getVar['keyword'])."%'";
                    break;
                case 'fullname':
                    $sortUrl .= '/search/fullname/keyword/'.$getVar['keyword'];
                    $pageUrl .= '/search/fullname/keyword/'.$getVar['keyword'];
                    $where .= "fullname LIKE '%".$this->filter->injection($getVar['keyword'])."%'";
                    break;
            }
        }
        #If filter
        elseif($getVar['filter'] != FALSE && trim($getVar['filter']) != '' && $getVar['key'] != FALSE && trim($getVar['key']) != '')
        {
            switch(strtolower($getVar['filter']))
            {
                case 'regisdate':
                    $sortUrl .= '/filter/regisdate/key/'.$getVar['key'];
                    $pageUrl .= '/filter/regisdate/key/'.$getVar['key'];
                    $where .= "use_regisdate = ".(float)$getVar['key'];
                    break;
                case 'enddate':
                    $sortUrl .= '/filter/enddate/key/'.$getVar['key'];
                    $pageUrl .= '/filter/enddate/key/'.$getVar['key'];
                    $where .= "use_enddate = ".(float)$getVar['key'];
                    break;
                case 'active':
                    $sortUrl .= '/filter/active/key/'.$getVar['key'];
                    $pageUrl .= '/filter/active/key/'.$getVar['key'];
                    $where .= "use_status = 1";
                    break;
                case 'deactive':
                    $sortUrl .= '/filter/deactive/key/'.$getVar['key'];
                    $pageUrl .= '/filter/deactive/key/'.$getVar['key'];
                    $where .= "use_status = 0";
                    break;
                case 'admin':
                    $sortUrl .= '/filter/admin/key/'.$getVar['key'];
                    $pageUrl .= '/filter/admin/key/'.$getVar['key'];
                    $where .= "use_group = 4";
                    break;
                case 'saler':
                    $sortUrl .= '/filter/saler/key/'.$getVar['key'];
                    $pageUrl .= '/filter/saler/key/'.$getVar['key'];
                    $where .= "use_group = 3";
                    break;
                case 'vip':
                    $sortUrl .= '/filter/vip/key/'.$getVar['key'];
                    $pageUrl .= '/filter/vip/key/'.$getVar['key'];
                    $where .= "use_group = 2";
                    break;
                case 'normal':
                    $sortUrl .= '/filter/normal/key/'.$getVar['key'];
                    $pageUrl .= '/filter/normal/key/'.$getVar['key'];
                    $where .= "use_group = 1";
                    break;
            }
        }
        #If sort
        if($this->input->get('sort') && trim($this->input->get('sort')) != '')
        {
            switch(strtolower($this->input->get('sort')))
            {
                case 'username':
                    $pageUrl .= '?sort=username';
                    $sort .= "username";
                    break;
                case 'fullname':
                    $pageUrl .= '?sort=fullname';
                    $sort .= "username";
                    break;
                case 'email':
                    $pageUrl .= '?sort=email';
                    $sort .= "email";
                    break;
                case 'group':
                    $pageUrl .= '?sort=group';
                    $sort .= "use_group";
                    break;
                case 'regisdate':
                    $pageUrl .= '?sort=regisdate';
                    $sort .= "use_regisdate";
                    break;
                case 'enddate':
                    $pageUrl .= '?sort=enddate';
                    $sort .= "use_enddate";
                    break;
                default:
                    $pageUrl .= '?sort=id';
                    $sort .= "id";
            }
            if($this->input->get('by') != FALSE && strtolower($this->input->get('by')) == 'desc')
            {
                $pageUrl .= '?by=desc';
                $by .= "DESC";
            }
            else
            {
                $pageUrl .= '?by=asc';
                $by .= "ASC";
            }
        }
        if($getVar['page'] != FALSE && (int)$getVar['page'] > 0)
        {
            $start = (int)$getVar['page'];
            $pageSort .= '/page/'.$start;
        }
        else
        {
            $start = 0;
        }
        $data['keyword'] = $keyword;
        $data['sortUrl'] = base_url().'uetadmin/user/index/'.$sortUrl.'?sort=';
        $data['pageSort'] = $pageSort;
        $statusUrl = $pageUrl.$pageSort;
        $data['statusUrl'] = base_url().'administ/user'.$statusUrl;
        if($getVar['status'] != FALSE && trim($getVar['status']) != '' && $getVar['id'] != FALSE && (int)$getVar['id'] > 0)
        {
            if(!$this->check->is_allowed($this->session->userdata('sessionPermissionAdmin'), 'user_edit'))
            {
                show_error($this->lang->line('unallowed_use_permission'));
                die();
            }
            #END CHECK PERMISSION
            switch(strtolower($getVar['status']))
            {
                case 'active':
                    $this->user_model->update(array('use_status'=>1), "id = ".(int)$getVar['id']);
                    break;
                case 'deactive':
                    $this->user_model->update(array('use_status'=>0), "id = ".(int)$getVar['id']);
                    break;
            }
            redirect($data['statusUrl'], 'location');
        }
        $this->load->library('pagination');
        $totalRecord = count($this->user_model->fetch("id", $where, "", ""));
        $config['base_url'] = base_url().'uetadmin/user/index'.$pageUrl.'';
        $config['total_rows'] = $totalRecord;
        $config['per_page'] = 15;
        $config['num_links'] = 5;
        $config['cur_page'] = $start;
        $this->pagination->initialize($config);
        $data['linkPage'] = $this->pagination->create_links();
        #END Pagination
        #sTT - So thu tu
        $data['sTT'] = $start + 1;
        $select = "id, username, fullname,  email, use_group, address, phone, use_yahoo, gro_name, use_status, use_regisdate, use_enddate";
        $limit = 15;
        $data['user'] = $this->user_model->fetch_join($select, "LEFT", "tbtt_group", "users.use_group = tbtt_group.gro_id", $where, $sort, $by, $start, $limit);

        $data['headerTitle'] = "Danh sách thành viên";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/user/defaults', $data);
        $this->load->view('admin/footer');
    }
    public function add($id_edit = null)
    {

        $data = array();

        if($id_edit!=null){
            $data['edit']=$this->user_model->getFirstRowWhere('users',array('id'=>$id_edit));
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
            if($this->input->post('role_user') == '4')
            {
                $enddate = mktime(0, 0, 0, date('m'), date('d'), 2035);
            }
            elseif($this->input->post('role_user') == '3')
            {
                $enddate = $regisdate;
            }
            elseif($this->input->post('role_user') == '2')
            {
                $enddate = mktime(0, 0, 0, (int)$this->input->post('endmonth_user'), (int)$this->input->post('endday_user'), (int)$this->input->post('endyear_user'));
            }
            else
            {
                $enddate = mktime(0, 0, 0, date('m'), date('d'), (int)date('Y')+10);
            }
            $lastest_login = $regisdate;

            $dataAdd = array(
                'username'      =>      trim(strtolower($this->filter->injection_html($this->input->post('username_user')))),
                // 'password'      =>      $pass,
                'use_salt'          =>      $salt,
                'email'         =>      trim(strtolower($this->filter->injection_html($this->input->post('email_user')))),
                'username'      =>      trim($this->filter->injection_html($this->input->post('fullname_user'))),
                'sex'           =>      (int)$this->input->post('sex_user'),
                'use_group'         =>      (int)$this->input->post('role_user'),
                'use_status'        =>      $active_user,
                'use_regisdate'     =>      $regisdate,
                'use_enddate'       =>      $enddate,
                'use_key'           =>      $this->hash->create($this->input->post('username_user'), $this->input->post('username_user'), 'sha256md5'),
                'lastest_login' =>      $lastest_login,
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
                $id = $this->user_model->Update_where('users',array('id'=>$id_edit),$dataAdd);
            }else{
                //add user
                $this->input->post('password_user');
                for ($i=0; $i < 5; $i++) {
                $pass = md5($pass);
                }
                $dataAdd['password'] = $pass;
                $this->user_model->Add('users',$dataAdd);
            }
            redirect(base_url('uetadmin/user/index'));
        }
        $data['group'] = $this->group_model->fetch("gro_id, gro_name", "gro_status = 1", "gro_order", "ASC");
        $data['headerTitle'] = "Thêm thành viên";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/user/add');
        $this->load->view('admin/footer');
    }
    public function delete()
    {
        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)
        {
            #BEGIN: CHECK PERMISSION
            if(!$this->check->is_allowed($this->session->userdata('sessionPermissionAdmin'), 'user_delete'))
            {
                show_error('Bạn không có quyền xóa !!!');
                die();
            }
            $idUser = $this->input->post('checkone');
            $this->user_model->delete($idUser, "id");
            redirect(base_url('uetadmin/user/index'));
        }

    }
    public function active($id)
    {
        $this->group_model->Update_where('users',array(
            'id' => $id
        ),array(
            'use_status' => 1
        ));
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deactive($id)
    {

        $this->group_model->Update_where('users',array(
            'id' => $id
        ),array(
            'use_status' => 0
        ));
        redirect($_SERVER['HTTP_REFERER']);
    }
}