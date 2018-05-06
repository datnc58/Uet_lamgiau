<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_sale extends MY_Controller
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
	 public function listSale()
    {
        $data['list'] = $this->support_model->get_data('code_sale',array());
        $data['headerTitle'] = 'Danh mục sản phẩm';
		$this->LoadHeaderAdmin($data);
        $this->load->view('admin/products/product_sale/list', $data);
        $this->load->view('admin/footer');
    }
    public function addSale($id_edit=null)
    {
        $data['btn_name']='Thêm';
		if($id_edit!=null){
			$data['edit']=$this->support_model->get_data('code_sale',array('id'=>$id_edit),array(),true);
			$data['btn_name']='Cập nhật';
		}	
        if (isset($_POST['addnews'])) {
            $arr = array(
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'price' => $this->input->post('price'),
            );
			if (!empty($_POST['edit'])){ 
				$id = $this->support_model->Update_where('code_sale', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
			} else {
				$id = $this->support_model->Add('code_sale', $arr);
				$this->session->set_flashdata("mess", "Thêm mới thành công!");
			}	
            redirect(base_url('uetadmin/product_sale/listSale'));
        }
       
        $data['headerTitle'] = $data['btn_name']." mã giảm giá";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/products/product_sale/add', $data);
        $this->load->view('admin/footer');
    }
    public function edit($id){
		$this->addSale($id);	
    }
    public function deletes_list(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->del_once_sale($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function del_once_sale($id){
		$this->support_model->Delete_where('code_sale',array('id' => $id));
    }
    public function delete($id)
    {
        if (is_numeric($id)&&$id>1) {
			$this->del_once_sale($id);
			$this->session->set_flashdata("mess", "Xóa mã giảm giá thành công!");
			$_SESSION['mess']='Xóa danh mục thành công!';	
        }
        redirect($_SERVER['HTTP_REFERER']);
    }   
}