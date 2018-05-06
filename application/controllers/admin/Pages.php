<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('staticpagemodel');
        $this->load->library('pagination');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
    }
	// danh sach trang nội dung
    public function pagelist(){
        $data = array();
		$data['pagelist'] = $this->staticpagemodel->get_data('staticpage',array(
			'lang' => $this->language,
			),array('id' => 'desc'));
        $data['show_home'] = $this->staticpagemodel->getFirstRowWhere('config_checkpro',array('type' => 'staticpage','field' => 'home',));
        $data['show_hot'] = $this->staticpagemodel->getFirstRowWhere('config_checkpro',array('type' => 'staticpage','field' => 'hot',));
        $data['show_focus'] = $this->staticpagemodel->getFirstRowWhere('config_checkpro',array('type' => 'staticpage','field' => 'focus',));
        $data['headerTitle']="Pages";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/pages/list',$data);
        $this->load->view('admin/footer');
    }

    public function addpage($id_edit=null){
        $this->load->helper('model_helper');

        $config['upload_path'] = './upload/img/pages/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
        $config['max_size']	= '5000';
        $config['max_width']  = '5000';
        $config['max_height']  = '4000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        if($id_edit){
            //get news item
            $item=$this->staticpagemodel->get_data('staticpage',array('id'=>$id_edit),array(),true);
            $data['edit']=$item;
            $data['btn_name']='Cập nhật';
        }

        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('alias'));
            $arr=array(
                'name'=>$this->input->post('name'),
                'description'=>$this->input->post('description'),
                'alias' => $alias,
                'home'=>$this->input->post('home'),
                'hot'=>$this->input->post('hot'),
                'focus'=>$this->input->post('focus'),
                'content'=>$this->input->post('content'),
                'title_seo'=>$this->input->post('title_seo'),
                'keyword_seo'=>$this->input->post('keyword_seo'),
                'description_seo'=>$this->input->post('description_seo'),
                'lang'           => $this->language
            );

			if (!empty($_POST['edit'])){
				$id = $this->staticpagemodel->Update_where('staticpage', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->staticpagemodel->Add('staticpage', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

			/**
             * alias
             */
			$checkAlias = $this->staticpagemodel->getFirstRowWhere('alias',array(
				'page'  =>  $id
			));
			if(empty($checkAlias)){
				$this->staticpagemodel->Add('alias',array(
					'alias' => $alias,
					'page' => $id,
					'type' => 'page',
				));
			}else{
				$this->staticpagemodel->Update_where('alias', array('page'=>$id), array('alias' => $alias));
			}
            //update news image
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                   $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/pages/' . $upload['upload_data']['file_name'];
                    $this->staticpagemodel->Update_where('staticpage', array('id'=>$id), array('image'=>$image));
                }
            }
            redirect(base_url('uetadmin/pages/pagelist'));
        }
        $data['show_home'] = $this->staticpagemodel->getFirstRowWhere('config_checkpro',array('type' => 'staticpage','field' => 'home',));
        $data['show_hot'] = $this->staticpagemodel->getFirstRowWhere('config_checkpro',array('type' => 'staticpage','field' => 'hot',));
        $data['show_focus'] = $this->staticpagemodel->getFirstRowWhere('config_checkpro',array('type' => 'staticpage','field' => 'focus',));
        $data['headerTitle']="Nội dung";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/pages/add',$data);
        $this->load->view('admin/footer');
    }
    public function edit($id)
    {
        $this->addpage($id);
    }
	public function deletes(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_page_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_page_once($id)
    {
		// xoa ban ghi trong staticpage
        $item = $this->staticpagemodel->getFirstRowWhere('staticpage',array(
            'id' => $id
        ));
		// xoa anh trong thu muc
		if(file_exists($item->image)){
            @unlink($item->image);
        }
		$this->staticpagemodel->Delete_where('staticpage',array('id' => $id));
        // xoa ban ghi trong alias
        $item_alias =$this->staticpagemodel->getFirstRowWhere('alias',array('page'=>$id));
        if(!empty($item_alias)){
			$this->staticpagemodel->Delete_where('alias',array('page' => $id));
        }
    }
	// xoa ban ghi
    public function delete($id){
         $this->delete_page_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

}