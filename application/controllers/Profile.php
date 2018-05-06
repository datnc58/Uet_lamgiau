<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_profiler');
    }
    public function index()
    {
        echo "Ok";
    }
    public function changProfiler()
    {
        $data = array();
        if($this->session->userdata('userid')){
            @$u=$this->f_homemodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));
            $data['user_item'] = $u;
        }
        //echo "<pre>";var_dump($data['user_item']);die();
        $title=@$data['pro_first']->name;
        $keyword=@$data['pro_first']->keyword;
        $description=@$data['pro_first']->description_seo;
        $this->LoadHeader($title,$keyword,$description);
        $this->load->view('change_profiler',$data);
        $this->LoadFooter();
    }
}