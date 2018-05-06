<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class F_productmodel extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('model');
    }
    // dem so sp của 1 danh muc
public function count_ProbyCate($id)
    {
        $query = $this->db->select('product.id')
            ->from('product')
            ->join('product_to_category', 'product.id=product_to_category.id_product','left')
            ->where('product_to_category.id_category', @$id)
            ->group_by('product.id')
            ->get();
        return $query->num_rows();
    }
    //danh sách sp cua 1 danh muc
    public function getProbyCate($id, $order, $limit, $offset)
    {
      $query = $this->db->select('product.*,product_to_category.id_category')
            ->from('product')
            ->join('product_to_category', 'product.id=product_to_category.id_product','left')
            ->where('product_to_category.id_category', @$id)
            ->order_by($order[0],$order[1])
            ->limit($limit, $offset)
            ->get();
        return $query->result();
    }
    // danh sách màu sắc san pham
    public function getwherejoincolor($id){
        $this->db->select('*, product_color.color ');
        $this->db->from('product_to_color');
        $this->db->join('product_color', 'product_color.id = product_to_color.id_color');
        $this->db->where('product_to_color.id_product', $id);
        $data = $this->db->get();
        return $data->result();
    }
// danh sách thuong hiêu của sp
    public function getProductBrand($cid){
        $this->db->select('product_brand.*, `product_category`.`id` as cat_id');
        $this->db->join('product_to_brand', 'product_to_brand.brand_id=product_brand.id','left');
        $this->db->join('product_category', 'product_category.id=product_to_brand.id_category','left');
        $this->db->where('product_to_brand.id_category',$cid);
        $this->db->order_by('product_brand.sort', 'desc');
        $q = $this->db->get('product_brand');
        return $q->result();
    }
// danh sach xuat sứ sp
    public function getProductLocale($id){
        $this->db->select('*, product_locale.name as locale_name');
        $this->db->from('product_to_locale');
        $this->db->join('product_locale', 'product_locale.id = product_to_locale.id_locale');
        $this->db->where('product_to_locale.id_product', $id);
        $data = $this->db->get();
        return $data->result();
    }
// danh sach kich thuoc sp
    public function getProductSize($id){
        $this->db->select('*, product_size.name as name_size');
        $this->db->from('product_to_size');
        $this->db->join('product_size', 'product_size.id = product_to_size.id_size');
        $this->db->where('product_to_size.id_product', $id);
        $data = $this->db->get();
        return $data->result();
    }

