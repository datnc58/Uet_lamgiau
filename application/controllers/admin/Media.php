<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class Media extends MY_Controller

{



    function __construct()

    {

        parent::__construct();

        // $this->output->cache(20);

        $this->load->library('pagination');

        $this->load->model('m_media');

        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))

        {

            redirect(base_url().'uetadmin', 'location');

            die();

        }

    }



//******* danh sach media ********************************************************

    protected $pagination_config= array(

        'full_tag_open'=>"<ul class='pagination pagination-sm'>",

        'full_tag_close'=>"</ul>",

        'num_tag_open'=>'<li>',

        'num_tag_close'=>'</li>',

        'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",

        'cur_tag_close'=>"<span class='sr-only'></span></a></li>",

        'next_tag_open'=>"<li>",

        'next_tagl_close'=>"</li>",

        'prev_tag_open'=>"<li>",

        'prev_tagl_close'=>"</li>",

        'first_tag_open'=>"<li>",

        'first_tagl_close'=>"</li>",

        'last_tag_open'=>"<li>",

        'last_tagl_close'=>"</li>",

    );

//    ======================================================================================================================

    public function listAll()

    {

        if($this->input->get()){

            $where = array(

                'name' => $this->input->get('name')?$this->input->get('name'):'',

                'cate' => $this->input->get('cate'),

                'view' => $this->input->get('view'),

                'lang' => $this->input->get('lang'),

            );

            $config['page_query_string']    = TRUE;

            $config['enable_query_strings'] = TRUE;

            $config['base_url']             = base_url('uetadmin/media/listAll?name='

                . $this->input->get('name')

                . '&cate=' . $this->input->get('cate')

                . '&view=' . $this->input->get('view')

                . '&lang=' . $this->input->get('lang')

            );

            $config['total_rows']  = $this->m_media->count_listmedia($where);

            $config['per_page']    = 20;

            $config['uri_segment'] = 4;

            $config=array_merge($config,$this->pagination_config);

            $this->pagination->initialize($config);

            $data['list'] = $this->m_media->getListMedia($where, $config['per_page'], $this->input->get('per_page'));



        }else{

            $where = array(

                'lang' => $this->language

            );

            $config['base_url'] = base_url('uetadmin/media/listAll');

            $config['total_rows'] = $this->m_media->count_listmedia($where); // xác định tổng số record

            $config['per_page'] =20; // xác định số record ở mỗi trang

            $config['uri_segment'] = 4; // xác định segment chứa page number

            $config=array_merge($config,$this->pagination_config);

            $this->pagination->initialize($config);

            $data['list'] = $this->m_media->getListMedia($where, $config['per_page'],

                $this->uri->segment(4));

        }

        foreach ($data['list'] as $key => $cat) {

            $data['list'][$key]->cat_name = $this->m_media->getField('media_category',

                array('name'),array('id' => $cat->category_id,));

        }



        $data['media_all'] = $this->m_media->get_data('media',array('lang' => $this->language),array('id' => 'desc'));

        $auto_name = '';

        foreach ($data['media_all'] as $nameget) {

            $subname = $nameget->name;



            if ($auto_name == null) {

                $auto_name = $subname;

            } else {

                $auto_name = $auto_name . "," . $subname;

            }

        }

        $data['auto_name'] = $auto_name;

        $data['cate'] = $this->m_media->get_data('media_category',array('lang' => $this->language),array('id' => 'desc'));

        $data['show_home'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media','field' => 'home',));

        $data['show_hot'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media','field' => 'hot',));

        $data['show_focus'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media','field' => 'focus',));

        $data['headerTitle'] = "Media";

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/medias/list', $data);

        $this->load->view('admin/footer');

    }

    #achor add

    public function add($id_edit=null)

    {

        $this->load->helper('thumbnail_helper');

        $data['btn_name']='Thêm';

        $data['max_sort']=$max_sort=$this->m_media->SelectMax('media','sort')+1;

        if($id_edit!=null){

            $data['edit']=$this->m_media->getFirstRowWhere('media',array('id'=>$id_edit));

            $data['cate_selected'] = $this->m_media->getField_array2('media_category','id',

                array('id'=>$data['edit']->category_id));



            // danh sách ảnh hụ

            $data['listimg'] = $this->m_media->get_data('media_images',array('id_item'=>$id_edit));

            $data['btn_name']='Cập nhật';

            $data['max_sort']=$max_sort=$data['edit']->sort;

        }

        if (isset($_POST['addnews'])) {

            $alias = make_alias($this->input->post('alias'));

            $arr = array(

                'name'            => $this->input->post('name'),

                'alias'			  => $alias,

                'description'     => $this->input->post('description'),

                'content'          => $this->input->post('content'),

                'active'          => $this->input->post('active'),

                'home'          => $this->input->post('home'),

                'hot'          => $this->input->post('hot'),

                'focus'          => $this->input->post('focus'),

                'description_seo' => $this->input->post('description_seo'),

                'title_seo'       => $this->input->post('title_seo'),

                'keyword_seo'     => $this->input->post('keyword_seo'),

                'sort'            => $max_sort,

                'lang'            => $this->language,

            );

            if (!empty($_POST['edit'])){

                $id = $this->m_media->Update_where('media', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            } else {

                $id = $this->m_media->Add('media', $arr);

                $this->session->set_flashdata("mess", "Thêm mới thành công!");

            }

            if ($id_edit != null) {

                $id = $id_edit;

            } else $id = $id;

            $checkAlias = $this->m_media->getFirstRowWhere('alias',array(

                'media' => $id

            ));

            if(empty($checkAlias)){

                $this->m_media->Add('alias',array(

                    'media' => $id,

                    'type' => 'media',

                    'alias' => $alias

                ));

            }else{

                $this->m_media->Update_where('alias',array('media' => $id),array(

                    'alias' => $alias

                ));

            }

            if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {

                $post_cat = $_POST['category'];

                $this->m_media->Update_where('media', array('id'=>$id), array('category_id' => end($post_cat)));

            }



            //upload images ảnh đại diện

            $config['upload_path']   = './upload/img/media/';

            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';

            $config['max_size'] = '*';

            $config['max_width'] = '5000';

            $config['max_height'] = '5000';

            $this->load->library('upload', $config);

            //update news image

            if ($_FILES['userfile']['name'] != '') {

                if (!$this->upload->do_upload('userfile')) {

                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {

                    $upload = array('upload_data' => $this->upload->data());

                    $image  = 'upload/img/media/' . $upload['upload_data']['file_name'];

                    $this->m_media->Update_where('media', array('id'=>$id), array('image'=>$image));

                }

            }



            //upload multi images

            $config2['upload_path'] = './upload/img/media_multi/';

            $config2['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';

            $config2['max_size'] = '*';

            $config2['max_width'] = '2000';

            $config2['max_height'] = '1400';

            $config2['encrypt_name'] = true;

            $this->upload->initialize($config2);

            if(!empty($_FILES['images'])){

                $name_array = array();

                $count = count(@$_FILES['images']['size']);

                foreach ($_FILES as $key => $value) {

                    for ($s = 0; $s <= $count - 1; $s++) {

                        $_FILES['images']['name'] = $value['name'][$s];

                        $_FILES['images']['type'] = $value['type'][$s];

                        $_FILES['images']['tmp_name'] = $value['tmp_name'][$s];

                        $_FILES['images']['error'] = $value['error'][$s];

                        $_FILES['images']['size'] = $value['size'][$s];



                        if($this->upload->do_upload('images')){

                            $fileData = $this->upload->data();

                            $uploadData[$s]['file_name'] = $fileData['file_name'];

                            $link = 'upload/img/media_multi/' . $fileData['file_name'];

                            $id_i = $this->m_media->Add('media_images',array(

                                'image' => $link,

                                'id_item' => $id,

                            ));

                            //watermark

                            $this->load->helper('email_helper');

                            $mt = add_water_mark($link,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                        }



                    }

                }

            }



            redirect(base_url('uetadmin/media/listAll'));

        }

        $data['cate'] = $this->m_media->get_data('media_category',array(

            'lang' => $this->language

        ),array('sort'=>''));

        $data['show_home'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media','field' => 'home',));

        $data['show_hot'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media','field' => 'hot',));

        $data['show_focus'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media','field' => 'focus',));

        $data['headerTitle'] = $data['btn_name']." media";

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/medias/add', $data);

        $this->load->view('admin/footer');

    }

    #achor edit

    public function edit($id){

        $this->add($id);

    }

    //Xóa nhieu ban ghi

    public function deletes()

    {

        if($this->input->post('checkone') && is_array($this->input->post('checkone')) && count($this->input->post('checkone')) > 0)

        {

            $ids = $this->input->post('checkone');

            foreach($ids as $id)

            {

                $this->delete_once($id);

            }

        }

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function delete_once($id){

        $this->check_acl();

        if (is_numeric($id)) {

            $item=$this->m_media->getFirstRowWhere('media',array('id'=>$id));

            $pathImage = "upload/img/media/";

            // xoa anh san pham

            if(file_exists($pathImage.'/'.$item->image))

            {

                @unlink($pathImage.'/'.$item->image);

            }



            $this->m_media->Delete_where('media',array('id' => $id));

            $item_alias =$this->m_media->getFirstRowWhere('alias',array('pro'=>$id));

            if(!empty($item_alias)){

                $this->m_media->Delete_where('alias',array('media' => $id));

            }

            //delete more image

            $m_images = $this->m_media->getFields('media_images','id,image',array(

                'id_item' => $id

            ));

            foreach($m_images as $image){

                @unlink($image->image);

                $this->m_media->Delete_where('media_images', array('id_item'=>$image->id));

            }

        } else return false;

    }

    // xoa 1 ban ghi

    public function delete($id)

    {

        $this->delete_once($id);

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

//******* danh muc ********************************************************

    public function categories()

    {

        $this->check_acl();

        $data['cate'] = $this->m_media->get_data('media_category',array(

            'lang' => $this->language

        ),array('sort'=>'desc'));

        $data['show_home'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'home',));

        $data['show_hot'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'hot',));

        $data['show_focus'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'focus',));

        $data['show_coupon'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'coupon',));

        $data['headerTitle'] = 'Danh mục media';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/medias/list_cat', $data);

        $this->load->view('admin/footer');

    }



    public function cat_add($id_edit=null)

    {



        $this->check_acl();

        $config['upload_path'] = './upload/img/media/';

        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';

        $config['max_size']      = '1000';

        $config['max_width']     = '1200';

        $config['max_height']    = '1000';

        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';

        $data['max_sort']=$max_sort=$this->m_media->SelectMax('media_category','sort')+1;

        if($id_edit!=null){

            $data['edit']=$this->m_media->get_data('media_category',array('id'=>$id_edit),array(),true);

            $data['cate_selected'] = $this->m_media->getField_array('media_category','id',

                array('id'=>$data['edit']->parent_id));

            $data['max_sort']=$max_sort=$data['edit']->sort;

            $data['btn_name']='Cập nhật';

        }



        if (isset($_POST['addnews'])) {

            $alias = make_alias($this->input->post('alias'));

            $arr = array(

                'name' => $this->input->post('name'),

                'description' => $this->input->post('description'),

                'alias' => make_alias($this->input->post('alias')),

                'home' => $this->input->post('home'),

                'hot' => $this->input->post('hot'),

                'focus' => $this->input->post('focus'),

                'coupon' => $this->input->post('coupon'),

                'sort' => $max_sort,

                'title_seo' => $this->input->post('title_seo'),

                'keyword_seo' => $this->input->post('keyword'),

                'description_seo' => $this->input->post('description_seo'),

                'lang'            => $this->language,

            );

            // var_dump($_POST['edit']);die();

            if (!empty($_POST['edit'])){



                $id = $this->m_media->Update_where('media_category', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            } else {

                $id = $this->m_media->Add('media_category', $arr);

                $this->session->set_flashdata("mess", "Thêm mới thành công!");

            }

            if ($id_edit != null) {

                $id = $id_edit;

            } else $id = $id;

            // check alias

            $checkAlias = $this->m_media->getFirstRowWhere('alias',array(

                'm_cat'=> $id

            ));

            if(empty($checkAlias)){

                $this->m_media->Add('alias', array(

                    'alias' => $alias,

                    'm_cat' => $id,

                    'type'  => 'm-cat'

                ));

            }else{

                $this->m_media->Update_where('alias',array('m_cat'=>$id),array(

                    'alias' => $this->input->post('alias')

                ));

            }



            if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {

                $post_cat = $_POST['category'];

                $this->m_media->Update_where('media_category', array('id'=>$id), array('parent_id' => end($post_cat)));

            }



            if ($_FILES['userfile']['name'] != '') {

                if (!$this->upload->do_upload()) {

                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {

                    $upload = array('upload_data' => $this->upload->data());

                    $image = 'upload/img/media/' . $upload['upload_data']['file_name'];



                    $this->m_media->Update_where('media_category',array('id'=>$id),array('image'=>$image));

                }

            }



            redirect(base_url('uetadmin/media/categories'));

        }

        $data['cate'] = $this->m_media->get_data('media_category',array(

            'lang' => $this->language

        ),array('sort'=>'asc'));

        $data['show_home'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'home',));

        $data['show_hot'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'hot',));

        $data['show_focus'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'focus',));

        $data['show_coupon'] = $this->m_media->getFirstRowWhere('config_checkpro',array('type' => 'media_category','field' => 'coupon',));

        $data['headerTitle'] = $data['btn_name']." danh mục media";

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/medias/cat_add', $data);

        $this->load->view('admin/footer');

    }

    public function cat_edit($id){

        $this->cat_add($id);

    }

    public function deletes_category(){

        $ids = $this->input->post('checkone');

        foreach($ids as $id)

        {

            $this->del_cat_once($id);

        }

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function del_cat_once($id){


        $cat_parent =$this->m_media->getFirstRowWhere('media_category',array('parent_id'=>$id));

        if(empty($cat_parent)){

            // xoa ban ghi trong media_category

            $item = $this->m_media->getFirstRowWhere('media_category',array(

                'id' => $id

            ));

            // xoa anh trong thu muc

            if(file_exists($item->image)){ @unlink($item->image);}



            $this->m_media->Delete_where('media_category',array('id' => $id));

            $item_alias =$this->m_media->getFirstRowWhere('alias',array('m_cat'=>$id));

            if(!empty($item_alias)){

                $this->m_media->Delete_where('alias',array('m_cat' => $id));

            }

        }



    }

    public function deletecategory($id)

    {

        if (is_numeric($id)&&$id>1) {

            $cat_parent =$this->m_media->getFirstRowWhere('media_category',array('parent_id'=>$id));

            if(empty($cat_parent)){

                $this->del_cat_once($id);

                $this->session->set_flashdata("mess", "Xóa danh mục thành công!");

                $_SESSION['mess']='Xóa danh mục thành công!';

            }else{

                $this->session->set_flashdata("mess_err", "Xóa không thành công ! <br />Còn danh mục con");

            }

        }

        redirect($_SERVER['HTTP_REFERER']);

    }

    ////// end product categories ///////////

///////////Them anh cho san pham===========================

    public function images($id)

    {

        $config['upload_path'] = './upload/img/media_multi/';

        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';

        $config['max_size'] = '*';

        $config['max_width'] = '2000';

        $config['max_height'] = '1400';

        $this->load->library('upload', $config);



        if (isset($_POST['Upload']))

        {

            $db_data = array(

                'url' => '',

                'name' => $this->input->post('title'),

                'id_item' => $id

            );

            if (isset($_POST['edit'])&&$_POST['edit']!=null)

            {

                $this->m_media->Update_where('media_images', array('id' => $_POST['edit']), array('name' => $this->input->post('title'),));

                $id_img = $_POST['edit'];

            }

            else{

                $id_img = $this->m_media->Add('media_images', $db_data);

            }



            if (!$this->upload->do_upload('userfile')) {

                $this->session->set_flashdata("mess", "".$this->upload->display_errors());

            } else {

                $upload = array('upload_data' => $this->upload->data());

                $image = 'upload/img/media_multi/' . $upload['upload_data']['file_name'];

                $this->load->helper('email_helper');

                $mt = add_water_mark($image,$this->option->WM_text,$this->option->WM_color, $this->option->WM_size);

                $abd = $this->m_media->Update_where('media_images', array('id' => $id_img), array('image' => $image));

                $this->session->set_flashdata("mess", "Thêm ảnh thành công!");

            }



            redirect($_SERVER['HTTP_REFERER']);

        }



        $data['media_image'] = $this->m_media->getProImage($id);

        //var_dump($data['media_image']);die;

        $data['id'] = $id;



        $data['headerTitle'] = "Tải thêm ảnh cho media";



        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/medias/view_images', $data);

        $this->load->view('admin/footer');

    }

// xoa anh multi san pham

    public function delete_images($id){

        $img = $this->m_media->getFirstRowWhere('media_images',array(

            'id' => $id

        ));

        if(file_exists($img->image)){

            unlink(($img->image));

        }

        $this->m_media->Delete_where('media_images',array('id' => $id));

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

}