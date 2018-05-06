<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/facebook/facebook.php';

class Modal extends MY_Controller {
    function __construct()
    {
        parent::__construct();
    }
     public function login(){
        $data = array();
        $this->load->view('modal/view_login',$data);
    }
// dang kys thanh vien
    public function register(){
        $this->load->helper('unlink');
        unlink_captcha($this->session->userdata('sessionPathCaptchaPostAds'));
        #BEGIN: Create captcha post ads
        $this->load->library('captcha');
        $codeCaptcha = $this->captcha->code(5);
        $this->session->set_userdata('sessionCaptchaPostAds', $codeCaptcha);
        $imageCaptcha = 'assets/captcha/'.md5(microtime()).'posa.jpg';
        $this->session->set_userdata('sessionPathCaptchaPostAds', $imageCaptcha);
        $this->captcha->create($codeCaptcha, $imageCaptcha);
        if(file_exists($imageCaptcha))
        {
            $data['imageCaptchaPostAds'] = $imageCaptcha;
            $data['captcha_check'] = $codeCaptcha;
        }
        $data['tinh'] =  $this->system_model->get_data('province',null,null);
        $data['code_captcha'] = $codeCaptcha;
        $data['formkey'] = $formkey =  rand();
        $this->session->set_userdata('formkey',$formkey);
        $this->load->view('modal/view_register',$data);
    }
 // refesh ma cap cha
    public function capchar_refresh(){
        $this->load->helper('unlink');
        unlink_captcha($this->session->userdata('sessionPathCaptchaPostAds'));
        #BEGIN: Create captcha post ads
        $this->load->library('captcha');
        $codeCaptcha = $this->captcha->code(5);
        $this->session->set_userdata('sessionCaptchaPostAds', $codeCaptcha);
        $imageCaptcha = 'assets/captcha/'.md5(microtime()).'posa.jpg';
        $this->session->set_userdata('sessionPathCaptchaPostAds', $imageCaptcha);
        $this->captcha->create($codeCaptcha, $imageCaptcha);
        if(file_exists($imageCaptcha))
        {
            $data['imageCaptchaPostAds'] = $imageCaptcha;
            $data['captcha_check'] = $codeCaptcha;
        }
        $data['code_captcha'] = $codeCaptcha;
        $this->load->view('modal/capchar_refresh', $data);
    }
  // thay đổi mật khẩu
    public function changePass()
    {
        $this->load->view('modal/view_changepass');
    }
// thong tin tai khoan
    public function userInfo()
    {
        if($this->session->userdata('userid')){
            @$u=$this->system_model->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));
            $data['user_item'] = $u;
        }
        $this->load->view('modal/view_userinfo',$data);
    }
// thong tin san pham
    public function product(){
        $data = array();
        $id = $_POST['id'];
        $data['item'] = $this->system_model->getFirstRowWhere('product',array(
            'id' => $id
        ));
        $this->load->view('modal/modal_product',$data);
    }
// quên mật khâu
    function forgotPass()
    {
        $data = array();
        $this->load->view('modal/view_forgot_pass',$data);
    }
}