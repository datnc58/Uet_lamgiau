<?php
class Imageupload extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('imagemodel');
        $this->load->library('pagination');
		 if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
			show_error('Bạn không có quyền truy cập vào chức năng này !!!');
            die();
        }
    }
   
    public function banners()
    {
		$data['list'] = $this->imagemodel->get_data('images',array(
			'lang' => $this->language,
			),array('sort' => 'desc'));

		foreach ($data['list'] as $key => $cat) {
			$data['list'][$key]->cat_name = $this->imagemodel->getField('product_category',
				array('name'),
				array(
				'id' => $cat->cate,
				));
            $data['list'][$key]->type_name = $this->imagemodel->getField('config_banner',
                array('name'),
                array(
                'field' => $cat->type,
                ));
		}
      
        $data['headerTitle'] = 'Banner';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/banners/list', $data);
        $this->load->view('admin/footer');
    }

    //add banner
    public function addbanner($id_edit=null)
    {
        $config['upload_path'] = './upload/img/banner/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '5000';
        $config['max_width'] = '4000';
        $config['max_height'] = '4000';

        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
		if($id_edit){
            $data['edit']=$this->imagemodel->getFirstRowWhere('images',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
			$arr = array(
				'type' => $this->input->post('type'),
				'url' => $this->input->post('url'),
				'target' => $this->input->post('target'),
				'title' => $this->input->post('title'),
				'cate' => $this->input->post('cate'),
				'content' => $this->input->post('content'),
				'lang' => $this->language
			);
            if(($_POST['edit'])){
				$id = $this->imagemodel->Update_where('images', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
			}else{
                $id = $this->imagemodel->Add('images', $arr);
				$this->session->set_flashdata("mess", "Thêm thành công!");
            }
			 if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

			if ($_FILES['userfile']['name'] != '') {
                 // doi ten anh tieng viet sang tieng anh
                $type_image = explode(".", $_FILES['userfile']['name']);
                $a = make_alias($type_image[0]);
                $file_name = $a.'.'.$type_image[1];
                 $_FILES['userfile']['name'] =  $file_name;
                if (!$this->upload->do_upload('userfile')) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image  = 'upload/img/banner/' . $upload['upload_data']['file_name'];
                    if(file_exists($image)){
                        if(file_exists(@$data['edit']->image)){
                            unlink($data['edit']->image);
                        }
                    }
					$this->imagemodel->Update_where('images', array('id'=>$id), array('image'=>$image));
                }
            }
            redirect(base_url('uetadmin/imageupload/banners'));
        }

        $data['procate'] = $this->imagemodel->get_data('product_category');

        $data['type'] = $this->imagemodel->get_data('config_banner',array(
                'active' => 1
            ),array('id'=>'asc'));
        $data['headerTitle'] = "Cập nhật banner";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/banners/add', $data);
        $this->load->view('admin/footer');
    }
   // edit
    public function edit($id){
        $this->addbanner($id);
    }

	 //Delete Image
    public function deletes(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_Banner_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function  delete_Banner_once($id){
        $img = $this->imagemodel->getItemByID('images', $id);
        if(file_exists($img->image)){
            unlink(($img->image));
        }
		$this->imagemodel->Delete_where('images',array('id' => $id));
    }
    public function delete($id)
    {
        $this->delete_Banner_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
}

?>