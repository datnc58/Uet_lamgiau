<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('cartmodel');
        /*$this->load->library('cart');*/
    }
    public function add(){
        if($this->input->post('form_key') && $this->input->post('form_key') == $this->session->userdata('keyform'))
        {
            $id = trim($this->input->post('product'));
            $item = $this->cartmodel->getFirstRowWhere('product',array(
                'id' => $id
            ));
            if($this->input->post('qty')){
                $qty = $this->input->post('qty');
            }else{
                $qty = 1;
            }
            $arr = array();
            if(!empty($item)){
                $arr = array(
                    'id' => $id,
                    'qty' => $qty,
                    'price_old'   => $item->price,
                    'price'   => $item->price_sale,
                    'name'    => $item->name,
                    'alias'   => $item->alias,
                    'image'   => $item->image,
                    'pro_dir' => $item->pro_dir,
                );
                $this->cart->insert($arr);
            }else{
                return false;
            }
        }else{
            return false;
            redirect($_SERVER['HTTP_REFERER']);
        }

        redirect(base_url('gio-hang'));
    }
    public function checkout()
    {
        $data = array();
        $seo = array(
            'title' => 'Giỏ hàng'
        );
        $data['form_key'] = $keyform = rand();
        $this->session->set_userdata('form_key',$keyform);
        $data['items'] = $this->cart->contents();
        $data['ships'] = $this->cartmodel->get_data('shipping',null);
        //echo "<pre>";var_dump($data['items']) ;die();
        $this->LoadHeader('common/cat_header',$seo,false);
        $this->load->view('carts/view_checkout',$data);
        $this->LoadFooter();
    }

    public function update()
    {
        // Get the total number of items in cart
        if($this->input->post('form_key') && $this->input->post('form_key') == $this->session->userdata('form_key'))
        {
            $total = $this->cart->total_items();

            // Retrieve the posted information
            $item = $this->input->post('rowid');
            $qty = $this->input->post('qty');

            // Cycle true all items and update them
            for($i=0;$i < $total;$i++)
            {
                // Create an array with the products rowid's and quantities.
                $data = array(
                    'rowid' => @$item[$i],
                    'qty'   => @$qty[$i]
                );

                // Update the cart with the new information
                $this->cart->update($data);
            }
        }
        return redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteone()
    {
        $rowid = (string) $this->input->get('id');
        if($rowid != null){
            $data = array(
                'rowid' => @$rowid,
                'qty'   => 0
            );
            //echo "<pre>";var_dump($data);die();
            // Update the cart with the new information
            $this->cart->update($data);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function deleteAll()
    {
        $this->cart->destroy();
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function checkCode(){
        $code = trim($this->input->post('code'));
        $item = $this->cartmodel->getFirstRowWhere('code_sale',array(
            'code' => $code
        ));
        $mss = "Mã đơn hàng không đúng";
        $check = false;
        if(!empty($item)){
            $check = true;
            $data['price_code'] = $item->price.'%';
            $data['total'] = number_format($this->cart->total() - $this->cart->total() * ($item->price/100)) . 'đ';
            $mss = "Chúc mừng bạn";
        }
        $data['mess'] = $mss;
        $data['check'] = $check;
        echo json_encode($data);
    }
    //check ma giam gia
    public function checkCoupon(){
        $code = trim($_POST['code']);
        $item = $this->cartmodel->getFirstRowWhere('code_sale',array(
            'code' => $code
        ));
        $check = false;
        if(!empty($item)){
            $check = true;
            $data['coupon_price'] = $item->price;
            $this->session->set_userData('coupon',$data['coupon_price']);
        }
        $data['check'] = $check;
        echo json_encode($data);
    }
    public function order(){
        $data = array();
        $data['items'] = $this->cart->contents();
        if(count($data['items']) < 1){
            redirect(base_url('cart/cartEmpty'));
        }

        $pay_ship = '';$coupon='';
        $pay_ship = (int) @$_POST['shipping'];
        $coupon = (int) @$_POST['coupon'];
        $sub_total = (int) @$_POST['subtotal'];
        if($this->input->post('shipping')){
            $this->session->set_userData('payship',$this->input->post('shipping'));
        }
        if($this->input->post('coupon')){
            $this->session->set_userData('coupon',$this->input->post('coupon'));
        }
        if($this->input->post('subtotal')){
            $this->session->set_userData('subtotal',$this->input->post('subtotal'));
        }
        if($this->session->userData('coupon') == 0){
            $total = $this->session->userData('subtotal') + $this->session->userData('payship');
        }else{
            $total = $this->session->userData('subtotal') - ($this->session->userData('subtotal') + $this->session->userData('payship'))*$this->session->userData('coupon') / 100;
        }
        $this->session->set_userData('total',$total);
        $this->session->set_userData('total',$total);
        $data['payship'] = $this->session->userData('payship');
        $data['coupon'] = $this->session->userData('coupon');
        $data['subtotal'] = $this->session->userData('subtotal');
        $data['total'] = $this->session->userData('total');
        $data['items'] = $this->cart->contents();
        $dataUser = $this->session->userData('userData');
        $data['user'] = $this->cartmodel->getFirstRowWhere('users',array(
            'email' => $dataUser['email'],
            'oauth_provider' => $dataUser['oauth_provider']
        ));
        $data['form_key'] = $keyform = rand();
        $data['tinh'] =  $this->f_homemodel->get_data('province',null,null);
        $this->session->set_userdata('tokenkey',$keyform);

        $seo = array(
            'title' => 'Cart info'
        );
        $this->LoadHeader('common/cat_header',$seo,false);
        $this->load->view('carts/view_order',$data);
        $this->LoadFooter();
    }
    public function payment()
    {
        $data = array();
        $data['payship'] = $this->session->userData('payship');
        $data['coupon'] = $this->session->userData('coupon');
        $data['subtotal'] = $this->session->userData('subtotal');
        $data['total'] = $this->session->userData('total');
        $this->session->set_userData('user_name',$this->input->post('fullname'));
        $this->session->set_userData('phone',$this->input->post('phone'));
        $this->session->set_userData('email',$this->input->post('email'));
        $this->session->set_userData('address',$this->input->post('address'));
        $data['items'] = $this->cart->contents();
        $data['form_key'] = $keyform = rand();
        $this->session->set_userData('tokenkey',$keyform);
        $seo = array(
            'title' => 'Payment'
        );
        $this->LoadHeader('common/cat_header',$seo,false);
        $this->load->view('carts/payment',$data);
        $this->LoadFooter();
    }
    public function sendOnpage()
    {
        if($this->input->post('token') !='' && $this->input->post('token') == $this->session->userdata('tokenkey'))
        {
            $user = $this->session->userdata('userData');
            $user_info = $this->cartmodel->getFirstRowWhere('users',array(
                'oauth_provider' => @$user['oauth_provider'],
                'email' => @$user['email'],
            ));
            $carts = $this->cart->contents();
            $payment = '';
            if($this->input->post('payment') == 1){
                $payment = "Thanh toán tiền mặt khi nhận hàng.";
            }elseif($this->input->post('payment') == 2){
                $payment = "Nhận hàng và thanh toán tại GIME";
            }else{
                $payment = "Chuyển khoản qua máy ATM & Ngân hàng";
            }
            $arr = array(
                'fullname' => $this->input->post('fullname'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'price_ship' => $this->session->userData('payship'),
                'startplaces' => $payment,
                'time' => time(),
                'user_id' => @$user_info->id,
            );

            $id=$this->cartmodel->Add('order',$arr);
            if($id)
            {
                foreach ($carts as $v) {
                    $detai_order=array(
                        'order_id' => $id,
                        'item_id' => $v['id'],
                        'count' => $v['qty'],
                        'price' => $v['price'],
                        'size' => $v['size'],
                    );
                    $id_order_item=$this->cartmodel->Add('order_item',$detai_order);
                }
                $code = 'DH_'.date('d').$id;
                $this->cartmodel->Update_where('order',array(
                        'id' => $id
                    ),
                    array(
                        'code' => $code
                    )
                );

                $htm = '<table width="100%" border="1" cellpadding="0" cellspacing="0"><thead><tr><td>Stt</td><td>Tên sản phẩm</td>
                <td width="20%">Ảnh</td><td>Số lượng</td><td>Đơn giá(vnđ)</td><td>Thành tiền(vnđ)</td></tr></thead><tbody>';
                $subtotal = 0;
                $total = 0;
                $stt = 0;
                foreach($carts as $key => $tcat){
                    $stt ++;
                    $subtotal = $tcat['price']*$tcat['qty'];
                    $total +=$subtotal;
                    $htm .='<tr>';
                    $htm .='<td>'.($stt).'</td>';
                    $htm .='<td>'.$tcat['name'].'</td>';
                    $htm .='<td><img src="'.base_url('upload/img/products/'.$tcat['pro_dir'].'/thumbnail_2_'.$tcat['image']).'" width="100%">'.'</td>';
                    $htm .='<td>'.$tcat['qty'].'</td>';
                    $htm .='<td>'.number_format($tcat['price']).'</td>';
                    $htm .='<td>'.number_format($tcat['price']*$tcat['qty']).'</td>';
                    $htm .='</tr>';
                }
                $htm .='<tr><td colspan="5" align="right">Phí vận chuyển là:</td><td>'.number_format(@$this->session->userData('payship')).'&nbsp;vnđ</td></tr>';
                $htm .='<tr><td colspan="5" align="right">Tổng tiền thanh toán là:</td>'.number_format(@$this->session->userData('total')).'&nbsp;vnđ</tr>';
                $htm .='</tbody>';
                $htm .='</table>';
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

                $subject = $this->option->site_name.' - Thông tin đặt hàng';
                $img ='<p><img src="'.base_url(@$this->option->site_logo).'" alt=""/></p>';
                $img_footer ='<p style="float: right" class="pull-right"><img src="'.base_url(@$this->option->site_logo).'" alt=""/></p>';

                $message = '';
                $message .= $img;
                $message .= '<p><h2 style="color: green">EMAIL XÁC NHẬN ĐƠN HÀNG !</h2></p>';
                $message .='<p>Kính chào &nbsp;'.$this->session->userData('user_name').',<p>';
                $message .='<p>'.@$this->option->site_name.' đã nhận được đơn đặt hàng của Qúy khách:<p></br>';

                $message .='<b>Thông tin người mua hàng:</b></br>';
                $message .='<p>Họ tên:'.$this->input->post('full_name').'<p></br>';
                $message .='<p>Điện thoại:'.$this->input->post('telephone').'<p></br>';
                $message .='<b>Thông tin người nhận hàng:</b></br>';
                $message .='<p>Họ tên:'.$this->session->userData('user_name').'<p></br>';
                $message .='<p>Điện thoại:'.$this->session->userData('phone').'<p></br>';
                $message .='<p>Địa chỉ nhận hàng:'.$this->session->userData('address').'<p></br>';

                $message .='<p>Quí khách vui lòng thanh toán <span style="color:red">'.number_format(@$this->session->userData('total')).'vnđ</span>&nbsp;khi nhận hàng.</p>';
                $message .= '<p><b>Mã đơn hàng: </b>'.$code.'</p>';
                $message .='<p>Tình trạng : Chưa thanh toán.</p>';
                $message .='<p><strong>Hình thức thanh toán : </strong>'.$payment.'</p>';
                $message .='<p><b>Chi tiết đơn hàng :</b></p>';
                $message .=$htm;
                $message .='<p style="border: 1px solid #e7d17a;padding: 8px">Ngoài hình thức thanh toán và giao hàng tận nơi, Quí khách có thể đến văn
                    phòng giao dịch của '.@$this->option->site_name.' tại Hà Nội để thanh toán<br>';
                $message .=$this->option->address.'</p>';
                $message .='<p>Nếu quí khách cần hỗ trợ, vui lòng gọi <span style="color:red">'.@$this->option->hotline1.'</span> hoặc gửi đến mail :'.@$this->option->site_email.'</p>';
                $message .='<p>Cảm ơn quí khách đã mua sắm trên '.@$this->option->site_name.'</p>';
                $message .='<p><br><br><br>(<span style="color:red">*</span>)Đây là mail hệ thống tự động gửi, vui lòng không trả lời (Reply) lại mail này.</p>';
                $message .=$img_footer;
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
                $this->email->from($this->config->item('from_mail'), $this->config->item('from_u'));
                $receiver_email = $this->session->userData('email');

                $this->email->to($receiver_email); // change it to yours
                $this->email->subject($subject);
                $this->email->message($body);
                if ($this->email->send()) {
                    $this->session->unset_userdata('total');
                    $this->session->unset_userdata('user_name');
                    $this->session->unset_userdata('address');
                    $this->session->unset_userdata('phone');
                    $this->session->unset_userdata('email');
                    $this->session->unset_userdata('payship');
                    //unset cart
                    $this->cart->destroy();
                    $this->session->set_userData('mess','Chúc mừng bạn đã gửi đơn hàng thành công!');
                    redirect(base_url());
                } else {
                    $this->session->set_userData('mess','Chúc mừng bạn đã gửi đơn hàng thành công!');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            }
        }
        else{
            die('here');
            return false;
        }
    }
    public function addCart(){
        if($this->input->post('form_key') && $this->input->post('form_key') == $this->session->userdata('keyform'))
        {
            $id = trim($this->input->post('product'));
            $item = $this->cartmodel->getFirstRowWhere('product',array(
                'id' => $id
            ));
            $arr = array();
            if(!empty($item)){
                $arr = array(
                    'id' => $id,
                    'qty' => 1,
                    'price'   => $item->price_sale,
                    'name'    => $item->name,
                    'alias'   => $item->alias,
                    'image'   => $item->image,
                    'pro_dir' => $item->pro_dir,
                    'size' => $this->input->post('super_attribute'),
                );
                $this->cart->insert($arr);
                $this->session->set_userData('mess','Sản phẩm đã được cho vào giỏ hàng !');
            }else{
                return false;
            }
        }else{
            return false;
            redirect($_SERVER['HTTP_REFERER']);
        }

        redirect($_SERVER['HTTP_REFERER']);
    }
    public function cartEmpty(){
        $data = array();
        $seo = array(
            'title' => 'Cart info'
        );
        $this->LoadHeader('common/cat_header',$seo,false);
        $this->load->view('carts/cart_empty',$data);
        $this->LoadFooter();
    }
    public function updateQuantity()
    {
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $total = $this->cart->total_items();

        $data = array(
            'rowid' => $item,
            'qty'   => $qty
        );
        $this->cart->update($data);
        $data['check'] = true;
        sleep(1);
        $data['items'] = $this->cart->contents();
        $this->load->view('carts/update_cart',$data);
    }

    public function displayCart(){
        /*$item = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $total = $this->cart->total_items();

        $data = array(
            'rowid' => $item,
            'qty'   => $qty
        );
        $this->cart->update($data);
        $data['check'] = true;*/
        $data['items'] = $this->cart->contents();
        $this->load->view('carts/view_displaycart',$data);
    }
    public function addCartItemSelect()
    {
        $data = array();
        $qty = $this->input->post('qty');
        $id = $this->input->post('id');
        $pro = $this->cartmodel->getFirstRowWhere('product',array(
            'id' => $id
        ));
        $arr = array();
        if($this->cart->contents()){
            foreach ($this->cart->contents() as $item){
                if ($item['id']==$id){
                    $arr = array('rowid'=>$item['rowid'],
                        'qty'=>++$item['qty']);
                    $this->cart->update($arr);
                }
                else{
                    $arr = array(
                        'id' => $id,
                        'qty' => $qty,
                        'price_old'   => $pro->price,
                        'price'   => $pro->price_sale,
                        'name'    => $pro->name,
                        'alias'   => $pro->alias,
                        'image'   => $pro->image,
                        'pro_dir' => $pro->pro_dir,
                    );
                    $this->cart->insert($arr);
                }
            }
        }else{
            $arr = array(
                'id' => $id,
                'qty' => $qty,
                'price_old'   => $pro->price,
                'price'   => $pro->price_sale,
                'name'    => $pro->name,
                'alias'   => $pro->alias,
                'image'   => $pro->image,
                'pro_dir' => $pro->pro_dir,
            );
            $this->cart->insert($arr);
        }
        $data['items'] = $this->cart->contents();
        sleep(1);
        $this->load->view('carts/view_listcart',$data);
    }
    public function updateQuantityP()
    {
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $total = $this->cart->total_items();

        $data = array(
            'rowid' => $item,
            'qty'   => $qty
        );
        $this->cart->update($data);
        $data['check'] = true;
        sleep(1);
        $data['items'] = $this->cart->contents();
        $this->load->view('carts/update_cartp',$data);
    }
}
