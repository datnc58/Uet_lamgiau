<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_websitemodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
    public function getTypeWebsiteById($idWebsite){
        $this->db->select('uet_website.name');
        $this->db->from('uet_website');
        $this->db->join('uet_header', 'uet_website.id = uet_header.id_website');
        $this->db->where('uet_website.id', $idWebsite);
        $q= $this->db->get();
        return $q->first_row();
    }

    function select_maxlibrary($table){
        $this->db->select_max("number");
        $reuslt = $this->db->get($table);
        return $reuslt->first_row();
    }

}