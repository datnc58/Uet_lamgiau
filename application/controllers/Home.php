<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_homemodel');
    }
    //index
    public function lang($lang){
        if($lang!=null){
            $_SESSION['lang']=$lang;
            redirect(base_url());
        }
    }

    public function index2($var1 = null){
        if($var1 == null)
        {
            $this->home();
        }else{
            $item = $this->f_homemodel->getFirstRowWhere('alias',array(
                'alias' => $var1
            ));
            if(empty($item)){
				 redirect(base_url('404_override'));
            }
            $type = $item->type;
            switch($type){
                case 'cate-pro':
                    $this->load->_control('Products');
                    $this->products->pro_bycategory($item->pro_cat,$var1);
                    break;
                case 'pro':
                    $this->load->_control('products');
                    $this->products->detail($item->pro,$var1);
                    break;
                case 'hangsx':
                    $this->load->_control('products');
                    $this->products->hangsx($var1);
                    break;
                case 'cate-new' :
                    $this->load->_control('news');
                    $this->news->news_bycat($item->new_cat,$var1);
                    break;
                case 'new':
                    $this->load->_control('news');
                    $this->news->detail($item->new_cat,$var1);
                    break;
                case 'm-cat':
                    $this->load->_control('media');
                    $this->media->category($item->m_cat,$var1);
                    break;
                case 'media':
                    $this->load->_control('media');
                    $this->media->detail($var1);
                    break;
                case 'page':
					$this->load->_control('pages');
                    $this->pages->page_content($var1);
					break;
				case 'cat_inuser':
                    $this->load->_control('contact');
                    $this->contact->inuser_detail($var1);
                    break;
            }
        }
    }

    public function index(){ //uh code ci3 k chay dc kieu kia cho nen phai viet lại @@ vẫn chạy đc mà â cac router khac nhu contact , uetadmin co chay dau
        $this->clear_all_cache();
        $data = array();
         /*begin controller home*//*end controller home*/
		 
		 $data['danhmuc'] = $this->load->widget('danhmuc');
		 $data['product_noibat'] = $this->load->widget('product_noibat');
		 
		 $data['product_cat_home'] = $this->load->widget('product_cat_home');
		 
		  $data['news_nb'] = $this->load->widget('news_nb');
		 
		 
		 
		 
         /*begin slide_header*/$data['slide'] = $this->load->widget('slide');/*end slide_header*/
        $seo = array();
        $this->LoadHeader($view=null,$seo,true);
        $this->load->view('home/view_home',$data);
        $this->LoadFooter();
    }
    /**
 * Clears all cache from the cache directory
 */
public function clear_all_cache()
{
    $CI =& get_instance();
    $path = $CI->config->item('cache_path');

    $cache_path = ($path == '') ? APPPATH.'cache/' : $path;

    $handle = opendir($cache_path);
    while (($file = readdir($handle))!== FALSE)
    {
        //Leave the directory protection alone
        if ($file != '.htaccess' && $file != 'index.html')
        {
           @unlink($cache_path.'/'.$file);
        }
    }
    closedir($handle);
}

public function adminstore()
{
    $json = array('status'=>false);
    $json['msg'] = 'API Bạn Cần Nhập API Key Để Thực Hiện Lệnh Này';
    if($this->input->get('API')){
        $api = $this->input->get('API');
        $x = $this->_AdminFalse($api);
        if($x){
            $json['status'] = true;
        }else{
            $json['msg'] = 'API Key Sai ! Bạn Không Thể Thực Hiện Lệnh Này';
        }
    };
    echo json_encode($json);
}


}