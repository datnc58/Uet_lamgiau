<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productmodel extends MY_Model{
    function __construct() {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
	// đếm danh sach san pham trong admin
	public function count_listpro($data)
    {
        if(!empty($data))
        {
            $this->db->select('product.id');
            $this->db->from('product');
            $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
            $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');

            if(isset($data['name'])&&$data['name'] !=''){
                $this->db->like('product.name',$data['name']);
            }
            if(isset($data['view'])&&$data['view'] !=''){
                $this->db->where('product.'.$data['view'],'1');
            }
            if(isset($data['code'])&&$data['code'] !=''){
                $this->db->where('product.code',$data['code']);
            }
            if(isset($data['cate'])&&$data['cate'] !=''){
                $this->db->where('product_category.alias',$data['cate']);
            }
			if(isset($data['lang'])&&$data['lang'] !=''){
                $this->db->where('product.lang',$data['lang']);
            }
			if(isset($data['user'])&&$data['user'] !=''){
                $this->db->where('product.user',$data['user']);
            }
            if(isset($data['active'])&&$data['active'] !=''){
                $this->db->where('product.active',$data['active']);
            }
            $this->db->order_by('product.id', 'desc');
			$this->db->group_by('product.id');
			
            $q = $this->db->get();
            return $q->num_rows();
        }
        else{
            return 0;
        }
    }
	// danh sach san pham trong admin
	public function getListProduct($data,$limit,$offset){

        $this->db->select('product.*,
        product_category.id as cat_id,
        product_category.name as cat_name,
        product_category.alias as cat_alias,
        product_to_category.id_product,
        product_to_category.id_category');
        $this->db->from('product');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        
		if(isset($data['name'])&&$data['name'] !=''){
			$this->db->like('product.name',$data['name']);
		}
		if(isset($data['view'])&&$data['view'] !=''){
			$this->db->where('product.'.$data['view'],'1');
		}
		if(isset($data['code'])&&$data['code'] !=''){
			$this->db->where('product.code',$data['code']);
		}
		if(isset($data['cate'])&&$data['cate'] !=''){
			$this->db->where('product_category.alias',$data['cate']);
		}
		if(isset($data['lang'])&&$data['lang'] !=''){
			$this->db->where('product.lang',$data['lang']);
		}
		if(isset($data['user'])&&$data['user'] !=''){
			$this->db->where('product.user',$data['user']);
		}
		if(isset($data['active'])&&$data['active'] !=''){
			$this->db->where('product.active',$data['active']);
		}
		if($limit||$offset){
			$this->db->limit($limit, $offset);
		}
	
		$this->db->order_by('product.id', 'desc');
		$this->db->group_by('product.id');
		$q = $this->db->get();
		return $q->result();
    }
	
    function lookup($keyword)
    {
        $this->db->select('*')->from('product');
        $this->db->like('name', $keyword);
        $query = $this->db->get();
        return $query->result();
    }
 //====================================================================================================================
    public function getProImage($id){
        $this->db->select('product.id as pro_id, product.name as pro_name,p_images.*, p_images.id as img_id ');
        $this->db->join('product','product.id=p_images.id_item','left');
        $this->db->where('product.id',$id);
        $q=$this->db->get('p_images');
        return $q->result();
    }
   
    
    //list product after change price
    public function getListProductPrice($data,$limit,$offset){

        $this->db->select('price_change.*,
        product_category.name as cat_name,
        product_category.alias as cat_alias
        ');
        $this->db->from('price_change');
        $this->db->join('product_category', 'product_category.id=price_change.category_id','left');
        //$this->db->where($where);
        if(isset($data['name']) && $data['name'] !=''){
            $this->db->like('price_change.name',trim($data['name']));
        }
        if(isset($data['code']) && $data['code'] !=''){
            $this->db->where('price_change.code',$data['code']);
        }
        if(isset($data['lang']) && $data['lang'] !=''){
            $this->db->where('price_change.lang',$data['lang']);
        }
        if(isset($data['cate']) && $data['cate'] !=''){
            $this->db->where('product_category.alias',$data['cate']);
        }
        if($limit||$offset){
            $this->db->limit($limit, $offset);
        }
        $this->db->order_by('price_change.id', 'desc');
        $this->db->group_by('price_change.id');
        $q = $this->db->get();
        return $q->result();
    }
/*========= thẻ tag =======================================================================	*/
	  public function searchtag($name){
        $this->db->select('tags.name');
        $this->db->from('tags');
        $this->db->like('name',$name);
        $q = $this->db->get();

        return $q->result();
    }
	 public  function  get_tag($where){
        $this->db->select('tags.*, tags_to_product.id_tags as id_totag, tags_to_product.id_product as id_toproduct');
        $this->db->from('tags');
        $this->db->join('tags_to_product', 'tags.id=tags_to_product.id_tags','left');
        $this->db->where($where);
        $q = $this->db->get();
        //echo  $this->db->last_query();
        return $q->result();
    }
}