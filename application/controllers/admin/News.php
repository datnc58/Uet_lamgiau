<?php if (!defined('BASEPATH')) exit('No direct script access allowed');



class News extends MY_Controller

{

    function __construct()

    {

        parent::__construct();

        $this->load->helper('url');

        $this->load->model('news_model');

        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))

        {

            redirect(base_url().'uetadmin', 'location');

            die();

        }

    }

    public function newslist()

    {

        $data['list'] = $this->news_model->get_data('news',array(

            'lang' => $this->language

        ),array('id' => 'desc'));

        foreach ($data['list'] as $key => $cat) {

            $data['list'][$key]->cat_name = $this->news_model->getField('news_category',

                array('name'),

                array(

                    'id' => $cat->category_id,

                ));

        }

        $data['cate'] = $this->news_model->get_data('news_category');

        $data['show_home'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news','field' => 'home',));

        $data['show_hot'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news','field' => 'hot',));

        $data['show_focus'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news','field' => 'focus',));

        $data['headerTitle'] = "Tin tức";

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/news/list', $data);

        $this->load->view('admin/footer');

    }

    //add News

    public function addnews($id_edit=null)

    {

        $config['upload_path']   = './upload/img/news/';

        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|PNG|JPG|GIF';

        $config['max_size']      = '3000';

        $config['max_width']     = '1500';

        $config['max_height']    = '1200';

        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';

        if($id_edit!=null){

            $data['edit']=$this->news_model->get_data('news',array('id'=>$id_edit),array(),true);

            $data['cate_selected']=$this->news_model->getField_array('news_to_category','id_category',array('id_news'=>$id_edit));

            $data['btn_name']='Cập nhật';

        }

        if (isset($_POST['addnews'])) {

            $video='';

            if($this->input->post('video')){

                $video=explode('=',$this->input->post('video'));

                $video = $video[1];

            }

            $alias = make_alias($this->input->post('alias'));

            $arr = array(

                'title'           => $this->input->post('title'),

                'alias'           => $alias,

                'description'     => $this->input->post('description'),

                'hot'             => $this->input->post('hot'),

                'home'            => $this->input->post('home'),

                'focus'           => $this->input->post('focus'),

                'content'         => $this->input->post('content'),

                'lang'            => $this->language,

                'tag'             => $this->input->post('tag'),

                'video'           => $video,

                'time'            => time(),

                'active'            => 1,

                'category_id'     => $this->input->post('category_id'),

                'title_seo'       => $this->input->post('title_seo'),

                'keyword_seo'     => $this->input->post('keyword_seo'),

                'description_seo' => $this->input->post('description_seo'),

            );

            if (!empty($_POST['edit'])){

                $id = $this->news_model->Update_where('news', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công");

            } else {

                $id = $this->news_model->Add('news', $arr);

                $this->session->set_flashdata("mess", "Thêm thành công!");

            }

            if ($id_edit != null) {

                $id = $id_edit;

            } else $id = $id;



            $checkAlias = $this->news_model->getFirstRowWhere('alias',array(

                'new'=> $id

            ));

            if(empty($checkAlias)){

                $this->news_model->Add('alias', array(

                    'alias' => $alias,

                    'new' => $id,

                    'type'  => 'new'

                ));

            }else{

                $this->news_model->Update_where('alias',array('new'=>$id),array(

                    'alias' => $alias,

                ));

            }

            if ($this->input->post('category') && sizeof($this->input->post('category')) > 0) {



                $post_cat = $this->input->post('category');



                $this->news_model->Delete_where('news_to_category', array('id_news' => $id));

                for ($i = 0; $i < sizeof($post_cat); $i++) {

                    $ca = array('id_news' => $id, 'id_category' => $post_cat[$i]);

                    $this->news_model->Add('news_to_category', $ca);

                }

                $this->news_model->Update_where('news', array('id'=>$id), array('category_id' => end($post_cat)));

            }



            //update news image

            if ($_FILES['userfile']['name'] != '') {

                $type_image = explode(".", $_FILES['userfile']['name']);

                $a = make_alias($type_image[0]);

                $file_name = $a.'.'.$type_image[1];

                $_FILES['userfile']['name'] =  $file_name;

                if (!$this->upload->do_upload('userfile')) {

                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {

                    $upload = array('upload_data' => $this->upload->data());

                    $image  = 'upload/img/news/' . $upload['upload_data']['file_name'];

                    $this->news_model->Update_where('news', array('id'=>$id), array('image'=>$image));

                }

            }

            redirect(base_url('uetadmin/news/newslist'));

        }

        $data['cate'] = $this->news_model->get_data('news_category',array(

            'lang' => $this->language

        ));

        $data['show_home'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news','field' => 'home',));

        $data['show_hot'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news','field' => 'hot',));

        $data['show_focus'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news','field' => 'focus',));

        $data['headerTitle'] = "'".$data['btn_name']." Tin tức";

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/news/add', $data);

        $this->load->view('admin/footer');

    }

    // edit news

    public function edit($id){

        $this->addnews($id);

    }

    //Delete News

    public function deletes(){

        $ids = $this->input->post('checkone');

        foreach($ids as $id)

        {

            $this->delete_once_news($id);

        }

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function delete_once_news($id)

    {


        $news=$this->news_model->get_data('news',array('id'=>$id),array(),true);

        $item_alias =$this->news_model->getFirstRowWhere('alias',array('new'=>$id));

        if(!empty($item_alias)){

            $this->news_model->Delete_where('alias',array('new' => $id));

        }

        if(file_exists($news->image));

        $this->news_model->Delete_where('news',array('id' => $id));

    }

    public function delete($id)

    {

        $this->delete_once_news($id);

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

//************ Danh mục **********************************************************************

    public function categories()

    {


        $data['cate'] = $this->news_model->get_data('news_category',array(

            'lang' => $this->language

        ),array('sort'=>'desc'));

        $data['show_home'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'home',));

        $data['show_hot'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'hot',));

        $data['show_focus'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'focus',));

        $data['show_coupon'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'coupon',));

        $data['headerTitle'] = 'Danh mục tin tức';

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/news/list_cat', $data);

        $this->load->view('admin/footer');

    }

    //Add Category

    public function cat_add_news($id_edit=null)

    {

        $config['upload_path']   = './upload/img/category/';

        $config['allowed_types'] = 'gif|jpg|jpeg|png|GIF|JPG|JPEG|PNG';

        $config['max_size']      = '1000';

        $config['max_width']     = '1200';

        $config['max_height']    = '1000';

        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';

        $data['max_sort']=$max_sort=$this->news_model->SelectMax('news_category','sort')+1;

        if($id_edit!=null){

            $data['edit']=$this->news_model->get_data('news_category',array('id'=>$id_edit),array(),true);

            $data['max_sort']=$max_sort=$data['edit']->sort;

            $data['btn_name']='Cập nhật';

        }

        if(isset($_POST['addnews'])) {

            $arr    = array(

                'name'        => $this->input->post('name'),

                'description' => $this->input->post('description'),

                'parent_id'   => $this->input->post('parent'),

                'home'        => $this->input->post('home'),

                'focus'       => $this->input->post('focus'),

                'hot'         => $this->input->post('hot'),

                'coupon'        => $this->input->post('coupon'),

                'alias'       => make_alias($this->input->post('alias')),

                'lang'        => $this->language,

                'title_seo'   => $this->input->post('title_seo'),

                'keyword'   => $this->input->post('keyword'),

                'sort'       => $max_sort,

                'description_seo'   => $this->input->post('description_seo')

            );

            if (!empty($_POST['edit'])){

                $id = $this->news_model->Update_where('news_category', array('id'=>$id_edit), $arr);

                $this->session->set_flashdata("mess", "Cập nhật thành công!");

            } else {

                $id = $this->news_model->Add('news_category', $arr);

                $this->session->set_flashdata("mess", "Thêm thành công!");

            }

            if ($id_edit != null) {

                $id = $id_edit;

            } else $id = $id;

            // check alias

            $checkAlias = $this->news_model->getFirstRowWhere('alias',array(

                'new_cat'=> $id

            ));

            if(empty($checkAlias)){

                $this->news_model->Add('alias', array(

                    'alias' => $this->input->post('alias'),

                    'new_cat' => $id,

                    'type'  => 'cate-new'

                ));

            }else{

                $this->news_model->Update_where('alias',array('new_cat'=>$id),array(

                    'alias' => $this->input->post('alias')

                ));

            }

            if ($_FILES['userfile']['name'] != '') {

                $type_image = explode(".", $_FILES['userfile']['name']);

                $a = make_alias($type_image[0]);

                $file_name = $a.'.'.$type_image[1];

                $_FILES['userfile']['name'] =  $file_name;

                if (!$this->upload->do_upload()) {

                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());

                } else {

                    $upload = array('upload_data' => $this->upload->data());

                    $image = 'upload/img/category/' . $upload['upload_data']['file_name'];

                    $this->news_model->Update_where('news_category',array('id'=>$id),array('image'=>$image));

                }

            }

            redirect(base_url('uetadmin/news/categories'));

        }

        $data['category'] = $this->news_model->get_data('news_category',array(

            'lang' => $this->language

        ),array('sort'=>'desc'));

        $data['show_home'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'home',));

        $data['show_hot'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'hot',));

        $data['show_focus'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'focus',));

        $data['show_coupon'] = $this->news_model->getFirstRowWhere('config_checkpro',array('type' => 'news_category','field' => 'coupon',));

        $data['headerTitle'] = "'".$data['btn_name']." danh mục tin";

        $this->LoadHeaderAdmin($data);

        $this->load->view('admin/news/cat_add', $data);

        $this->load->view('admin/footer');

    }

    // Edit category

    public function cat_edit($id){

        $this->cat_add_news($id);

    }

    //Delete Cate News

    public function deletes_category()

    {

        $ids = $this->input->post('checkone');

        foreach($ids as $id)

        {

            $this->del_catnews_once($id);

        }

        $this->session->set_flashdata("mess", "Xóa thành công!");

        redirect($_SERVER['HTTP_REFERER']);

    }

    public function del_catnews_once($id){


        $cat_parent =$this->news_model->getFirstRowWhere('news_category',array('parent_id'=>$id));

        if(empty($cat_parent)){

            $item = $this->news_model->getFirstRowWhere('news_category',array(

                'id' => $id

            ));

            // xoa anh trong thu muc

            if(file_exists($item->image)){

                @unlink($item->image);

            }

            $this->news_model->Delete_where('news_category',array('id' => $id));

            $item_alias =$this->news_model->getFirstRowWhere('alias',array('new_cat'=>$id));

            if(!empty($item_alias)){

                $this->news_model->Delete_where('alias',array('new_cat' => $id));

            }

        }

    }

    public function deletecategory($id)

    {

        $cat_parent =$this->news_model->getFirstRowWhere('news_category',array('parent_id'=>$id));

        if(empty($cat_parent)){

            $this->del_catnews_once($id);

        }else{

            $this->session->set_flashdata("mess", "Xóa không thành công ! <br />Còn danh mục con");

        }

        redirect($_SERVER['HTTP_REFERER']);

    }

}