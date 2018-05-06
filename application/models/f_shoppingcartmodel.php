<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class F_shoppingcartmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }

    public function getDataValue($id)
    {
        $this->db->select('*');
        $this->db->from('oc_option_value');
        $this->db->where('id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    public function getNameOption($id)
    {
        $this->db->select('*');
        $this->db->from('oc_option');
        $this->db->where('option_id', $id);
        $q = $this->db->get();
        return $q->first_row();
    }
    public function getNameValue($id)
    {
        $this->db->select('*');
        $this->db->from('oc_option_value_description');
        $this->db->where('description_id', $id);
        $q = $this->db->get();
        return $q->first_row();
    }
}