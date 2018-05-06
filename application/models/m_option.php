<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_option extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function listAllOption($limit,$offset)
    {
        $query = $this->db->select('*')
            ->from('oc_option')
            ->order_by('sort_order','desc')
            ->get('', $limit, $offset);
        return $query->result();
    }
    public function getListOption($id){
        $this->db->select('oc_option_value_description.*');
        $this->db->from('oc_option_value_description');
        $this->db->where('option_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    public function getOption($id = null,$pid = null){
        $this->db->select("oc_option.*, product_to_option.id as to_ids");
        $this->db->from('product');
        $this->db->join('product_to_option', 'product_to_option.product_id=product.id','left');
        $this->db->join('oc_option', 'oc_option.option_id=product_to_option.option_id','left');
        $this->db->where('product_to_option.id', $id);
        $this->db->where('product.id', $pid);
        $this->db->order_by('oc_option.option_id', 'desc');
        $q = $this->db->get();
        return $q->result();
    }
    public function getValues($id = null, $pro = null)
    {
        $this->db->select('*');
        $this->db->from('oc_option_value');
        $this->db->where('to_ids', $id);
        $this->db->where('product_id', $pro);
        $q = $this->db->get();
        return $q->result();
    }
    public function getNameValue($id = null)
    {
        $this->db->select('*');
        $this->db->from('oc_option_value_description');
        $this->db->where('option_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    public function getOptions($id)
    {
        $this->db->select('*');
        $this->db->from('oc_option');
        $this->db->where('option_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    public function getBackgroup()
    {
        $this->db->select('*');
        $this->db->from('product_color');
        $q = $this->db->get();
        return $q->result();
    }
    public function getBackgroupById($id)
    {
        $this->db->select('*');
        $this->db->from('product_color');
        $this->db->where('id', $id);
        $q = $this->db->get();
        return $q->first_row();
    }
}