<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class System_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('model');
    }
    // get pro home one cate
    public function getProbyCate($id,$where,$order, $limit, $offset)
    {
      $query = $this->db->select('product.*')
            ->from('product')
            ->join('product_to_category', 'product.id=product_to_category.id_product','left')
            ->where('product_to_category.id_category', @$id)
            ->where($where)
            ->order_by($order[0],$order[1])
            ->limit($limit, $offset)
            ->get();
        return $query->result();
    }

    public function getNewsByCategory($id,$where,$limit,$offset){
        $query = $this->db->select('news.id,
                                    news.title,
                                    news.description,
                                    news.alias,
                                    news.category_id,
                                    news.image,
                                    news.time,
                                    news.view,
                                    news_category.id as cat_id,
                                    news_category.name,
                                    news_category.alias as cat_alias,
                                    news_category.parent_id,
                                    news_to_category.id_category,
                                    news_to_category.id_news')
            ->from('news')
            ->join('news_to_category', 'news.id = news_to_category.id_news')
            ->join('news_category', 'news_category.id = news_to_category.id_category')
            ->where('news_to_category.id_category',$id)
            ->where($where)
            ->order_by('news.id','desc')
            ->group_by('news.id')
            ->get('', $limit, $offset);

        return $query->result();
    }
}
