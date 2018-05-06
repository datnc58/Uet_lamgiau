<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class inuser extends MY_Controller
{
    protected $module_name = "inuser";

    function __construct()
    {
        parent::__construct();
        $this->load->model('inuser_model');
        //$this->load->library('pagination');
		if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }

    }
    public function categories()
    {
        $data['list_cate'] = $this->inuser_model->get_data('inuser_category',array(
            'lang' => $this->language
        ),array('sort' => 'desc'),20,0);

        $data['headerTitle'] = 'Ý kiến khách hàng';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/inusers/list_cate', $data);
        $this->load->view('admin/footer');
    }

    //Add Category
    public function cate_add($id_edit=null)
    {
        $config['upload_path']   = './upload/img/inuser/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|GIF|JPG|PNG|JPEG';
        $config['max_size']      = '2000';
        $config['max_width']     = '1500';
        $config['max_height']    = '1000';
        $this->load->library('upload', $config);
        $data['btn_name']='Thêm';
		$data['max_sort']=$this->inuser_model->SelectMax('inuser_category','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->inuser_model->get_data('inuser_category',array('id'=>$id_edit),array(),true);
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
			$alias = make_alias($this->input->post('alias'));
            $arr    = array(
                'name'        => $this->input->post('name'),
                'title'       => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'parent_id'   => $this->input->post('parent'),
                'home'        => $this->input->post('home'),
                'focus'       => $this->input->post('focus'),
                'hot'         => $this->input->post('hot'),
                'tour'         => $this->input->post('tour'),
                'alias'       => $alias,
                'sort' => $this->input->post('sort'),
                'lang'        => $this->language
            );

			if (!empty($_POST['edit'])){
				$id = $this->inuser_model->Update_where('inuser_category', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->inuser_model->Add('inuser_category', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }

			 if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

			/**
             * alias
             */
			$checkAlias = $this->inuser_model->getFirstRowWhere('alias',array(
				'inuser'  =>  $id
			));
			if(empty($checkAlias)){
				$this->inuser_model->Add('alias',array(
					'alias' => $alias,
					'inuser' => $id,
					'type' => 'cat_inuser',
				));
			}else{
				$this->inuser_model->Update_where('alias', array('inuser'=>$id), array('alias' => $alias));
			}

			//update news image
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                   $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/inuser/' . $upload['upload_data']['file_name'];
                    $this->inuser_model->Update_where('inuser_category', array('id'=>$id), array('image'=>$image));
                }
            }
            redirect(base_url('uetadmin/inuser/categories'));
        }

        $data['category'] = $this->inuser_model->get_data('inuser_category',array(
            'lang' => $this->language
        ),array('sort'=>''));

        $data['headerTitle'] = "Thêm danh mục ý kiến khách hàng";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/inusers/cat_add', $data);
        $this->load->view('admin/footer');
    }

    public function cat_edit($id){
        $this->cate_add($id);
    }
	// xoa list danh muc
	public function deletes_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_cat_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_cat_once($id)
    {
		// xoa ban ghi trong inuser_category
        $item = $this->inuser_model->getFirstRowWhere('inuser_category',array(
            'id' => $id
        ));
		// xoa anh trong thu muc
		if(file_exists($item->image)){
            @unlink($item->image);
        }
		$this->inuser_model->Delete_where('inuser_category',array('id' => $id));
    }
    //Delete  danh muc inuser
    public function deletecategory($id)
    {
		 $item = $this->inuser_model->getFirstRowWhere('inuser_category',array(
            'id' => $id
        ));
		// xoa anh trong thu muc
		if(file_exists($item->image)){
            @unlink($item->image);
        }
		$this->inuser_model->Delete_where('inuser_category',array('id' => $id));
        $this->session->set_flashdata("mess", "Xóa thành công!");
		redirect($_SERVER['HTTP_REFERER']);
    }

}