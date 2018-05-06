<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Attribute extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
        $this->load->model('m_attribute');
    }
    public function listBrand()
    {
        $data['list'] = $this->m_attribute->get_data('product_brand',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));
        $data['show_home'] = $this->m_attribute->getFirstRowWhere('config_checkpro',array('type' => 'product_brand','field' => 'home',));
        $data['show_hot'] = $this->m_attribute->getFirstRowWhere('config_checkpro',array('type' => 'product_brand','field' => 'hot',));
        $data['show_focus'] = $this->m_attribute->getFirstRowWhere('config_checkpro',array('type' => 'product_brand','field' => 'focus',));

        $data['headerTitle'] = 'Quản lý nhãn hiệu';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_brand/list', $data);
        $this->load->view('admin/footer');
    }
    public function addbrand($id_edit=null)
    {
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->m_attribute->SelectMax('product_brand','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->m_attribute->get_data('product_brand',array('id'=>$id_edit),array(),true);
             $data['cate_selected'] = $this->m_attribute->getField_array('product_to_brand','id_category',
                array('brand_id'=>$id_edit));
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'alias' => $alias,
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'focus' => $this->input->post('focus'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );

            if (!empty($_POST['edit'])){
                $id = $this->m_attribute->Update_where('product_brand', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->m_attribute->Add('product_brand', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

            $checkAlias = $this->m_attribute->getFirstRowWhere('alias',array(
                'brand'=> $id
            ));
            if(empty($checkAlias)){
                $this->m_attribute->Add('alias',array(
                    'alias' => make_alias($this->input->post('alias')),
                    'brand' => $id,
                    'type'  => 'brand'
                ));
            }else{
                $this->m_attribute->Update_where('alias',array('brand'=>$id),array(
                    'alias' => $this->input->post('alias')
                ));
            }

           if($id){
                if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                    $post_cat = $_POST['category'];
                    $this->m_attribute->Delete_where('product_to_brand', array('brand_id' => $id));
                    for ($i = 0; $i < sizeof($post_cat); $i++) {
                        $ca = array('brand_id' => $id, 'id_category' => $post_cat[$i]);
                        $this->m_attribute->Add('product_to_brand', $ca);
                    }
                }
            }

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->m_attribute->Update_where('product_brand',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('uetadmin/attribute/listBrand'));
        }
        //var_dump($data['edit']);die;
        $data['cate'] = $this->m_attribute->get_data('product_brand');
        $data['procat'] = $this->m_attribute->get_data('product_category',array(
            'lang' => $this->language
        ),array('sort'=>''));

        $data['show_home'] = $this->m_attribute->getFirstRowWhere('config_checkpro',array('type' => 'product_brand','field' => 'home',));
        $data['show_hot'] = $this->m_attribute->getFirstRowWhere('config_checkpro',array('type' => 'product_brand','field' => 'hot',));
        $data['show_focus'] = $this->m_attribute->getFirstRowWhere('config_checkpro',array('type' => 'product_brand','field' => 'focus',));

        $data['headerTitle'] = "'".$data['btn_name']."nhãn hiệu sản xuất";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_brand/add', $data);
        $this->load->view('admin/footer');
    }
    public function editbrand($id=null)
    {
        $this->addbrand($id);
    }
    // xoa list danh muc
    public function deletes_brand_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_brand_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_brand_once($id)
    {
        // xoa ban ghi trong product_brand
        $item = $this->m_attribute->getFirstRowWhere('product_brand',array(
            'id' => $id
        ));
        // xoa anh trong thu muc
        if(file_exists($item->image)){
            @unlink($item->image);
        }
        $this->m_attribute->Delete_where('product_brand',array('id' => $id));
        $this->m_attribute->Delete_Where('product_to_brand', array('brand_id'=>$id));
        $item_alias =$this->m_attribute->getFirstRowWhere('alias',array('brand'=>$id));
        if(!empty($item_alias)){
            $this->m_attribute->Delete_where('alias',array('brand' => $id));
        }
    }
    //Delete  danh muc product_brand
    public function deletebrandcategory($id)
    {
        $this->delete_brand_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//=========== locale ==================================================================================================
    public function listLocale()
    {
        $data['list'] = $this->m_attribute->get_data('product_locale',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));

        $data['headerTitle'] = 'Quản lý xuất xứ';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/locale/list', $data);
        $this->load->view('admin/footer');
    }
    public function addlocale($id_edit=null)
    {
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->m_attribute->SelectMax('product_locale','sort')+1;
        if($id_edit!=null){
            $data['edit']=$this->m_attribute->get_data('product_locale',array('id'=>$id_edit),array(),true);
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'alias' => $alias,
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );

            if (!empty($_POST['edit'])){
                $id = $this->m_attribute->Update_where('product_locale', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->m_attribute->Add('product_locale', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;

            $checkAlias = $this->m_attribute->getFirstRowWhere('alias',array(
                'locale'=> $id
            ));
            if(empty($checkAlias)){
                $this->m_attribute->Add('alias', array(
                    'alias' => $alias,
                    'locale' => $id,
                    'type'  => 'locale'
                ));
            }else{
                $this->m_attribute->Update_where('alias',array('locale'=>$id),array(
                    'alias' => $this->input->post('alias')
                ));
            }

            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->m_attribute->Update_where('product_locale',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('uetadmin/attribute/listLocale'));
        }
        $data['headerTitle'] = "'".$data['btn_name']." xuất xứ";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/locale/add', $data);
        $this->load->view('admin/footer');
    }
    public function editlocale($id=null)
    {
        $this->addlocale($id);
    }

    // xoa list danh muc
    public function deletes_locale_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_locale_once($id);
        }
         $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_locale_once($id)
    {
        // xoa ban ghi trong product_brand
        $item = $this->m_attribute->getFirstRowWhere('product_locale',array(
            'id' => $id
        ));
        // xoa anh trong thu muc
        if(file_exists($item->image)){
            @unlink($item->image);
        }
        $this->m_attribute->Delete_where('product_locale',array('id' => $id));
        $item_alias =$this->m_attribute->getFirstRowWhere('alias',array('locale'=>$id));
        if(!empty($item_alias)){
            $this->m_attribute->Delete_where('alias',array('locale' => $id));
        }
    }
    //Delete  danh muc product_brand
    public function deletelocalecategory($id)
    {
        $this->delete_locale_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//====== màu sắc ===============================================================
public function listColor()
    {
        $data['list'] = $this->m_attribute->get_data('product_color',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));
        $data['headerTitle'] = 'Quản lý màu sắc';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_color/list', $data);
        $this->load->view('admin/footer');
    }
    public function addcolor($id_edit=null)
    {
        $config['upload_path'] = './upload/img/brand/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|PNG|JPEG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->m_attribute->SelectMax('product_color','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->m_attribute->get_data('product_color',array('id'=>$id_edit),array(),true);
            $data['max_sort']=$max_sort=$data['edit']->sort;
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $arr = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'color' => $this->input->post('color'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );

            if (!empty($_POST['edit'])){
                $id = $this->m_attribute->Update_where('product_color', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->m_attribute->Add('product_color', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;


            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $this->session->set_flashdata("mess", "".$this->upload->display_errors());
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/brand/' . $upload['upload_data']['file_name'];

                    $this->m_attribute->Update_where('product_color',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('uetadmin/attribute/listColor'));
        }

        $data['headerTitle'] = "'".$data['btn_name']." màu sắc";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_color/add', $data);
        $this->load->view('admin/footer');
    }
    public function editcolor($id=null)
    {
        $this->addcolor($id);
    }

    // xoa list danh muc
    public function deletes_color_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_color_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_color_once($id)
    {
        // xoa ban ghi trong product_color
        $item = $this->m_attribute->getFirstRowWhere('product_color',array(
            'id' => $id
        ));
        // xoa anh trong thu muc
        if(file_exists($item->image)){
            @unlink($item->image);
        }
        $this->m_attribute->Delete_where('product_color',array('id' => $id));

    }
    //Delete  danh muc product_color
    public function deletecolorcategory($id)
    {
        $this->delete_color_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//========= khoang gia ======================================================
 public function listprice()
    {
        $data['list'] = $this->m_attribute->get_data('product_price',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));
        $data['headerTitle'] = 'Quản lý khoảng giá';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_price/list', $data);
        $this->load->view('admin/footer');
    }
    public function addprice($id_edit=null)
    {
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->m_attribute->SelectMax('product_price','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->m_attribute->get_data('product_price',array('id'=>$id_edit),array(),true);
            $data['max_sort']=$max_sort=$data['edit']->sort;
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $alias = make_alias($this->input->post('name'));
            $from_price = str_replace(array(';','.',',',' '),'',$this->input->post('from_price'));
            $to_price   = str_replace(array(';','.',',',' '),'',$this->input->post('to_price'));
            $arr = array(
                'name' => $this->input->post('name'),
                'from_price' => $from_price,
                'to_price' => $to_price,
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );
            if (!empty($_POST['edit'])){
                $id = $this->m_attribute->Update_where('product_price', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->m_attribute->Add('product_price', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;
            redirect(base_url('uetadmin/attribute/listprice'));
        }

        $data['headerTitle'] = "'".$data['btn_name']." khoảng giá";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_price/add', $data);
        $this->load->view('admin/footer');
    }
    public function editprice($id=null)
    {
        $this->addprice($id);
    }
    // xoa list danh muc
    public function deletes_price_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_price_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_price_once($id)
    {
        $this->m_attribute->Delete_where('product_price',array('id' => $id));
    }
    //Delete  danh muc product_price
    public function deletepricecategory($id)
    {
        $this->delete_price_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
//========== kich thước ================================================
public function listOption()
    {
        $data['list'] = $this->m_attribute->get_data('product_size',array(
            'lang' => $this->language
        ),array('sort' => 'desc'));
        $data['headerTitle'] = 'Quản lý kích thước';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_size/list', $data);
        $this->load->view('admin/footer');
    }
    public function addoption($id_edit=null)
    {
        $data['btn_name']='Thêm';
        $data['max_sort']=$this->m_attribute->SelectMax('product_size','sort')+1;
         if($id_edit!=null){
            $data['edit']=$this->m_attribute->get_data('product_size',array('id'=>$id_edit),array(),true);
            $data['max_sort']=$max_sort=$data['edit']->sort;
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $arr = array(
                'name' => $this->input->post('name'),
                'size' => $this->input->post('size'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->language
            );
            if (!empty($_POST['edit'])){
                $id = $this->m_attribute->Update_where('product_size', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->m_attribute->Add('product_size', $arr);
                $this->session->set_flashdata("mess", "Thêm thành công!");
            }

            if ($id_edit != null) {
                $id = $id_edit;
            } else $id = $id;
            redirect(base_url('uetadmin/attribute/listOption'));
        }

        $data['headerTitle'] = "'".$data['btn_name']." kích thước";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/product_size/add', $data);
        $this->load->view('admin/footer');
    }
    public function editoption($id=null)
    {
        $this->addoption($id);
    }
    // xoa list danh muc
    public function deletes_option_category(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->delete_option_once($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function delete_option_once($id)
    {
        $this->m_attribute->Delete_where('product_size',array('id' => $id));
    }
    //Delete  danh muc product_price
    public function deleteoptioncategory($id)
    {
        $this->delete_option_once($id);
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
}
