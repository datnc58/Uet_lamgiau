<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Description of MY_Model
 *
 * @author Tran Manh
 */
class MY_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
		$this->load->database('default', TRUE);
    }
	// lây nhieu trương du lieu trong 1 bang tra vê mang
    public function getField_array($table, $field,$where=null)
    {
        $this->db->select($field);
        if($where!=null){
            $this->db->where($where);
        }

        $q = $this->db->get($table);
        return $q->result_array();
    }


    public function getField_array2($table, $field,$where=null)
    {
        $this->db->select($field);
        if($where!=null){
            $this->db->where($where);
        }

        $q = $this->db->get($table);
        return $q->result_array();
    }
	// lây nhieu trương du lieu trong 1 bang có limit
    public function getFields($table,$field,$where=null,$order=array(),$limit=0,$offset=0)
    {
        $this->db->select($field);
        if($where!=null){
            $this->db->where($where);
        }
        if ($limit){
            if ($offset){
                $this->db->limit($limit,$offset);
            }else{
                $this->db->limit($limit);
            }
        }
        if(!empty($order)&&is_array($order)){
            foreach ($order as $field => $val){
                if ($val){
                    $this->db->order_by($field,$val);
                }else{
                    $this->db->order_by($field,'asc');
                }
            }
        }
        $q = $this->db->get($table);
        return $q->result();
    }
	// lây 1 trương hay nhieu trương du lieu trong 1 bang
    public function getField($table, $field,$where=null)
    {
        $this->db->select($field);
        if($where!=null){
            $this->db->where($where);
        }
        $q = $this->db->get($table);
        return $q->first_row();
    }
	// lay toan bo gia trị bảng với mảng điều kiện
    public function Get_where($table, $where_array)
    {
        if ($table && is_array($where_array)) {
            $this->db->where($where_array);
        } else {
            return false;
        }

        $q = $this->db->get($table);
        return $q->result();
    }

    // public function Get_where2($table, $where_array)
    // {
        // if ($table && is_array($where_array)) {
            // $this->db->where($where_array);
        // } else {
            // return false;
        // }

        // $q = $this->db->get($table);
        // return $q->row();
    // }
	// lay 1 ban ghi trong 1 bang co dieu kien
    public function getFirstRowWhere($table,$where=array())
    {
        if ($table && is_array($where)) {
            $this->db->where($where);
        } else {
            return false;
        }
		$this->db->order_by('id','desc');
        $q = $this->db->get($table);
        return $q->first_row();
    }
	// lay 1 ban ghi trong 1 bang khong co dieu kien
	 public function getFirstRow($table)
    {
        $q = $this->db->get($table);
        return $q->first_row();
    }
	// lay 1 ban ghi trong 1 bang co dieu kien random
    public function getFirstRowWhereRand($table,$where=array())
    {
        if ($table && is_array($where)) {
            $this->db->where($where);
        } else {
            return false;
        }
        $this->db->order_by('id','RANDOM');
        $q = $this->db->get($table);
        return $q->first_row();
    }
	// chọn trường gia tri cao nhat
    public function SelectMax($table, $col)
    {
        if (($table && $col)) {
            $this->db->select_max($col);

            return $this->db->get($table)->first_row()->$col;
        } else return false;
    }
	// thong ke truy tap tuan
    function get_last_week() {
        $results = array();
        $time = date('Y-m-d');
        $homnay = strtotime($time);
        $homqua = strtotime( date('Y-m-d',strtotime('-1 day')));
        $tuantruoc = strtotime( date('Y-m-d',strtotime('-7 day')));

        $query = $this->db->query('SELECT SUM(today) as today
            FROM thong_ke_online
            WHERE access_date >='.$tuantruoc.'
            AND access_date <= '.$homqua.'
            LIMIT 1');
        $row = $query->first_row();
        return $row;
    }
    // thong ke truy tap tuan
    function get_total_day() {
        $results = array();
        $time = date('Y-m-d');
        $homnay = strtotime($time);
        $homqua = strtotime( date('Y-m-d',strtotime('-1 day')));

        $query = $this->db->query('SELECT SUM(today) as today
            FROM thong_ke_online
            WHERE access_date <= '.$homnay.'');
        $row = $query->first_row();
        return $row;
    }
    // public function Getdata1($tablename,$where=array(),$order=array(),$getfirst=false,$limit=0,$offset=0){
        // $this->db->from($tablename);

        // if(is_array($where)&&!empty($where)){
            // $this->db->where($where);
        // }

        // if(!empty($order)&&is_array($order)){
            // foreach ($order as $field => $val){
                // if ($val){
                    // $this->db->order_by($field,'desc');
                // }else{
                    // $this->db->order_by($field,'asc');
                // }
            // }
        // }


        // if ($limit){
            // if ($offset){
                // $this->db->limit($limit,$offset);
            // }else{
                // $this->db->limit($limit);
            // }
        // }

        // if ($getfirst===true){
            // return $this->db->get()->first_row();
        // }else{
            // return $this->db->get()->result();
        // }
    // }
    // public function GetData($table, $where = null,$order=null, $limit = null, $offset = null)
    // {
        // if (is_array($where)) {
            // $this->db->where($where);
        // }

        // if ($limit || $offset) {
            // $this->db->limit($limit, $offset);
        // }
        // if (is_array($order)) {
            // $this->db->order_by($order[0],$order[1]);
        // }

        // $q = $this->db->get($table);
        // return $q->result();
    // }
    // public function GetData2($table, $where = null,$order=null, $limit = null, $offset = null)
    // {
        // if (!is_array($where)||$where==null) {
            // return array();
        // }
        // $this->db->like($where);
        // if ($limit || $offset) {
            // $this->db->limit($limit, $offset);
        // }
        // if (is_array($order)) {
            // $this->db->order_by($order[0],$order[1]);
        // }

        // $q = $this->db->get($table);
        // return $q->result();
    // }
    // public function getLikedPro($in){
        // if(is_array($in)){
            // $this->db->select('*');
            // $this->db->where_in('id',$in);
            // $n=$this->db->get('product');
            // return $n->result();
        // }else return array();

    // }
    // public function getLikedCate($in,$limit = null, $offset = null){
        // if(is_array($in)){
            // $this->db->select('*');
            // $this->db->where_in('id',$in);
            // if ($limit || $offset) {
            // $this->db->limit($limit, $offset);
        // }
            // $n=$this->db->get('product_category');
            // return $n->result();
        // }else return array();

    // }

    // public function getSlider_partners(){
        // $this->db->where('type','partners');
        // $q=$this->db->get('images');
        // return $q->result();
    // }

//========================================================================================================


    public function get_data($tablename,$where=array(),$order=array(),$getfirst=false,$limit=0,$offset=0){
        $this->db->from($tablename);
        if(is_array($where)&&!empty($where)){
            $this->db->where($where);
        }

        if(!empty($order)&&is_array($order)){
            foreach ($order as $field => $val){
               $this->db->order_by($field,$val);
            }
        }
        if ($limit){
            if ($offset){
                $this->db->limit($limit,$offset);
            }else{
                $this->db->limit($limit);
            }
        }

        if ($getfirst===true){
            return $this->db->get()->first_row();
        }else{
            return $this->db->get()->result();
        }
    }



//Get_multi_table('table_name',where_array=aray( 'collum'=>'conditional'),join_array=array( array( ), array( ),.....))
    public function Get_multi_table($table, $where_array, $join_array)
        {

            foreach ($join_array as $v) {

                if (is_array($v)) {

                    $this->db->join($v[0], $v[2] . "." . $v[3] . "=" . $v[0] . "." . $v[1], $v[4]);

                } else {
                    return false;
                }
            }


            if ($table && is_array($where_array)) {

                $this->db->where($where_array);
            } else {
                return false;
            }

            $q = $this->db->get($table);

            return $q->result();
//        return $this->db->last_query();

        }

    // public function getBanner($type){
        // $this->db->select('*');
        // $this->db->where('type',$type);
        // $q = $this->db->get('images');
        // return $q->result();
    // }

	// dem so ban ghi trong 1 bang
    public function Count($table, $where = array())
    {
        $q = $this->db->select('*')
            ->from($table)
            ->where($where)
            ->get();
        return $q->num_rows();
    }
	// dem so ban ghi trong 1 bang dieu kien like
    public function Count_like($table, $where = null)
    {
        if($where==null || !is_array($where)){
            return 0;
        }
        $this->db->select('*');
        $this->db->from($table);
        $this->db->like($where);
        $q= $this->db->get();
        return $q->num_rows();
    }
//==================================
    public function getAdminAcc($id){

        if($id){
            $this->db->select('id,username,username,email,lastlogin,level');
            $this->db->where('id',$id);
            $q = $this->db->get('nt_admin');
            return $q->first_row();
        }else return false;
    }

    public function getUserModules($admin_id){
        if($admin_id){
              $this->db->where('user_id',$admin_id);
            $q = $this->db->get('user_modules');
            return $q->first_row();
        }else return false;
    }

    // public function listAll($table, $limit=null, $offset=null)
    // {
        // $this->db->select('*');
        // if($limit&&$offset){
            // $this->db->limit($limit, $offset);
        // }
        // $this->db->order_by('id', 'desc');
        // $q = $this->db->get($table);
        // return $q->result();
    // }

    // public function getList($table)
    // {
        // $this->db->select('*');
        // $q = $this->db->get($table);
        // return $q->result();
    // }
	// dem toan bo so ban ghi trong table
    public function count_All($table)
    {
        return $this->db->count_all($table);
    }

    public function getItemByID($table, $id)
    {

        $this->db->where('id', $id);
        $q = $this->db->get($table);
        return $q->first_row();
    }

    public function getItemByAlias($table, $alias)
    {
        $this->db->where('alias', $alias);
        $q = $this->db->get($table);
        return $q->first_row();
    }


	// thêm ban ghi trong table
    public function Add($table, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
    }
	// Cập nhât ban ghi trong table
    public function Update($table, $id, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->where('id', $id);
            $this->db->update($table, $data);
        }
    }
	 public function Update_where($table, $where, $data)
    {
        if (isset($data) && $data != NULL) {
            $this->db->where($where);
            $this->db->update($table, $data);
            return 1;
        }
    }
	// // xoa ban ghi trong table
    public function Delete($table, $id)
    {
        if (is_numeric($id)) {
            $this->db->where('id', $id);
            $this->db->delete($table);
        } else return false;
    }
	// xoa bản ghi trong table với điêu kien where
	 public function Delete_where($table,$where)
    {
        if ($table&&$where) {
            $this->db->where($where);
            $this->db->delete($table);
            return true;
        } else return false;
    }
}

?>
