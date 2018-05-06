<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_productmodel');
        $this->load->library('pagination');
    }
    public function index($alias,$id){
        $this->pro_bycategory($alias,$id);
    }
    public function pro_bycategory($alias,$id){
        $data = array();
        $currentUrl = current_url();
        $getVar = $this->uri->uri_to_assoc(2);

        $proids = $this->f_productmodel->getProIdsByCatId($id);
        $arr = array();
        $where = array();
        if(count($proids))
        {
            foreach($proids as $key => $proid){
                $arr[] = $proid['id'];
            }
            $attributes = $this->f_productmodel->getAttribteByProId($arr);
            if(count($getVar) == null){
                $idgroup = array();
                $attLinks = array();
                foreach($attributes as $key => $attribute){
                    $idgroup[] = $attribute->group_id;
                    $attLinks[$key] = array(
                        'id' => $attribute->id,
                        'name' => $attribute->name,
                        'group_id' => $attribute->group_id,
                        'value' => $attribute->text,
                        'link'  => current_url().'/'.$attribute->group_alias.'/'.$attribute->alias,
                        'li_check' => '',
                        'a_check' => 'm-checkbox-unchecked',
                    );
                }
                $groups = $this->f_productmodel->getGroupsByAttributeId($idgroup);
                $data['groups'] = $groups;
                $data['attributes'] = $attLinks;
            }
            else{
                $group_alias = array();$idgroup = array();
                $attribute_alias = array();
                foreach($attributes as $key2 => $attribute){
                    $group_alias[] = $attribute->group_alias;
                    $attribute_alias = $attribute->alias;
                    $idgroup[] = $attribute->group_id;
                }
                $actions = array_unique($group_alias);
                $getFilters = $this->uri->uri_to_assoc(2,$actions);
                $arrLink = array();
                $dlink = array();
                //echo "<pre>";var_dump($getFilters);die();
                //echo "<pre>";var_dump($attributes);die();
                foreach($attributes as $key1 => $attribute){
                    if(array_key_exists($attribute->group_alias,$getFilters)){
                        if(in_array($attribute->alias,$getFilters))
                        {
                            //checked
                            $link ='';
                            foreach($getFilters as $key => $filter){
                                $check_filter = explode('_',$filter);
                                $link .= '/'.$key. '/' .$filter;
                            }
                            $dlink[] = array(
                                'id' => $attribute->id,
                                'name' => $attribute->name,
                                'group_id' => $attribute->group_id,
                                'link' => base_url().$alias.'-'.$id.'/'.trim($link,'/'),
                                'li_check' => 'm-selected-ln-item',
                                'a_check' => 'm-checkbox-checked',
                            );
                        }
                        else{
                            $link ='';
                            foreach($getFilters as $key => $filter){
                                $check_filter = explode('_',$filter);
                                if(in_array($attribute->alias,$check_filter) && $attribute->group_alias == $key){
                                    $link .= '/'.$key. '/' .$filter;
                                    $li_check = 'm-selected-ln-item';
                                    $a_check = 'm-checkbox-checked';
                                }elseif($attribute->group_alias == $key){
                                    $link .= '/'.$key. '/' .$filter.'_'.$attribute->alias;
                                    $li_check = '';
                                    $a_check = 'm-checkbox-unchecked';
                                }else{
                                    $link .= '/'.$key. '/' .$filter;
                                    $li_check = '';
                                    $a_check = 'm-checkbox-unchecked';
                                }
                            }
                            $dlink[] = array(
                                'id' => $attribute->id,
                                'name' => $attribute->name,
                                'group_id' => $attribute->group_id,
                                'link' => base_url().$alias.'-'.$id.'/'.trim($link,'/'),
                                'li_check' => $li_check,
                                'a_check' => $a_check,
                            );
                        }
                    }else{
                        $link ='';
                        foreach($getFilters as $key => $filter){
                            $check_filter = explode('_',$filter);
                            if(in_array($attribute->alias,$check_filter) && $attribute->group_alias == $key){
                                $li_check = 'm-selected-ln-item';
                                $a_check = 'm-checkbox-checked';
                            }elseif($attribute->group_alias == $key)
                            {
                                $li_check = '';
                                $a_check = 'm-checkbox-unchecked';
                            }
                            else{
                                $li_check = '';
                                $a_check = 'm-checkbox-unchecked';
                            }
                            $link .= '/'.$key. '/' .$filter;
                        }
                        //echo trim($link.'/'.$attribute->group_alias.'/'.$attribute->alias,'/').'<br>';
                        $dlink[] = array(
                            'id' => $attribute->id,
                            'name' => $attribute->name,
                            'group_id' => $attribute->group_id,
                            'link' => base_url().$alias.'-'.$id.'/'.trim($link.'/'.$attribute->group_alias.'/'.$attribute->alias,'/'),
                            'li_check' => $li_check,
                            'a_check' => $a_check,
                        );
                    }
                }
                //die();
                //echo "<pre>";var_dump($dlink);die();
                //echo "<pre>";var_dump($dlink);die();
                $data['attributes'] = array_unique($dlink);
                $groups = $this->f_productmodel->getGroupsByAttributeId($idgroup);
                $data['groups'] = $groups;
            }
        }
        $data['currentUrl'] = $currentUrl;
        $data['cate_curent'] = $this->f_productmodel->getFirstRowWhere('product_category',array(
            'id' => $id
        ));
        $data['cate'] = $this->f_productmodel->get_data('product_category',array(
            'lang' => $this->language
        ));
        $page = 1;
        // Số record trên một trang
        $limit = 4;
        // Tìm start
        $start = ($limit * $page) - $limit;
        $lists = $this->f_productmodel->ProductBycategory($id,$limit,$start);
        $data['lists'] = $lists;
        $data['limit'] = $limit;
        $data['total'] = $lists;
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'image'=>@$data['cate_curent']->product_image,
            'type'=>'products');
        $this->LoadHeader(null,$seo,false);
        $this->load->view('products/pro_bycategory',$data);
        $this->LoadFooter();
    }

    //product detail
    public function detail($alias,$id){
        $data = array();
        $data['item']=$this->f_productmodel->get_data('product',
            array('id'=>$id),array(),true);
        $data['product_img'] = $this->f_productmodel->getProImages($id);
        $data['form_key'] = $key = rand();
        $this->session->set_userdata('keyform',$key);
        /*$data['product_similar']=$this->f_productmodel->getProductSimilar2($data['item']->category_id,7,0);*/
        $seo=array('title'=>@$data['item']->title_seo==''
            || @$data['item']->title_seo== '0' ?$data['item']->name:$data['item']->title_seo,
            'description'=>@$data['item']->description_seo,
            'keyword'=>@$data['item']->keyword_seo,
            'image'=>@$data['item']->product_image,
            'type'=>'products');
        $this->LoadHeader(null,$seo,false);
        $this->load->view('products/view_detail',$data);
        $this->LoadFooter();
    }
    public function getDataPagination(){
        $data = array();
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
            sleep(1);
        }
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $id = $_GET['id'];
        // Kiểm tra trang hiện tại có bé hơn 1 hay không
        if ($page < 1) {
            $page = 1;
        }
        // Số record trên một trang
        $limit = 4;
        // Tìm start
        $start = ($limit * $page) - $limit;
        $lists = $this->f_productmodel->ProductBycategory($id,$start,$limit);
        $data['total'] = count($lists);
        $data['limit'] = $limit;
        $data['lists'] = $lists;
        $this->load->view('products/view_get_cate_pagination',$data);
    }

    public function getProductByBrand($alias)
    {
        $data = array();
        $data['cate_curent'] = $catecurrent = $this->f_productmodel->getFirstRowWhere('product_brand',array(
            'alias' => $alias
        ));
        $page = 1;
        // Số record trên một trang
        $limit = 4;
        // Tìm start
        $start = ($limit * $page) - $limit;
        $lists = $this->f_productmodel->get_product_by_brand($catecurrent->id,$limit,$start);
        //echo "<pre>";var_dump($lists);die();
        $data['lists'] = $lists;
        $seo = array();
        $seo=array('title'=>@$data['cate_curent']->title_seo==''?$data['cate_curent']->name:$data['cate_curent']->title_seo,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'image'=>@$data['cate_curent']->product_image,
            'type'=>'products');

        $this->LoadHeader(null,$seo,false);
        $this->load->view('products/pro_by_brand',$data);
        $this->LoadFooter();
    }
    public function typeDetail()
    {
        $data = array();
        $title=@$data['item']->name;
        $keyword=@$data['item']->keyword;
        $description=@$data['item']->description_seo;

        $this->LoadHeader($title,$keyword,$description);
        $this->load->view('type_detail',$data);
        $this->LoadFooter();
    }

}