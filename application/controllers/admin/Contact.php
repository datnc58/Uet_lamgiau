<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
        $this->load->model('contact_model');
    }

    public function contacts()
    {
		$data         = array();
		$data['list'] = $this->contact_model->get_data('contact');

        $data['headerTitle'] = 'Liên hệ';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/contacts/list', $data);
        $this->load->view('admin/footer');
    }

    //ajax
    public function popupdata()
    {
        if (isset($_GET['id']) && $_GET['id'] > 0) {

            $id   = $_GET['id'];
            $data['item'] = $item = $this->contact_model->getFirstRowWhere('contact', array('id' => $id));
            if($item->show==0){
                $this->contact_model->Update('contact',$id,array('show'=>1));
            }
			 $this->load->view('admin/modal/view_contact', $data);
        }
    }

    //Delete  ban ghi
    public function delete($id){
        $this->contact_model->Delete('contact',$id);
		$this->session->set_flashdata("mess", "Thêm thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

}