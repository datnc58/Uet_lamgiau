<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inuser_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
    }
	
	// đếm danh sach phường xã trong admin
	public function count_listward($data)
    {
		$this->db->select('ward.id');
		$this->db->from('ward');
		$this->db->join('district', 'district.id=ward.districtid','left');
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('ward.name',$data['name']);
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('district.id',$data['cate']);
		}
		$this->db->order_by('ward.id', 'desc');
		$this->db->group_by('ward.id');			
		$q = $this->db->get();
		return $q->num_rows();
        
    }
	// list phường xã
	public function getListWard($data,$limit,$offset){

        $this->db->select('ward.*,district.name as city_name');
        $this->db->from('ward');
        $this->db->join('district', 'district.id=ward.districtid','left');
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('ward.name',$data['name']);
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('district.id',$data['cate']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('ward.id', 'desc');
		$this->db->group_by('ward.id');
		$q = $this->db->get();
		return $q->result();
    }
	
	// đếm danh sach quận huyện trong admin
	public function count_listdistric($data)
    {
		$this->db->select('district.id');
		$this->db->from('district');
		$this->db->join('province', 'province.id=district.provinceid','left');
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('province.name',$data['name']);
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('province.id',$data['cate']);
		}
		$this->db->order_by('district.id', 'desc');
		$this->db->group_by('district.id');			
		$q = $this->db->get();
		return $q->num_rows();
        
    }
	// list phường xã
	public function getListDistric($data,$limit,$offset){

        $this->db->select('district.*,province.name as city_name');
        $this->db->from('district');
        $this->db->join('province', 'province.id=district.provinceid','left');
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('district.name',$data['name']);
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('province.id',$data['cate']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('district.id', 'desc');
		$this->db->group_by('district.id');
		$q = $this->db->get();
		return $q->result();
    }
}
