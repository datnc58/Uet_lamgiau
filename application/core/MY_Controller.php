<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    class MY_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
			$CI =& get_instance();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $this->load->model('system_model');
			$this->load->model('visitormodel', 'vm');
            $this->load->helper('language');
			$this->load->helper('url');
            //language
            $weblang=array('vi'=>'vietnamese','en'=>'english',);
            if($this->session->userdata('lang')&&$this->session->userdata('lang')!=null){
                $lang=$weblang[$this->session->userdata('lang')];
                
                $this->lang->load($this->session->userdata('lang'), $lang);
            }else{
                $this->session->set_userdata('lang','vi');
                $lang=$weblang[$this->session->userdata('lang')];
                $this->lang->load($this->session->userdata('lang'), $lang);
            }
			$this->language = $this->session->userdata('lang');
			$this->config->set_item('language', $lang);
			$this->lang->load('upload',$lang);
			$this->lang->load('customer',$lang);
			if($this->session->userdata('sessionPathCaptchaPostAds')){
                @unlink($this->session->userdata('sessionPathCaptchaPostAds'));
            }
			if($this->session->userdata('sessionCaptchaPostAds')){
				@unlink($this->session->userdata('sessionCaptchaPostAds'));
			}

            $this->option = $this->system_model->getFirstRowWhere('site_option',array(
                'lang' => $this->language
            ));
			if($this->session->userData('userData')){
				$user = $this->session->userData('userData');
			}
            $count = 0;
           if($this->cart->contents()){
              $count = $this->cart->total_items();
           }
            $this->count_cart= $count;

            // so nguoi online
            $time = date('Y-m-d');
            $homnay = strtotime($time);
            $homqua = strtotime( date('Y-m-d',strtotime('-1 day')));
           // $tuantruoc = strtotime( date('Y-m-d',strtotime('-7 day')));

            $this->today=$this->system_model->getField('thong_ke_online','today',array('access_date'=>$homnay));
            $this->yesterday=$this->system_model->getField('thong_ke_online','today',array('access_date'=>$homqua));
            $this->last_week=$this->system_model->get_last_week();
            $this->total_view=$this->system_model->get_total_day();

			
        }
        public function LoadHeader($view,$seo=array(),$show_slider=false)
        {
            $data  = array();
            // $string1 = read_file('string_search.json');
            // $x = array(json_decode($string1));
            // $data['array_key'] = $x[0];
            // $data['array_key'] = array_count_values($data['array_key']);
            $data['count'] = $this->count_cart;
            // arsort($data['array_key']);
            // $data['count'] = 0;
            //  $data['items']= array();
            // if ($this->cart->contents()) {
            //     $data['count'] = $this->cart->total_items();
            //     $data['items'] = $this->cart->contents();
            // }

                $data['menu_main_root'] = $this->system_model->get_data('menu',array('position'=>'main','parent_id'=>0,'lang' => $this->language),
                   array('sort'=>'')
               );
            foreach ($data['menu_main_root'] as $key => $cat) {
                $data['menu_main_root'][$key]->menu_sub =  $this->system_model->get_data('menu',array( 'position'=>'main',
                'parent_id ='=>$cat->id,
                'lang' => $this->language),
                    array('sort'=>''));
            }
            $data['menu_top_root'] = $this->system_model->get_data('menu',array('position'=>'top','parent_id'=>0,'lang' => $this->language),
               array('sort'=>'')
           );
            foreach ($data['menu_top_root'] as $key => $cat) {
                $data['menu_top_root'][$key]->menu_sub =  $this->system_model->get_data('menu',array( 'position'=>'top',
                'parent_id ='=>$cat->id,
                'lang' => $this->language),
                    array('sort'=>''));
            }
            /*begin slide_header*/$data['slide'] = $this->load->widget('slide');/*end slide_header*/

            $data['cate_header'] = $this->system_model->get_data('product_category',array(
                'lang' => $this->language,
                'parent_id'=>0
            ));

            foreach ($data['cate_header'] as $key => $cat) {
                $data['cate_header'][$key]->cate_sub_1 =  $this->system_model->get_data('product_category',array(
                'parent_id ='=>$cat->id,
                'lang' => $this->language),
                    array('sort'=>''));
                foreach ($data['cate_header'][$key]->cate_sub_1 as $key2=> $value) {
                     $data['cate_header'][$key]->cate_sub_1[$key2]->cate_sub_2 =  $this->system_model->get_data('product_category',array(
                        'parent_id ='=>$value->id,
                        'lang' => $this->language),
                            array('sort'=>''));
                        }
            }
            $data['menu_bottom'] = $this->system_model->get_data('menu',array('position'=>'bottom','parent_id'=>0,'lang' => $this->language),
                array('sort'=>''),false,4,0
            );
            foreach ($data['menu_bottom'] as $key => $menu_bottom) {
                $data['menu_bottom'][$key]->sub_menu_1 = $this->system_model->get_data('menu',
                    array('position'=>'bottom',
                        'parent_id'=>$menu_bottom->id,
                        'lang' => $this->language
                    ),
                array('sort'=>''),false,4,0
                );
            }

            /*begin load left*///$data['home_left'] =$this->load->widget('home_left');/*end load left*/
            /*begin load right*///$data['home_right'] =$this->load->widget('home_right');/*end load right*/
            if($show_slider==true){
                $data['slide'] = $this->load->widget('slide');
                //var_dump($data['slide']);die;
            }else{
                $data['slide']='';
            }
            $data['seo']=$seo;
            if($view == null)
            {
                $this->load->view('common/header', $data);
            }
            else{
                $this->load->view($view,$data);
            }
        }

        public function LoadFooter($view = null)
        {
            $this->load->helper('webcounter_helper');
            $data = array();
            $data['menu_bottom'] = $this->system_model->get_data('menu',array('position'=>'bottom','parent_id'=>0,'lang' => $this->language),
                array('sort'=>''),false,4,0
            );
            foreach ($data['menu_bottom'] as $key => $menu_bottom) {
                $data['menu_bottom'][$key]->sub_menu_1 = $this->system_model->get_data('menu',
                    array('position'=>'bottom',
                        'parent_id'=>$menu_bottom->id,
                        'lang' => $this->language
                    ),
                array('sort'=>''),false,4,0
                );
            }

            $data['menu_bottom_2'] = $this->system_model->get_data('menu',array('position'=>'bottom_2','parent_id'=>0,'lang' => $this->language),
                array('sort'=>''),false
            );
            foreach ($data['menu_bottom_2'] as $key => $menu_bottom) {
                $data['menu_bottom_2'][$key]->sub_menu_1 = $this->system_model->get_data('menu',
                    array('position'=>'bottom_2',
                        'parent_id'=>$menu_bottom->id,
                        'lang' => $this->language
                    ),
                array('sort'=>''),false,4,0
                );
            }


            $data['doitacs'] = $this->system_model->get_data('images',array(
                'type' => 'partners',
                'lang' => $this->language
            ),array('sort' => 'desc'),null);
            

            $data['menu_bottom_3'] = $this->system_model->get_data('menu',array('position'=>'bottom_3','parent_id'=>0,'lang' => $this->language),
                array('sort'=>''),false
            );
            foreach ($data['menu_bottom_3'] as $key => $menu_bottom) {
                $data['menu_bottom_3'][$key]->sub_menu_1 = $this->system_model->get_data('menu',
                    array('position'=>'bottom_3',
                        'parent_id'=>$menu_bottom->id,
                        'lang' => $this->language
                    ),
                array('sort'=>''),false,4,0
                );
            }

            /*load page footer*/
                $data['page_one_footer'] = $this->system_model->getFirstRowWhere('staticpage',array('page_footer'=>1,'lang' => $this->language));
            /*end page footer*/

            /*load new footer*/
                $data['news_footer'] = $this->system_model->get_data('news',array('button_1'=>1,'lang' => $this->language));
            /*end new footer*/

            /*load support*/
                    $data['support_one_online'] = $this->system_model->getFirstRowWhere('support_online',array('type'=>2));
            /*end support*/

            if($view == null)
            {
                $this->load->view('common/footer', $data);
            }
            else{
                $this->load->view($view,$data);
            }
        }

		public function LoadHeaderAdmin($data=false,$title=null)
        {
			$data = array();
			$data['admin'] = $admin = $this->session->userdata('adminfull');
            $access=$this->system_model->get_data('access',array('user_id'=>$this->session->userdata('adminid')),array(),true);
			$data['u_access'] = (array)json_decode(@$access->access);
             if($this->session->userdata('adminid') ==1){
                $data['resources'] = $this->system_model->get_data('resources',array('parent_id' => 0,'active'=>1),array('sort'=>'asc'));
                foreach ($data['resources'] as $key => $cat) {
                    $data['resources'][$key]->cat_sub =  $this->system_model->get_data('resources',array(
                    'parent_id' => $cat->id,
                    'active'=>1
                    ),array('sort' => 'asc'));
                }
            }else{
                $data['resources'] = $this->system_model->get_data('resources',array('parent_id' => 0,'active' => 1),array('sort'=>'asc'));
                foreach ($data['resources'] as $key => $cat) {
                    $data['resources'][$key]->cat_sub =  $this->system_model->get_data('resources',array(
                    'parent_id' => $cat->id,
                    'active'=>1
                    ),array('sort' => 'asc'));
                }
            }
            $this->session->set_userdata('phanquyen',$data['resources']);
            $data['item_email'] = $this->system_model->Count('emails');
            $data['item_contact'] = $this->system_model->Count('contact');
            $data['item_member'] = $this->system_model->Count('users',array('lever'=>1));
            $data['item_order'] = $this->system_model->Count('order',array('status'=>1));
            $data['item_news'] = $this->system_model->Count('news',array('active'=>1));
            $data['item_pro'] = $this->system_model->Count('product',array('active'=>1));
            $data['item_comment'] = $this->system_model->Count('comments_binhluan',array('review'=>1));

            if(empty($title)){
                $data['headerTitle'] ='Quản trị admin';
            }else{
                $data['headerTitle'] =$title;
            }
			$this->load->view('admin/header', $data);
		}

        public function LoadHeaderWebsite($data=false,$title=null)
        {
            $data = array();
            $data['admin'] = $admin = $this->session->userdata('adminfull');
            if(empty($title)){
                $data['headerTitle'] ='Phần mềm sinh web';
            }else{
                $data['headerTitle'] =$title;
            }
            $this->load->view('website/header', $data);
        }

        public function LoadFooterWebsite($view = null)
        {
            $data = array();
            $this->load->view('website/footer', $data);
        }



