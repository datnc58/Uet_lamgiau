<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_brand extends MY_Controller
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
    public function listBrand()
    {
		$data['list'] = $this->inuser_model->get_data('product_brand',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));	
        $data['headerTitle'] = 'Quản lý nhãn hiệu';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_brand/list', $data);
        $this->load->view('admin/footer');
    }
    public function addbrand($id_edit=null)
    {
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->inuser_model->SelectMax('product_brand','sort')+1;
		 if($id_edit!=null){
            $data['edit']=$this->inuser_model->get_data('product_brand',array('id'=>$id_edit),array(),true);
             $data['cate_selected'] = $this->inuser_model->getField_array('product_to_brand','id_category',
                array('brand_id'=>$id_edit));
			$data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'alias' => $alias,
                'women' => $this->input->post('women'),
                'men' => $this->input->post('men'),
                'focus' => $this->input->post('focus'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );
			
			if (!empty($_POST['edit'])){ 
				$id = $this->inuser_model->Update_where('product_brand', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->inuser_model->Add('product_brand', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
			
			if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;
			
			$checkAlias = $this->inuser_model->getFirstRowWhere('alias',array(
                'brand'=> $id
            ));
			if(empty($checkAlias)){
                $this->inuser_model->Add('alias',array(
					'alias' => make_alias($this->input->post('alias')),
                    'brand' => $id,
                    'type'  => 'brand'
                ));
            }else{
                $this->inuser_model->Update_where('alias',array('brand'=>$id),array(
                    'alias' => $this->input->post('alias')
                ));
            }
			
           if($id){
                if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                    $post_cat = $_POST['category'];
                    $this->inuser_model->Delete_where('product_to_brand', array('brand_id' => $id));
                    for ($i = 0; $i < sizeof($post_cat); $i++) {
                        $ca = array('brand_id' => $id, 'id_category' => $post_cat[$i]);
                        $this->inuser_model->Add('product_to_brand', $ca);
                    }
                }
            }
			
			if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->inuser_model->Update_where('product_brand',array('id'=>$id),array('image'=>$image));
                }
            }
			
            redirect(base_url('uetadmin/product_brand/listBrand'));
        }
		//var_dump($data['edit']);die;
        $data['cate'] = $this->inuser_model->get_data('product_brand');
        $data['procat'] = $this->inuser_model->get_data('product_category',array(
            'lang' => $this->language
        ),array('sort'=>''));
        $data['headerTitle'] = "'".$data['btn_name']."nhãn hiệu sản xuất";
		$this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_brand/add', $data);
        $this->load->view('admin/footer');
    }
    public function edit($id=null)
    {
        $this->addbrand($id);
    }
    
	// xoa list danh muc
	public function deletes_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_brand_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_brand_once($id)
    {
		// xoa ban ghi trong product_brand
        $item = $this->inuser_model->getFirstRowWhere('product_brand',array(
            'id' => $id
        ));
		// xoa anh trong thu muc
		if(file_exists($item->image)){
            @unlink($item->image);
        }	
		$this->inuser_model->Delete_where('product_brand',array('id' => $id));
		$this->inuser_model->Delete_Where('product_to_brand', array('brand_id'=>$id));
		$item_alias =$this->inuser_model->getFirstRowWhere('alias',array('brand'=>$id));
		if(!empty($item_alias)){
			$this->inuser_model->Delete_where('alias',array('brand' => $id));
		}
    }
    //Delete  danh muc product_brand
    public function deletecategory($id)
    {
		$this->delete_brand_once($id);		
        $this->session->set_flashdata("mess", "Xóa thành công!");
		redirect($_SERVER['HTTP_REFERER']);
    }
}