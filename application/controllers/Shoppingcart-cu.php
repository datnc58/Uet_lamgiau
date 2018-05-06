<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shoppingcart extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('cartmodel');
        $this->load->model('f_shoppingcartmodel');
        //$this->load->library("session");
        //$this->load->helper('text');
//        $config['sess_use_database'] = TRUE;
//        session_start();
    }
    //index
    public  function order_payment(){
        $this->load->helper('model_helper');
        if(isset($_POST['sendcart'])){

            $arr=array(
                'fullname' => $this->input->post('fullname'),
                'address' => $this->input->post('address'),
                'user_id' => $this->input->post('user_id'),
                'total_price' => $this->input->post('total_price'),
                'code_sale' => $this->input->post('code_sale_all'),
                'price_ship' => $this->input->post('price_ship'),
                'province' => $this->input->post('province'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'note' => $this->input->post('note'),
                'time' => time(),
                'user_id' => $this->session->userdata('userid'),
            );

            $id=$this->f_shoppingcartmodel->Add('order',$arr);
            if($id)
            {
                $code = 'DH_'.date('d').$id;
                $this->f_shoppingcartmodel->Update_where('order',array('id' => $id ),array('code' => $code));
            }
            for($i=0; $i< sizeof($_POST['item_id']);$i++){
                $temp_item = $this->f_shoppingcartmodel->getFirstRowWhere('product',array('id'=>$_POST['item_id'][$i]));
                //pre($temp_item);
                $buyted = $temp_item->bought + 1;
                $detai_order=array(
                    'order_id'=>$id,
                    'item_id'=>$_POST['item_id'][$i],
                    'count'=>$_POST['count'][$i],
                    'price_sale'=>$_POST['price_sale'][$i],
                    't_option'=>$_POST['id_opt'][$i],
                     /*'size'=>$_POST['size'][$i],*/
                );
                $this->f_shoppingcartmodel->Update('product',$temp_item->id,array( 'bought' => $buyted ));
                $id_order_item=$this->f_shoppingcartmodel->Add('order_item',$detai_order);

            }


            if($id){
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


                @$province = $this->f_shoppingcartmodel->getFirstRowWhere('province',array('provinceid'=>$this->input->post('province')));
                @$district = $this->f_shoppingcartmodel->getFirstRowWhere('district',array('districtid'=>$this->input->post('district')));
                @$ward = $this->f_shoppingcartmodel->getFirstRowWhere('ward',array('wardid	'=>$this->input->post('ward')));
                $this->load->library('email', @$config);
                $htm = '<table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#caf6ea">
                            <thead>
                            <tr style="background:#92ddc9">
                                <td>Stt</td>
                                <td>Tên sản phẩm</td>
                                <td>Thông tin sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Đơn giá(vnđ)</td>
                                <td>Thành tiền(vnđ)</td>
                            </tr>
                            </thead>
                            <tbody>';
                $subtotal = 0;
                $totals = 0;
                $tongtien = 0;
                $stt = 0;
                foreach($_SESSION['cart'] as $key => $tcat){
                    $stt ++;
                    $subtotal = $tcat['price_sale']*$tcat['qty'];
                    $code_sale = $this->input->post('code_sale_all');
                    $price_ship = $this->input->post('price_ship');
                    $total_sale= $subtotal*$code_sale/100;

                    $tongtien += $subtotal-$total_sale;
                    $totals += $subtotal-$total_sale ;
                    $htm .='<tr>';
                    $htm .='<td>'.($stt).'</td>';
                    $htm .='<td>'.$tcat['name'].'</td>';
                    $opt = $this->f_shoppingcartmodel->get_data('oc_option');
                    if(!empty($tcat['options'])){
                        $t_opt = explode(',',$tcat['options']);
                        $htm .= '<td>';
                        for($i = 0; $i < count($t_opt); $i++){
                            $temp[$i] = $this->f_shoppingcartmodel->getData('oc_option_value', array('id' => $t_opt[$i]));
                            foreach ($temp[$i] as $k => $v){
                                $temp[$i][$k]->opt_name = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option', array('option_id' => $v->option_id));
                                $temp[$i][$k]->value_name = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value_description', array('description_id' => $v->description_id));
                            }
                            foreach ($temp[$i] as $row){
                                $htm .= '<div>'.$row->opt_name->name;
                                if(!empty($row->value_name->color)){
                                    $htm .= '<div style="background: '.$row->value_name->color.'; width: 40px; height: 40px"></div>';
                                }
                                if(!empty($row->value_name->image)){
                                    if(!empty($row->value_name->pro_dir)){
                                        $htm .= '<img width="40" height="40" src="'.base_url('upload/img/products').'/'.$row->value_name->pro_dir.'/'.$row->value_name->image.'" />';
                                    }else{
                                        $htm .= '<img width="40" height="40"  src="'.public_url().$row->value_name->image.'" />';
                                    }
                                }
                                $htm .= '</div>';
                            }
                        }
                        $htm .= '</td>';
                    }else{
                        $htm .='<td>';
                        $htm .= 'Không có';
                        $htm .='</td>';
                    }
//                    $htm .=$tcat['color']=='0'?'':'<div style="padding: 0px 5px ; float: left">Màu:</div> <div style="background:'.$tcat['color'].';width: 20px; height:20px;float:left; border:1px #ddd solid "></div> ';
//                    $htm .=$tcat['size']=='0'?'':'<div style="padding: 0px 5px ; float: left">Size:</div> <div style="">'.$tcat['size'].'</div> ';

                    $htm .='<td>'.$tcat['qty'].'</td>';
                    $htm .='<td>'.number_format($tcat['price_sale']).'</td>';
                    $htm .='<td>'.number_format($tcat['price_sale']*$tcat['qty']).'</td>';
                    $htm .='</tr>';
                }

                $htm .='<tr><td colspan="6" align="right"><span style="color:red">Mã giảm giá: -'.$this->input->post('code_sale_all').'%</span></td></tr>';
                $htm .='<tr><td colspan="6" align="right"><span style="color:red">Tổng tiền đơn hàng:'.number_format($tongtien).'&nbsp;vnđ</span></td></tr>';
                $htm .='<tr><td colspan="6" align="right"><span style="color:red">Phí vận chuyển:'.number_format($price_ship).'&nbsp;vnđ</span></td></tr>';
                $htm .='<tr><td colspan="6" align="right"><span style="color:red">Tổng tiền thanh toán là:'.number_format($totals + $this->input->post('price_ship')).'&nbsp;vnđ</span></td></tr>';
                $htm .='</tbody>';
                $htm .='</table>';

                $subject = $this->option->site_name.' - Thông tin mặt hàng';
                $img ='<p><img src="'.base_url($this->option->site_logo).'" alt=""/></p>';
                $img_footer ='<p style="float: right" class="pull-right"><img src="'.base_url($this->option->site_logo).'" alt=""/></p>';

                $message = '';
                $message .= $img;
                $message .= '<p><h2 style="color: green">EMAIL XÁC NHẬN ĐƠN HÀNG !</h2></p>';
                $message .='<p>Kính chào &nbsp;'.$this->input->post('fullname').',<p>';
                $message .='<p>Chúng tôi đã nhận được đơn đặt hàng của bạn:<p></br>';

                $message .='<b>Thông tin khách hàng:</b></br>';
                $message .='<p>Họ tên:'.$this->input->post('fullname').'<p></br>';
                $message .='<p>Điện thoại:'.$this->input->post('phone').'<p></br>';
                $message .='<p>Địa chỉ:'.$this->input->post('address').'<p></br>';

                $message .='<p>Quí khách vui lòng thanh toán <span style="color:red">'.number_format($totals + $this->input->post('price_ship')).'vn đ</span>&nbsp;khi nhận hàng.</p>';
                $message .= '<p><b>Mã mua hàng: </b>'.$code.'</p>';
                $message .='<p>Tình trạng : Chưa thanh toán.</p>';
                $message .='<p><b>Chi tiết đơn hàng :</b></p>';
                $message .=$htm;

                $message .='<br>Địa chỉ :&nbsp;&nbsp;'.$this->input->post('address').',&nbsp;'.@$ward->name.',&nbsp;'.@$district->name.'</p>';
                $message .='<p style="border: 1px solid #e7d17a;padding: 8px">Hình thức thanh toán và giao hàng tại nơi<br>';
                $message .=$this->option->address.'</p>';
                $message .='<p>Nếu quí khách cần hỗ trợ, vui lòng gửi <span style="color:red">'.$this->option->hotline1.'</span> hoặc gửi mail :'.$this->site_email.'</p>';
                $message .='<p>Cảm ơn quí khách dã mua sản trên website</p>';
                $message .='<p><br><br><br>(<span style="color:red">*</span>)Đây là mail hệ thống tự động gửi, vui lòng không trả lời (Reply) mail này.</p>';
                $message .=$img_footer;
                // Get full html:
                $body ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

                $receiver_email = $this->input->post('email').','.$this->option->site_email.',daibkz@gmail.com';

                $this->email->to($receiver_email); // change it to yours
                $this->email->subject($subject);
                $this->email->message($body);
                $this->email->send();
//                $headers = "MIME-Version: 1.0" . "\r\n";
//                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
//                $headers .= 'From: <'.$this->site_email.'>' . "\r\n";
                /*$headers .= 'Cc: myboss@example.com' . "\r\n";*/
//                mail($this->input->post('email'), "$subject", $body,$headers);
//                mail(''.$this->site_email.'', "$subject", $body,$headers);
                $this->session->set_flashdata("message", "Bạn đã dặt hàng thành công");

                if(isset($_SESSION['cart'])){
                    unset($_SESSION['cart']);
                }
            }
            redirect(base_url('thanh-toan-dat-hang'));
            if(isset($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
        }

        $data['cart'] = @$_SESSION['cart'];
        $count        = 0;
        $total        = 0;
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
        }
        //get oc_option(name)
        foreach ($data['cart'] as $k=>$v)
        {
            if(!empty($v['options']))
            {
                $val = explode(',', $v['options']);
                for($i = 0; $i < count($val); $i++){
                    $tem = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value', array('id' => $val[$i]));
                    $data['cart'][$k]['opt_'.$i] = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option', array('option_id'=>$tem->option_id));
                    $data['cart'][$k]['value_'.$i] = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value_description', array('description_id'=>$tem->description_id));
                }
            }
        }
        //pre($data['cart']);
        $data['count'] = $count;
        $data['total'] = $total;
        $data['fullname'] = $this->session->userdata('fullname');
        $data['user_mail'] = $this->session->userdata('usermail');
        $data['shipping'] =  $this->f_shoppingcartmodel->GetData('shipping');
        $data['province'] =  $this->f_shoppingcartmodel->GetData('province',null,null);
        $data['product_cats']=$this->f_shoppingcartmodel->get_data('product_category',array('home' => 1));
        $data['last_news']=$this->f_shoppingcartmodel->get_data('news',array(),array('id'=>1),4 );

        if(!empty($data['user']->province))
        {
            $data['district'] = $this->f_homemodel->Get_where('district',array(
                'provinceid' => $data['user']->province
            ));
        }
        if(!empty($data['user']->district))
        {
            $data['ward'] = $this->f_homemodel->Get_where('ward',array(
                'districtid' => $data['user']->district
            ));
        }
        $data['user_item'] =  $this->f_shoppingcartmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));
        $seo=array(
            'title'=>'Thanh toán đặt hàng',
            'description'=>'Thanh toán đặt hàng',
            'keyword'=>'Thanh toán đặt hàng',
            'type'=>'products'
            );
        $this->LoadHeader(null,$seo,false);
        $this->load->view('carts/order_payment',$data);
        $this->LoadFooter();
    }
    public function check_out()
    {
        $this->load->helper('model_helper');

        if(isset($_POST['sendcart'])){

            $arr=array(
                'fullname' => $this->input->post('fullname'),
                'address' => $this->input->post('address'),
                'user_id' => $this->input->post('user_id'),
                'price_ship' => $this->input->post('price_ship'),
                'code_sale' => $this->input->post('code_sale_all'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'note' => $this->input->post('note'),
                'ad_note2' => $this->input->post('ad_note2'),
                'total_price' => $this->input->post('total_price'),
                'time' => time(),
            );

            $id=$this->f_shoppingcartmodel->Add('order',$arr);
            if($id)
            {

                $code = 'DH_'.date('d').$id;
                $this->f_shoppingcartmodel->Update_where('order',array('id' => $id),array('code' => $code));

            }
            for($i=0; $i< sizeof($_POST['item_id']);$i++){
                $temp_item = $this->f_shoppingcartmodel->getFirstRowWhere('product',array('id'=>$_POST['item_id'][$i]));
                $buyted = $temp_item->bought + 1;
                $detai_order=array(
                    'order_id'=>$id,
                    'item_id'=>$_POST['item_id'][$i],
                    'count'=>$_POST['count'][$i],
                    'price_sale'=>$_POST['price_sale'][$i],
                    /* 'color'=>$_POST['color'][$i],
                     'size'=>$_POST['size'][$i],*/
                );
                $this->f_shoppingcartmodel->Update('product',$temp_item->id,array(
                    'bought' => $buyted
                ));
                $id_order_item=$this->f_shoppingcartmodel->Add('order_item',$detai_order);

                if($id_order_item){
                    $config = Array(
                        'protocol'  => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_port' => 465,
                        'smtp_user' => 'trantrung129@vnnetsoft.com', // change it to yours
                        'smtp_pass' => 'trungtrung129@@', // change it to yours
                        'mailtype'  => 'html',
                        'charset'   => 'utf-8',
                        'wordwrap'  => TRUE
                    );
                    $this->load->library('email', $config);

                    $subject = 'Thông tin liên hệ - '.'order_id';
                    $message = '<p>Thông tin c?a khách hàng liên h? nh? sau:</p>';
                    $message .='<p>Họ và tên :'.'item_id'.',<p>';
                    $message .='<p>Số điện thoại :'.'count'.'</p>';
                    $message .='<p>Email :'.'price_sale'.'</p>';

                    $message .='<p>Nội dung :'.$this->input->post('comment').'</p>';
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
                    $this->email->from($this->input->post('email'),$this->input->post('full_name')); // change it to yours
                    $this->email->to('toannguyentqvn@gmail.com'); // change it to yours
                    $this->email->subject($subject);
                    $this->email->message($body);
                    $this->email->send();
                    $_SESSION['message']="Bạn đã gửi thông tin thành công!!!";
                }
            }
            unset($_SESSION['cart']);
            redirect(base_url('thanh-toan-dat-hang'));
        }

        $data['cart'] = @$_SESSION['cart'];
        $count        = 0;
        $total        = 0;
		
        if(isset($_SESSION['cart'])){
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
        }
		
        foreach($data['cart'] as $key => $row){
            $val = $row['options'];
            $val = explode(',', $val);
            $count = count($val);
            $data['cart'][$key]['cout'] = $count;
            for($i = 0; $i < $count; $i++){
                $data['cart'][$key]['v_'.$i] = $this->f_shoppingcartmodel->getDataValue($val[$i]);
                foreach($data['cart'][$key]['v_'.$i] as $k => $v){
                    $data['cart'][$key]['v_'.$i][$k]->opt = $this->f_shoppingcartmodel->getNameOption($v->option_id);
                    $data['cart'][$key]['v_'.$i][$k]->value = $this->f_shoppingcartmodel->getNameValue($v->description_id);
                }
            }
        }
        //pre($data['cart']);

        $data['count'] = $count;
        $data['total'] = $total;
        //$data['fullname'] = $this->session->userdata('fullname');
       // $data['user_mail'] = $this->session->userdata('usermail');
       // $data['shipping'] =  $this->f_shoppingcartmodel->getFirstRowWhere('site_option');
       // $data['user'] =  $this->f_shoppingcartmodel->getFirstRowWhere('users',array('id'=>$this->session->userdata('userid')));
       // var_dump($_SESSION['cart']);die;
		//$data['province'] =  $this->f_shoppingcartmodel->get_data('province');
       // $data['shipping'] =  $this->f_shoppingcartmodel->getFirstRowWhere('site_option');
       // $data['places'] = $this->f_shoppingcartmodel->get_data('places', array(), array(), null);
       // $data['product_cats']=$this->f_shoppingcartmodel->get_data('product_category',array('home' => 1));
        //$data['last_news']=$this->f_shoppingcartmodel->get_data('news',array(),array('id'=>1),4 );
        //$data['total_price'] = @$_SESSION['total_price'];
        // if(!empty($data['user']->province))
        // {
            // $data['district'] = $this->f_homemodel->Get_where('district',array(
                // 'provinceid' => $data['user']->province
            // ));
        // }
        // if(!empty($data['user']->district))
        // {
            // $data['ward'] = $this->f_homemodel->Get_where('ward',array(
                // 'districtid' => $data['user']->district
            // ));
        // }
        $seo=array(
            'title'=>'Giỏ hàng',
            'description'=>'Giỏ hàng',
            'keyword'=>'Giỏ hàng',
            'type'=>'products');

        //$this->LoadHeader($this->site_name, $this->site_keyword, $this->site_description);
        $this->LoadHeader(null,$seo,false);
		$this->load->view('carts/view_checkout',$data);
        $this->LoadFooter();
    }
    public function quickbuy()
    {
        if(isset($_POST['sendProfiler'])){
            $arr = array(
                'fullname' => $this->input->post('hoten'),
                'phone'    => $this->input->post('phone'),
                'email'  => $this->input->post('email'),
                'address'  => $this->input->post('address'),
                'user_id'  => $this->input->post('user_id'),
                'total_price'  => $this->input->post('total_price'),
                'note'     => $this->input->post('note'),
                'time' => time(),
            );
        }
        if($this->input->post('email') != ''){
            $id=$this->f_shoppingcartmodel->Add('order',$arr);
        }else{
            $_SESSION['messege']='Bạn vui lòng nhập thông tin!';
            redirect($_SERVER['HTTP_REFERER']);
        }


        if($id)
        {
            $code = 'DH_'.date('d').$id;
            $_SESSION['madonhang'] = $code;
            $this->f_shoppingcartmodel->Update_where('order',array('id' => $id ),array( 'code' => $code ));
            //var_dump($this->input->post('quantity'));die();
            $detai_order=array(
                'order_id'=>$id,
                'item_id'=> $this->input->post('pro_id'),
                'pro_name'=> $this->input->post('pro_name'),
                'count'=>  $this->input->post('quantity'),
                'price_sale'=>  $this->input->post('price_sale')
            );
            $id_order_item=$this->f_shoppingcartmodel->Add('order_item',$detai_order);


        }
//        redirect($_SERVER['HTTP_REFERER']);
        redirect(base_url('thanh-toan-dat-hang'));
    }
    public  function Payment(){
        $seo=array(
            'title'=>'đặt hàng thành công',
            'description'=>'đặt hàng thành công',
            'keyword'=>'đặt hàng thành công',
            'type'=>'products');
        $this->LoadHeader(null,$seo,false);
        $this->load->view('carts/success');
        $this->LoadFooter();
    }


    public function add_cart()
    {
        $id=$this->input->post('id');
//        $quantity=$this->input->post('quantity');
        $id = (int)$id;
        $row = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $id));
        //        print_r($row); die($id);
        //echo "<pre>";var_dump($row);die();
        $_SESSION['messege']='';
        $rs['status']=false;
        if (!empty($_SESSION['cart'])&&isset($_SESSION['cart'][$id])&&in_array($_SESSION['cart'][$id], $_SESSION['cart'])) {

            $old = ($_SESSION['cart'][$id]);

            $_SESSION['cart'][$id] = array(
                'rowid' => $id,
                'alias' => $row->alias,
                'name'  => $row->name,
                'qty'   => ($old['qty'] + 1),
                'price_sale' => $row->price_sale,
                'image' => $row->image,
            );
            $_SESSION['messege']='Sản phẩm đã cập nhật vào giỏ hàng của bạn!';
            $rs['status']=true;

        } else {
            $_SESSION['cart'][$id] = array(
                'rowid' => $id,
                'name'  => $row->name,
                'alias' => $row->alias,
                'qty'   => 1,
                'price_sale' => $row->price_sale,
                'image' => $row->image,
            );
            $_SESSION['messege']='sản phẩm đã thêm vào gio hàng!';
            $rs['status']=true;
        }
        $count = 0;
        $totalPrice = 0;
        foreach ($_SESSION['cart'] as $v) {
            $count += $v['qty'];
            $totalPrice += $v['qty']*$v['price_sale'];
        }
        $rs['count']      = $count;
        $rs['totalPrice'] = $totalPrice;
        $rs['mess']=$_SESSION['messege'];
        echo  json_encode($rs);
    }

    public function add_cart_pro()
    {
        $id=$this->input->post('id');
        $quantity=$this->input->post('quantity');
        $opt=$this->input->post('options');
        $tt=$this->input->post('tt');
        $opt = trim($opt, ',');
        $sum = explode(',',$opt);
        $count1 = count($sum);
        $id_color = crc32 ($id.$opt);
        $ids = md5($id.$opt);
        $id = (int)$id;
        $row = $this->f_shoppingcartmodel->getFirstRowWhere('product', array('id' => $id));
        $_SESSION['messege']='';
        $rs['status']=false;
        if (!empty($_SESSION['cart'])&&isset($_SESSION['cart'][$ids])&&in_array($_SESSION['cart'][$ids], $_SESSION['cart'])) {

            $old = ($_SESSION['cart'][$ids]);

            $_SESSION['cart'][$ids] = array(
                'rowid' => $id,
                'alias' => $row->alias,
                'id_color' => $id_color,
                'name'  => $row->name,
                'qty'   => ($old['qty'] + $quantity),
                'count_opt' => $count1,
                'price' => $row->price,
                'price_sale' => $row->price_sale,
                'pro_dir' =>$row->pro_dir,
                'image' => $row->image,
                'options' => $opt,
                'place' => $tt,
            );
            $_SESSION['messege']='Sản phẩm đã được cập nhật vào giỏ hàng!';
            $rs['status']=true;

        } else {
            $_SESSION['cart'][$ids] = array(
                'rowid' => $id,
                'name'  => $row->name,
                'alias' => $row->alias,
                'id_color' => $id_color,
                'qty'   => $quantity,
                'count_opt' => $count1,
                'price' => $row->price,
                'price_sale' => $row->price_sale,
                'pro_dir' =>$row->pro_dir,
                'image' => $row->image,
                'options' => $opt,
                'place' => $tt,
            );
            $_SESSION['messege']='Sản phẩm đã thêm vào giỏ hàng của bạn!';
            $rs['status']=true;
        }
        $count = 0;
        $totalPrice = 0;
        //pre($_SESSION['cart']);
        foreach ($_SESSION['cart'] as $v) {
            $count += $v['qty'];
            $totalPrice += $v['qty']*$v['price_sale'];
        }

        //$_SESSION['sum_car'] = $count;
        $rs['count']      = $count;
        $rs['totalPrice'] = $totalPrice;
        $rs['mess']=$_SESSION['messege'];

        echo  json_encode($rs);
    }



    //ajax

    public function update_cart()
    {
        if (isset($_POST['id']) && isset($_POST['qty'])) {
            $old = $_SESSION['cart'][$_POST['id']];
            $opt = explode(',', $old['options']);
            $count = count($opt);
            $new = array(
                'rowid' => $old['rowid'],
                'name'  => $old['name'],
                'alias' => $old['alias'],
                'qty'   => $_POST['qty'],
                'count_opt' => $count,
                'price_sale' => $old['price_sale'],
                'pro_dir' => $old['pro_dir'],
                'image' => $old['image'],
                'options' => $old['options'],
                'place' => $old['place']
            );
            $_SESSION['cart'][$_POST['id']] = $new;
            $count = 0;
            $total = 0;
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
            $data['count']      = $count;
            $data['total']      = $total;
            $data['item_price'] = $old['price_sale'];
            $data['item_total'] = $old['price_sale'] * $_POST['qty'];
		   echo json_encode($data);
        }


//            redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete()
    {
        $id = $this->input->get('id');
        unset($_SESSION['cart'][$id]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function destroy_cart()
    {
        if(isset($_SESSION['cart'])){
            unset($_SESSION['cart']);
        }
        redirect(base_url());
    }

    public function getdistric()
    {
        if (isset($_POST['id'])) {
            $list        = $this->f_shoppingcartmodel->Get_where('district', array('provinceid' => $_POST['id']));
            echo json_encode($list);
        }
    }

    public function getward()
    {
        if (isset($_POST['id'])) {
            $list        = $this->f_shoppingcartmodel->Get_where('ward', array('districtid' => $_POST['id']));
            echo json_encode($list);
        }
    }

    //Update shipping
    public function update_shipping()
    {
        if (isset($_POST['price_sale'])) {
            $price_ship = $_POST['price_sale'];
            $count = 0;
            $total = 0;
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total += ($v['qty'] * $v['price_sale']);
            }
            $_SESSION['shipping'] = $price_ship;
            $_SESSION['total_price'] = $total + $price_ship;
            $data['shipp'] = $price_ship;
            $data['total']      = $total + $price_ship;
            echo json_encode($data);
        }
        //            redirect($_SERVER['HTTP_REFERER']);
    }

    public function check_sale()
    {
        if (isset($_POST['code'])) {
            $data['check']=false;
            $item        = $this->f_shoppingcartmodel->getFirstRowWhere('code_sale', array('code' => $_POST['code']));
            if($item) {
                $data['check']=true;
                $data['item']=$item;
            }else{
                $data['check']=false;
            }
            echo json_encode($data);
        }
    }
    public function addCartItemSelect()
    {
        $data = array();
        $qty = $this->input->post('qty');
        $id = $this->input->post('id');
        $opt = $this->input->post('cars');
        $tt = $this->input->post('tt');
        $opt = trim($opt, ',');
        $sum = explode(',',$opt);
        $count1 = count($sum);
        $pro = $this->f_shoppingcartmodel->getFirstRowWhere('product',array(
            'id' => $id
        ));
        $id_color = crc32 ($id.$opt);
        $ids = md5($id.$opt);
        if($id_color<0){
            $id_color2=0-$id_color;
        }else{
            $id_color2=$id_color;
        }
        $arr = array();
        //pre($_SESSION['cart']);
        if (!empty($_SESSION['cart'])) {
            foreach($_SESSION['cart'] as $k => $item){
                $old = $_SESSION['cart'][$k];
                if ($item['id_color']==$id_color && $k == $ids){
                    $_SESSION['cart'][$k] = array(
                        'rowid' => $item['rowid'],
                        'alias' => $item['alias'],
                        'id_color' => $item['id_color'],
                        'name'  => $item['name'],
                        'qty'   => ($old['qty'] + $qty),
                        'count_opt' => $item['count_opt'],
                        'price' => $item['price'],
                        'price_sale' => $item['price_sale'],
                        'pro_dir' =>$item['pro_dir'],
                        'image' => $item['image'],
                        'options' => $item['options'],
                        'place' => $item['place'],
                    );
                }else{
                    //pre($_SESSION['cart']);
                    $_SESSION['cart'][$ids] = array(
                        'rowid' => $id,
                        'alias' => $pro->alias,
                        'id_color' => $id_color,
                        'name'  => $pro->name,
                        'qty'   =>  $qty,
                        'count_opt' => $count1,
                        'price' => $pro->price,
                        'price_sale' => $pro->price_sale,
                        'pro_dir' =>$pro->pro_dir,
                        'image' => $pro->image,
                        'options' => $opt,
                        'place' => $tt,
                    );
                }
            }
        }else{
            $_SESSION['cart'][$ids] = array(
                'rowid' => $id,
                'alias' => $pro->alias,
                'id_color' => $id_color,
                'name'  => $pro->name,
                'qty'   => $qty,
                'count_opt' => $count1,
                'price' => $pro->price,
                'price_sale' => $pro->price_sale,
                'pro_dir' =>$pro->pro_dir,
                'image' => $pro->image,
                'options' => $opt,
                'place' => $tt,
            );
        }
        $count = 0;
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }else{
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $qtyl = $v['qty'];
            }
        }
        $data['count'] = $count;
        $data['items'] = $_SESSION['cart'];
        $sum_price = 0;
        foreach($data['items'] as $k => $v){
            $temp = $v['options'];
            $total = 0;
            $temp = explode(',', $temp);
            if(!empty($temp)){
                for($i = 0; $i < count($temp); $i++){
                    $data['items'][$k]['name_v_'.$i] = $itemss = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value', array('id' => $temp[$i]));
                    if(!empty($itemss->method_price) && !empty($itemss->price)){
                        $method = $itemss->method_price;
                        switch($method){
                            case $method == '+':
                                $total += (int)$itemss->price;
                                break;
                            case $method == '-':
                                $total -= (int)$itemss->price;
                                break;
                            default:
                                $total +=0;
                                break;
                        }
                    }
                    if(!empty($itemss)){
                        $data['items'][$k]['name_des_'.$i] = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value_description', array('description_id' => $itemss->description_id));
                        $data['items'][$k]['name_opt_'.$i]  = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option', array('option_id' => $data['items'][$k]['name_des_'.$i]->option_id));
                    }
                }
            }

            $data['items'][$k]['tatol'] = $data['items'][$k]['qty']*($data['items'][$k]['price_sale'] + $total);
            $data['items'][$k]['mariwoa'] = $k;
            $sum_price += $data['items'][$k]['tatol'];
        }
        $data['sum_price'] = $sum_price;
        sleep(1);
        $this->load->view('carts/view_listcart',$data);
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
    public function updateQuantityP()
    {
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        unset($_SESSION['cart'][$item]);
        $data['check'] = true;
        sleep(1);
        $data['items'] = $_SESSION['cart'];
        $sum_price = 0;
        foreach($data['items'] as $k => $v){
            $temp = $v['options'];
            $total = 0;
            $temp = explode(',', $temp);
            if(!empty($temp)){
                for($i = 0; $i < count($temp); $i++){
                    $data['items'][$k]['name_v_'.$i] = $itemss = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value', array('id' => $temp[$i]));
                    if(!empty($itemss->method_price) && !empty($itemss->price)){
                        $method = $itemss->method_price;
                        switch($method){
                            case $method == '+':
                                $total += (int)$itemss->price;
                                break;
                            case $method == '-':
                                $total -= (int)$itemss->price;
                                break;
                            default:
                                $total +=0;
                                break;
                        }
                    }
                    if(!empty($itemss)){
                        $data['items'][$k]['name_des_'.$i] = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value_description', array('description_id' => $itemss->description_id));
                        $data['items'][$k]['name_opt_'.$i]  = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option', array('option_id' => $data['items'][$k]['name_des_'.$i]->option_id));
                    }
                }
            }

            $data['items'][$k]['tatol'] = $data['items'][$k]['qty']*($data['items'][$k]['price_sale'] + $total);
            $data['items'][$k]['mariwoa'] = $k;
            $sum_price += $data['items'][$k]['tatol'];
        }
        $data['sum_price'] = $sum_price;
        $count = 0;
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }else{
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $qtyl = $v['qty'];
            }
        }
        $data['count'] = $count;
        //pre($data['items']);
        $this->load->view('carts/update_cartp',$data);
    }
    public function updateNew()
    {
        $rowid = $this->input->post('rowid');
        $qty = $this->input->post('qty');
        $temp = $_SESSION['cart'][$rowid];
        if (!empty($_SESSION['cart'])&&isset($_SESSION['cart'][$rowid])&&in_array($_SESSION['cart'][$rowid], $_SESSION['cart']))
        {
            $_SESSION['cart'][$rowid] = array(
                'rowid' => $temp['rowid'],
                'alias' => $temp['alias'],
                'id_color' => $temp['alias'],
                'name'  => $temp['name'],
                'qty'   => $qty,
                'count_opt' => $temp['count_opt'],
                'price' => $temp['price'],
                'price_sale' => $temp['price_sale'],
                'pro_dir' =>$temp['pro_dir'],
                'image' => $temp['image'],
                'options' => $temp['options'],
                'place' => $temp['place'],
            );
        }
        $data['items'] = $_SESSION['cart'];
        $sum_price = 0;
        foreach($data['items'] as $k => $v){
            $temp = $v['options'];
            $total = 0;
            $temp = explode(',', $temp);
            if(!empty($temp)){
                for($i = 0; $i < count($temp); $i++){
                    $data['items'][$k]['name_v_'.$i] = $itemss = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value', array('id' => $temp[$i]));
                    if(!empty($itemss->method_price) && !empty($itemss->price)){
                        $method = $itemss->method_price;
                        switch($method){
                            case $method == '+':
                                $total += (int)$itemss->price;
                                break;
                            case $method == '-':
                                $total -= (int)$itemss->price;
                                break;
                            default:
                                $total +=0;
                                break;
                        }
                    }
                    if(!empty($itemss)){
                        $data['items'][$k]['name_des_'.$i] = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option_value_description', array('description_id' => $itemss->description_id));
                        $data['items'][$k]['name_opt_'.$i]  = $this->f_shoppingcartmodel->getFirstRowWhere('oc_option', array('option_id' => $data['items'][$k]['name_des_'.$i]->option_id));
                    }
                }
            }

            $data['items'][$k]['tatol'] = $data['items'][$k]['qty']*($data['items'][$k]['price_sale'] + $total);
            $data['items'][$k]['mariwoa'] = $k;
            $sum_price += $data['items'][$k]['tatol'];
        }
        $data['sum_price'] = $sum_price;
        $count = 0;
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart']=array();
        }else{
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $qtyl = $v['qty'];
            }
        }
        $data['count'] = $count;
        //pre($data['items']);
        $this->load->view('carts/update_cartp',$data);
    }
}