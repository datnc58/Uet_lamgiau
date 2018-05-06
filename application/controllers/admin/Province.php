<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Province extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->library('pagination');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
        $this->load->model('inuser_model');
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
    public function listProvince()
    {
		$data['list'] = $this->inuser_model->get_data('province',array(
        ),array('sort' => 'desc'));
        $data['headerTitle'] = 'Quản lý phí vận chuyển ship';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/province/list', $data);
        $this->load->view('admin/footer');
    }
/*********** Phường xã ************************************************************/
public function listWard()
    {
		if($this->input->get()){
			$where = array(
                'name' => $this->input->get('name')?$this->input->get('name'):'',
                'cate' => $this->input->get('cate')
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('uetadmin/province/listWard?name='
                . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
            );
            $config['total_rows']           = $this->inuser_model->count_listward($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);

            $data['list'] = $this->inuser_model->getListWard($where, $config['per_page'], $this->input->get('per_page'));
		}else{
			$config['page_query_string']    = TRUE;
			$config['enable_query_strings'] = TRUE;
			$config['base_url']             = base_url('uetadmin/province/listWard?');
			$config['total_rows']           = $this->inuser_model->Count('ward');
			$config['per_page']             = 20;
			$config['uri_segment'] = 4;
			$config=array_merge($config,$this->pagination_config);
			$this->pagination->initialize($config);
			$data['list'] = $this->inuser_model->get_data('ward',array(
			),array(),false,$config['per_page'], $this->input->get('per_page') );
		}
		$auto_name = '';
		foreach ($data['list'] as $key => $cat) {
			$data['list'][$key]->cat_name = $this->inuser_model->getField('district',
				array('name'),
				array(
				'id' => $cat->districtid,
				));
			$subname = $cat->name;
			if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
		}
		$data['auto_name'] = $auto_name;
		$data['district'] = $this->inuser_model->get_data('district');
        $data['headerTitle'] = 'Quản lý phường xã';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/province/listward', $data);
        $this->load->view('admin/footer');
    }
/*********** Quận huyện ************************************************************/
public function listDistric()
    {
		if($this->input->get()){
			$where = array(
                'name' => $this->input->get('name')?$this->input->get('name'):'',
                'cate' => $this->input->get('cate')
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('uetadmin/province/listDistric?name='
                . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
            );
            $config['total_rows']           = $this->inuser_model->count_listdistric($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);

            $data['list'] = $this->inuser_model->getListDistric($where, $config['per_page'], $this->input->get('per_page'));
		}else{

		$config['page_query_string']    = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['base_url']             = base_url('uetadmin/province/listDistric?');
		$config['total_rows']           = $this->inuser_model->Count('district');
		$config['per_page']             = 20;
		$config['uri_segment'] = 4;
		$config=array_merge($config,$this->pagination_config);
		$this->pagination->initialize($config);
		$data['list'] = $this->inuser_model->get_data('district',array(
		),array(),false,$config['per_page'], $this->input->get('per_page') );
		}
		$auto_name = '';
		foreach ($data['list'] as $key => $cat) {
			$data['list'][$key]->cat_name = $this->inuser_model->getField('province',
				array('name'),
				array(
				'id' => $cat->provinceid,
				));
			$subname = $cat->name;
			if ($auto_name == null) {
                $auto_name = $subname;
            } else {
                $auto_name = $auto_name . "," . $subname;
            }
		}
		$data['auto_name'] = $auto_name;
		$data['city'] = $this->inuser_model->get_data('province');
        $data['headerTitle'] = 'Quản lý quận huyện';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/province/listdistrict', $data);
        $this->load->view('admin/footer');
    }
/*********** Đường phố ************************************************************/
public function listStreet()
    {
		$this->check_acl();
		$data['headerTitle'] = 'Quản lý đường phố';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/province/listdistrict', $data);
        $this->load->view('admin/footer');
	}



}