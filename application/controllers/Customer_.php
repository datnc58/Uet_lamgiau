<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_usersmodel');
        $this->load->library('pagination');
        $this->load->library('filter');
        $this->load->library('hash');
    }
    public function signup()
    {
        $data = array();
        //key login
        $data['formkey'] = $formkey =  rand();
        $this->session->set_userdata('formkey',$formkey);

        $this->load->view('customers/view_signup',$data);
    }
    public function checkUser($data = array()){
        $prevQuery = $this->f_usersmodel->getFirstRowWhere('users',array(
            'oauth_provider'=>$data['oauth_provider'],
            'oauth_uid'=>$data['oauth_uid']
        ));

        if(!empty($prevQuery)){
            $prevResult = $this->f_usersmodel->getFirstRowWhere('users',array(
                    'oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid'])
            );
            $data['modified'] = date("Y-m-d H:i:s");
            $this->f_usersmodel->update('users',$prevResult->id,$data);
        }else{
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $this->f_usersmodel->add('users',$data);
        }
        $result = $this->f_usersmodel->getFirstRowWhere('users',array(
            'oauth_provider'=>$data['oauth_provider'],
            'oauth_uid'=>$data['oauth_uid']
        ));
        return $result;
    }
    public function logout() {
        //$this->session->unset_userdata('token');
        //$this->session->unset_userdata('userData');
        $this->session->unset_userdata(array('userid'=>'','username'=>'','usermail'=>'',));
        //$this->session->sess_destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }
    //create user register
    public function createpost()
    {
        if($this->input->post('form_key') && $this->input->post('form_key') == $this->session->userdata('formkey'))
        {
            if($this->checkEmail(trim($this->input->post('email')))){
                $salt = $this->hash->key(8);
                $arr = array(
                    'oauth_provider' => 'site',
                    'first_name' => '',
                    'last_name' => $this->input->post('fullname'),
                    'email' => $this->input->post('email'),
                    'phone' => $this->input->post('phone'),
                    'created' => date("Y-m-d H:i:s"),
                    'use_salt'          =>      $salt,
                    'use_password' => $this->hash->create($this->input->post('password'), $salt, 'md5sha512'),
                    'use_key'           =>      $this->hash->create($this->input->post('first_name'), $this->input->post('last_name'), 'sha256md5'),
                    'use_status' => 1,
                    'province' => $this->input->post('province'),

                );
                $id = $this->f_usersmodel->Add('users',$arr);
                if($id){
                    $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                        'id' => $id
                    ));
                    $userData['oauth_provider'] = 'site';
                    $userData['oauth_uid'] = $user->id;
                    $userData['first_name'] = $user->first_name;
                    $userData['last_name'] = $user->last_name;
                    $userData['email'] = $user->email;
                    $userData['picture_url'] = $user->picture_url;
                    $this->session->set_userData('userData',$userData);
                    $this->session->set_userData('mess','Chúc mừng bạn đã đăng ký thành công !');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                redirect(site_url().'customer/error_register');
            }
        }

    }
    public function checkEmail($email){
        $check = $this->f_usersmodel->getFirstRowWhere('users',array(
            'email' => $email
        ));
        if(!empty($check)){
            return false;
        }
        else{
            return true;
        }
    }
    public function registerSuccess(){
        $data = array();
        if(isset($_GET['u'])){
            $data['u']=$this->f_usersmodel->getFirstRowWhere('users',array('use_key'=>$_GET['u']));

        }
        $seo = array(
            'title' => 'Đăng ký thành công - Đăng ký'
        );
        $this->LoadHeader(null,$seo);
        $this->load->view('customers/success_signup',$data);
        $this->LoadFooter();
    }
    public function userActive(){
        if(isset($_GET['id'])&& isset($_GET['token'])){
            $id=$_GET['id'];
            $user=$this->f_usersmodel->getFirstRowWhere('users',array('use_salt'=>$id));
            if($user->use_key==$_GET['token']){
                $this->f_usersmodel->Update_where('users',array('id'=>$user->id),array('use_status'=>1));
            }
            $seo = array(
                'title' => "Kích hoạt tài khoản"
            );
            $data = array();
            $this->LoadHeader(null,$seo,false);
            $this->load->view('users/success_active_user',$data);
            $this->LoadFooter();

        }else
        {redirect(base_url());}
    }
    public function error_register()
    {
        $url = base_url();
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
        echo '<script type="text/javascript">alert("Email này đã có người đăng ký !!! Vui lòng thử lại");</script>';
        echo "<script>window.location='".$url."'</script>";
    }
    public function login(){
        /*$email = $_POST['email'];
        $pass = $_POST['pass'];*/
        $check = false;
        $mess = '';
        if($this->input->post('email') && trim($this->input->post('email')) != '' && $this->input->post('pass') && trim($this->input->post('pass')) != ''){
            $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                'email' => $this->filter->injection_html($this->input->post('email'))
            ));
            if(!empty($user)){
                $this->load->library('hash');
                $password = $this->hash->create($this->input->post('pass'), $user->use_salt, 'md5sha512');
                if($user->use_password === $password && $user->use_status == 1 && $user->oauth_provider == 'site'){
                    $userData['oauth_provider'] = 'site';
                    $userData['oauth_uid'] = $user->id;
                    $userData['first_name'] = $user->first_name;
                    $userData['last_name'] = $user->last_name;
                    $userData['email'] = $user->email;
                    $userData['picture_url'] = $user->picture_url;
                    $this->session->set_userdata('userData',$userData);
                    $check = true;
                }else{
                    $mess = "Sai mật khẩu !!!";
                }
            }else{
                $mess = "Tài khoản đăng nhập sai !!!";
            }
        }
        $data['check'] = $check;
        $data['mess'] = $mess;
        echo json_encode($data);
    }
    public function addWishList()
    {
        $pro_id = $this->input->post('pro_id');
        $user_id = $this->input->post('user_id');
        $item = $this->f_usersmodel->getFirstRowWhere('wishlist',array(
            'pro_id' => $pro_id, 'user_id' => $user_id
        ));
        if(!empty($item)){
            $check = false;
            $data['mess'] = 'Sản phẩm này đã có trong danh sách sản phẩm yêu thích của bạn!';
        }else{
            $check = true;
            $this->f_usersmodel->Add('wishlist',array(
                'pro_id' => $pro_id,
                'user_id' => $user_id
            ));
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    //list user order
    public function Orders()
    {
        $data = array();
        $user_id = $this->session->userdata('userid');
        if(empty($user_id)){
            redirect(base_url());
        }
        $userinfo = $this->f_usersmodel->getFirstRowWhere('users',array(
            'id' => $user_id
        ));
        $config['page_query_string']    = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['base_url']             = base_url('danh-sach-don-hang?');
        $config['total_rows']           = $this->f_usersmodel->countItemOrders($user_id);
        $config['per_page']             = 20;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['lists'] = $this->f_usersmodel->getItemOrders($user_id,$config['per_page'],$this->input->get('per_page'));
        //echo "<pre>";var_dump($data['lists']);die();
        $seo = array(
            'title' => 'Oders',
            'description' => 'Oders',
            'keyword' => 'Oders',
            'type'=>'products'
        );
        $this->LoadHeader(null,$seo,false);
        $this->load->view('users/view_orders',$data);
        $this->LoadFooter();
    }
}