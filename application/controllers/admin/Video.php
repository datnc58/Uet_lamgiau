<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Video extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->library('pagination');
        $this->load->model('m_video');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
    }
//******* danh sach media ********************************************************
protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination pagination-sm'>",
        'full_tag_close'=>"</ul>",
        'num_tag_open'=>'<li>',
        'num_tag_close'=>'</li>',
        'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",
        'cur_tag_close'=>"<span class='sr-only'></span></a></li>",
        'next_tag_open'=>"<li>",
        'next_tagl_close'=>"</li>",
        'prev_tag_open'=>"<li>",
        'prev_tagl_close'=>"</li>",
        'first_tag_open'=>"<li>",
        'first_tagl_close'=>"</li>",
        'last_tag_open'=>"<li>",
        'last_tagl_close'=>"</li>",
    );
//    ======================================================================================================================
    public function listAll()
    {
		if($this->input->get()){
            $where = array(
                'name' => $this->input->get('name')?$this->input->get('name'):'',
                'cate' => $this->input->get('cate'),
                'view' => $this->input->get('view'),
                'lang' => $this->language
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('uetadmin/video/listAll?name='
                . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
                . '&view=' . $this->input->get('view')
                . '&lang=' . $this->language
            );
            $config['total_rows']  = $this->m_video->count_list($where);
            $config['per_page']    = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->m_video->getList($where, $config['per_page'], $this->input->get('per_page'));
		}else{
            $where = array(
                'lang' => $this->language
            );
            $config['base_url'] = base_url('uetadmin/video/listAll');
            $config['total_rows'] = $this->m_video->count_list($where); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->m_video->getList($where, $config['per_page'],
                $this->uri->segment(4));
        }
		foreach ($data['list'] as $key => $cat) {
			$data['list'][$key]->cat_name = $this->m_video->getField('video_category',
				array('name'),array('id' => $cat->category_id,));
		}

		$auto_name = '';
        foreach ($data['list'] as $nameget) {
            $subname = $nameget->name;

			if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
        }
        $data['auto_name'] = $auto_name;
		$data['cate'] = $this->m_video->get_data('video_category',array('lang' => $this->language),array('id' => 'desc'));
        $data['show_home'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video','field' => 'home',));
        $data['show_hot'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video','field' => 'hot',));
        $data['show_focus'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video','field' => 'focus',));
        $data['headerTitle'] = "video";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/video/list', $data);
        $this->load->view('admin/footer');
    }
    #achor add
    public function add($id_edit=null)
    {
        $this->load->helper('thumbnail_helper');
        $data['btn_name']='Thêm';
        $data['max_sort']=$max_sort=$this->m_video->SelectMax('video','sort')+1;
        if($id_edit!=null){
			$data['edit']=$this->m_video->getFirstRowWhere('video',array('id'=>$id_edit));
			$data['cate_selected'] = $this->m_video->getField_array('video_category','id',
                array('id'=>$data['edit']->category_id));

			// danh sách ảnh hụ
            $data['btn_name']='Cập nhật';
			$data['max_sort']=$max_sort=$data['edit']->sort;
        }
		if (isset($_POST['addnews'])) {
			$alias = make_alias($this->input->post('alias'));
            $arr = array(
                'name'            => $this->input->post('name'),
                'alias'			  => $alias,
                'description'     => $this->input->post('description'),
                'link_video'          => $this->input->post('link_video'),
                'active'          => $this->input->post('active'),
                'home'          => $this->input->post('home'),
                'hot'          => $this->input->post('hot'),
                'focus'          => $this->input->post('focus'),
                'description_seo' => $this->input->post('description_seo'),
                'title_seo'       => $this->input->post('title_seo'),
                'keyword_seo'     => $this->input->post('keyword_seo'),
                'sort'            => $max_sort,
                'lang'            => $this->language,
            );
			if (!empty($_POST['edit'])){
				$id = $this->m_video->Update_where('video', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
			} else {
				$id = $this->m_video->Add('video', $arr);
				$this->session->set_flashdata("mess", "Thêm mới thành công!");
			}
			if ($id_edit != null) {
					$id = $id_edit;
				} else $id = $id;
            $checkAlias = $this->m_video->getFirstRowWhere('alias',array(
                'video' => $id
            ));
            if(empty($checkAlias)){
                $this->m_video->Add('alias',array(
                    'video' => $id,
                    'type' => 'video',
                    'alias' => $alias
                ));
            }else{
                $this->m_video->Update_where('alias',array('video' => $id),array(
                    'alias' => $alias
                ));
            }
            if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                $post_cat = $_POST['category'];
                $this->m_video->Update_where('video', array('id'=>$id), array('category_id' => end($post_cat)));
            }

            //upload images ảnh đại diện
			$config['upload_path']   = './upload/img/video/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
            $config['max_size'] = '*';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';
            $this->load->library('upload', $config);
            //update news image
			if ($_FILES['userfile']['name'] != '') {
				if (!$this->upload->do_upload('userfile')) {
					$data['error'] = 'Ảnh không hợp lệ!';
				} else {
					$upload = array('upload_data' => $this->upload->data());
					$image  = 'upload/img/video/' . $upload['upload_data']['file_name'];
					$this->m_video->Update_where('video', array('id'=>$id), array('image'=>$image));
				}
			}

            redirect(base_url('uetadmin/video/listAll'));
        }
        $data['cate'] = $this->m_video->get_data('video_category',array(
            'lang' => $this->language
        ),array('sort'=>''));
         $data['show_home'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video','field' => 'home',));
        $data['show_hot'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video','field' => 'hot',));
        $data['show_focus'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video','field' => 'focus',));
        $data['headerTitle'] = $data['btn_name']." video";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/video/add', $data);
        $this->load->view('admin/footer');
    }
    #achor edit
	 public function edit($id){
	   $this->add($id);
	}
   //Xóa nhieu ban ghi
    public function deletes()
    {
        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_once($id);
            }
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once($id){
        if (is_numeric($id)) {
			$item = $this->m_video->getFirstRowWhere('video',array(
				'id' => $id
			));
			// xoa anh trong thu muc
			if(file_exists($item->image)){ @unlink($item->image);}
			$this->m_video->Delete_where('video',array('id' => $id));
            $item_alias =$this->m_video->getFirstRowWhere('alias',array('video'=>$id));
            if(!empty($item_alias)){
                $this->m_video->Delete_where('alias',array('video' => $id));
            }
        } else return false;
    }
	// xoa 1 ban ghi
	public function delete($id)
    {
		$this->delete_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//******* danh muc ********************************************************
    public function categories()
    {
        $data['cate'] = $this->m_video->get_data('video_category',array(
            'lang' => $this->language
        ),array('sort'=>'desc'));
        $data['show_home'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video_category','field' => 'home',));
        $data['show_hot'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video_category','field' => 'hot',));
        $data['show_focus'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video_category','field' => 'focus',));
        $data['headerTitle'] = 'Danh mục video';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/video/list_cat', $data);
        $this->load->view('admin/footer');
    }

	public function cat_add($id_edit=null)
    {
        $config['upload_path'] = './upload/img/video/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';
        $config['max_size']      = '1000';
		$config['max_width']     = '1200';
		$config['max_height']    = '1000';
        $this->load->library('upload', $config);
        $data['btn_name']='Thêm';
        $data['max_sort']=$max_sort=$this->m_video->SelectMax('video_category','sort')+1;
		if($id_edit!=null){
			$data['edit']=$this->m_video->get_data('video_category',array('id'=>$id_edit),array(),true);
			$data['cate_selected'] = $this->m_video->getField_array('video_category','id',
                array('id'=>$data['edit']->parent_id));
			$data['max_sort']=$max_sort=$data['edit']->sort;
			$data['btn_name']='Cập nhật';
		}
        if (isset($_POST['addnews'])) {
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'alias' => make_alias($this->input->post('alias')),
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'focus' => $this->input->post('focus'),
                'sort' => $max_sort,
                'title_seo' => $this->input->post('title_seo'),
                'keyword_seo' => $this->input->post('keyword'),
                'description_seo' => $this->input->post('description_seo'),
                'lang'            => $this->language,
            );
			if (!empty($_POST['edit'])){
				$id = $this->m_video->Update_where('video_category', array('id'=>$id_edit), $arr);
				$this->session->set_flashdata("mess", "Cập nhật thành công!");
			} else {
				$id = $this->m_video->Add('video_category', $arr);
				$this->session->set_flashdata("mess", "Thêm mới thành công!");
			}
			if ($id_edit != null) {
				$id = $id_edit;
			} else $id = $id;
			// check alias
			$checkAlias = $this->m_video->getFirstRowWhere('alias',array(
				'video_cat'=> $id
			));
			if(empty($checkAlias)){
				$this->m_video->Add('alias', array(
					'alias' => make_alias($this->input->post('alias')),
					'video_cat' => $id,
					'type'  => 'video-cat'
				));
			}else{
				$this->m_video->Update_where('alias',array('video_cat'=>$id),array(
					'alias' => make_alias($this->input->post('alias'))
				));
			}

			if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                $post_cat = $_POST['category'];
                $this->m_video->Update_where('video_category', array('id'=>$id), array('parent_id' => end($post_cat)));
            }

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/video/' . $upload['upload_data']['file_name'];

                    $this->m_video->Update_where('video_category',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('uetadmin/video/categories'));
        }
        $data['cate'] = $this->m_video->get_data('video_category',array(
            'lang' => $this->language
        ),array('sort'=>'asc'));
        $data['show_home'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video_category','field' => 'home',));
        $data['show_hot'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video_category','field' => 'hot',));
        $data['show_focus'] = $this->m_video->getFirstRowWhere('config_checkpro',array('type' => 'video_category','field' => 'focus',));
        $data['headerTitle'] = $data['btn_name']." danh mục video";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/video/cat_add', $data);
        $this->load->view('admin/footer');
    }
	public function cat_edit($id){
		$this->cat_add($id);
    }
    public function deletes_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->del_cat_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function del_cat_once($id){
		$cat_parent =$this->m_video->getFirstRowWhere('video_category',array('parent_id'=>$id));
		if(empty($cat_parent)){
			// xoa ban ghi trong video_category
			$item = $this->m_video->getFirstRowWhere('video_category',array(
				'id' => $id
			));
			// xoa anh trong thu muc
			if(file_exists($item->image)){ @unlink($item->image);}

			$this->m_video->Delete_where('video_category',array('id' => $id));
			$item_alias =$this->m_video->getFirstRowWhere('alias',array('video_cat'=>$id));
			if(!empty($item_alias)){
				$this->m_video->Delete_where('alias',array('video_cat' => $id));
			}
		}

    }
    public function deletecategory($id)
    {
        if (is_numeric($id)&&$id>1) {
			$cat_parent =$this->m_video->getFirstRowWhere('video_category',array('parent_id'=>$id));
			 if(empty($cat_parent)){
				$this->del_cat_once($id);
				$this->session->set_flashdata("mess", "Xóa danh mục thành công!");
				$_SESSION['mess']='Xóa danh mục thành công!';
			 }else{
				$this->session->set_flashdata("mess_err", "Xóa không thành công ! <br />Còn danh mục con");
			 }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
	////// end video categories ///////////
}