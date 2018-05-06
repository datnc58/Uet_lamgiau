<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menu_model extends MY_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('model');
        $this->load->database();
    }
    public function getListMenu($position){
        $this->db->where('position',$position);
        $q=$this->db->get('menu');
        return $q->result();
    }
    public function getMenuByID($id){
        $this->db->where('id',$id);
        $q=$this->db->get('menu');
        return $q->first_row();
    }
    public function UpdateMenu($id,$data){
        if(isset($data) && $data != NULL){
            $this->db->where('id',$id);
            $this->db->update('menu',$data);
        }
    }
    public function DeleteMenu($id){
        $arrs = $this->getArrayMenuChild($id);
        if(count($arrs)){
            foreach($arrs as $val){
                $this->db->where('id',$val);
                $this->db->delete('menu');
            }
        }
        else return false;
    }
    public function getArrayMenuChild($id,$recursive=false)
    {
        $arr[]=$id;

        $q1 = $this->db->query("SELECT id FROM menu where parent_id = '" . $id . "'")->result();
        if (isset($q1) && !empty($q1)) {
            foreach ($q1 as $v) {
                $arr[] = $v->id;
                if($recursive=true){
                    $arr=array_unique(array_merge($arr,$this->getArrayMenuChild($v->id,true)));
                }
            }
        }
        return $arr;
    }
    /*public function get_data($table)
    {
        $query=$this->db->get($table);
        return $query->result_array();
    }*/
    public function getListRoot(){
        $this->db->select('*');
        $this->db->where('parent_id =',0);
        $this->db->order_by('sort ','esc');

        $q=$this->db->get('menu');
        return $q->result();
    }
    public function getListChil(){
        $this->db->select('*');
        $this->db->where('parent_id !=',0);
        $this->db->order_by('sort ','esc');
        $q=$this->db->get('menu');
        return $q->result();
    }
}