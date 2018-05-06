<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    //index
    public function index(){
        if(isset($_POST['sendcontact'])){
            $arr=array('full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),
                'comment' => $this->input->post('comment'),
                'time' => time(),
            );
            $id=$this->system_model->Add('contact',$arr);

            if($id){
                $this->session->set_flashdata("mess", "Bạn đã gửi thông tin liên hệ thành công!");
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['info_contact']=$this->system_model->getFirstRowWhere('staticpage',array(
            'lang' => $this->language,
            'contact_page' => 1
        ));
        $data['hotlines'] = $this->system_model->get_data('support_online',array(
            'type' => 2
        ));
        $data['home_left']=$this->load->widget('home_left');
        $data['doitac']=$this->load->widget('doitac');
        $seo = array(
            'title' => 'Liên Hệ'
        );

        $this->LoadHeader(null,$seo,true);
        $this->load->view('contact/contact',$data);
        $this->LoadFooter();
    }
     // dang ky  mail tran manh
    public  function add_email(){
        if(isset($_POST['email'])){
            $arr=array(
              //  'name' => $_POST['name'],
                'email' => $_POST['email'],
              //  'content' => $_POST['content'],
                'time' => time()
            );
            $item = $this->system_model->getFirstRowWhere('emails',array('email',$_POST['email']));
            if(!empty($item)){
                $this->system_model->Update_where('emails',array('if',$item->id),$arr);
            }
            else{
                $this->system_model->Add('emails',$arr);
            }
            $this->session->set_flashdata("mess", "Email của bạn đăng ký thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
   // dat cau hoi dap
    public function  sendQuestion(){
        if(isset($_POST['sendcontact'])){
            $arr=array('full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'comment' => $this->input->post('comment'),
                'cat_name' => $this->input->post('cat_name'),
                'time' => time(),
            );
            $id=$this->system_model->Add('contact',$arr);

            if($id){
                $this->session->set_userData('mess','Bạn đã gửi thông tin thành công!!!');
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
}