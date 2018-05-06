<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_media extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function getList(){
        $this->db->select('product_brand.*,
            product_category.id as cat_id,
            product_category.name as cat_name,
            product_category.alias as cat_alias');
        $this->db->from('product_brand');
        $this->db->join('product_category', 'product_category.id=trademark_category.category_id','left');
        $this->db->order_by('trademark_category.sort', 'esc');
        $this->db->group_by('trademark_category.id');
        $q = $this->db->get();
        return $q->result();
    }
}