// sô binh luan cua sp
    public function getCountComment($id){
        $this->db->select('comments_binhluan.id');
        $this->db->where('review',1);
        $this->db->where('id_sanpham',$id);
        $q = $this->db->get('comments_binhluan');
        return $q->num_rows();
    }

    public function getarr_idcategory($product_id){
        $q2 = $this->db->query("SELECT category_id FROM product where id = '" . $product_id . "'")->first_row();
        $q1 = $this->db->query("SELECT id_category FROM product_to_category where id_product = '" . $product_id . "' and id_category <>$q2->category_id")->result();
        $arr=array();
        foreach($q1 as $v){
            $arr[]=$v->id_category;
        }
        return $arr;
    }

    public function Product_comment_binhluan($id_sanpham){
        $q=$this->db->query("SELECT sum(giatri) as tong_giatri from comments_binhluan where  id_sanpham = '".$id_sanpham."' and review = 1");
        return $q->result();
    }
    public function getProByHs(){
        $this->db->select('product_hangsx.*,product_to_h.pro_id');
        $this->db->join('product_to_h', 'product_hangsx.id=product_to_h.hsx_id','left');
        $this->db->where('product_hangsx.lang',$this->language);
        $q=$this->db->get('product_hangsx');
        return $q->result();
    }
    public function getCateCurrent($cid,$pid){
        $this->db->select('product_category.name,product_category.id,product_category.parent_id');
        $this->db->join('product_to_category', 'product_category.id=product_to_category.id_category','left');
        $this->db->where('product_to_category.id_category',$cid);
        $this->db->where('product_to_category.id_product',$pid);
        $q=$this->db->get('product_category');
        return $q->first_row();
    }
    public function getProShopSales($where,$limit,$offset){
        $this->db->select('product.id,product.name,product.pro_dir,product.image,product.alias,product.price,product.price_sale,');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        $this->db->where($where);
        $this->db->limit($limit,$offset);
        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->result();
    }
    public function get_products($where,$limit,$offset){
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.multi_image,
                            product.pro_dir,
                            product.img_dir,
                            product.price,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,
                            product.image as pro_image,
                            product.description as pro_des,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category,
                            product_brand.name as brand_name,
                            product_brand.alias as brand_alias,
                            ');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        $this->db->join('product_brand', 'product_brand.id=product.style','left');
        $this->db->where($where);
        if($limit !=null && $offset !=null){
            $this->db->limit($limit,$offset);
        }
        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->result();
    }
    public function getProductSimilar($product_id,$catid, $limit, $offset)
    {
        //$arr_in=$this->getarr_idcategory($product_id);
        $query = $this->db->select('product.id as pro_id,product_category.id,product.alias,product.image,product.caption_1,
                                product.category_id,product.user_id , product.view, product.focus, product.hot, product.code, product.price,product.price_sale,product_category.name as cate_name,product.bought,
                                product.name,product.description,product.price as pro_price,product.multi_image,product.pro_dir,product.img_dir,product_category.alias as cate_alias,product_category.parent_id,
                                product_to_category.id as product_to_category_id,product_brand.name as brand_name')
            ->from('product')
            ->join('product_to_category', 'product_to_category.id_product = product.id','left')
            ->join('product_category', 'product_to_category.id_category = product_category.id','left')
            ->join('product_brand', 'product_brand.id = product.style','left')
            ->where('product_category.id',$catid)
            ->where('product.id !=', $product_id)
            ->group_by('product.id')
            ->get('', $limit, $offset);
        return $query->result();
    }
    public function getProductSimilar2($category_id, $limit, $offset)    {
        $query = $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.name as pro_name,
                            product.view,
                            product.downloaded,
                            product.category_id,
                            product.alias as pro_alias,
                            product.image as pro_img,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            ')
            ->from('product')
            ->join('product_category', 'product.category_id = product_category.id')
            ->where('product.category_id',$category_id)
            ->get('', $limit, $offset);
        return $query->result();
    }


    public function count_Probyhangsx($id_hang)
    {
        $query = $this->db->select('product.id')
            ->from('product')
            ->join('product_hangsx', 'product_hangsx.id=product.style', 'left')
            ->where('product_hangsx.id', $id_hang)
            ->order_by('product.id', 'desc')
            ->get();
    }
    public function getProbyHangsx($id_hang,$order,$limit,$offset)
    {
        $query = $this->db->select('product.id,product.name as pro_name,product.price_sale,
        product.price as pro_price,product.alias as pro_alias,product.price,product.id,product.pro_dir,
        product.image as pro_image,product_brand.id as hang_id,product_brand.alias as brand_alias,
        product_brand.name as brand_name')
            ->from('product')
            ->join('product_brand', 'product_brand.id=product.style', 'left')
            ->where('product_brand.id', $id_hang)
            ->limit($limit,$offset)
            ->order_by($order[0],$order[1])
            ->get();

        return $query->result();
    }




    public function ProductBycategory($where = array(),$where1,$where2,$khoanggia,$order,$limit,$offset){
         $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.description as pro_des,
                            product.price,
                            product.description,
                            product.bought,
                            product.view,
                            product.pro_dir,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.home,
                            product.image as pro_image,
                            product.hot,
                            product.focus,
                            product.style,
                            product.user_id,
                            product.active,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_brand.name as brand_name,
                            product_brand.alias as brand_alias,
                            ');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');
        $this->db->join('product_brand','product_brand.id=product.style','left');
        $this->db->join('pro_values','pro_values.pro_id=product.id','left');
        if(is_array($where)&&!empty($where)){
            $this->db->where($where);
        }
        if($khoanggia != 0){
            $this->db->where('product.price_sale BETWEEN "'.$khoanggia[0].'" and "'.$khoanggia[1].'"');
        }
        if(is_array($where2)&&!empty($where2)){
            $this->db->where_in($where2);
        }
        if(is_array($where1)&&!empty($where1)){
            $this->db->or_where($where1);
        }
        $this->db->group_by('product.id');
        $this->db->order_by($order[0],$order[1]);
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
    public function countItemFilters($catid,$brand,$khoanggia,$filter)
    {
        //echo $catid."-".$brand."-".$khoanggia."-".$filter;die;
        $this->db->select('product.id');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product_to_category.id_category','left');
        $this->db->join('product_brand','product_brand.id=product.style','left');
        $this->db->join('pro_values','pro_values.pro_id=product.id','left');
        $this->db->where('product_to_category.id_category',$catid);
        //$this->db->or_where('product_category.parent_id',$catid);
        if($brand != 0) {
            $this->db->where('product_brand.id',$brand);
        }
        if($khoanggia != 0) {
            //echo $khoanggia[0].'-'.$khoanggia[1];die();
            $this->db->where('product.price_sale BETWEEN "'.$khoanggia[0].'" and "'.$khoanggia[1].'"');
        }
        if(($filter) != 0){
            $this->db->where_in('pro_values.value',$filter);
        }

        /*$this->db->or_where('product_category.parent_id',$catid);*/
        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->num_rows();
    }

    public function getProductById($id)
    {
        $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.description as pro_des,
                            product.detail,
                            product.code,
                            product.price,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.season,
                            product.destination,
                            product.alias as pro_alias,
                            product.home,
                            product.groupsize,
                            product.image as pro_img,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            ');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        $this->db->where_in('product_category.id',$id);
        $this->db->group_by('product.id');
        $q=$this->db->get('product');
        return $q->result();
    }
    /*count  news by category*/
    public function CountProByCategory($id){
        $this->db->select('product.id as pro_id');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        $this->db->join('travel_style','travel_style.id=product.style','left');
        $this->db->where('product_category.id',$id);
        $this->db->or_where('product_category.parent_id',$id);
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->num_rows();
    }


    public function getproduct_detail($pid,$alias){
        $query = $this->db->select('product.*')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id','left')
            ->where('product.id', $pid)
            ->where('product.alias', $alias)
            ->get();
        return $query->first_row();
    }


    //=============================end Location

    public function getProImages($proId)
    {
        $this->db->select('product.id, product.alias, product.image, images.id as image_id,images.id_item ,images.image ');
        $this->db->join('product', 'images.id_item=product.id', 'left');
        $this->db->where('images.id_item', $proId);
        $q = $this->db->get('images');
        return $q->result();
    }


    public function getListRoot(){
        $this->db->select('*');
        $this->db->where('parent_id =',0);
        $q=$this->db->get('product_category');
        return $q->result();
    }
    public function getListChil(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $q=$this->db->get('product_category');
        return $q->result();
    }
    public function getComments($product_id,$limit){
        $this->db->select('comments.*, users.fullname,users.avatar');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$product_id);
        $this->db->order_by('comments.id','desc');
        $n=$this->db->get('comments',$limit);
        return $n->result();
    }
    public function getComments_desc($product_id){
        $this->db->select('comments.*, users.fullname, users.avatar');
        $this->db->join('users','users.id=comments.user');
        $this->db->where('comments.item_id',$product_id);
        $n=$this->db->get('comments');
        return $n->result();
    }

    public function countAllPro($where)
    {
        $this->db->select('product.id as pro_id');
        $this->db->join('product_category', 'product_category.id=product.category_id');
        $this->db->where($where);
        $q = $this->db->get('product');
        return $q->num_rows();
    }
    public function getAllPro($where,$limit,$offset)
    {
        $this->db->select('product.id as pro_id,product.name as pro_name,product_category.id as cat_id,product.alias as pro_alias,
        product.image as pro_image,product.price,product.price_sale,product_category.alias,
        product.multi_image,product.pro_dir,product.img_dir,caption_3,
        product_category.alias as cate_alias,product_category.parent_id
                            ');
        $this->db->join('product_category', 'product_category.id=product.category_id');
        $this->db->where($where);
        $this->db->order_by('product.sort', 'asc');
        $this->db->limit($limit,$offset);
        $q = $this->db->get('product');
        return $q->result();
    }

    public function getItemByCateId($where,$order,$offset,$limit)
    {
        $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.description as pro_des,
                            product.price,
                            product.downloaded,
                            product.view,
                            product.finish,
                            product.itinerary,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.season,
                            product.destination,
                            product.alias as pro_alias,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            ');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        if($where['filter_type'] !='')
        {
            $this->db->where('product.'.$where['filter_type'],$where['filter_value']);
        }
        if($where['catid'] !=''){
            $this->db->where('product_to_category.id_category',$where['catid']);
            $this->db->or_where('product_category.parent_id',$where['catid']);
        }
        //var_dump($order);die();
        if(count($order))
        {
            $this->db->order_by('product.'.$order['order_type'],$order['order_value']);
        }
        else{
            $this->db->order_by('product.id','desc');
        }
        $this->db->group_by('product.id');
        $this->db->limit($limit,$offset);
        $q=$this->db->get('product');
        return $q->result();
    }
    public function countItemByCateId($where)
    {
        $this->db->select('product.id');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        if($where['filter_type'] !='')
        {
            $this->db->where('product.'.$where['filter_type'],$where['filter_value']);
        }
        if($where['catid'] !=''){
            $this->db->where('product_to_category.id_category',$where['catid']);
            $this->db->or_where('product_category.parent_id',$where['catid']);
        }
        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->num_rows();
    }
    public function countItemByTagId($arrId)
    {
        $query = $this->db->select('product.id,product.name as pro_name,product_category.id,product.alias as pro_alias,
        product.image as pro_image,product.price as pro_price,product_category.alias,product_category.alias as cate_alias,product_category.parent_id ')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id', 'left')
            ->where_in('product.id', $arrId)
            ->order_by('product.id', 'desc')
            ->get();

        return $query->num_rows();
    }
    public function getItemByTagId($arrId,$limit,$offset)
    {
        $query = $this->db->select('product.id as pro_id,
                            product.alias as pro_alias,
                            product.description as pro_des,
                            product.price,
                            product.downloaded,
                            product.view,
                            product.finish,
                            product.itinerary,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.season,
                            product.destination,
                            product.alias as pro_alias,
                            product.home,
                            product.image as pro_img,
                            product.hot,
                            product.focus,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            ')
            ->from('product')
            ->join('product_category', 'product_category.id=product.category_id', 'left')
            ->where_in('product.id', $arrId)
            ->order_by('product.id', 'desc')
            ->get('', $limit, $offset);

        return $query->result();
    }
    public function getProByView($id,$view)
    {
        $this->db->select('product.id as pro_id,
                            product.location,
                            product.alias as pro_alias,
                            product.location,
                            product.caption_1,
                            product.multi_image,
                            product.pro_dir,
                            product.img_dir,
                            product.price,
                            product.price_sale,
                            product.name as pro_name,
                            product.category_id,
                            product.alias as pro_alias,
                            product.view,
                            product.image as pro_image,
                            product.description as pro_des,
                            product_category.id as cate_id,
                            product_category.name as cate_name,
                            product_category.alias as cate_alias,
                            product_to_category.id_product,
                            product_to_category.id_category');
        $this->db->join('product_to_category', 'product.id=product_to_category.id_product','left');
        $this->db->join('product_category', 'product_category.id=product.category_id','left');
        if($view !=''){
            $this->db->where('product.'.$view,1);
        }

        $this->db->where('product_category.id',$id);
        $this->db->or_where('product_category.parent_id',$id);

        $this->db->group_by('product.id');
        $this->db->order_by('product.id','desc');
        $q=$this->db->get('product');
        return $q->result();
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
    public function getAttributeByCatId($catid){
        $this->db->select('attribute.*');
        $this->db->join('cat_attribute', 'cat_attribute.attribute_id=attribute.id','left');
        $this->db->join('product_category', 'product_category.id=cat_attribute.id_category','left');
        $this->db->where('product_category.id',$catid);
        $this->db->where('attribute.type !=','text');
        $this->db->group_by('attribute.id');
        $this->db->order_by('attribute.sort','asc');
        $q=$this->db->get('attribute');
        return $q->result();
    }
    public function getProductByAlias($alias){
        $this->db->select('product.*,product_brand.name as brand_name,product_brand.alias as brand_alias');
        $this->db->join('product_brand', 'product_brand.id=product.style','left');
        $this->db->where('product.alias',$alias);
        $q=$this->db->get('product');
        return $q->first_row();
    }
    //prosimilar ajaxt
    public function countProSameAjax($product_id,$catid)
    {
        $query = $this->db->select('product.id')
            ->from('product')
            ->join('product_to_category', 'product_to_category.id_product = product.id')
            ->join('product_category', 'product_to_category.id_category = product_category.id')
            ->join('product_brand', 'product_brand.id = product.style')
            ->where('product_category.id',$catid)
            ->where('product.id !=', $product_id)
            ->group_by('product.id')
            ->get('');
        return $query->num_rows();
    }
    public function getProSameAjax($product_id,$catid,$limit,$offset)
    {
        $query = $this->db->select('product.id as pro_id,product_category.id,product.alias as pro_alias,product.image as pro_image,product.caption_1,
                                product.category_id, product.price,product.price_sale,product_category.name as cate_name,
                                product.name as product_name,product.description,product.price as pro_price,product.multi_image,product.pro_dir,product.img_dir,
                                product_category.alias,product_category.alias as cate_alias,product_category.parent_id,
                                product_to_category.id as product_to_category_id,product_brand.name as brand_name')
            ->from('product')
            ->join('product_to_category', 'product_to_category.id_product = product.id')
            ->join('product_category', 'product_to_category.id_category = product_category.id')
            ->join('product_brand', 'product_brand.id = product.style')
            ->where('product_category.id',$catid)
            ->where('product.id !=', $product_id)
            ->group_by('product.id')
            ->get('', $limit, $offset);
        return $query->result();
    }
    //get brands by cat id
    public function getBrandsBycatId($catid)
    {
        $query = $this->db->select('product_brand.name as brand_name,
        product_brand.alias as brand_alias,product_brand.id as brand_id')
            ->from('product_brand')
            ->join('product_to_brand', 'product_to_brand.brand_id = product_brand.id')
            ->join('product_category', 'product_to_brand.id_category = product_category.id')
            ->where('product_category.id',$catid)
            ->group_by('product_brand.id')
            ->get('');
        return $query->result();
    }

    public function getBrandsBycatIdduong()
    {
        $query = $this->db->select('product_brand.name as brand_name,
        product_brand.alias as brand_alias,product_brand.id as brand_id')
            ->from('product_brand')
            ->join('product_to_brand', 'product_to_brand.brand_id = product_brand.id')
            ->join('product_category', 'product_to_brand.id_category = product_category.id')
            ->group_by('product_brand.id')
            ->get('');
        return $query->result();
    }

    public function count_ProductBrand123(){
        $query = $this->db->query("SELECT product.id, product.style,  count(product.style) as count123 FROM product JOIN product_brand ON product_brand.id = product.style  GROUP BY product.style");
//        $this->db->join('product_brand', 'product_brand.id = product.style');
//        $this->db->group_by('product.style');
//         $this->db->get();
        return $query->result();
    }

    public function count_ProductBrand1($catid){
        $this->db->select('product.id , product.style, count(product.style) as count123,product_to_brand.id_category ');
        $this->db->from('product');
        $this->db->join('product_brand', 'product_brand.id = product.style');
        $this->db->join('product_to_brand' , 'product_to_brand.brand_id = product_brand.id');
        $this->db->where('product_to_brand.id_category',$catid);
        $this->db->group_by('product.style');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_ProductBrand($catid){
        $this->db->select('product.id , product.price_sale, product.style, count(product.style) as count123, product_to_category.id_category as cat_id ');
        $this->db->from('product');
        $this->db->join('product_to_category', 'product_to_category.id_product = product.id');
        $this->db->join('product_category' , 'product_category.id = product_to_category.id_category');
        $this->db->where('product_category.id',$catid);
        $this->db->group_by('product.style');
        $query = $this->db->get();
        return $query->result();
    }



    public function count_Productprice($catid){
        $this->db->select('product.id , product.price_sale, product.style, product_to_category.id_category as cat_id ');
        $this->db->from('product');
        $this->db->join('product_to_category', 'product_to_category.id_product = product.id');
        $this->db->join('product_category' , 'product_category.id = product_to_category.id_category');
        $this->db->where('product_category.id',$catid);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_Productlocale($catid){
        $this->db->select('product.id , product.locale,count(product.locale) as count123,  product.style, product_to_category.id_category as cat_id ');
        $this->db->from('product');
        $this->db->join('product_to_category', 'product_to_category.id_product = product.id');
        $this->db->join('product_category' , 'product_category.id = product_to_category.id_category');
        $this->db->where('product_category.id',$catid);
        $this->db->group_by('product.locale');
        $query = $this->db->get();
        return $query->result();
    }





    public function getwherejointype($id){
        $this->db->select('*, product_size.name as name_size');
        $this->db->from('product_to_size');
        $this->db->join('product_size', 'product_size.id = product_to_size.id_size');
        $this->db->where('product_to_size.id_product', $id);
        $data = $this->db->get();
        return $data->result();
    }


    /*Edit by No.tri: 11/05/2017*/
    public function getByIdOption($id_pro = null)
    {
        $this->db->select('oc_option.*, product_to_option.id as to_ids');
        $this->db->from('product_to_option');
        $this->db->join('oc_option', 'oc_option.option_id = product_to_option.option_id');
        $this->db->where('product_to_option.product_id', $id_pro);
        $this->db->order_by('sort_order', 'desc');
        $data = $this->db->get();
        return $data->result();
    }
    public function getByIdValue($to_ids = null)
    {
        $this->db->select('oc_option_value.*');
        $this->db->from('oc_option_value');
        $this->db->where('to_ids', $to_ids);
        $this->db->order_by('id', 'desc');
        $data = $this->db->get();
        return $data->result();
    }
    public function getNameValue($id = null)
    {
        $this->db->select('*');
        $this->db->from('oc_option_value_description');
        $this->db->where('description_id', $id);
        $data = $this->db->get();
        return $data->first_row();
    }
}