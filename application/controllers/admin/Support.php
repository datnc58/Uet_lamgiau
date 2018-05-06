<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Support extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('support_model');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
    }
    public function listSuport()
    {
        $data['list']  = $this->support_model->get_data('support_online');
        $data['headerTitle'] = 'Hỗ trợ trực tuyến';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/support/list', $data);
        $this->load->view('admin/footer');
    }
	//them ban ghi
	 public function add($id_edit=null)
    {
        $this->load->helper('model_helper');
        $config['upload_path'] = './upload/img/user_post/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $this->load->library('upload', $config);
		$data['btn_name']='Thêm mới';
		if($id_edit != null){
            $data['edit']= $item=$this->support_model->getFirstRowWhere('support_online',array('id'=>$id_edit),array(),true);
            $data['btn_name']='Cập nhật';
        }

		if (isset($_POST['addnews'])) {
			$arr=array(
				'name'=>$this->input->post('name'),
				'phone'=>$this->input->post('phone'),
				'skype'=>$this->input->post('skype'),
                'email'=>$this->input->post('email'),
				'address'=>$this->input->post('address'),
				'yahoo'=>$this->input->post('yahoo'),
				'active'=>$this->input->post('active'),
				'type'=>$this->input->post('type'),
			);

			if (!empty($_POST['edit'])){
				$id = $this->support_model->Update_where('support_online', array('id' => $id_edit),$arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->support_model->Add('support_online', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }

			if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/user_post/' . $upload['upload_data']['file_name'];
                    $this->support_model->Update_where('support_online',array('id' => $id), array('image' => $image,));
                    if(isset($data['item'])&&file_exists($data['item']->image)){
                        unlink($data['item']->image);
                    }
                }
            }
            redirect(base_url('uetadmin/support/listSuport'));
        }

		$data['list']  = $this->support_model->get_data('support_online');
        $data['headerTitle'] = 'Hỗ trợ trực tuyến';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/support/add', $data);
        $this->load->view('admin/footer');
    }
	 public function edit($id)
    {
        $this->add($id);
    }
    //Delete 1 ban ghi
    public function Delete($id){
		$this->delete_support_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
	//xoa nhieu ban ghi da chon
	public function deletes(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_support_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_support_once($id)
    {
		// xoa ban ghi trong staticpage
        $item = $this->support_model->getFirstRowWhere('support_online',array(
            'id' => $id
        ));
		// xoa anh trong thu muc
		if(file_exists($item->image)){
            @unlink($item->image);
        }
		$this->support_model->Delete_where('support_online',array('id' => $id));
    }
}