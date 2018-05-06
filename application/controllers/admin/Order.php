<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
        $this->load->model('ordermodel');
        $this->load->library('pagination');
        if(!$this->check->is_logined($this->session->userdata('sessionUserAdmin'), $this->session->userdata('sessionGroupAdmin')))
        {
            redirect(base_url().'uetadmin', 'location');
            die();
        }
    }
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
    public function orders()
    {
		$data['list'] = $this->ordermodel->get_data('order',array(),array('id' => 'desc'));
        $data['headerTitle'] = "Đơn đặt hàng";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/order/oder_list', $data);
        $this->load->view('admin/footer');
    }
// xoa gio hang
	public function deletes()
        {
            $ids = $this->input->post('checkone');
            foreach($ids as $id)
            {
                $this->delete_once_orders($id);
            }
			$this->session->set_flashdata("mess", "Xóa thành công!");
            redirect($_SERVER['HTTP_REFERER']);
        }
	public function delete_once_orders($id){
		$this->ordermodel->Delete_where('order',array('id' => $id));
		$this->ordermodel->Delete_where('order_item',array('order_id'=>$id));
        }
	public function delete($id){
		if (is_numeric($id)) {
			$this->ordermodel->Delete_where('order',array('id' => $id));
			$this->ordermodel->Delete_where('order_item',array('order_id'=>$id));
			$this->session->set_flashdata("mess", "Xóa thành công!");
			redirect($_SERVER['HTTP_REFERER']);
		} else return false;
	}

    /**
     * update status order
     * @return bool
     */
    public function update_order_status(){
        $id=$this->input->post('item');
        $rs=array();
        $rs['check']=false;
        $rs['status']='';

        $this->ordermodel->Update_where('order', array('id' => $id),array('status'=>$this->input->post('value')));

        $rs['check']=true;
        if($this->input->post('value')==1){
            $rs['status']='Hoàn thành';
            $rs['color']='success';
        }
        if($this->input->post('value')==2){
            $rs['status']='Đã hủy';
            $rs['color']='danger';
        }
        if($this->input->post('value')==0){
            $rs['status']='Chờ duyệt';
            $rs['color']='primary';
        }
        echo  json_encode($rs);
    }
	// popup hien thị don hang
	public function popupdata()
    {

        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id   = $_GET['id'];
            $data['detail'] = $item = $this->ordermodel->getFirstRowWhere('order', array('id' => $id));
			$data['id']='id';
			$data['detail_order'] = $this->ordermodel->get_data('order_item',array(
			'order_id' => $id
			),array('id' => 'desc'));
			$this->load->view('admin/modal/view_order',$data);
          //json_encode($rs);
        }
    }
// danh sach ma giam gia
    public function listSale()
    {
        $data['list'] = $this->ordermodel->get_data('code_sale',array());
        $data['headerTitle'] = 'Danh mục sản phẩm';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/products/product_sale/list', $data);
        $this->load->view('admin/footer');
    }
// them ma giam gia
public function addSale($id_edit=null)
    {
        $data['btn_name']='Thêm';
        if($id_edit!=null){
            $data['edit']=$this->ordermodel->get_data('code_sale',array('id'=>$id_edit),array(),true);
            $data['btn_name']='Cập nhật';
        }
        if (isset($_POST['addnews'])) {
            $arr = array(
                'name' => $this->input->post('name'),
                'code' => $this->input->post('code'),
                'price' => $this->input->post('price'),
            );
            if (!empty($_POST['edit'])){
                $id = $this->ordermodel->Update_where('code_sale', array('id'=>$id_edit), $arr);
                $this->session->set_flashdata("mess", "Cập nhật thành công!");
            } else {
                $id = $this->ordermodel->Add('code_sale', $arr);
                $this->session->set_flashdata("mess", "Thêm mới thành công!");
            }
            redirect(base_url('uetadmin/product_sale/listSale'));
        }

        $data['headerTitle'] = $data['btn_name']." mã giảm giá";
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/products/product_sale/add', $data);
        $this->load->view('admin/footer');
    }
    public function editsale($id){
        $this->addSale($id);
    }
    public function deletes_list(){
        $ids = $this->input->post('checkone');
        foreach($ids as $id)
        {
            $this->del_once_sale($id);
        }
        $this->session->set_flashdata("mess", "Xóa thành công!");
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function del_once_sale($id){
        $this->ordermodel->Delete_where('code_sale',array('id' => $id));
    }
    public function deletesale($id)
    {
        if (is_numeric($id)&&$id>1) {
            $this->del_once_sale($id);
            $this->session->set_flashdata("mess", "Xóa mã giảm giá thành công!");
            $_SESSION['mess']='Xóa danh mục thành công!';
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
// quan ly phi van chuyen ship

    public function listProvince()
    {
        $data['list'] = $this->ordermodel->get_data('province',array(
        ),array('sort' => 'desc'));
        $data['headerTitle'] = 'Quản lý phí vận chuyển ship';
        $this->LoadHeaderAdmin($data);
        $this->load->view('admin/province/list', $data);
        $this->load->view('admin/footer');
    }
}