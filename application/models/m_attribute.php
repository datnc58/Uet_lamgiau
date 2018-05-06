<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_attribute extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function listAllAttribute($limit,$offset)
    {
        $query = $this->db->select('attribute.*,group_attribute.name as group_name')
            ->from('attribute')
            ->join('group_attribute', 'group_attribute.id = attribute.group_id','left')
            ->order_by('group_attribute.name','asc')
            ->get('', $limit, $offset);
        return $query->result();
    }
}