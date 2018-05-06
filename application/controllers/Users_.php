<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('f_usersmodel');
        $this->load->library('pagination');
        $this->load->library('auth');
        $this->load->helper('ckeditor_helper');
        $this->load->helper('thumbnail_helper');
        $this->load->model('productmodel');
        $this->load->model('m_option');
    }

    public function checkAdd()
    {
        $data = array();
        $check = false;
        $alias = $_POST['alias'];
        $item = $this->productmodel->getFirstRowWhere('alias',array(
            'alias' => $alias
        ));
        if(empty($item)){
            $check = true;
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    public function login()
    {
        $seo = array();
        if($this->session->userdata('userid')){
            redirect(base_url());
        }

        $this->LoadHeader(null,$seo,true);
        $this->load->view('users/view_login');
        $this->LoadFooter();
    }
    public function check_login()
    {

            $username = $this->input->post('username');
            $pass = $this->input->post('pass');
            $mess = "";
            $data['login'] = false;
            $user = $this->f_usersmodel->loginUser($username, $pass);
            // echo json_encode($user);return null;
            if($username == '' || $pass == ''|| empty($user)){
                $mess = 'Tên tài khoản hoặc mật khẩu không chính xác';
                $check = false;
                $data['check'] = $check;
                sleep(2);
                $data['mess'] = $mess;
            }elseif($user->use_status==0){
                $check = false;
                $data['check'] = $check;
                sleep(2);
                $data['mess'] = 'Tài khoản của bạn chưa được kích hoạt';
                }
            else{
                $check = false;
                $data['check'] = $check;
                sleep(2);
                $data['mess'] = $_SESSION['messege'] = 'Đăng nhập thành công!';

                $this->auth->loginUser($user);
                $data['login'] = true;
                $_SESSION['ck_access']=true;
                $_SESSION['user_folder']=$user->md5_id;
                $_SESSION['mss_success']="Xin chào :<b>".$user->fullname." !</b> Bạn đã đăng nhập thành công !!!";


            }

        echo json_encode($data);
    }
    public function check_email(){
        if ($this->input->post('email')) {
            $arr=$this->f_usersmodel->getField_array('users','email');
//                print_r($arr);echo '<br>';
            $input=array('email'=>$this->input->post('email'));
            $rs['check']=true;
            $rs['mss']='';
            if(in_array($input,$arr)){
                $rs['check']=false;
                $rs['mss']='Email Ä‘Ã£ cÃ³ ngÆ°á»i sá»­ dá»¥ng';
            }
            echo json_encode($rs);
        }
    }
    //check pass
    public function check_old_pass(){
        if ($this->input->post('pass')) {

            $user=$this->f_usersmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));
            $rs['check']=false;
            $rs['mss']='Mật khẩu cũ không chính xác !!!';
            $pass=$this->input->post('pass');
            for($i=0;$i<5;$i++){
                $pass=md5($pass);
            }
            if($pass==$user->password){
                $rs['check']=true;
                $rs['mss']='';
            }

            echo json_encode($rs);
        }
    }

    public function edit($pro_id = null){
        $this->auth->checkUserLogin();
        $this->load->library('upload');
        $data = array();
        $data['description'] = array(
            'id' => 'description',
            'path' => 'assets/ckeditor',
            'config' => array(
                'toolbar' =>  array(
                    array( 'Bold', 'Italic', 'Underline', 'Strike' ,'Source')
                ),
                'width' => "100%",
                'height' => '300px',
            ));
        $data['caption_2'] = array(
            'id' => 'caption_2',
            'path' => 'assets/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "100%",
                'height' => '350px',
            ));
        $data['detail'] = array(
            'id' => 'detail',
            'path' => 'assets/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "100%",
                'height' => '350px',
            ));
        if($pro_id != null){
            $data['product'] = $temp = $this->f_usersmodel->getFirstRowWhere('product', array('id' => $pro_id));
            if(empty($data['product'])){
             redirect($_SERVER['HTTP_REFERER']);
            }
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            /*Eidit by No.Tri: 10/05/2017*/
            $name_pro = $this->input->post('name_pro');
            $alias = $this->input->post('alias');
            $price = $this->input->post('price');
            $price_sale = $this->input->post('price_sale');
            $cate_pro = $this->input->post('cate_pro');
            $decs = $this->input->post('description');
            $caption_2 = $this->input->post('caption_2');
            $detail = $this->input->post('detail');
            $arr = array(
                'name' => $name_pro,
                'alias' => $alias,
                'price' =>$price,
                'price_sale' => $price_sale,
                'category_id' => $cate_pro,
                'description' => base64_encode($decs),
                'caption_2'     => base64_encode($caption_2),
                'detail'     => base64_encode($detail),
                'active'    => 0,
                'time'=>time()
            );
            if($this->input->post('status')){
                $arr['status'] = 1;
                //die('ok');
            }else{
                $arr['status'] = 0;
            }

            $this->f_usersmodel->Update_where('product', array('id' => $pro_id), $arr);
            $this->f_usersmodel->Update_where('alias', array('pro' => $pro_id), array('alias' =>$alias));


            if($temp->category_id !== $cate_pro ){
                // gắn lại link to product khi đổi catalog
                // soá toàn bô link
                $this->productmodel->Delete_where('product_to_category', array('id_product' => $temp->id));
                // thêm link
                $this->productmodel->Add('product_to_category', array('id_product' =>$pro_id,'id_category'=>$cate_pro));

            }

            if(isset($_POST['comment']) && $_POST['comment'] != ''){
                $commet = checkInput($_POST['comment']);
                $op_id = $_POST['group'];
                if(empty($_POST['to_ids'])){
                    $to_ids = $this->productmodel->Add('product_to_option', array('product_id' => $pro_id, 'option_id' => $op_id));
                    $ca = array(
                        'option_id' => $op_id,
                        'product_id'     => $pro_id,
                        'to_ids' => checkInput($to_ids),
                        'comment' => $commet,
                        'required' => 1
                    );
                    $this->productmodel->Add('oc_option_value', $ca);
                }else{
                    $to_ids = $_POST['to_ids'];
                    $this->productmodel->Delete_where('oc_option_value', array('to_ids' => $to_ids));
                    $ca = array(
                        'option_id' => $op_id,
                        'product_id'     => $pro_id,
                        'to_ids' => checkInput($to_ids),
                        'comment' => $commet,
                        'required' => 1
                    );
                    $this->productmodel->Add('oc_option_value', $ca);
                }
            }
                #achor1
            if(isset($_POST['option_value']) && sizeof($_POST['option_value']) > 0){
                //echo "<pre>";print_r($_POST);die();
                $opt = $_POST['option_value'];
                $quantity = $_POST['quantity'];
                $suptra = $_POST['product_option'];
                $op_id = $_POST['group'];
                $add_price = $_POST['add_price'];
                $price_op = $_POST['price_op'];
                // $add_points = $_POST['add_points'];
                // $points = $_POST['points'];
                // $add_weight = $_POST['add_weight'];
                // $weight = $_POST['weight'];
                //  pre($_POST['to_ids']);

                if(empty($_POST['to_ids'])){
                    $to_ids = $this->productmodel->Add('product_to_option', array('product_id' => $pro_id, 'option_id' => $op_id));
                    for ($i = 0; $i < sizeof($opt); $i++) {
                        // $ca = array(
                        //     'description_id' => checkInput($opt[$i]),
                        //     'option_id'      => checkInput($op_id),
                        //     'product_id'     => $pro_id,
                        //     'to_ids' => checkInput($to_ids),
                        //     'quantity' => checkInput($quantity[$i]),
                        //     'subtract' => checkInput($suptra[$i]),
                        //     'method_price' => checkInput($add_price[$i]),
                        //     'price' => checkInput($price_op[$i]),
                        //     'method_point' => checkInput($add_points[$i]),
                        //     'point' => checkInput($points[$i]),
                        //     'method_weight' => checkInput($add_weight[$i]),
                        //     'weight' => checkInput($weight[$i]),
                        //     'required' => 1
                        // );

                        $ca = array(
                            'description_id' => checkInput($opt[$i]),
                            'option_id'      => checkInput($op_id),
                            'product_id'     => $pro_id,
                            'to_ids' => checkInput($to_ids),
                            'quantity' => checkInput($quantity[$i])?checkInput($quantity[$i]):1,
                            'subtract' => checkInput($suptra[$i]),
                            'method_price' => checkInput($add_price[$i]),
                            'price' => checkInput($price_op[$i]),
                            'required' => 1,
                        );
                        $this->productmodel->Add('oc_option_value', $ca);
                    }
                }else{

                    $to_ids = (int) $_POST['to_ids'];
                    $this->productmodel->Delete_where('oc_option_value', array('to_ids' => $to_ids));
                    for ($i = 0; $i < sizeof($opt); $i++) {
                        // $ca = array(
                        //     'description_id' => checkInput($opt[$i]),
                        //     'option_id'      => checkInput($op_id),
                        //     'product_id'     => $pro_id,
                        //     'to_ids' => checkInput($to_ids),
                        //     'quantity' => checkInput($quantity[$i]),
                        //     'subtract' => checkInput($suptra[$i]),
                        //     'method_price' => checkInput($add_price[$i]),
                        //     'price' => checkInput($price_op[$i]),
                        //     'method_point' => checkInput($add_points[$i]),
                        //     'point' => checkInput($points[$i]),
                        //     'method_weight' => checkInput($add_weight[$i]),
                        //     'weight' => checkInput($weight[$i]),
                        //     'required' => 1
                        // );

                        $ca = array(
                            'description_id' => checkInput($opt[$i]),
                            'option_id'      => checkInput($op_id),
                            'product_id'     => $pro_id,
                            'to_ids' => checkInput($to_ids),
                            'quantity' => checkInput($quantity[$i])?checkInput($quantity[$i]):1,
                            'subtract' => checkInput($suptra[$i]),
                            'method_price' => checkInput($add_price[$i]),
                            'price' => checkInput($price_op[$i]),
                            'required' => 1,
                        );
                        $this->productmodel->Add('oc_option_value', $ca);
                    }
                }
                /*$to_ids = $_POST['to_ids'];
                pre($to_ids);*/
            }
            #BEGIN: Upload image
            $pathImage = "upload/img/products/";
            #Create folder
            if(empty($temp->pro_dir)){
                $dir_image = date('dmY');
            }else{
                $dir_image = $temp->pro_dir;
            }
            if(!is_dir($pathImage.$dir_image))
            {
                @mkdir($pathImage.$dir_image);
                $this->load->helper('file');
                @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
            }
            //$dir_image = $data['edit']->pro_dir;
            if($dir_image == 'default')
            {
                $dir_image = date('dmY');
            }
            $image = @$data['edit']->image;
            if(!is_dir($pathImage.$dir_image))
            {
                @mkdir($pathImage.$dir_image);
                $this->load->helper('file');
                @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
            }
            $config['upload_path'] = $pathImage.$dir_image.'/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF|pdf|docx';
            $config['max_size'] = '*';
            $config['max_width'] = '9000';
            $config['max_height'] = '9000';
            $config['encrypt_name'] = true;
            $this->upload->initialize($config);
            $imageArray = '';

            if($this->upload->do_upload('userfile'))
            {
                $uploadData = $this->upload->data();
                if($uploadData['is_image'] == TRUE)
                {
                    $imageArray = $uploadData['file_name'];
                }
                elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                {
                    @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                }
                unset($uploadData);
            }
            //echo "<pre>";var_dump($imageArray);die();
            if($imageArray !='')
            {
                if(file_exists($pathImage.$dir_image.'/'.$image))
                {
                    @unlink($pathImage.$dir_image.'/'.$image);
                }
                for($j = 1; $j <= 3; $j++)
                {
                    if(file_exists($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image))
                    {
                        @unlink($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image);
                    }
                }
                $this->load->library('image_lib');
                if(file_exists($pathImage.$dir_image.'/'.$imageArray))
                {
                    $wm_font_size = 35;
                    $link = $pathImage.$dir_image.'/'.$imageArray;
                    $this->load->helper('email_helper');

                    $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                    for($j = 1; $j <= 3; $j++)
                    {
                        switch($j)
                        {
                            case 1:
                                $maxWidth = 300;#px
                                $maxHeight = 300;#px
                                break;
                            case 3:
                                $maxWidth = 63;#px
                                $maxHeight = 63;#px
                                $wm_font_size = 9;
                                break;
                            default:
                                $maxWidth = 600;#px
                                $maxHeight = 600;#px
                        }
                        $sizeImage = size_thumbnail($pathImage.$dir_image.'/'.$imageArray, $maxWidth, $maxHeight);
                        $configImage['source_image'] = $pathImage.$dir_image.'/'.$imageArray;
                        $configImage['new_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$imageArray;
                        $configImage['maintain_ratio'] = TRUE;
                        $configImage['width'] = $sizeImage['width'];
                        $configImage['height'] = $sizeImage['height'];
                        $this->image_lib->initialize($configImage);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                        //watwer mark thumb
                        /*$config_watermark['source_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$imageArray;
                        $config_watermark['wm_text'] = 'Aalo.vn';
                        $config_watermark['wm_type'] = 'text';
                        $config_watermark['wm_font_color'] = 'ed1c24';
                        $config_watermark['wm_font_path'] = './system/fonts/texb.ttf';
                        $config_watermark['wm_font_size'] = $wm_font_size;
                        $config_watermark['wm_padding'] = '10';
                        $config_watermark['wm_opacity'] = '100';
                        $config_watermark['wm_vrt_alignment'] = 'left';
                        $config_watermark['wm_hor_alignment'] = 'top';
                        $this->image_lib->initialize($config_watermark);
                        $this->image_lib->watermark();*/
                    }
                }
                #END Create thumbnail

            }
            if($imageArray == 'none.gif')
            {
                #Remove dir
                $this->load->library('file');
                if(trim($dir_image) != '' && trim($dir_image) != 'default' && is_dir('upload/img/product/'.$dir_image) && count($this->file->load('upload/img/product/'.$dir_image,'index.html')) == 0)
                {
                    if(file_exists('upload/img/product/'.$dir_image.'/index.html'))
                    {
                        @unlink('upload/img/product/'.$dir_image.'/index.html');
                    }
                    @rmdir('upload/img/product/'.$dir_image);
                }
                $dir_image = 'default';
            }
            if($imageArray !='')
            {
                $this->productmodel->Update('product', $pro_id ,array(
                    'image' => $imageArray,
                    'pro_dir' => $dir_image
                ));
            }

            //upload multi images
            $config2['upload_path'] = './upload/img/products/';
            $config2['allowed_types'] = 'gif|jpg|png';
            $config2['max_size'] = '*';
            $config2['max_width'] = '9000';
            $config2['max_height'] = '9000';
            $config2['encrypt_name'] = true;
            $this->upload->initialize($config2);
            if(!empty($_FILES['images'])){
                $name_array = array();
                $count = count(@$_FILES['images']['size']);
                foreach ($_FILES as $key => $value) {
                    for ($s = 0; $s <= $count - 1; $s++) {
                        if($s==5) break;
                        $_FILES['images']['name'] = @$value['name'][$s];
                        $_FILES['images']['type'] = @$value['type'][$s];
                        $_FILES['images']['tmp_name'] = @$value['tmp_name'][$s];
                        $_FILES['images']['error'] = @$value['error'][$s];
                        $_FILES['images']['size'] = @$value['size'][$s];

                        if($this->upload->do_upload('images')){
                            $fileData = $this->upload->data();
                            $uploadData[$i]['file_name'] = $fileData['file_name'];
                            $link = 'upload/img/products/' . $fileData['file_name'];
                            $id_i = $this->productmodel->Add('p_images',array(
                                'link' => $link,
                                'id_item' => $pro_id,
                            ));
                            //watermark
                            $this->load->helper('email_helper');
                            $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                        }

                    }
                }
            }

            $this->session->set_flashdata('sussec', 'Cập nhật thành công!');
            redirect(base_url('danh-sach-san-pham'));
        }
        $data['check_opt'] = $ck = $this->f_usersmodel->getFirstRowWhere('product_to_option', array('product_id'=>$pro_id));
        if(count($ck)!=0){
            $data['value'] = $this->f_usersmodel->getValueById($ck->id);
        }else{
            $data['value'] = array();
        }

        $data['list_opt'] = $this->f_usersmodel->getAllOptByPro($pro_id);
        //pre($data['list_opt']);
        foreach($data['list_opt'] as $k => $v){
            $data['list_opt'][$k]->opt = $this->f_usersmodel->getFirstRowWhere('oc_option', array('option_id' => $v->option_id));
        }

        //pre($data['list_opt']);
        $data['options'] = $this->f_usersmodel->get_data('oc_option', array(), null);
        $data['cate_pro'] = $this->f_usersmodel->get_data('product_category', array(), array('sort' => ''), null);
        $seo = "Chỉnh sửa sản phẩm";
        #achor4 edit product
        // echo "<select>";
        // view_product_cate_select($data['cate_pro'],0,'',$data['product']->category_id);
        // echo "</select>";die();
        $data['images'] = $this->f_usersmodel->getFields('p_images','id,link',array(
            'id_item' => $pro_id
        ));

        $this->LoadHeader(null,$seo, true);
        $this->load->view('users/edit_product',$data);
        $this->LoadFooter();
    }

    public function add_product()
    {
        $this->auth->checkUserLogin();
        $data = array();
        // mô tả
        $data['description'] = array(
            'id' => 'description',
            'path' => 'assets/ckeditor',
            'config' => array(
                'toolbar' =>  array(
                    array( 'Bold', 'Italic', 'Underline', 'Strike' ,'Source')
                ),
                'width' => "100%",
                'height' => '300px',
            ));
        // thông tin kỹ thuật
        $data['caption_2'] = array(
            'id' => 'caption_2',
            'path' => 'assets/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "100%",
                'height' => '300px',
            ));
        // chi tiết
        $data['detail'] = array(
            'id' => 'detail',
            'path' => 'assets/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "100%",
                'height' => '300px',
            ));
        $data['cate_pro'] = $this->f_usersmodel->get_data('product_category', array(), array('sort' => ''), null);

        //echo "<pre>";print_r($data['cate_pro'][0]);die();
        #achor1 addproduct
        if(isset($_POST['addnews'])){
            //echo "<pre>";var_dump($_POST);die();
            $price       = str_replace(array(';','.',',',' '),'',$this->input->post('price'));
            $price_sale      = str_replace(array(';','.',',',' '),'',$this->input->post('price_sale'));
            $alias = make_alias($this->input->post('alias'));
            $user_id = $this->session->userdata('userid');

            $pro = array(
                'name'            => $this->input->post('name_pro'),
                'alias'           => $alias,
                'price'           => $price,
                'price_sale'      => $price_sale,
                'category_id'     => $this->input->post('cate_pro'),
                'description'     => base64_encode($this->input->post('description')),
                'caption_2'         => base64_encode($this->input->post('caption_2')),
                'detail'            => base64_encode($this->input->post('detail')),
                'active'            => 0,
                'user_id'    => $user_id,
                'time'=>time()
            );
            if($this->input->post('status')){
                $pro['status'] = 1;
            }else{
                $pro['status'] = 0;
            }
            // thêm catelog product ID
            if(isset($_POST['subcate'])){
                $pro['category_id'] = $this->input->post('subcate');
            }
            if(isset($_POST['subcate2'])){
                $pro['category_id'] = $this->input->post('subcate2');
            }

            //var_dump($pro);die('xxx');
            $id = $this->f_usersmodel->Add('product', $pro);
            $this->f_usersmodel->Add('alias', array(
                'type' => 'pro',
                'alias' => $alias,
                'pro' => $id
            ));
            // cập nhật link
            $cate1 = $this->input->post('cate_pro');
            $cate2 = $this->input->post('subcate');
            $cate3 = $this->input->post('subcate2');
            if(!empty($cate1)){
                $this->productmodel->Add('product_to_category', array('id_product' => $id, 'id_category' => $cate1));
            }
            if(!empty($cate2)){
                $this->productmodel->Add('product_to_category', array('id_product' => $id, 'id_category' => $cate2));
            }
            if(!empty($cate3)){
                $this->productmodel->Add('product_to_category', array('id_product' => $id, 'id_category' => $cate3));
            }

            //upload images
            $this->load->library('upload');
            $pathImage = "upload/img/products/";
            $dir_image = date('dmY');
            if(!is_dir($pathImage.$dir_image))
            {
                @mkdir($pathImage.$dir_image);
                $this->load->helper('file');
                @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
            }
            $config['upload_path'] = $pathImage.$dir_image.'/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
            $config['max_size'] = '*';
            $config['max_width'] = '19000';
            $config['max_height'] = '15000';
            $config['encrypt_name'] = true;
            $this->upload->initialize($config);
            $image = '';
            if($this->upload->do_upload('userfile'))
            {
                $uploadData = $this->upload->data();
                if($uploadData['is_image'] == TRUE)
                {
                    $image = $uploadData['file_name'];
                }
                elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                {
                    @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                }
                unset($uploadData);
            }
            if($image !='')
            {
                #BEGIN: Create thumbnail

                $wm_font_size = 28;
                if(file_exists($pathImage.$dir_image.'/'.$image))
                {
                    $link = $pathImage.$dir_image.'/'.$image;
                    // water mark
                    $this->load->helper('email_helper');
                    $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                    if(!$mt){
                        show_404('lỗi upload ảnh');
                    }
                    for($j = 1; $j <= 3; $j++)
                    {
                        switch($j)
                        {
                            case 1:
                                $maxWidth = 300;#px
                                $maxHeight = 300;#px
                                $wm_font_size = 28;
                                break;
                            case 3:
                                $maxWidth = 63;#px
                                $maxHeight = 63;#px
                                $wm_font_size = 9;
                                break;
                            default:
                                $maxWidth = 600;#px
                                $maxHeight = 600;#px
                        }
                        $sizeImage = size_thumbnail($pathImage.$dir_image.'/'.$image, $maxWidth, $maxHeight);
                        $configImage['source_image'] = $pathImage.$dir_image.'/'.$image;
                        $configImage['new_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image;
                        $configImage['maintain_ratio'] = TRUE;
                        $configImage['width'] = $sizeImage['width'];
                        $configImage['height'] = $sizeImage['height'];
                        $this->image_lib->initialize($configImage);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                }
                #END Create thumbnail
                //watermark


            }
            if(@$image == 'none.gif')
            {
                #Remove dir
                $this->load->library('file');
                if(trim($dir_image) != '' && trim($dir_image) != 'default' && is_dir('upload/img/product/'.$dir_image) && count($this->file->load('upload/img/product/'.$dir_image,'index.html')) == 0)
                {
                    if(file_exists('upload/img/product/'.$dir_image.'/index.html'))
                    {
                        @unlink('upload/img/product/'.$dir_image.'/index.html');
                    }
                    @rmdir('upload/img/product/'.$dir_image);
                }
                $dir_image = 'default';
            }
            $this->f_usersmodel->Update('product', $id, array(
                'image' => @$image,
                'pro_dir' => $dir_image,
            ));
            /*Eidit by No.Tri: 10/05/2017*/
            if(isset($_POST['comment']) && $_POST['comment'] != ''){
                $commet = checkInput($_POST['comment']);
                $op_id = $_POST['group'];
                $required = $_POST['required_op'];
                $to_ids = $this->productmodel->Add('product_to_option', array('product_id' => $id, 'option_id' => $op_id));
                $ca = array(
                    'option_id' => $op_id,
                    'product_id'     => $id,
                    'to_ids' => checkInput($to_ids),
                    'comment' => $commet,
                    'required' => $required
                );
                $this->productmodel->Add('oc_option_value', $ca);
            }
            #achor2 add new product option
            if(isset($_POST['option_value']) && sizeof($_POST['option_value']) > 0){
                $opt = $_POST['option_value'];
                $quantity = $_POST['quantity'];
                $suptra = $_POST['product_option'];
                $op_id = $_POST['group'];
                $add_price = $_POST['add_price'];
                $price_op = $_POST['price_op'];
                /*$add_points = $_POST['add_points'];
                $points = $_POST['points'];
                $add_weight = $_POST['add_weight'];
                $weight = $_POST['weight'];*/
                $required = 1;
                $to_ids = $this->productmodel->Add('product_to_option', array('product_id' => $id, 'option_id' => $op_id));
                for ($i = 0; $i < sizeof($opt); $i++) {
                    $ca = array(
                        'description_id' => checkInput($opt[$i]),
                        'option_id'      => checkInput($op_id),
                        'product_id'     => $id,
                        'to_ids' => checkInput($to_ids),
                        'quantity' => checkInput($quantity[$i])?checkInput($quantity[$i]):1,
                        'subtract' => checkInput($suptra[$i]),
                        'method_price' => checkInput($add_price[$i]),
                        'price' => checkInput($price_op[$i]),
                        'required' => $required
                    );
                    $this->productmodel->Add('oc_option_value', $ca);
                }

                /*$to_ids = $_POST['to_ids'];
                pre($to_ids);*/
            }
            //upload multi images
            $config2['upload_path'] = './upload/img/products/';
            $config2['allowed_types'] = 'gif|jpg|png';
            $config2['max_size'] = '*';
            $config2['max_width'] = '13000';
            $config2['max_height'] = '13000';
            $config2['encrypt_name'] = true;
            $this->upload->initialize($config2);
            if(!empty($_FILES['images'])){
                $name_array = array();
                #achoruploadadd
                $count = count(@$_FILES['images']['size']);
                foreach ($_FILES as $key => $value) {
                    //for ($s = 0; $s <= $count - 1; $s++) {
                    // chỉ lấy 5 ảnh đầu tiên

                    for ($s = 0; $s <= $count -1; $s++) {
                        if($s==5) break;
                        $_FILES['images']['name'] = $value['name'][$s];
                        $_FILES['images']['type'] = $value['type'][$s];
                        $_FILES['images']['tmp_name'] = $value['tmp_name'][$s];
                        $_FILES['images']['error'] = $value['error'][$s];
                        $_FILES['images']['size'] = $value['size'][$s];

                        if($this->upload->do_upload('images')){
                            $fileData = $this->upload->data();
                            $uploadData[$i]['file_name'] = $fileData['file_name'];
                            $link = 'upload/img/products/' . $fileData['file_name'];
                            $id_i = $this->productmodel->Add('p_images',array(
                                'link' => $link,
                                'id_item' => $id,
                            ));
                            //watermark
                            $this->load->helper('email_helper');
                            $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                        }


                        /*$data = $this->upload->data();
                        $name_array[] = $data['file_name'];
                        if ($data['file_name'] != null) {
                            $link = 'upload/img/products/' . $data['file_name'];
                            $id_i = $this->productmodel->Add('p_images',array(
                                'link' => $link,
                                'id_item' => $id,
                            ));

                        }*/
                    }
                }
            }

            $this->session->set_flashdata("sessecfull", "Thêm mới thành công!");

            redirect(base_url('danh-sach-san-pham'));
            //echo "<pre>";print_r($pro);die;
        }

        $data['title'] = "thêm sản Phẩm Mới";
        $data['options'] = $this->f_usersmodel->get_data('oc_option', array(), null);
        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader(null,$seo, true);
        $this->load->view('users/add_product',$data);
        $this->LoadFooter();
    }

    public function ajaxcate()
    {
        # AJAX get SubCatelog  #achor3

       if (isset($_POST['cate_id'])) {
        $id = intval($_POST['cate_id']);
        $data['item'] = $this->f_usersmodel->get_data('product_category', array('parent_id'=>$id), array('sort' => ''), null);
            if(!empty($data['item'])){
                $data['stat'] = true;
                echo json_encode($data);

            }else{
                echo json_encode(array('stat' => false));
            }
       }else{
        echo json_encode(array('stat' => false));
       }

    }
    // Ajax Get List quận/huyên
    function ajaxGetDistric (){
        if(isset($_POST['province'])){
            $id = intval($this->input->post('province'));
             $data = $this->f_usersmodel->get_data('district', array('provinceid'=>$id), array('districtid' => 'asc'), null);
             echo json_encode($data);
        }
    }
    // Ajax Get list Xã/ Thị Trấn
    function ajaxGetWard (){
        if(isset($_POST['district'])){
            $id = intval($this->input->post('district'));
             $data = $this->f_usersmodel->get_data('ward', array('districtid'=>$id), array('wardid' => 'asc'), null);
             echo json_encode($data);
        }
    }

    public function acount()
    {
        $this->auth->checkUserLogin();
        $id = $this->session->userdata('userid');
        $config['upload_path'] = './upload/img/avatar/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $data['user_item'] = $this->f_usersmodel->getItemByID('users',$id);
        if (isset($_POST['update_profiler'])) {

            $arr = array(
                'fullname' => $this->input->post('fullname'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'province' => $this->input->post('province'),
                'district' => $this->input->post('district'),
                'ward' => $this->input->post('ward')
            );
            $this->f_usersmodel->Update('users',$id,$arr);
            /*if($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/avatar/' . $upload['upload_data']['file_name'];
                    $this->f_usersmodel->Update('users', $id, array('avatar' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->avatar)){
                        unlink($data['edit']->avatar);
                        $temp_thumb = explode('/',$data['edit']->avatar);
                        $link_thumb = 'upload/img/avatar/thumbs/'.$temp_thumb[3];
                        @unlink($link_thumb);

                    }
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $this->upload->upload_path.$this->upload->file_name;
                    $config2['new_image'] = './upload/img/avatar/thumbs';
                    $config2['width'] = 70;
                    $config2['height'] = 70;
                    $this->load->library('image_lib',$config2);
                    if ( !$this->image_lib->resize()){
                        $data['error'] = $this->image_lib->display_errors('', '');
                    }
                }
            }*/
            $_SESSION['mss_success']='Cập nhật thông tin thành công!';
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['province'] = $this->f_homemodel->get_data('province');
        $data['banners'] = $this->f_usersmodel->get_data('images',array(
            'type' => 'page'
        ),array('sort' => 'asc'));
        $seo = array(
            'title' => 'Thông tin tài khoản'
        );
        $this->LoadHeader(null,$seo);
        $this->load->view('users/acount',$data);
        $this->LoadFooter();

    }

    public function acount_order()
    {
        $this->auth->checkUserLogin();
        $uId = $this->session->userdata('userid');
        $config['page_query_string'] = TRUE;
        $config['enable_query_string'] = TRUE;
        $config['base_url'] = base_url('acount-order?');
        $config['total_rows'] = $this->f_usersmodel->coutnUserOrder($uId); // xác định tổng số record
        $config['per_page'] = 9; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data = array();

        $data['item_list'] = $this->f_usersmodel->Getlist_oder($uId,$config['per_page'], $this->input->get('per_page'));
        //echo "<pre>";print_r($data['item_list']); die();
        $order_id=array();
        foreach($data['item_list'] as $v){
            $order_id[]=$v->id;
        }
        if(empty($data['item_list'])){
            $data['detail']=array();
        }else{
            $data['detail'] = $this->f_usersmodel->order_detail($order_id);
        }
        $data['banners'] = $this->f_usersmodel->get_data('images',array(
            'type' => 'page'
        ),array('sort' => 'asc'));
        $seo = array(
            'title' => 'Quản lý đơn hàng'
        );
        $this->LoadHeader(null,$seo);
        $this->load->view('users/acount_order',$data);
        $this->LoadFooter();

    }

    public function signin(){
        $result = array();
        $result['login'] = false;
        $result['message'] = '';
        if ($this->input->post('user')) {
            $username = $this->input->post('user');
            $pass = $this->input->post('pass');
            if ($pass == 0) $result['message'] = 'Vui lòng nhập mật khẩu';

            $user = $this->f_usersmodel->loginUser($username, $pass);

//                print_r($user); die();
            if (isset($user->id)) {
                if($user->active==0){
                    $result['message'] = 'Tài khoản của bạn chưa được kích hoạt';
                }elseif($user->active==1&&$user->block==1){
                    $result['message'] = 'Tài khoản của bạn đang bị khóa';
                }else{
                    $this->auth->loginUser($user);
                    $result['login'] = true;
                    $_SESSION['ck_access']=true;
                    $_SESSION['user_folder']=$user->md5_id;
                    $_SESSION['mss_success']="Xin chào :<b>".$user->fullname." !</b> Bạn đã đăng nhập thành công !!!";
                    //redirect($_SERVER['HTTP_REFERER']);
                }

            } else {
                $result['message'] = 'Sai email hoặc mật khẩu!';
            }

        } else $result['message'] = 'Vui lòng nhập mail và mật khẩu!';
        echo json_encode($result);
        die();
    }
    public function logout()
    {

    }
    public function register(){

        $data=array();
        $seo = array('title' => 'Đăng ký thành viên');
        $this->LoadHeader(null,$seo,true);
        $this->load->view('users/view_register',$data);
        $this->LoadFooter();
    }
    public function notify()
    {
        $seo = array();
        $this->LoadHeader(null,$seo,true);
        $this->load->view('users/view_notify');
        $this->LoadFooter();
    }
    public function check_capcha(){
        $capcha=$this->input->post('capcha');
        $challenge=$this->input->post('challenge');
        $this->load->library('recaptcha');
        $this->recaptcha->recaptcha_check_answer(null,$challenge,$capcha);
    }

    public function signup()
    {
        if ($this->input->post()&&$this->input->post('status_check')=='1') {

            $arr=$this->f_usersmodel->getField_array('users','phone');
            $input=array('phone'=>$this->input->post('phone'));

            $rs['check']=true;

            if(in_array($input,$arr)){
                $rs['check']=false;
                $rs['mss']='Email đã có người sử dụng';
            }

            //======
            if ($rs['check'] == true) {

                $password = $this->input->post('pass');
                for ($i = 0; $i < 5; $i++) {
                    $password = md5($password);
                }
                $arr = array(
                    'fullname'    => $this->input->post('fullname'),
                    'email'       => $this->input->post('email'),
                    'username'    => trim($this->input->post('username')),
                    'password'    => $password,
                    /*'province'    => $this->input->post('location'),*/
                    'use_status'      => 0,
                    'deleted'     => 0,
                    'block'       => 0,
                    'use_regisdate' => time(),
                    'phone' => $this->input->post('phone',TRUE),
                    'md5_id'      => md5('md5_id'),
                    'smskey'        => uniqid(),
                );
                $id  = $this->f_usersmodel->Add('users', $arr);
                $this->f_usersmodel->Update_Where('users', array('id' => $id),
                    array('md5_id' => md5($id), 'token' => md5($this->input->post('email') . $id),));

            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
            if (isset($id)) {
                // tạo thành công gửi mail #achorSMS
                $smscontent = "Mã Kích Hoạt SMS : ".$arr['smskey'];

                $this->load->helper('email_helper');
                $sms = sms_send($arr['phone'],$smscontent);
                // lưu giữ liệu vào bẳng

                if($sms['result'] == 100){
                    // SMS ok Save
                    $sms['userid'] = $id;
                    $this->f_usersmodel->add('user_sms',$sms);
                }else{
                    // gui sms that bai
                    $sms['userid'] = $id;
                    $this->f_usersmodel->add('user_sms',$sms);
                }

                $config = Array(
                    'protocol'  => 'smtp',
                    'smtp_host' => $this->config->item('smtp_hostssl'),
                    'smtp_port' => $this->config->item('smtp_portssl'),
                    'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                    'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                    'mailtype'  => 'html',
                    'charset'   => 'utf-8',
                    'wordwrap'  => TRUE
                );
                /*mmucvfwcdywnohvk*/

                $this->load->library('email', $config);

                $user=$this->f_usersmodel->getFirstRowWhere('users',array('id'=>$id));
                //echo "<pre>";print_r($user);die();
                $subject = $this->site_name.' - Kích hoạt tài khoản';
                $message = '
                    <p>Nhấn vào link dưới đây để kích hoạt tài khoản:</p>
                    <a href="'.base_url('kich-hoat?id='.$user->md5_id.'&token='.$user->token).'">
                    '.base_url('kick-hoat?id='.$user->md5_id.'&token='.$user->token).'</a>';

                // Get full html:
                $body =
                    '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                        <style type="text/css">
                            body {
                                font-family: Arial, Verdana, Helvetica, sans-serif;
                                font-size: 16px;
                            }
                        </style>
                    </head>
                    <body>
                    ' . $message . '
                    </body>
                    </html>';


                $this->email->set_newline("\r\n");
                $this->email->from($this->input->post('email')); // change it to yours
                $this->email->to($this->input->post('email')); // change it to yours
                $this->email->subject($subject);
                $this->email->message($message);
                // gửi SMS

                if ($this->email->send()) {
                    redirect(base_url('dang-ky-thanh-cong?u='.$user->md5_id));
                } else {
                    redirect(base_url('dang-ky-thanh-cong'));
                }
                /*$headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <hokien1992@gmail.com>' . "\r\n";
                if(mail($this->input->post('email'), "$subject", $body,$headers))
                {
                    redirect(base_url('dang-ky-thanh-cong?u='.$user->md5_id));
                }else{
                    redirect(base_url('dang-ky-thanh-cong'));
                }*/
            }

        }
    }
    public function success_signup(){
        if(isset($_GET['u'])){
            $data['u']=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$_GET['u']));
            if(empty($data['u'])){
                // không tìm thấy tài khoản
                redirect(base_url('dang-ky-thanh-cong'));
            }
        }
        if(isset($_GET['reset'])){
            $data['u2']=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$_GET['reset']));
            if(empty($data['u2'])){
                // không tìm thấy tài khoản
                redirect(base_url('dang-ky-thanh-cong'));
            }
        }
        $data['banners'] = $this->f_usersmodel->get_data('images',array(
            'type' => 'page'
        ),array('sort' => 'asc'));
        $seo = array(
            'title' => 'Đăng ký thành công'
        );

        $this->LoadHeader(null,$seo);
        $this->load->view('users/success_signup',$data);
        $this->LoadFooter();
    }

    public function change_pass(){
        $data = array();
        $this->auth->checkUserLogin();

        $seo = array(
            'title' => 'Đổi mật khẩu'
        );
        $this->LoadHeader(null,$seo);
        $this->load->view('users/view_change_pass',$data);
        $this->LoadFooter();
    }
    public function forgot_pass()
    {
        $data = array();
        if (isset($_POST['email'])) {

            $email=$this->input->post('email');
            $pass= uniqid('@new');
            $new_pass=$pass;
            for($i=0;$i<5;$i++){
                $new_pass=md5($new_pass);
            }
            $user=$this->f_usersmodel->getFirstRowWhere('users',array('email'=>$email));
            $this->f_usersmodel->Update_where('users',array('email'=>$email),array('password'=>$new_pass));

            //======
            $config = Array(
                'protocol'  => 'smtp',
                'smtp_host' => $this->config->item('smtp_hostssl'),
                'smtp_port' => $this->config->item('smtp_portssl'),
                'smtp_user' => $this->config->item('smtp_user'), // change it to yours
                'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'wordwrap'  => TRUE
            );

            $this->load->library('email', $config);

            $subject = ' - Kích hoạt tài khoản';
            $message = '
                    <p>Mạt khẩu mới của bạn là: </p>'.$pass.'
                    <p>Vui lòng đăng nhập và đổi lại mật khẩu!</p>
                    ';

            // Get full html:
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                    <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                        <style type="text/css">
                            body {
                                font-family: Arial, Verdana, Helvetica, sans-serif;
                                font-size: 16px;
                            }
                        </style>
                    </head>
                    <body>
                    ' . $message . '
                    </body>
                    </html>';


            $this->email->set_newline("\r\n");
            $this->email->from($this->input->post('email')); // change it to yours
            $this->email->to($this->input->post('email')); // change it to yours
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send()) {
//                        echo 'Email sent.';
                redirect(base_url('cap-lai-mat-khau?reset=1&u='.$user->md5_id));
            } else {

                redirect(base_url('cap-lai-mat-khau'));
//                        show_error($this->email->print_debugger());
            }
        }
        if(isset($_GET['u'])){
            $data['u2']=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$_GET['u']));
        }
        //$data['menu_right'] = $this->f_usersmodel->getMenuRightRoot();
        $seo = array('title' => 'Đăng ký thành công');
        $this->LoadHeader(null,$seo);
        $this->load->view('users/view_forgot_pass',$data);
        $this->LoadFooter();
    }

    public function list_pro()
    {

        $data = array();
        $this->auth->checkUserLogin();
        $uId = $this->session->userdata('userid');
        $config['base_url'] = base_url('users/list_pro/');
        $config['total_rows'] = $this->f_usersmodel->countUserListPro($uId); // xác định tổng số record
        $config['per_page'] = 9; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $data['prolist'] = $this->f_usersmodel->getItemList($uId,$config['per_page'], $this->uri->segment(3));

        foreach($data['prolist'] as $k => $v){
            $data['prolist'][$k]->cat_name = $this->f_usersmodel->GetCatePro($v->category_id);
        }
        $seo = array(
            'title' => 'Danh sách sản phẩm'
        );
        //echo "<pre>";var_dump($this->f_usersmodel->countUserListPro($uId));die();
        $this->LoadHeader(null,$seo, true);
        $this->load->view('users/list_pro',$data);
        $this->LoadFooter();
    }
    public function delete($id)
    {
        $this->auth->checkUserLogin();
        if (is_numeric($id)) {
            $item=$this->productmodel->getFirstRowWhere('product',array('id'=>$id));

            $pathImage = "upload/img/products/";
            $dir_image = $item->pro_dir;
            /*if(isset($item->image)&&file_exists($item->image)) {unlink($item->image);}*/
            if(file_exists($pathImage.$dir_image.'/'.$item->image))
            {
                @unlink($pathImage.$dir_image.'/'.$item->image);
            }
            for($j = 1; $j <= 3; $j++)
            {
                if(file_exists($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$item->image))
                {
                    @unlink($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$item->image);
                }
            }
            $this->productmodel->Delete('product', $id);

            $item_alias =$this->productmodel->getFirstRowWhere('alias',array('pro'=>$id));
            if(!empty($item_alias)){
                $this->productmodel->Delete_where('alias',array('pro' => $id));
            }
            //delete more image
            $m_images = $this->productmodel->getFields('p_images','id,link',array(
                'id_item' => $id
            ));
            foreach($m_images as $image){
                @unlink($image->link);
                $this->productmodel->Delete('p_images', $image->id);
            }

            $this->productmodel->Delete_where('product_to_category',array('id_product'=>$id));
            $this->productmodel->Delete_where('pro_values',array('pro_id'=>$id));
            redirect($_SERVER['HTTP_REFERER']);
        } else return false;
    }
    public function deletes()
    {
        $this->auth->checkUserLogin();
        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_once($id);
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_once($id){
        $this->auth->checkUserLogin();
        if (is_numeric($id)) {
            $item=$this->productmodel->getFirstRowWhere('product',array('id'=>$id));

            $pathImage = "upload/img/products/";
            $dir_image = $item->pro_dir;
            /*if(isset($item->image)&&file_exists($item->image)) {unlink($item->image);}*/
            if(file_exists($pathImage.$dir_image.'/'.$item->image))
            {
                @unlink($pathImage.$dir_image.'/'.$item->image);
            }
            for($j = 1; $j <= 3; $j++)
            {
                if(file_exists($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$item->image))
                {
                    @unlink($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$item->image);
                }
            }
            $this->productmodel->Delete('product', $id);

            $item_alias =$this->productmodel->getFirstRowWhere('alias',array('pro'=>$id));
            if(!empty($item_alias)){
                $this->productmodel->Delete_where('alias',array('pro' => $id));
            }
            $this->productmodel->Delete_where('product_to_category',array('id_product'=>$id));
            $this->productmodel->Delete_where('pro_values',array('pro_id'=>$id));
        } else return false;
    }
    //active user page
    public function userActive(){

        //$this->auth->checkUserLogin();

        if(isset($_GET['id'])&& isset($_GET['token'])){
            $id=$_GET['id'];
            $user=$this->f_usersmodel->getFirstRowWhere('users',array('md5_id'=>$id));
            if(!empty($user)){
                if($user->token==$_GET['token']){
                    $this->f_usersmodel->Update_where('users',array('id'=>$user->id),array('use_status'=>1));
                }else{
                    $this->session->set_flashdata("sussec", "Token Không đúng !");
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }else{
                $this->session->set_flashdata("sussec", "Liên Kết Không đúng !");
                redirect($_SERVER['HTTP_REFERER']);
            }
            $seo = array(
                'title' => "Kích hoạt tài khoản"
            );

            $data = array();
            $this->LoadHeader(null,$seo,false);
            $this->load->view('users/success_active_user',$data);
            $this->LoadFooter();

        }else
        {redirect(base_url());}
    }
    //User Info #achor5
    public function userInfo()
    {
        $this->auth->checkUserLogin();
        $data = array();
        $seo = array(
            'title' => 'Thông tin cá nhân'
        );
        if($this->session->userdata('userid')){
            $userId = $this->session->userdata('userid');
            $data['user'] = $user = $this->session->userData('userData');
            $data['user_info'] = $user_info = $this->f_usersmodel->getFirstRowWhere('users',array(
                'id' => $this->session->userdata('userid')
            ));
            //echo "<pre>";var_dump($user_info);die();
            $provinceid = $data['user_info']->address_province;
            $districtid = $data['user_info']->address_district;
            $wardid     = $data['user_info']->address_ward;
            $data['tinh'] = $this->f_usersmodel->get_data('province', array(), null);

            $data['huyen'] = $this->f_usersmodel->get_data('district', array('provinceid'=>$provinceid), null);

            $data['xa'] = $this->f_usersmodel->get_data('ward', array('districtid'=> $districtid ), null);
            # district : quận - Huyện
            # province  : tỉnh / Tp
            # ward : phường Xã

            if($this->input->post('token') && $this->input->post('token') == 'profile'){
                $arr = array(
                    'fullname' => $this->input->post('last_name'),
                    'email' => $this->input->post('email'),
                    //'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'address_province' => $this->input->post('province'),
                    'address_district'  => $this->input->post('district'),
                    'address_ward'      => $this->input->post('ward'),
                );
                //echo '<pre>';var_dump($arr);die();
                $this->f_usersmodel->Update('users',$userId,$arr);
                if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {

                    // upload file
                    $this->load->library('upload');
                    $pathImage = "upload/img/avatar/";
                    $dir_image = date('dmY');
                    if(!is_dir($pathImage.$dir_image))
                    {
                        @mkdir($pathImage.$dir_image);
                        $this->load->helper('file');
                        @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
                    }
                    $config['upload_path'] = $pathImage.$dir_image.'/';
                    $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
                    $config['max_size'] = '*';
                    $config['max_width'] = '5000';
                    $config['max_height'] = '5000';
                    $config['encrypt_name'] = true;
                    $this->upload->initialize($config);
                    $image = '';
                    if($this->upload->do_upload('userfile'))
                    {
                        $uploadData = $this->upload->data();
                        if($uploadData['is_image'] == TRUE)
                        {
                            $image = $uploadData['file_name'];
                        }
                        elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                        {
                            @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                        }
                        unset($uploadData);
                    }
                    if(@$image == 'none.gif')
                    {
                        #Remove dir
                        $this->load->library('file');
                        if(trim($dir_image) != '' && trim($dir_image) != 'default' && is_dir('upload/img/product/'.$dir_image) && count($this->file->load('upload/img/product/'.$dir_image,'index.html')) == 0)
                        {
                            if(file_exists('upload/img/product/'.$dir_image.'/index.html'))
                            {
                                @unlink('upload/img/product/'.$dir_image.'/index.html');
                            }
                            @rmdir('upload/img/product/'.$dir_image);
                        }
                        $dir_image = 'default';
                    }
                    $this->f_usersmodel->Update_where('users',array('id' =>$userId ) , array(
                        'avatar' => @$image,
                        'avt_dir' => $dir_image,
                    ));
                    // end upload
                }

                redirect($_SERVER['HTTP_REFERER']);
            }

            $this->LoadHeader(null,$seo,false);
            $this->load->view('users/view_user_info',$data);
            $this->LoadFooter();
        }
        else{
            redirect(base_url());
        }
    }
    public function myWishList()
    {
        $this->auth->checkUserLogin();
        $data = array();
        if($this->session->userData('userid')){
            $user_id = $this->session->userData('userid');
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url'] = base_url('san-pham-yeu-thich?');
            $config['total_rows'] = $this->f_usersmodel->countListProLike($user_id);
            $config['per_page'] = 20; // xác định số record ở mỗi trang
            $this->pagination->initialize($config);
            $data['lists'] = $this->f_usersmodel->getListProLike($user_id,$config['per_page'], $this->input->get('per_page'));
            foreach($data['lists'] as $k => $v){
                $data['lists'][$k]->comment = $this->f_usersmodel->Count('comments_binhluan',array('id_sanpham'=>$v->id,'review'=>1));
                $data['lists'][$k]->user_name = $this->f_usersmodel->getFirstRowWhere('users', array('id' => $v->user_id));
            }
        }
        $seo = array(
            'title' => 'Sản phẩm yêu thích'
        );
        $this->LoadHeader(null,$seo,false);
        $this->load->view('users/view_mywishlist',$data);
        $this->LoadFooter();
    }
    public function del()
    {
        $this->auth->checkUserLogin();
        $pid = (int) $this->input->post('pid');
        $user_id = (int) $this->session->userData('userid');
        $this->f_usersmodel->Delete_where('wishlist', array('pro_id' => $pid, 'user_id' => $user_id));
        $this->session->set_flashdata("seccs", "Xóa sản phẩm thành công");
        sleep(1);
    }
    /*Edit by No.Tri 22/05/2017*/
    public function up_image($id = null)
    {
        $this->auth->checkUserLogin();
        $data = array();
        $id = (int) $this->input->get('id');
        $data['pro'] = $this->f_usersmodel->getFirstRowWhere('product', array('id' => $id));
        //pre($data['pro']);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $this->load->helper('thumbnail_helper');
            $pid = (int) $this->input->post('pid');
            $pro = $this->f_usersmodel->getFirstRowWhere('product', array('id' => $pid));
            if(isset($_POST['Upload'])){

                #BEGIN: Upload image
                $this->load->library('upload');
                $pathImage = "upload/img/products/";
                #Create folder
                if(!empty($pro->multi_image)){
                    $dir_image = $pro->img_dir;
                }else{
                    $dir_image = date('dmY');
                }
                $image = 'none.gif';

                if(!is_dir($pathImage.$dir_image))
                {
                    @mkdir($pathImage.$dir_image);
                    $this->load->helper('file');
                    @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
                }
                //$config['upload_path'] = './upload/img/products/';
                $config['upload_path'] = $pathImage.$dir_image.'/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
                $config['max_size'] = '*';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $config['encrypt_name'] = true;
                $this->upload->initialize($config);
                //$imageArray = array();

                //$load = $this->upload->do_upload('userfile');


                // tổng số file UPload;
                $cpt = count($_FILES['userfile']['name']);
                // if($this->upload->do_multi_upload("myfile")){
                //     echo '<pre>';
                //     print_r($this->upload->get_multi_upload_data());
                //     echo '</pre>';
                //     die();
                // }
                // // code upload file

                if($this->upload->do_upload('userfile'))
                {
                    $uploadData = $this->upload->data();
                    if($uploadData['is_image'] == TRUE)
                    {
                        $image = $uploadData['file_name'];
                    }
                    elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                    {
                        @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                    }
                    unset($uploadData);
                }else{
                    $this->session->set_flashdata("sussec", "Bạn chưa chọn ảnh! Vui lòng chọn ảnh trước khi thêm mới.");
                    redirect($_SERVER['HTTP_REFERER']);
                }
                if(isset($image))
                {
                    #BEGIN: Create thumbnail
                    $this->load->library('image_lib');
                    if(file_exists($pathImage.$dir_image.'/'.$image))
                    {
                        for($j = 1; $j <= 3; $j++)
                        {
                            switch($j)
                            {
                                case 1:
                                    $maxWidth = 300;#px
                                    $maxHeight = 300;#px
                                    break;
                                case 3:
                                    $maxWidth = 63;#px
                                    $maxHeight = 63;#px
                                    break;
                                default:
                                    $maxWidth = 600;#px
                                    $maxHeight = 600;#px
                            }
                            $sizeImage = size_thumbnail($pathImage.$dir_image.'/'.$image, $maxWidth, $maxHeight);
                            $configImage['source_image'] = $pathImage.$dir_image.'/'.$image;
                            $configImage['new_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image;
                            $configImage['maintain_ratio'] = TRUE;
                            $configImage['width'] = $sizeImage['width'];
                            $configImage['height'] = $sizeImage['height'];
                            $this->image_lib->initialize($configImage);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                        }
                    }
                    #END Create thumbnail
                }
                if($image == 'none.gif')
                {
                    #Remove dir
                    $this->load->library('file');
                    if(trim($dir_image) != '' && trim($dir_image) != 'default' && is_dir('upload/img/product/'.$dir_image) && count($this->file->load('upload/img/product/'.$dir_image,'index.html')) == 0)
                    {
                        if(file_exists('upload/img/product/'.$dir_image.'/index.html'))
                        {
                            @unlink('upload/img/product/'.$dir_image.'/index.html');
                        }
                        @rmdir('upload/img/product/'.$dir_image);
                    }
                    $dir_image = 'default';
                }
                if($pro->multi_image !=''){
                    $temp_img = $pro->multi_image . ',' . $image;
                }
                else{
                    $temp_img = $image;
                }
                //var_dump($image);die();
                $this->productmodel->Update('product',$pid,array(
                    'multi_image' => $temp_img,
                    'img_dir' => $dir_image
                ));
                $this->session->set_flashdata("sussec", "Thêm ảnh thành công");
                redirect($_SERVER['HTTP_REFERER']);
            }else{
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        $this->load->view('users/up_image', $data);

    }
    public function del_img()
    {
        $this->auth->checkUserLogin();
        $img = trim($this->input->get('img'));
        $idPro = $this->input->get('pid');
        $pro = $this->productmodel->getFirstRowWhere('product',array('id'=>$idPro));
        $pathImage = "upload/img/products/";
        $dir_image = $pro->img_dir;
        $images = explode(',',$pro->multi_image);
        $newImg = array();
        foreach($images as $image){
            if($image == $img){
                if(file_exists($pathImage.$dir_image.'/'.$img))
                {
                    @unlink($pathImage.$dir_image.'/'.$img);
                }
                for($j = 1; $j <= 3; $j++)
                {
                    if(file_exists($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$img))
                    {
                        @unlink($pathImage.$dir_image.'/thumbnail_'.$j.'_'.$img);
                    }
                }
            }else{
                $newImg[] = $image;
            }
        }
        $proImg = implode(',',$newImg);
        $this->productmodel->Update('product', $idPro, array('multi_image'=>$proImg));
        $this->session->set_flashdata("sussec", "Xóa ảnh thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function check_option()
    {
        $this->auth->checkUserLogin();
        $data = array();
        $id = $this->input->get('pid');
        $op = $this->f_usersmodel->getOption($id);
        $data['op'] = $op;
        $this->load->view('users/view_option');
    }
    public function list_option()
    {
        $this->auth->checkUserLogin();
        $this->load->model('m_option');
        $data = array();
        $oid = (int) $this->input->get('oid');
        $data['pro_option'] = $this->f_usersmodel->GetData('oc_option', array('option_id' => $oid));
        foreach($data['pro_option'] as $k => $v){
            $data['pro_option'][$k]->item = $this->m_option->getListOption($v->option_id);
            $data['pro_option'][$k]->items = $this->m_option->getValues($oid);
        }
        //pre($data['pro_option']);
        $this->load->view('users/view_option', $data);
    }
    public function list_option_mobile()
    {
        $this->auth->checkUserLogin();
        $this->load->model('m_option');
        $data = array();
        $oid = (int) $this->input->get('oid');
        $data['pro_option'] = $this->f_usersmodel->GetData('oc_option', array('option_id' => $oid));
        foreach($data['pro_option'] as $k => $v){
            $data['pro_option'][$k]->item = $this->m_option->getListOption($v->option_id);
            $data['pro_option'][$k]->items = $this->m_option->getValues($oid);
        }
        //pre($data['pro_option']);
        $this->load->view('mobile/view_option_mobile', $data);
    }
    public function add_tr()
    {
        $this->auth->checkUserLogin();
        $id = $this->input->get('id');
        $i = $this->input->get('temp');
        $data = array();
        $data['i'] = $i;
        $this->load->model('m_option');
        $data['list_option'] = $this->m_option->getNameValue($id);
        $this->load->view('admin/products/add_tr', $data);
    }
    public function del_opt()
    {
        $this->auth->checkUserLogin();
        $data = array();
        $ids = (int) $this->input->get('to_id');
        if(!empty($ids)){
            $this->m_option->Delete('product_to_option', $ids);
            $this->m_option->Delete_where('oc_option_value', array('to_ids' => $ids));
        }
        $data['check'] = true;
        $this->session->set_flashdata('mess', 'Xóa thành công!');
        echo json_encode($data);
    }
    public function getOptionValue()
    {
        $this->auth->checkUserLogin();
        $data = array();
        $id = $this->input->get('id');
        $pid = $this->input->get('pid');
        $data['pro_option'] = $this->m_option->getOption($id, $pid);
        $data['options'] = $this->m_option->getOptions($id);
        foreach($data['pro_option'] as $k => $v){
            $data['pro_option'][$k]->item = $this->m_option->getListOption($v->option_id);
            $data['pro_option'][$k]->items = $this->m_option->getValues($id, $pid);
        }
        $data['to_id'] = $id;
        $this->load->view('users/view_value', $data);
    }
    public function add_value()
    {
        $this->auth->checkUserLogin();
        $data = array();
        $data['list_opt'] = $this->f_usersmodel->get_data('oc_option', array(), null);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name_value = htmlentities($this->input->post('name_value'));
            $t_color = htmlentities($this->input->post('t_color'));
            $user_id = $this->session->userData('userid');
            $o_id = $this->input->post('opt_id');
            if(empty($name_value)){
                $data['errors'] = 'Vui lòng không để trống trường này';
            }else{
                $arr = array(
                    'name' => $name_value,
                    'color' => $t_color,
                    'user_id' => $user_id,
                    'option_id' =>$o_id
                );
                $id = $this->f_usersmodel->Add('oc_option_value_description', $arr);
                $this->load->library('upload');
                $pathImage = "upload/img/products/";
                #Create folder
                $dir_image = date('dmY');
                if(!is_dir($pathImage.$dir_image))
                {
                    @mkdir($pathImage.$dir_image);
                    $this->load->helper('file');
                    @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
                }
                //$dir_image = $data['edit']->pro_dir;
                $config['upload_path'] = $pathImage.$dir_image.'/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
                $config['max_size'] = '*';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $config['encrypt_name'] = true;
                $this->upload->initialize($config);
                $image = '';
                if($this->upload->do_upload('userfile'))
                {
                    $uploadData = $this->upload->data();
                    if($uploadData['is_image'] == TRUE)
                    {
                        $image = $uploadData['file_name'];
                    }
                    elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                    {
                        @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                    }
                    unset($uploadData);
                }
                if($image !='')
                {
                    #BEGIN: Create thumbnail
                    $this->load->library('image_lib');
                    if(file_exists($pathImage.$dir_image.'/'.$image))
                    {
                        for($j = 1; $j <= 3; $j++)
                        {
                            switch($j)
                            {
                                case 1:
                                    $maxWidth = 300;#px
                                    $maxHeight = 300;#px
                                    break;
                                case 3:
                                    $maxWidth = 63;#px
                                    $maxHeight = 63;#px
                                    break;
                                default:
                                    $maxWidth = 600;#px
                                    $maxHeight = 600;#px
                            }
                            $sizeImage = size_thumbnail($pathImage.$dir_image.'/'.$image, $maxWidth, $maxHeight);
                            $configImage['source_image'] = $pathImage.$dir_image.'/'.$image;
                            $configImage['new_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image;
                            $configImage['maintain_ratio'] = TRUE;
                            $configImage['width'] = $sizeImage['width'];
                            $configImage['height'] = $sizeImage['height'];
                            $this->image_lib->initialize($configImage);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                        }
                    }
                    #END Create thumbnail
                }
                if(@$image == 'none.gif')
                {
                    #Remove dir
                    $this->load->library('file');
                    if(trim($dir_image) != '' && trim($dir_image) != 'default' && is_dir('upload/img/product/'.$dir_image) && count($this->file->load('upload/img/product/'.$dir_image,'index.html')) == 0)
                    {
                        if(file_exists('upload/img/product/'.$dir_image.'/index.html'))
                        {
                            @unlink('upload/img/product/'.$dir_image.'/index.html');
                        }
                        @rmdir('upload/img/product/'.$dir_image);
                    }
                    $dir_image = 'default';
                }
                $this->productmodel->Update_where('oc_option_value_description', array('description_id' => $id), array(
                    'image' => @$image,
                    'pro_dir' => $dir_image,
                ));
                if(!empty($image)){
                    $this->productmodel->Update_where('oc_option_value_description', array('description_id' => $id), array(
                        'color' => ''
                    ));
                }
            }
            //upload images
        }
        $seo = 'Thêm thuộc tính cho sản phẩm';
        $this->LoadHeader(null,$seo,false);
        $this->load->view('users/add_value', $data);
        $this->LoadFooter();
    }
    public function view_table()
    {
        $this->auth->checkUserLogin();
        $data = array();
        $id = (int) $this->input->get('id');
        $user_id = $this->session->userData('userid');
        $data['lists'] = $this->f_usersmodel->GetData('oc_option_value_description', array('option_id' => $id, 'user_id'=> $user_id));
        foreach($data['lists'] as $k=>$v){
            $data['lists'][$k]->opt = $this->f_usersmodel->getFirstRowWhere('oc_option', array('option_id' => $v->option_id));
        }
        //pre($data['lists']);
        $this->load->view('users/view_valuser', $data);
    }
    public function user_edit()
    {
        $this->auth->checkUserLogin();
        $data = array();
        $vid = (int) $this->input->get('vid');
        $data['lists'] = $this->f_usersmodel->getFirstRowWhere('oc_option_value_description', array('description_id' => $vid));
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $this->check_input($this->input->post('name_val'));
            $t_color = $this->check_input($this->input->post('t_color'));
            $user_id = $this->session->userData('userid');
            $id = (int) $this->input->post('v_id');
            $pro_dir = $this->input->post('pro_dir');
            $arr = array(
                'name' => $name,
                'color' => $t_color
            );
            $this->f_usersmodel->Update_where('oc_option_value_description', array('description_id'=>$id, 'user_id'=>$user_id), $arr);
            $this->load->library('upload');
            $pathImage = "upload/img/products/";
            #Create folder
            if(!empty($pro_dir)){
                $dir_image = $pro_dir;
            }else{
                $dir_image = date('dmY');
            }
            if(!is_dir($pathImage.$dir_image))
            {
                @mkdir($pathImage.$dir_image);
                $this->load->helper('file');
                @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
            }
            //$dir_image = $data['edit']->pro_dir;
            $config['upload_path'] = $pathImage.$dir_image.'/';
            $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
            $config['max_size'] = '*';
            $config['max_width'] = '5000';
            $config['max_height'] = '5000';
            $config['encrypt_name'] = true;
            $this->upload->initialize($config);
            $image = '';
            if($this->upload->do_upload('userfile'))
            {
                $uploadData = $this->upload->data();
                if($uploadData['is_image'] == TRUE)
                {
                    $image = $uploadData['file_name'];
                }
                elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                {
                    @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                }
                unset($uploadData);
            }
            if($image !='')
            {
                #BEGIN: Create thumbnail
                $this->load->library('image_lib');
                if(file_exists($pathImage.$dir_image.'/'.$image))
                {
                    for($j = 1; $j <= 3; $j++)
                    {
                        switch($j)
                        {
                            case 1:
                                $maxWidth = 300;#px
                                $maxHeight = 300;#px
                                break;
                            case 3:
                                $maxWidth = 63;#px
                                $maxHeight = 63;#px
                                break;
                            default:
                                $maxWidth = 600;#px
                                $maxHeight = 600;#px
                        }
                        $sizeImage = size_thumbnail($pathImage.$dir_image.'/'.$image, $maxWidth, $maxHeight);
                        $configImage['source_image'] = $pathImage.$dir_image.'/'.$image;
                        $configImage['new_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image;
                        $configImage['maintain_ratio'] = TRUE;
                        $configImage['width'] = $sizeImage['width'];
                        $configImage['height'] = $sizeImage['height'];
                        $this->image_lib->initialize($configImage);
                        $this->image_lib->resize();
                        $this->image_lib->clear();
                    }
                }
                #END Create thumbnail
            }
            if(@$image == 'none.gif')
            {
                #Remove dir
                $this->load->library('file');
                if(trim($dir_image) != '' && trim($dir_image) != 'default' && is_dir('upload/img/product/'.$dir_image) && count($this->file->load('upload/img/product/'.$dir_image,'index.html')) == 0)
                {
                    if(file_exists('upload/img/product/'.$dir_image.'/index.html'))
                    {
                        @unlink('upload/img/product/'.$dir_image.'/index.html');
                    }
                    @rmdir('upload/img/product/'.$dir_image);
                }
                $dir_image = 'default';
            }
            $this->productmodel->Update_where('oc_option_value_description', array('description_id' => $id), array(
                'image' => @$image,
                'pro_dir' => $dir_image,
            ));
            if(!empty($image)){
                $this->productmodel->Update_where('oc_option_value_description', array('description_id' => $id, 'user_id'=>$user_id), array(
                    'color' => ''
                ));
            }
            $this->session->set_flashdata("errorss", "Chỉnh sửa thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
        $this->load->view('users/view_edit_valuser', $data);
    }
    public function user_del($id = null)
    {
        $this->auth->checkUserLogin();
        $ids = (int) $id;
        $this->f_usersmodel->user_del($ids);
        $this->session->set_flashdata("errorss", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function saveimg()
    {
        $img = $_POST['imgBase64'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $fileData = base64_decode($img);
        $charName = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $randName = substr(str_shuffle($charName), 0, 15);
        $fileName = 'upload/imgs/' . $randName . '.png';
        file_put_contents($fileName, $fileData);
        echo $fileName;
    }
    private function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    public function changePass()
    {
        if($_POST['old_pass'] && $_POST['old_pass'] !=''){
            $user = $this->f_usersmodel->getFirstRowWhere('users',array(
                'phone' => $this->input->post('phone')
            ));
            // $current_pass = $this->hash->create($this->input->post('old_pass'), $user->use_salt, 'md5sha512');
            $current_pass = $this->input->post('old_pass');
            for ($i=0; $i < 5; $i++) {
                 $current_pass = md5( $current_pass);
            }
            $check = false;
            if($user->password == $current_pass){
                $check = true;
                //$salt = $this->hash->key(8);
                // $change_pass = $this->hash->create($this->input->post('new_pass'), $salt, 'md5sha512');
                $change_pass = $this->input->post('new_pass');
                for ($i=0; $i < 5; $i++) {
                     $change_pass = md5( $change_pass);
                }
                $this->f_usersmodel->Update('users',$user->id,array(
                    'password' => $change_pass,
                    //'modified' => date("Y-m-d H:i:s"),
                    //'use_salt'          =>      $salt,
                ));
            }
        }
        $data['check'] = $check;
        echo json_encode($data);
        //redirect($_SERVER['HTTP_REFERER']);
    }


    public function delete_img(){
        $id = $this->input->post('id');
        $img = $this->f_usersmodel->getFirstRowWhere('p_images',array(
            'id' => $id
        ));
        if(isset($img)){

            @unlink($img->link);
            //echo "<pre>";print_r($img);die();
            $this->f_usersmodel->Delete('p_images',$id);
        }

        $data['check'] = true;
        echo json_encode($data);
    }


    public function add_product_mobile()
    {
        $this->auth->checkUserLogin();
        $data = array();
        // bước 1 : tên sản phẩm
        if(isset($_GET['step1'])){

            if(isset($_POST['name_pro'])){
                // lưu tên sản phẩm
               $arr = array(
                   'new_name' => $this->input->post('name_pro'),
                   'new_alias'  => $this->input->post('alias'),
               );
               if($this->session->userdata('newitem')){
                    // đã có session thì cập nhật
                    $arr = $this->session->userdata('newitem');
                    $arr['new_name']       = $this->input->post('name_pro');
                    $arr['new_alias']  = $this->input->post('alias');
                }else{
                    // chưa có session thì tạo mới
                    $arr = array(
                   'new_name' => $this->input->post('name_pro'),
                   'new_alias'  => $this->input->post('alias'),
                    );
                }
               $this->session->set_userdata('newitem',$arr );
                $arr = array('stat'=>true,'msg'=>'');
                echo json_encode($arr);
                return null;
            }
        $seo = "Nhập Tên sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_1',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }
        // bước 2 : Giá Sản Phẩm
        if(isset($_GET['step2'])){
            if(isset($_POST['price'])){
                // lấy session ra
                if($this->session->userdata('newitem')){
                    $arr = $this->session->userdata('newitem');
                    $arr['price']       = $this->input->post('price');
                    $arr['price_sale']  = $this->input->post('price_sale');
                    $this->session->set_userdata('newitem',$arr );
                    $return = array(
                        'stat' => true,
                    );
                }else{
                    $return = array(
                        'stat' => false,
                        'msg' => 'Thêm sản phẩm nỗi ! mời thử lại sau',
                    );
                }
                echo json_encode($return);
            return null;
        }

        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_2',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }
        // bước 3 chọn danh mục
        if(isset($_GET['step3'])){
            if(isset($_POST['cate_pro'])){
                // lấy session ra
                if($this->session->userdata('newitem')){
                    $arr = $this->session->userdata('newitem');
                    $arr['cate_pro']       = $this->input->post('cate_pro');
                    $arr['subcate']  = $this->input->post('subcate');
                    $arr['subcate2']  = $this->input->post('subcate2');
                    $this->session->set_userdata('newitem',$arr );
                    $return = array(
                        'stat' => true,
                    );
                }else{
                    $return = array(
                        'stat' => false,
                        'msg' => 'Thêm sản phẩm nỗi ! mời thử lại sau',
                    );
                }
                echo json_encode($return);
            return null;
        }

        $data['cate_pro'] = $this->f_usersmodel->get_data('product_category', array('parent_id'=>0), array('sort' => 'asc'), null);
        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_3',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }

        // bước 4 mô tả sản phẩm
        if(isset($_GET['step4'])){
            if(isset($_POST['description'])){
                // lấy session ra
                if($this->session->userdata('newitem')){
                    $arr = $this->session->userdata('newitem');
                    $arr['description']       = $this->input->post('description');
                    $this->session->set_userdata('newitem',$arr );
                    $return = array(
                        'stat' => true,
                    );
                }else{
                    $return = array(
                        'stat' => false,
                        'msg' => 'Thêm sản phẩm nỗi ! mời thử lại sau',
                    );
                }
                echo json_encode($return);
                return null;
            }

        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_4',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }

        // bước 5 thông tin kỹ thuật
        if(isset($_GET['step5'])){
            if(isset($_POST['caption_2'])){
                // lấy session ra
                if($this->session->userdata('newitem')){
                    $arr = $this->session->userdata('newitem');
                    $arr['caption_2']       = $this->input->post('caption_2');
                    $this->session->set_userdata('newitem',$arr );
                    $return = array(
                        'stat' => true,
                    );
                }else{
                    $return = array(
                        'stat' => false,
                        'msg' => 'Thêm sản phẩm nỗi ! mời thử lại sau',
                    );
                }
                echo json_encode($return);
            return null;
        }

        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_5',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }
        // bước 6 chi tiết sản phẩm
        if(isset($_GET['step6'])){
            if(isset($_POST['detail'])){
                // lấy session ra
                if($this->session->userdata('newitem')){
                    $arr = $this->session->userdata('newitem');
                    $arr['detail']       = $this->input->post('detail');
                    $this->session->set_userdata('newitem',$arr );
                    $return = array(
                        'stat' => true,
                    );
                }else{
                    $return = array(
                        'stat' => false,
                        'msg' => 'Thêm sản phẩm nỗi ! mời thử lại sau',
                    );
                }
                echo json_encode($return);
            return null;
        }

        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_6',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }
        // bước 7 : thuộc tính option
        if(isset($_GET['step7'])){
        // thêm option
            if(isset($_POST['option_value']) && sizeof($_POST['option_value']) > 0){
                $opt = $_POST['option_value'];
                $quantity = $_POST['quantity'];
                $suptra = $_POST['product_option'];
                $op_id = $_POST['group'];
                $add_price = $_POST['add_price'];
                $price_op = $_POST['price_op'];
                /*$add_points = $_POST['add_points'];
                $points = $_POST['points'];
                $add_weight = $_POST['add_weight'];
                $weight = $_POST['weight'];*/
                $required = 1;
                //$to_ids = $this->productmodel->Add('product_to_option', array('product_id' => $id, 'option_id' => $op_id));
                $arrOption = array();
                for ($i = 0; $i < sizeof($opt); $i++) {
                    $ca = array(
                        'description_id' => checkInput($opt[$i]),
                        'option_id'      => checkInput($op_id),
                        //'product_id'     => $id,
                        //'to_ids' => checkInput($to_ids),
                        'quantity' => checkInput($quantity[$i])?checkInput($quantity[$i]):1,
                        'subtract' => checkInput($suptra[$i]),
                        'method_price' => checkInput($add_price[$i]),
                        'price' => checkInput($price_op[$i]),
                        'required' => $required
                    );
                    //$this->productmodel->Add('oc_option_value', $ca);
                    $arrOption[] = $ca;
                }

                // lưu mảng option vào session
                $this->session->set_userdata('inew_option',$arrOption );
                // next step
                redirect(base_url('dang-san-pham-mobile?step8=1'));
                return null;
            }else{
                $this->session->unset_userdata('inew_option');
                redirect(base_url('dang-san-pham-mobile?step8=1'));
            }

        if($this->session->userdata('inew_option')){
            // hủy session option
            $this->session->unset_userdata('inew_option');
        }

        $data['options'] = $this->f_usersmodel->get_data('oc_option', array(), null);
        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_7',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }

        // bước 8 : image upload
        if(isset($_GET['step8'])){
            if(isset($_POST['submit'])){
                // upload ảnh vào thư mục tạm

                $this->load->library('upload');
                //$pathImage = "upload/temp/";
                $pathImage = "upload/img/products/";
                $dir_image = date('dmY');

                //$dir_image = $this->session->userdata('userid');
                // if save database $dir_image = date('dmY');
                if(!is_dir($pathImage.$dir_image))
                {
                    // chưa có thư mục -> khởi tạo
                    @mkdir($pathImage.$dir_image);
                    $this->load->helper('file');
                    @write_file($pathImage.$dir_image.'/index.html', '<p>Directory access is forbidden.</p>');
                }

                $config['upload_path'] = $pathImage.$dir_image.'/';
                $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
                $config['max_size'] = '*';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $config['encrypt_name'] = true;
                $this->upload->initialize($config);
                $image = '';
                if($this->upload->do_upload('userfile'))
                {
                    $uploadData = $this->upload->data();
                    if($uploadData['is_image'] == TRUE)
                    {
                        $image = $uploadData['file_name'];
                    }
                    elseif(file_exists($pathImage.$dir_image.'/'.$uploadData['file_name']))
                    {
                        @unlink($pathImage.$dir_image.'/'.$uploadData['file_name']);
                    }
                    unset($uploadData);
                }
                if($image !='')
                {
                    #BEGIN: Create thumbnail

                    $wm_font_size = 28;
                    if(file_exists($pathImage.$dir_image.'/'.$image))
                    {
                        $link = $pathImage.$dir_image.'/'.$image;
                        // water mark
                        $this->load->helper('email_helper');
                        $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                        if(!$mt){
                            show_404('lỗi upload ảnh');
                        }
                        for($j = 1; $j <= 3; $j++)
                        {
                            switch($j)
                            {
                                case 1:
                                    $maxWidth = 300;#px
                                    $maxHeight = 300;#px
                                    $wm_font_size = 28;
                                    break;
                                case 3:
                                    $maxWidth = 63;#px
                                    $maxHeight = 63;#px
                                    $wm_font_size = 9;
                                    break;
                                default:
                                    $maxWidth = 600;#px
                                    $maxHeight = 600;#px
                            }
                            $sizeImage = size_thumbnail($pathImage.$dir_image.'/'.$image, $maxWidth, $maxHeight);
                            $configImage['source_image'] = $pathImage.$dir_image.'/'.$image;
                            $configImage['new_image'] = $pathImage.$dir_image.'/thumbnail_'.$j.'_'.$image;
                            $configImage['maintain_ratio'] = TRUE;
                            $configImage['width'] = $sizeImage['width'];
                            $configImage['height'] = $sizeImage['height'];
                            $this->image_lib->initialize($configImage);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                        }
                    }
                    #END Create thumbnail
                }

                // $this->f_usersmodel->Update('product', $id, array(
                //     'image' => @$image,
                //     'pro_dir' => $dir_image,
                // ));

                // lấy session ra và cập nhật
                if($this->session->userdata('newitem')){
                    $arr = $this->session->userdata('newitem');
                    $arr['image']       = @$image;
                    $arr['pro_dir']  = $dir_image;
                    $this->session->set_userdata('newitem',$arr );
                }
                //echo '<img src="'.base_url($pathImage.$dir_image).'/'.$arr['image'].'">';
                //upload multi images
            //$config2['upload_path'] = './upload/img/products/';
            $config2['upload_path'] = $pathImage.$dir_image.'/';
            $config2['allowed_types'] = 'gif|jpg|png';
            $config2['max_size'] = '5000';
            $config2['max_width'] = '3000';
            $config2['max_height'] = '3000';
            $config2['encrypt_name'] = true;
            $this->upload->initialize($config2);
            if(!empty($_FILES['images'])){
                $name_array = array();
                $count = count(@$_FILES['images']['size']);
                $arrimg = array();
                foreach ($_FILES as $key => $value) {
                    // for ($s = 0; $s <= $count - 1; $s++) {
                    // chỉ up lên 5 file đầu
                    #achorupload mobile
                    for ($s = 0; $s <= $limit; $s++) {
                        if($s==5) break;
                        $_FILES['images']['name'] = $value['name'][$s];
                        $_FILES['images']['type'] = $value['type'][$s];
                        $_FILES['images']['tmp_name'] = $value['tmp_name'][$s];
                        $_FILES['images']['error'] = $value['error'][$s];
                        $_FILES['images']['size'] = $value['size'][$s];

                        if($this->upload->do_upload('images')){
                            $fileData = $this->upload->data();
                            $uploadData[$s]['file_name'] = $fileData['file_name'];
                            // $link = 'upload/img/products/' . $fileData['file_name'];
                            $link = $pathImage.$dir_image.'/'. $fileData['file_name'];
                            // $id_i = $this->productmodel->Add('p_images',array(
                            //     'link' => $link,
                            //     'id_item' => $id,
                            // ));
                            $arrimg[] = array('link'=>$link);
                            //watermark
                            $this->load->helper('email_helper');
                            $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                        }
                    }
                }
                // save img mutilupload
                $this->session->set_userdata('inew_img',@$arrimg );
            }

            // next step
            redirect(base_url('dang-san-pham-mobile?step9=1'));
            return null;
        }

        // begin steps
        $seo = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_8',$data);
        $this->LoadFooter_mobile();
            // stop here
            return null;
        }

        // bước 9 tổng kết
        if(isset($_GET['step9'])){
            if(isset($_POST['description'])){
                // lấy session ra
                if($this->session->userdata('newitem')){
                    $arr = $this->session->userdata('newitem');
                    //$arr['description']       = $this->input->post('description');
                    $this->session->set_userdata('newitem',$arr );
                    $return = array(
                        'stat' => true,
                    );
                }else{
                    $return = array(
                        'stat' => false,
                        'msg' => 'Thêm sản phẩm nỗi ! mời thử lại sau',
                    );
                }
                echo json_encode($return);
                return null;
            }
            if($this->session->userdata('newitem')){
                $data['item']       = $this->session->userdata('newitem');
                $data['option']     = $this->session->userdata('inew_option');
                $data['listimg']    = $this->session->userdata('inew_img');
                $data['cate_pro'] =  $this->f_homemodel->getFirstRowWhere('product_category',array('id'=>@$data['item']['cate_pro'] ));
                $data['subcate'] =  $this->f_homemodel->getFirstRowWhere('product_category',array('id'=>@$data['item']['subcate'] ));
                $data['subcate2'] =  $this->f_homemodel->getFirstRowWhere('product_category',array('id'=>@$data['item']['subcate2'] ));
            }else{
                // chưa có session về trang đầu
                redirect(base_url('dang-san-pham-mobile'));
            }
            $seo = "Thêm mới sản phẩm";
            $this->LoadHeader_mobile(null,$seo, true);
            $this->load->view('mobile/step_9',$data);
            $this->LoadFooter_mobile();
                // stop here
                return null;
        }
        #achor5 addproductmobile
        if(isset($_GET['huytin'])){
            // XÓA ẢNH CACHE TEMP

            //$pathImage = "upload/img/products/";
            $this->load->helper('email_helper');
            //deleteDir($pathImage.$dir_image);
            $listimg   = $this->session->userdata('inew_img');
            $item =  $this->session->userdata('newitem');
            $this->session->unset_userdata('inew_img');
            $this->session->unset_userdata('newitem');
            $this->session->unset_userdata('inew_option');
            foreach ($listimg as $img) {
                if(file_exists($img['link'])){
                unset($img['link']);
                }
            }
            $pathImage = "upload/img/products/";
            $file  = $pathImage . $item['pro_dir'] .$item['image']  ;
            if(file_exists($file )){
                unset($file );
            }


            redirect(base_url('dang-san-pham-mobile'));

        }

        $data['options'] = $this->f_usersmodel->get_data('oc_option', array(), null);
        $seo['title'] = "Thêm mới sản phẩm";
        $this->LoadHeader_mobile(null,$seo, true);
        $this->load->view('mobile/step_begin',$data);
        $this->LoadFooter_mobile();
    }

    public function add_product_mobile2()
    {
        if($this->session->userdata('newitem')){
            $product      = $this->session->userdata('newitem');
            $option     = $this->session->userdata('inew_option');
            $listimg   = $this->session->userdata('inew_img');

            // thêm sản phẩm
            $pro = array(
                'name'              => $product['new_name'],
                'alias'             => $product['new_alias'],
                'price'             => $product['price'],
                'price_sale'        => $product['price_sale'],
                'category_id'       => $product['cate_pro'],
                'description'       => base64_encode($product['description']),
                'caption_2'         => base64_encode($product['caption_2']),
                'detail'            => base64_encode($product['detail']),
                'image'             => @$product['image'],
                'pro_dir'           => @$product['pro_dir'],
                'active'            => 0,
                'user_id'           => $this->session->userdata('userid'),
                'time'              =>time(),
                'status'            => 1,
            );
            $id = $this->f_usersmodel->Add('product', $pro);

            $this->f_usersmodel->Add('alias', array(
                'type' => 'pro',
                'alias' => $product['new_alias'],
                'pro' => $id
            ));
            // cập nhật link
            $cate1 = $product['cate_pro'];
            $cate2 = $product['subcate'];
            $cate3 = $product['subcate2'];

            if(!empty($cate1)){
                $this->productmodel->Add('product_to_category', array('id_product' => $id, 'id_category' => $cate1));
            }
            if(!empty($cate2)){
                $this->productmodel->Add('product_to_category', array('id_product' => $id, 'id_category' => $cate2));
            }
            if(!empty($cate3)){
                $this->productmodel->Add('product_to_category', array('id_product' => $id, 'id_category' => $cate3));
            }
            // cập nhật và chuyển ảnh khác
            if(count( $listimg > 0)){
                foreach ($listimg as $img) {
                    $
                    $id_i = $this->productmodel->Add('p_images',array(
                    'link' => @$img['link'],
                    'id_item' => $id,
                    ));
                }
            }
            // thêm option
            // if(isset($_POST['option_value']) && sizeof($_POST['option_value']) > 0){
            //     $opt = $_POST['option_value'];
            //     $quantity = $_POST['quantity'];
            //     $suptra = $_POST['product_option'];
            //     $op_id = $_POST['group'];
            //     $add_price = $_POST['add_price'];
            //     $price_op = $_POST['price_op'];
            //     /*$add_points = $_POST['add_points'];
            //     $points = $_POST['points'];
            //     $add_weight = $_POST['add_weight'];
            //     $weight = $_POST['weight'];*/
            //     $required = 1;
            //     $to_ids = $this->productmodel->Add('product_to_option', array('product_id' => $id, 'option_id' => $op_id));
            //     for ($i = 0; $i < sizeof($opt); $i++) {
            //         $ca = array(
            //             'description_id' => checkInput($opt[$i]),
            //             'option_id'      => checkInput($op_id),
            //             'product_id'     => $id,
            //             'to_ids' => checkInput($to_ids),
            //             'quantity' => checkInput($quantity[$i])?checkInput($quantity[$i]):1,
            //             'subtract' => checkInput($suptra[$i]),
            //             'method_price' => checkInput($add_price[$i]),
            //             'price' => checkInput($price_op[$i]),
            //             'required' => $required
            //         );
            //         $this->productmodel->Add('oc_option_value', $ca);
            //     }

            //     /*$to_ids = $_POST['to_ids'];
            //     pre($to_ids);*/
            // }

            // hủy session
            $this->session->unset_userdata('newitem');
            $this->session->unset_userdata('inew_option');
            $this->session->unset_userdata('inew_img');
            redirect('danh-sach-san-pham');
        }else{
            // chưa có session về trang đầu
            redirect(base_url('dang-san-pham-mobile'));
        }

    }
}