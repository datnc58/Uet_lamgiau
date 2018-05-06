<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class comment_model extends MY_Model{
        function __construct() {
            parent::__construct();
            $this->load->helper('model');
        }

        public function listAllComment($limit,$offset)
        {
            $this->db->select('comments.*,users.fullname as user_name,product.name as pro_name, product.alias');
            $this->db->join('product','product.id=comments.item_id','left');
            $this->db->join('users','users.id=comments.user','left');
            $this->db->limit($limit,$offset);
            $this->db->order_by('id','desc');
            $q = $this->db->get('comments');
            return $q->result();
        }
        public function countComment()
        {
            $this->db->select('comments.*,users.fullname as user_name,product.name as pro_name');
            $this->db->join('product','product.id=comments.item_id','left');
            $this->db->join('users','users.id=comments.user','left');
            $q = $this->db->get('comments');
            return $q->num_rows();
        }
        public function getComments_All($product_id,$limit){
            $this->db->select('comments_binhluan.*, comments_binhluan.user_name as fullname');
            $this->db->where('comments_binhluan.review',1);
            $this->db->where('comments_binhluan.id_sanpham',$product_id);
            $this->db->order_by('comments_binhluan.id','desc');
            $n=$this->db->get('comments_binhluan',$limit);
//        echo $this->db->last_query();
            return $n->result();
        }
        public function getComments_desc($product_id){
            $this->db->select('comments.*, users.first_name, users.last_name');
            $this->db->join('users','users.id=comments.user');
            $this->db->where('comments.item_id',$product_id);
            $n=$this->db->get('comments');
            return $n->result();
        }
    }