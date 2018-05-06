<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_price extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
        $this->load->model('inuser_model');
    }
    public function listprice()
    {
		$data['list'] = $this->inuser_model->get_data('product_price',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));	
        $data['headerTitle'] = 'Quản lý khoảng giá';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_price/list', $data);
        $this->load->view('admin/footer');
    }
    public function addprice($id_edit=null)
    {
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->inuser_model->SelectMax('product_price','sort')+1;
		 if($id_edit!=null){
            $data['edit']=$this->inuser_model->get_data('product_price',array('id'=>$id_edit),array(),true);
			$data['max_sort']=$max_sort=$data['edit']->sort;
			$data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
			$from_price = str_replace(array(';','.',',',' '),'',$this->input->post('from_price'));
            $to_price   = str_replace(array(';','.',',',' '),'',$this->input->post('to_price'));
            $arr = array(
                'name' => $this->input->post('name'),
                'from_price' => $from_price,
                'to_price' => $to_price,
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );
			if (!empty($_POST['edit'])){ 
				$id = $this->inuser_model->Update_where('product_price', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->inuser_model->Add('product_price', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
			
			if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;
            redirect(base_url('uetadmin/product_price/listprice'));
        }
		
        $data['headerTitle'] = "'".$data['btn_name']." khoảng giá";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/product_price/add', $data);
        $this->load->view('admin/footer');
    }
    public function edit($id=null)
    {
        $this->addprice($id);
    }
	// xoa list danh muc
	public function deletes_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_price_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_price_once($id)
    {
		$this->inuser_model->Delete_where('product_price',array('id' => $id));
    }
    //Delete  danh muc product_price
    public function deletecategory($id)
    {
		$this->delete_price_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
		redirect($_SERVER['HTTP_REFERER']);
    }

}