<?php
class Email extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('system_model');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'administ', 'location');
            die();
        }
    }
	public function emails(){
		$data['list'] = $this->system_model->get_data('emails');
        $data['headerTitle']="Emails";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/emails/list',$data);
        $this->load->view('admin/footer');
    }
    public function delete($id){
        $this->system_model->Delete('emails',$id);
		$this->session->set_flashdata("mess", "Thêm thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function mail_coupon(){
        //$this->load->helper('ckeditor_helper');

        if ($this->input->post('email')) {
              $email=implode(',',$this->input->post('email'));
            $_SESSION['email']=$email;
        }
		
        if(isset($_POST['send'])){
			$emailto=implode(',',$this->input->post('mailto'));
			if($email =''){
				$_SESSION['emailto']=$emailto;
			}else{
				$_SESSION['emailto']=$this->input->post('mailto');
			}
			
            $config = Array(
				'protocol'  => 'smtp',
				'smtp_host' => $this->config->item('smtp_hostssl'),
				'smtp_port' => $this->config->item('smtp_portssl'),
				'smtp_user' => $this->config->item('smtp_user'), // change it to yours
				'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
				'mailtype'  => 'html',
				'charset'   => 'utf-8',
				'wordwrap'  => TRUE
			);

			$this->load->library('email', $config);

            $subject = $this->input->post('subject');
            $message = $this->input->post('message');
			
            // Get full html:
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                        <style type="text/css">
                            body {
                                font-family: Arial, Verdana, Helvetica, sans-serif;
                                font-size: 16px;
                            }
                        </style>
                    </head>
                    <body>
                    ' . $message . '
                    </body>
                    </html>';

            $this->email->set_newline("\r\n");
            $this->email->from(@$this->option->site_email,$subject); // change it to yours
            $this->email->to($_SESSION['emailto']); // change it to yours
            //$this->email->bcc(@$this->option->site_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) {
                       unset($_SESSION['email']);
					   $this->session->set_flashdata("mess", "Gửi email thành công !");
                redirect(base_url('uetadmin/email/emails'));
            } else {
				$this->session->set_flashdata("mess", "Gửi email thất bại !");
				redirect($_SERVER['HTTP_REFERER']);
            }
        }

        $data['headerTitle']="Emails";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/emails/mail_coupon',$data);
        $this->load->view('admin/footer');
    }
}