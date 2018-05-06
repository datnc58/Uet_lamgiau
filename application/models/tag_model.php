<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag_model extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    // đếm danh sach tag san pham trong admin
	public function count_listtags($data)
    {
        if(!empty($data))
        {
            $this->db->select('tags.id');
            $this->db->from('tags');

            if(isset($data['tagname'])&&$data['tagname'] !=''){
                $this->db->like('tags.name',$data['tagname']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('tags.lang',$data['lang']);
            }
            $this->db->order_by('tags.id', 'desc');
			$this->db->group_by('tags.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach tag san pham trong admin
	public function getListtags($data,$limit,$offset){

        $this->db->select('tags.*');
		$this->db->from('tags');

		if(isset($data['tagname'])&&$data['tagname'] !=''){
			$this->db->like('tags.name',$data['tagname']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('tags.lang',$data['lang']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
	
		$this->db->order_by('tags.id', 'desc');
		$this->db->group_by('tags.id');
		$q = $this->db->get();
		return $q->result();
    }
//============== tag tin tuc ========================================
 // đếm danh sach tag tin tuc trong admin
	public function count_listtags_news($data)
    {
        if(!empty($data))
        {
            $this->db->select('tags_news.id');
            $this->db->from('tags_news');

            if(isset($data['tagname'])&&$data['tagname'] !=''){
                $this->db->like('tags_news.name',$data['tagname']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('tags_news.lang',$data['lang']);
            }
            $this->db->order_by('tags_news.id', 'desc');
			$this->db->group_by('tags_news.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach tag san pham trong admin
	public function getListtags_news($data,$limit,$offset){

        $this->db->select('tags_news.*');
		$this->db->from('tags_news');

		if(isset($data['tagname'])&&$data['tagname'] !=''){
			$this->db->like('tags_news.name',$data['tagname']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('tags_news.lang',$data['lang']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
	
		$this->db->order_by('tags_news.id', 'desc');
		$this->db->group_by('tags_news.id');
		$q = $this->db->get();
		return $q->result();
    }
		
   
}
