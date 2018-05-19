<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_websitemodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }

    function select_maxlibrary($table){
        $this->db->select_max("number");
        $reuslt = $this->db->get($table);
        return $reuslt->first_row();
    }

}