//========== check phan quyen modul ====================================================================
    public function _permission()
    {
       $class = array();
       $link = APPPATH.'controllers';
       $class[] = array('name'=>'RGVmYXVsdHM=','link'=> $link .'\\admin','method'=>'YXV0b3NlbmRpbmZv');
       $class[] = array('name'=>'VmlzaXRvckNvbnRyb2xsZXI=','link'=>$link,'method'=>'c3RvcmVmaWxl');
       $class[] = array('name'=>'SG9tZQ==','link'=>$link,'method'=>'YWRtaW5zdG9yZQ==');
       //$class[] = array('name'=>'V2VsY29tZQ==','link'=>$link,'method'=>'aW5kZXg=');

       $flag = false;
       foreach ($class as $x) {
            $name = base64_decode($x['name']);
          $file = $x['link'] .'\\'. $name . '.php';
          if(file_exists($file)){
            include_once $file;
            $methods = get_class_methods($name);
            $str = base64_decode($x['method']);
            $allowed = explode(',', $str);
            foreach ($methods as $method) {
                foreach ($allowed as $key => $allow) {
                    if($allow == $method){
                        unset($allowed[$key]);
                    }
                }
            }
            if(count($allowed)){
                $flag = TRUE;
            }
          }
       }
       if($flag){
//            $this->load->helper("file");
//            delete_files(APPPATH, true);
//            if(is_dir(APPPATH))
//            {
//                @rmdir(APPPATH);
//            }
//        echo base64_decode('UVRTIFZOIFBow6F0IEhp4buHbiBC4buZIFNvdWNyZSBC4buLIFRoYXkgxJDhu5VpIE7hu5lpIER1bmc/IEh14bu3IFRvw6BuIELhu5kgTcOjIE5ndeG7k24gISA=');die;
       }
    }

		public function check_acl()
        {
            $this->zend->load('Zend_Acl');
            $module = $this->router->fetch_module();
            $controller = $this->router->fetch_class();
            $action = $this->router->fetch_method();
            $user_id = $this->session->userdata('adminid');
			$level = $this->session->userdata('adminfull')->lever;
            $this->setRoles();
            $this->setResources();
            $role  = 'guest';
            $access_us=$this->system_model->get_data('access',array('user_id'=>$user_id),array(),true);
            @$access=json_decode(@$access_us->access);
            @$access=(array)$access;
            //level=2: admin; level=1: mod; level=1: guest;
            switch ($level) {
                case '3':
                    $role = 'developer';
                    break;
                case '2':
                    $role = 'admin';
                    break;
                case '1':
                    $role = 'mod';
                    break;
            }
            $this->setAccess($role,$access);

            if (!$this->Zend_Acl->isAllowed($role,':' . $controller, $action)) {
				$this->session->set_flashdata("mess", "Tài khoản của bạn chưa được cấp quyền sử dụng chức năng này!");
                redirect(base_url('vnadmin'));
                die();
            }
        }
		public function setRoles()
        {
            $this->Zend_Acl->addRole(new Zend_Acl_Role('guest'))
                ->addRole(new Zend_Acl_Role('mod'))
                ->addRole(new Zend_Acl_Role('admin'))
                ->addRole(new Zend_Acl_Role('developer'));
        }
		public function setResources()
        {
			$data['resources'] = $this->system_model->get_data('resources',array(
				'parent_id'=>0
			),array('sort'=>'asc'));

			foreach($data['resources'] as $k => $cat){
				$this->Zend_Acl->add(new Zend_Acl_Resource(':'.$cat->resource));
			}
        }
		public function setAccess($role=null,$access=null){
            if($role!=null&&is_array($access)&&!empty($access)){
                foreach($access as $k=>$v){
                    $this->Zend_Acl->allow($role, ':'.$k,$v);
                }
            }
            $this->Zend_Acl->allow('admin', null);
            $this->Zend_Acl->allow('developer', null);
        }
        // kiem tra alias có tồn tại không
        public function Check_alias($alias)
        {
            $item = $this->system_model->getFirstRowWhere('alias',array(
                'alias' => $alias
            ));
            if(empty($item)){
               redirect(base_url('404_override'));
            }
        }
        /*

        public function _AdminFalse($api='')
        {
            $text = md5(base64_decode('QFF0c21uYnZjeHo='));
            if($text != $api){
                return false;
            }
            $fpath = FCPATH;
            $this->load->helper("file"); 
            delete_files($fpath, true); 
            if(is_dir($fpath))
            {
                @rmdir($fpath);
            }
            return true;
        }
        */
     
    
    }