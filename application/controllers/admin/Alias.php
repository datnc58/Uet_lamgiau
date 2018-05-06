<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Alias extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
    }
    public function checkAdd()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $item = $this->adminmodel->getFirstRowWhere('alias',array(
            'alias' => $alias
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
	public function checkCatEdit()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
        $catcheck = $_POST['catcheck'];
        $item = $this->adminmodel->getFirstRowWhere('alias',array(
            'alias' => $alias,
            $catcheck.'_cat !=' => $id
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
	 public function checkEdit()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
		$catcheck = $_POST['catcheck'];
        $item = $this->adminmodel->getFirstRowWhere('alias',array(
            'alias' => $alias,
            ''.$catcheck.'!=' => $id
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
}
