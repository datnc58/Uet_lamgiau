<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends MY_Controller
{
//    protected $module_name = "News";

    function __construct()
    {
        parent::__construct();
        $this->load->model('tag_model');
        $this->load->library('pagination');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
    }
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
	public function listtagpro()
    {
        if($this->input->get()){
            $where = array(
                'tagname' => $this->input->get('name')?$this->input->get('name'):'',
                'lang' => $this->input->get('lang'),
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('uetadmin/tag/listpro?tagname='
                . $this->input->get('name')
                . '&lang=' . $this->input->get('lang')
            );
            $config['total_rows']           = $this->tag_model->count_listtags($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->tag_model->getListtags($where, $config['per_page'], $this->input->get('per_page'));

		}else{
            $where = array(
                'lang' => $this->language
            );
            $config['base_url'] = base_url('uetadmin/tag/listpro');
            $config['total_rows'] = $this->tag_model->count_listtags($where); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->tag_model->getListtags($where, $config['per_page'],
                $this->uri->segment(4));
        }

		$data['tag_all'] = $this->tag_model->get_data('tags',array('lang' => $this->language),array('id' => 'desc'));
		$auto_name = '';
        foreach ($data['tag_all'] as $nameget) {
            $subname = $nameget->name;
			if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
        }
        $data['auto_name'] = $auto_name;

        $data['headerTitle'] = "tag";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/tag/list', $data);
        $this->load->view('admin/footer');
    }
	public function addtagpro($id_edit=null)
        {
            $data['btn_name']='Thêm';
			$data['max_sort']=$max_sort=$this->tag_model->SelectMax('tags','sort')+1;
			if($id_edit!=null){
				$data['edit']=$this->tag_model->get_data('tags',array('id'=>$id_edit),array(),true);
				$data['btn_name']='Cập nhật';
				$data['max_sort']=$max_sort=$data['edit']->sort;
			}
            if (isset($_POST['addnews'])) {
				$alias = make_alias($this->input->post('alias'));
                $arr = array(
                    'name'           => $this->input->post('name'),
                    'alias'           => $alias,
                    'lang'            => $this->language,
                    'title_seo'       => $this->input->post('title_seo'),
                    'keyword_seo'     => $this->input->post('keyword_seo'),
                    'description_seo' => $this->input->post('description_seo'),
					'sort'            => $max_sort,
					'time'=>time(),
                );
				if (!empty($_POST['edit'])){
					$id = $this->tag_model->Update_where('tags', array('id'=>$id_edit), $arr);
					$this->session->set_flashdata("mess", "Cập nhật thành công!");
				} else {
					$id = $this->tag_model->Add('tags', $arr);
					$this->session->set_flashdata("mess", "Thêm thành công!");
				}

              //end
                redirect(base_url('uetadmin/tag/listtagpro'));
            }

			$data['headerTitle'] = "'".$data['btn_name']." Thẻ tag";
            $this->LoadHeaderAdmin($data);
            $this->load->view('admin/tag/add', $data);
            $this->load->view('admin/footer');
        }
		 public function edittagpro($id){
		   $this->addtagpro($id);
		}

    public function deletestagpro(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_tagpro_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_tagpro_once($id)
    {
        $news=$this->tag_model->get_data('tags',array('id'=>$id),array(),true);
        $item_alias =$this->tag_model->getFirstRowWhere('tags',array('id'=>$id));
        if(!empty($item_alias)){
            $this->tag_model->Delete_where('tags',array('id' => $id));
        }
        $tag_to_news=$this->tag_model->get_data('tags_to_product');
        foreach($tag_to_news as $tag_news)
        {
            $this->tag_model->Delete_where('tags_to_product',array(
                'id_tags'=>$id,
            ));
        }
       // if(file_exists($news->image));
	 //  $this->tag_model->Delete_where('tags',array('id' => $id));
    }
    public function deletetagpro($id)
    {
        $this->delete_tagpro_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function checkAdd()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $item = $this->tag_model->getFirstRowWhere('tags',array(
            'tags_alias' => $alias
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    public function checkupdate()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
        //echo $alias, $id; die()
        $item = $this->tag_model->getFirstRowWhere('tags',array(
            'alias' => $alias,
            'id !=' => $id
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    public function edit_alias()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $alias=make_alias($this->input->post('alias'));
            $item        = $this->tag_model->get_data('tags', array('id' => $id),array(),true);
            if($item){
                $this->tag_model->Update_where('tags',array('id'=>$id),array('tags_alias'=>$alias,));
            }
        }
    }
//=========  the tag tin tưc ==============================================
public function listnew()
    {
        if($this->input->get()){
            $where = array(
                'tagname' => $this->input->get('name')?$this->input->get('name'):'',
                'lang' => $this->input->get('lang'),
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('uetadmin/tag/listnew?tagname='
                . $this->input->get('name')
                . '&lang=' . $this->input->get('lang')
            );
            $config['total_rows']           = $this->tag_model->count_listtags_news($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->tag_model->getListtags_news($where, $config['per_page'], $this->input->get('per_page'));

		}else{
            $where = array(
                'lang' => $this->language
            );
            $config['base_url'] = base_url('uetadmin/tag/listnew');
            $config['total_rows'] = $this->tag_model->count_listtags_news($where); // xác định tổng số record
            $config['per_page'] =20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['list'] = $this->tag_model->getListtags_news($where, $config['per_page'],
                $this->uri->segment(4));
        }

		$data['tag_all'] = $this->tag_model->get_data('tags_news',array('lang' => $this->language),array('id' => 'desc'));
		$auto_name = '';
        foreach ($data['tag_all'] as $nameget) {
            $subname = $nameget->name;
			if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
        }
        $data['auto_name'] = $auto_name;

        $data['headerTitle'] = "tag";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/tag_news/list', $data);
        $this->load->view('admin/footer');
    }
	public function addtagnew($id_edit=null)
        {
            $data['btn_name']='Thêm';
			$data['max_sort']=$max_sort=$this->tag_model->SelectMax('tags_news','sort')+1;
			if($id_edit!=null){
				$data['edit']=$this->tag_model->get_data('tags_news',array('id'=>$id_edit),array(),true);
				$data['btn_name']='Cập nhật';
				$data['max_sort']=$max_sort=$data['edit']->sort;
			}
            if (isset($_POST['addnews'])) {
				$alias = make_alias($this->input->post('alias'));
                $arr = array(
                    'name'           => $this->input->post('name'),
                    'alias'           => $alias,
                    'lang'            => $this->language,
                    'title_seo'       => $this->input->post('title_seo'),
                    'keyword_seo'     => $this->input->post('keyword_seo'),
                    'description_seo' => $this->input->post('description_seo'),
					'sort'            => $max_sort,
					'time'=>time(),
                );
				if (!empty($_POST['edit'])){
					$id = $this->tag_model->Update_where('tags_news', array('id'=>$id_edit), $arr);
					$this->session->set_flashdata("mess", "Cập nhật thành công!");
				} else {
					$id = $this->tag_model->Add('tags_news', $arr);
					$this->session->set_flashdata("mess", "Thêm thành công!");
				}

              //end
                redirect(base_url('uetadmin/tag/listnew'));
            }

			$data['headerTitle'] = "'".$data['btn_name']." Thẻ tag";
            $this->LoadHeaderAdmin($data);
            $this->load->view('admin/tag_news/add', $data);
            $this->load->view('admin/footer');
        }
		 public function editnew($id){
		   $this->addtagnew($id);
		}

    public function deletesnew(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_tagnew_once($id);
        }
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_tagnew_once($id)
    {
        $news=$this->tag_model->get_data('tags_news',array('id'=>$id),array(),true);
        $item_alias =$this->tag_model->getFirstRowWhere('tags_news',array('id'=>$id));
        if(!empty($item_alias)){
            $this->tag_model->Delete_where('tags_news',array('id' => $id));
        }
        $tag_to_news=$this->tag_model->get_data('tags_to_news');
        foreach($tag_to_news as $tag_news)
        {
            $this->tag_model->Delete_where('tags_to_news',array(
                'id_tags'=>$id,
            ));
        }
       $this->tag_model->Delete_where('tags_news',array('id' => $id));
    }
    public function deletetagnew($id)
    {
        $this->delete_tagnew_once($id);
		$this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function checkAdd_new()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $item = $this->tag_model->getFirstRowWhere('tags_news',array(
            'tags_alias' => $alias
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    public function checkupdate_new()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
        $item = $this->tag_model->getFirstRowWhere('tags_news',array(
            'alias' => $alias,
            'id !=' => $id
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    public function edit_alias_new()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $alias=make_alias($this->input->post('alias'));
            $item        = $this->tag_model->get_data('tags_news', array('id' => $id),array(),true);
            if($item){
                $this->tag_model->Update_where('tags_news',array('id'=>$id),array('tags_alias'=>$alias,));
            }
        }
    }
}