<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ordermodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
    public function Getlist_oder($limit,$offset){
        $this->db->select('order.*,province.name as provin_name,district.name as distric_name,ward.name as ward_name');
        $this->db->join('province','order.province=province.id','left');
        $this->db->join('district','order.district=district.id','left');
        $this->db->join('ward','order.ward=ward.id','left');
        $this->db->limit($limit,$offset);
        $this->db->order_by('id','desc');
        $q=$this->db->get('order');
        return $q->result();
    }
    public function order_detail($order_id){
        $this->db->select('product.id as product_id,product.name,order_item.*');
        $this->db->join('product','product.id=order_item.item_id');
        $this->db->where_in('order_item.order_id',$order_id);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('order_item');
        return $q->result();
    }


}
