<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_color extends MY_Controller
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
    public function listColor()
    {
		$data['list'] = $this->inuser_model->get_data('product_color',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));	
        $data['headerTitle'] = 'Quản lý màu sắc';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_color/list', $data);
        $this->load->view('admin/footer');
    }
    public function addcolor($id_edit=null)
    {
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->inuser_model->SelectMax('product_color','sort')+1;
		 if($id_edit!=null){
            $data['edit']=$this->inuser_model->get_data('product_color',array('id'=>$id_edit),array(),true);
			$data['max_sort']=$max_sort=$data['edit']->sort;
			$data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'color' => $this->input->post('color'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );
			
			if (!empty($_POST['edit'])){ 
				$id = $this->inuser_model->Update_where('product_color', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->inuser_model->Add('product_color', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
			
			if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;
			
			
			if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->inuser_model->Update_where('product_color',array('id'=>$id),array('image'=>$image));
                }
            }
			
            redirect(base_url('uetadmin/product_color/listColor'));
        }
		
        $data['headerTitle'] = "'".$data['btn_name']." màu sắc";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_color/add', $data);
        $this->load->view('admin/footer');
    }
    public function edit($id=null)
    {
        $this->addcolor($id);
    }
    
	// xoa list danh muc
	public function deletes_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_color_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_color_once($id)
    {
		// xoa ban ghi trong product_color
        $item = $this->inuser_model->getFirstRowWhere('product_color',array(
            'id' => $id
        ));
		// xoa anh trong thu muc
		if(file_exists($item->image)){
            @unlink($item->image);
        }	
		$this->inuser_model->Delete_where('product_color',array('id' => $id));
		
    }
    //Delete  danh muc product_color
    public function deletecategory($id)
    {
		$this->delete_cat_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
		redirect($_SERVER['HTTP_REFERER']);
    }

}