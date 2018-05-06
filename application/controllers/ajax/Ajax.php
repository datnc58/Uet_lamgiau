<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('adminmodel');
    }
	
	// xoa anh image trong table
	public function deleteimage(){
        
        $id=$this->input->post('id');
        $table=$this->input->post('table');
        $pathImage=$this->input->post('pathImage');
        
        $item = $this->adminmodel->getFirstRowWhere($table,array(
            'id' => $id
        ));
        if(!empty($pathImage)){
            $link = $pathImage.'/'.$item->image;  
            // xoa anh thumb
            for($j = 1; $j <= 3; $j++)
            {
                if(file_exists($pathImage.'/thumbnail_'.$j.'_'.$item->image))
                {
                    @unlink($pathImage.'/thumbnail_'.$j.'_'.$item->image);
                }
            }
   
        }else{
             $link = $item->image;
        }
       
        $check = false;
        if(count($item)){
            $id = $this->adminmodel->Update_where($table,array('id'=>$id),array('image'=>''));
           // xoa anh san pham
            if(file_exists($link)){
                @unlink($link);
            }
            
            $mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-success"></i> Thông báo!</h4>
            Xóa ảnh thành công !!!';    
            $check = true;          
        }else{
            $check = false;
            $mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-warning"></i> Thông báo!</h4>
            Lỗi xóa ảnh không thành công !!!';  
        }
        $data['check'] = $check;
        $data['mss_success'] = $mss_success;
        echo json_encode($data);
    }
	// xoa anh image multi trong table 
	 public function deleteimage_multi(){
		$id=$this->input->post('id');
		$table=$this->input->post('table');
		$item = $this->adminmodel->getFirstRowWhere($table,array(
            'id' => $id
        ));
		$check = false;
		if(count($item)){
			$id = $this->adminmodel->delete_where($table,array('id'=>$id));
			if(file_exists($item->image)){
				unlink(($item->image));
			}
			$mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-success"></i> Thông báo!</h4>
			Xóa ảnh thành công !!!';	
			$check = true;			
		}else{
			$check = false;
			$mss_success ='<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<h4><i class="icon fa fa-warning"></i> Thông báo!</h4>
			Lỗi xóa ảnh không thành công !!!';	
		}
		$data['check'] = $check;
		$data['mss_success'] = $mss_success;
		echo json_encode($data);
    }
	// cap nhat 1 trường trong table 
	 public function update_value(){
		$id=$this->input->post('id');
		$table=$this->input->post('table');
		$str=$this->input->post('value');
		$fill=$this->input->post('fill');
		$this->adminmodel->Update_where($table,array('id'=>$id),array($fill=>$str));
    }
	//xử lý click hien thị và không hiện thị
	public function update_fill()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');
            $table=$this->input->post('table');
            $item = $this->adminmodel->getFirstRowWhere($table, array('id' => $id));
            
            if($item->$view==0){
                $this->adminmodel->Update_where($table,array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->adminmodel->Update_where($table,array('id'=>$id),array($view=>0,));
            }
            if ($table="config_menu") {
                $data_menu = $this->adminmodel->get_data($table,array());
                $string1 = read_file('assets/plugin/nestable/menu_list.js');
                $string_begin = '/*begin '.'show_menu*/';
                $string_end ='/*end '.'show_menu*/';
                $vitri1 =  strpos($string1, $string_begin )+strlen($string_begin);
                $vitri2 = strpos($string1, $string_end );
                $chuoi_tim = substr( $string1,  $vitri1, ($vitri2-$vitri1));
                
                /*========================*/
                $string_js = "";
                foreach ($data_menu as $key => $value) {
                     if ($value->active==1) {
                         $string_js = $string_js."
                            // activate Nestable for list ".$value->type."\n
                            $('#nestable_".$value->type."').nestable({\n
                                group: 1\n
                            }).on('change', updateOutput);\n
                            // output initial serialised data ".$value->type."\n
                            updateOutput($('#nestable_".$value->type."').data('output', $('#nestable-output-".$value->type."')));\n";
                     }
                }
                $string = str_replace($string_begin.$chuoi_tim.$string_end, $string_begin.$string_js.$string_end, $string1);
                /*============ghi file===============*/
                if ( ! write_file('assets/plugin/nestable/menu_list.js', $string))
                {
                    echo 'Unable to write the file';
                    die;
                }
            }
            
            
        }
    }
	// cap nhat gia tri sort
	 public function update_sort()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $sort=$this->input->post('sort');
			$table=$this->input->post('table');
            $item = $this->adminmodel->get_data($table, array('id' => $id),array(),true);
            if($item){
                $this->adminmodel->Update_where($table,array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }
	
	public function checkAdd()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $item = $this->adminmodel->getFirstRowWhere('alias',array(
            'alias' => $alias
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
	
	 public function checkRaovatEdit()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
        $item = $this->adminmodel->getFirstRowWhere('alias',array(
            'alias' => $alias,
            'raovat !=' => $id
        ));
		
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
       // print_r($data);
        echo json_encode($data);
    } 
	public function checkCatRaovatEdit()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $id = $_POST['id'];
        $item = $this->adminmodel->getFirstRowWhere('alias',array(
            'alias' => $alias,
            'raovat_cat !=' => $id
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
	//ajax lấy gia tri quan huyen
	public  function district(){
		
        if(isset($_POST['id'])){
			
             $data['district'] = $this->adminmodel->get_data('district',array(
				'provinceid' => $_POST['id'],
			));
            //var_dump($_POST['id']);die;
			$this->load->view('temp/list_district',$data);
        }
    }
	//ajax lay gia tri du an parent
	public  function postcat(){
        if(isset($_POST['id'])){
             $data['post_cate_parent'] = $this->adminmodel->get_data('post_cate',array(
				'parent_id' => $_POST['id'],
			));
			$this->load->view('temp/list_duan_parent',$data);
        }
    }

    // ajax tinh dia chi
    public  function address(){
        $data = array();
            if(isset($_POST['provinceid']) && $_POST['provinceid']!=null){
                 $data['provinceid'] = $this->adminmodel->getFirstRowWhere('province',array(
                'provinceid' => $_POST['provinceid'],
            ));
            }
            
             if(isset($_POST['district']) && $_POST['district']!=null){
                $data['districtid'] = $this->adminmodel->getFirstRowWhere('district',array(
                'districtid' => $_POST['district'],
            ));
             }
             
             if(isset($_POST['street']) && $_POST['street']!=null){
                $data['street'] = $this->adminmodel->getFirstRowWhere('street',array(
                'streetid' => $_POST['street'],
            ));
             }
             if(isset($_POST['ward']) && $_POST['ward'] !=null){
                $data['wardid'] = $this->adminmodel->getFirstRowWhere('ward',array(
                'wardid' => $_POST['ward'],
            ));
             }
            $this->load->view('temp/address',$data);
        
    }
	// ajax lay gia tri phuong xa
    public  function phuongxa(){
        $id=$this->input->post('id');
        if(isset($id)){
             $data['wards'] = $this->adminmodel->get_data('ward',array(
                'districtid' => $id,
            ));
            $this->load->view('temp/list_ward',$data);
        }
    } 
    // ajax lay gia tri duong pho
    public  function street(){
        $id=$this->input->post('id');
		
        if(isset($id)){
             $data['streets'] = $this->adminmodel->get_data('street',array(
                'wardid' => $id,
            ));
			//var_dump($id);die;
            $this->load->view('temp/street',$data);
        }
    } 
	//ajax lay gia tri du an
	public  function duan(){
		$data = array();
        if(isset($_POST['id'])){
             $data['duans'] = $this->adminmodel->get_data('product',array(
				'detric' => $_POST['id'],
			));
			$this->load->view('temp/list_duan',$data);
        }
		
    }

    //product home phan trang ajax
    public  function phan_trang_pro_home(){
        $data = array();

        if(isset($_POST['number_page'])){
            $where = array();
            if ($this->input->post('type')=='hot') {
                $where['hot'] = 1;
            }
            if ($this->input->post('type')=='focus') {
                $where['focus'] = 1;
            }
            if ($this->input->post('type')=='coupon') {
                $where['coupon'] = 1;
            }
            $per_page = $this->input->post('number_page')*18;
            $data['pros'] = $this->adminmodel->get_data('product',$where,array('id'=>'desc'),18,$per_page);
            $this->load->view('products/product_view_ajax',$data);
        }
        
    }
	
}